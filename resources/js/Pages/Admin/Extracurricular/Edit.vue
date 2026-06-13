<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'

// 1. Definisikan props dengan jelas
const props = defineProps({
    extracurricular: Object
})

// 2. Inisialisasi form langsung dengan data dari props (jika ada)
const form = useForm({
    title: props.extracurricular?.title || '',
    description: props.extracurricular?.description || '',
    thumbnail: null,
})

// 3. Fungsi submit
const submit = () => {
    // Pastikan ID ada sebelum kirim
    if (!props.extracurricular?.id) {
        alert("ID tidak ditemukan!")
        return
    }

    // Gunakan post dengan _method=PUT untuk update
    form.post(`/admin/extracurriculars/${props.extracurricular.id}?_method=PUT`, {
        forceFormData: true,
        onSuccess: () => alert('Berhasil diupdate!'),
        onError: (err) => console.error(err)
    })
}
</script>

<template>
    <AdminLayout>
        <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-sm border border-gray-100 mt-10">
            <h1 class="text-2xl font-black text-gray-800 mb-6">Edit Ekstrakurikuler</h1>
            
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Ekstrakurikuler</label>
                    <input v-model="form.title" type="text" class="w-full px-4 py-3 rounded-xl border border-gray-200">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <textarea v-model="form.description" rows="4" class="w-full px-4 py-3 rounded-xl border border-gray-200"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Gambar</label>
                    <input type="file" @input="form.thumbnail = $event.target.files[0]" class="w-full">
                </div>

                <button type="submit" :disabled="form.processing" class="px-6 py-3 bg-[#008ecc] text-white font-bold rounded-xl">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </button>
            </form>
        </div>
    </AdminLayout>
</template>