<template>
    <div>
        <Card class="max-w-lg">
            <template #title>
                Edit Fakultas
            </template>
            <template #content>
               <form @submit.prevent="updateFaculty" method="post" class=" h-auto flex flex-col gap-4">
                    <div class="w-full flex justify-between items-center">
                        <label for="">Nama</label>
                        <input type="text" v-model="form.nama">
                    </div>

                    <div>
                    <Button type="submit" label="Update" icon="pi pi-check" />
                    </div>
               </form>
            </template>
        </Card>
    </div>
</template>

<script>
import layout from '@/Pages/Dashboard2.vue'

import {reactive} from 'vue'

import Card from 'primevue/card';
import Button from 'primevue/button';
import { Inertia } from '@inertiajs/inertia';
export default {
    components: {
Card,
Button
    },
    layout: layout,
    props: {
        faculty: Object
    },
    setup(props) {
       const form = reactive({
           id: props.faculty.id,
           nama: props.faculty.nama
       });

        const updateFaculty = () => {
            Inertia.patch(route('faculty.update', form.id), form);
        }
        return {
            form,
            updateFaculty
            }

        }
    }

</script>
