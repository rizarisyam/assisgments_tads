<template>
    <div>
        <DataTable :value="students" responsiveLayout="scroll">
            <template #header>
                <div class="table-header flex justify-between items-center">
                    <!-- <Breadcrumb :home="home"/> -->
                    <h3>Manage Mahasiswa</h3>
                    <div>
                        <Link :href="route('student.create')">
                            <Button icon="pi pi-plus" />
                        </Link>
                    </div>
                </div>
            </template>
            <Column field header="No">
                <template #body="props">
                    <div>{{ Number(props.index) + 1 }}</div>
                </template>
            </Column>
            <Column field="nama" header="Nama"></Column>
            <Column field="alamat" header="Alamat">
                <template #body="props">
                    <div>{{ props.data.alamat.slice(0,70) }}</div>
                </template>
            </Column>
            <Column field="no_telp" header="Telp"></Column>
            <Column field header="Fakultas">
                <template #body="props">
                    <div>{{ props.data.faculty.nama }}</div>
                </template>
            </Column>
            <Column field="nma" header="Program Studi">
                <template #body="props">{{ props.data.major.nama }}</template>
            </Column>
            <Column field="id" header="Actions" header-class="flex justify-end">
                <template #body="props">
                    <div class="flex justify-end">
                        <span class="p-buttonset">
                            <!-- <Button label="Save" icon="pi pi-check" /> -->
                            <Link
                                :href="route('student.edit', props.data.id)"
                                method="get"
                                as="button"
                                type="button"
                            >
                                <Button label="Edit" icon="pi pi-pencil" />
                            </Link>

                            <!-- <Link
                                :href="route('faculty.destroy', props.data.id)"
                                method="delete"
                                as="button"
                                type="button"
                            >
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

import { Link } from "@inertiajs/inertia-vue3";

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
        ConfirmDialog,
    },
    layout: layout,
    props: {
        faculties: Array,
    },
    setup(props) {
        const students = ref([]);
        const confirm = useConfirm();
        const fetchDataStudent = async () => {
            const response = await axios.get(route("api.student.index"));
            const { data } = response;
            students.value = data;
        };

        const destroyStudent = async (id) => {
            await axios.delete(route('api.student.destroy', id));
        }

        const dialogDelete = (id) => {
            confirm.require({
                message: 'Are you sure you want to proceed?',
                header: 'Confirmation',
                icon: 'pi pi-exclamation-triangle',
                accept: () => {
                    destroyStudent(id);
                    fetchDataStudent();
                    //callback to execute when user confirms the action
                },
                reject: () => {
                    //callback to execute when user rejects the action
                }
            });
        }

        onMounted(() => {
            fetchDataStudent();
        });

        return {
            students,
            dialogDelete
        };
    },
};
</script>
