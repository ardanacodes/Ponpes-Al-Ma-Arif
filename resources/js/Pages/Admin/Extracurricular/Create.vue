<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm, Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const preview = ref(null)

const form = useForm({
    title: '',
    description: '',
    thumbnail: null
})

const handleThumbnail = (e) => {
    const file = e.target.files[0]

    form.thumbnail = file

    if (file) {
        preview.value = URL.createObjectURL(file)
    }
}

const submit = () => {
    form.post('/admin/extracurriculars')
}
</script>

<template>

    <AdminLayout>

        <div class="min-h-screen bg-gray-50 p-6">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Tambah Ekstrakurikuler
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Tambahkan data ekstrakurikuler sekolah
                    </p>

                </div>

                <!-- BACK -->
                <Link
                    href="/admin/extracurriculars"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-100 transition font-medium"
                >
                    Kembali
                </Link>

            </div>

            <!-- FORM CARD -->
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">

                <form
                    @submit.prevent="submit"
                    class="p-8 space-y-8"
                >

                    <!-- THUMBNAIL -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Thumbnail Ekstrakurikuler
                        </label>

                        <!-- PREVIEW -->
                        <div
                            class="w-full h-64 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 overflow-hidden flex items-center justify-center mb-4"
                        >

                            <img
                                v-if="preview"
                                :src="preview"
                                class="w-full h-full object-cover"
                            />

                            <div
                                v-else
                                class="text-center"
                            >

                                <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4">

                                    <i
                                        class="fa-solid fa-image text-2xl text-[#1591DC]"
                                    ></i>

                                </div>

                                <p class="text-sm text-gray-400">
                                    Preview thumbnail akan muncul di sini
                                </p>

                            </div>

                        </div>

                        <!-- INPUT -->
                        <input
                            type="file"
                            @change="handleThumbnail"
                            class="w-full border border-gray-200 rounded-xl p-3 bg-white focus:ring-2 focus:ring-[#1591DC] focus:outline-none"
                        >

                        <div
                            v-if="form.errors.thumbnail"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.thumbnail }}
                        </div>

                    </div>

                    <!-- TITLE -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Judul Ekstrakurikuler
                        </label>

                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Masukkan judul ekstrakurikuler"
                            class="w-full rounded-xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#1591DC]"
                        >

                        <div
                            v-if="form.errors.title"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.title }}
                        </div>

                    </div>

                    <!-- DESCRIPTION -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Deskripsi
                        </label>

                        <textarea
                            v-model="form.description"
                            rows="6"
                            placeholder="Masukkan deskripsi ekstrakurikuler"
                            class="w-full rounded-xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#1591DC] resize-none"
                        ></textarea>

                        <div
                            v-if="form.errors.description"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.description }}
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end">

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-7 py-4 rounded-xl bg-[#1591DC] hover:bg-[#127fc1] text-white font-semibold shadow-sm transition disabled:opacity-50"
                        >

                            <span v-if="form.processing">
                                Menyimpan...
                            </span>

                            <span v-else>
                                Simpan Ekstrakurikuler
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </AdminLayout>

</template>