<template>
    <div>
        <Card class="max-w-lg">
            <template #title>
                Edit Program Studi
            </template>
            <template #content>
               <form @submit.prevent="updateMajor" method="post" class=" h-auto flex flex-col gap-4">
                    <div class="w-full flex justify-between items-center">
                        <label for="">Nama</label>
                        <input type="text" v-model="form.nama" class="border-gray-300">
                    </div>

                    <div class="flex justify-between items-center">
                        <label for="location" class="block text-sm font-medium text-gray-700">Fakultas</label>
                        <select id="location" name="location" class="mt-1 block w-56 h-12 pl-3 pr-10 py-2 px-3 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.fakultas_id">
                            <!-- <option selected="true">Pilih Fakultas</option> -->
                            <option v-for="faculty in faculties" :key="faculty.id" :value="faculty.id">{{faculty.nama}}</option>

                        </select>
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

import {onMounted, reactive, ref} from 'vue'

import Card from 'primevue/card';
import Button from 'primevue/button';
import { useForm } from '@inertiajs/inertia-vue3';
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
Card,
Button
    },
    layout: layout,
    props: {
        major: Object
    },
    setup(props) {
        const {id, nama, fakultas_id} = props.major;

        const form = useForm({
            nama: nama,
            fakultas_id: fakultas_id
        })

        const faculties = ref([]);


        // methods
        const fetchFaculty = async () => {
            const response = await axios.get(route('api.faculty.index'));
            const {data} = response;
            faculties.value = data;
            // console.log(response);
        }

        const updateMajor = () => {
            // Inertia.patch(route('api.major.update', form.id), form);
            form.patch(route('major.update', id));
            // Inertia.visit(route('major.index'))
        }

        onMounted(() => {
            fetchFaculty()
        })
        return {
            form,
            updateMajor,
            faculties
            }

        }
    }

</script>
