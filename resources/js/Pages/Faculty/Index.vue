<template>
    <div>
        <DataTable :value="faculties" responsiveLayout="scroll">
            <template #header>
                <div class="table-header flex justify-between items-center">
                    <!-- <Breadcrumb :home="home"/> -->
                    <h3>Manage Fakultas</h3>
                    <div>
                    <Link :href="route('faculty.create')">
                        <Button icon="pi pi-plus" />
                    </Link></div>
                </div>
            </template>
            <Column field="code" header="Code">
                <template #body="props">
                    <div>{{ Number(props.index)+1}}</div>
                </template>
            </Column>
            <Column field="nama" header="Name"></Column>
            <Column field="id" header="Actions" header-class="flex justify-end">
                <template #body="props">
                    <div class=" flex justify-end">
                        <span class="p-buttonset">
                            <!-- <Button label="Save" icon="pi pi-check" /> -->
                            <Link :href="route('faculty.edit', props.data.id)" method="get" as="button" type="button">
                                <Button label="Edit" icon="pi pi-pencil"  />
                            </Link>

                            <!-- <Link :href="route('faculty.destroy', props.data.id)" method="delete" as="button" type="button">
                            </Link> -->
                                <Button label="Delete" icon="pi pi-trash" class="p-button-danger" @click="dialogDelete(props.data.id)" />
                        </span>
                    </div>
                </template>
            </Column>
        </DataTable>
        <ConfirmDialog></ConfirmDialog>
    </div>
</template>

<script>
import { onMounted, ref } from "vue";

import layout from "@/Pages/Dashboard2.vue";

import { Link } from '@inertiajs/inertia-vue3'

import Button from "primevue/button";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ConfirmDialog from 'primevue/confirmdialog';
import { useConfirm } from "primevue/useconfirm";
import axios from "axios";
export default {
    components: {
        Button,
        DataTable,
        Column,
        Link,
        ConfirmDialog
    },
    layout: layout,

    setup() {
        const faculties = ref([]);
        const confirm = useConfirm();


        const fetchFaculty = async () => {
            const response = await axios.get(route('api.faculty.index'));
            const {data } = response;
faculties.value = data
        }

        const destroyFaculty = async (id) => {
            await axios.delete(route('api.faculty.destroy', id))
        }

        const dialogDelete = (id) => {
            confirm.require({
            message: 'Are you sure you want to proceed?',
            header: 'Confirmation',
            icon: 'pi pi-exclamation-triangle',
            accept: () => {
                destroyFaculty(id)
                //callback to execute when user confirms the action
                fetchFaculty()
            },
            reject: () => {
                //callback to execute when user rejects the action
            }
        });
        }

        onMounted(() => {
            fetchFaculty()
        })

        return {
            faculties,
dialogDelete
        };
    },
};
</script>
