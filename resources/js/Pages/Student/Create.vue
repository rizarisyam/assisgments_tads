<template>
    <div>
        <Card class="max-w-xl">
            <template #title>
                Create Mahasiswa
            </template>
            <template #content>
               <form @submit.prevent="storeStudent" method="post" class=" h-auto flex flex-col gap-4">
                    <div class="w-full flex justify-between items-center">
                        <label for="">Nama</label>
                        <input type="text" v-model="form.nama" class="w-72 border-gray-300">
                    </div>

                     <div class="w-full flex justify-between items-center">
                        <label for="">Alamat</label>
                        <textarea class="w-72 border-gray-300" v-model="form.alamat"></textarea>
                    </div>


                    <div class="w-full flex justify-between items-center">
                        <label for="">No Telp</label>
                        <input type="text" v-model="form.no_telp" class="w-72 border-gray-300">
                    </div>

                     <div class="flex justify-between items-center">
                        <label for="location" class="block text-sm font-medium text-gray-700">Fakultas</label>
                        <select id="location" name="location" class="mt-1 block w-72 h-12 pl-3 pr-10 py-2 px-3 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.fakultas_id">
                            <!-- <option selected="true">Pilih Fakultas</option> -->
                            <option v-for="faculty in faculties" :key="faculty.id" :value="faculty.id">{{faculty.nama}}</option>

                        </select>
                    </div>

                     <div class="flex justify-between items-center">
                        <label for="location" class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <select id="location" name="location" class="mt-1 block w-72 h-12 pl-3 pr-10 py-2 px-3 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.program_studi_id">
                            <!-- <option selected="true">Pilih Fakultas</option> -->
                            <option v-for="major in majors" :key="major.id" :value="major.id">{{major.nama}}</option>

                        </select>
                    </div>

                    <div>
                    <Button type="submit" label="Submit" icon="pi pi-check" />
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
export default {
    components: {
Card,
Button
    },
    layout: layout,
    setup() {
        const form = useForm({
            nama: null,
            alamat: null,
            no_telp: null,
            fakultas_id: null,
            program_studi_id: null
        })
        const faculties = ref([]);
        const majors = ref([]);

         const fetchFaculty = async () => {
            const response = await axios.get(route('api.faculty.index'));
            const {data} = response;
            faculties.value = data;
            // console.log(response);
        }

         const fetchMajor = async () => {
            const response = await axios.get(route('api.major.index'));
            const {data} = response;
            majors.value = data;
            // console.log(response);
        }

        const storeStudent = () => {
            form.post(route('student.store'));
        }

        onMounted(() => {
            fetchFaculty()
            fetchMajor()
        })
        return {
            form,
            storeStudent,
            faculties,
            majors
            }

        }
    }

</script>
