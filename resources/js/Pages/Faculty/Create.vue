<template>
    <div>
        <Card class="max-w-lg">
            <template #title>
                Create Fakultas
            </template>
            <template #content>
               <form @submit.prevent="storeFaculty" method="post" class=" h-auto flex flex-col gap-4">
                    <div class="w-full flex justify-between items-center">
                        <label for="">Nama</label>
                        <input type="text" v-model="form.nama">
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

import {reactive} from 'vue'

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
            nama: null
        })

        const storeFaculty = () => {
            form.post(route('faculty.store'));
        }
        return {
            form,
            storeFaculty
            }

        }
    }

</script>
