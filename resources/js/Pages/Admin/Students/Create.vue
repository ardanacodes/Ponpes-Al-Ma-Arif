<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    classes: Array
})

const form = useForm({
    nis: '',
    name: '',
    school_class_id: ''
})
const submit = () => {
    alert('TOMBOL JALAN')
    form.post('/admin/students')
}
</script>

<template>
    <AdminLayout>

        <div class="bg-white p-6 rounded shadow">

            <h1 class="text-2xl font-bold mb-5">
                Tambah Siswa
            </h1>

            <form @submit.prevent="submit">

                <input
                    v-model="form.nis"
                    placeholder="NIS"
                    class="w-full border p-2 mb-3"
                />

                <input
                    v-model="form.name"
                    placeholder="Nama Siswa"
                    class="w-full border p-2 mb-3"
                />

                <select
                    v-model="form.school_class_id"
                    class="w-full border p-2 mb-3"
                >
                    <option value="">
                        Pilih Kelas
                    </option>

                    <option
                        v-for="kelas in classes"
                        :key="kelas.id"
                        :value="kelas.id"
                    >
                        {{ kelas.name }}
                    </option>
                </select>

                <button
                    class="bg-green-600 text-white px-4 py-2 rounded"
                >
                    Simpan
                </button>

            </form>

        </div>

    </AdminLayout>
</template>