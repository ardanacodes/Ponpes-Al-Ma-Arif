<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const preview = ref(null)

const form = useForm({
    title: '',
    content: '',
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
    form.post('/admin/news')
}
</script>

<template>
    <AdminLayout>
        <div class="p-4 sm:p-1 max-w-4xl mx-auto space-y-5">

            <!-- ── PAGE HEADER ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.06)] px-6 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-sky-100 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-sky-950 tracking-tight">Tambah Berita</h1>
                        <p class="text-xs text-sky-400 font-medium">Tambahkan berita terbaru sekolah</p>
                    </div>
                </div>

                <a
                    href="/admin/news"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-sky-200 bg-sky-50 hover:bg-sky-100 text-sky-600 text-sm font-semibold transition-all duration-200 self-start md:self-auto"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- ── FORM CARD ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.05)] overflow-hidden">

                <!-- Form Section Header -->
                <div class="px-6 py-4 border-b border-sky-100 bg-gradient-to-r from-sky-50/60 to-white">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-sm font-bold text-sky-950">Informasi Berita</span>
                    </div>
                </div>

                <form @submit.prevent="submit" class="p-6 space-y-6">

                    <!-- THUMBNAIL -->
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-sky-800">
                            Thumbnail Berita
                        </label>

                        <!-- Preview Area -->
                        <div class="w-full h-64 rounded-xl border-2 border-dashed border-sky-200 bg-sky-50/50 flex items-center justify-center overflow-hidden transition-all duration-200 hover:border-sky-400">
                            <img
                                v-if="preview"
                                :src="preview"
                                class="w-full h-full object-cover"
                                alt="Preview Thumbnail"
                            />
                            <div v-else class="text-center space-y-2">
                                <div class="p-3 bg-sky-100 rounded-xl mx-auto w-fit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-sky-400">Preview thumbnail akan muncul di sini</p>
                                <p class="text-xs text-sky-300">Format: JPG, PNG, WEBP — Maks. 2MB</p>
                            </div>
                        </div>

                        <input
                            type="file"
                            @change="handleThumbnail"
                            class="w-full border border-sky-200 rounded-xl p-3 bg-sky-50/50 text-sky-700 text-sm focus:ring-2 focus:ring-sky-400 focus:outline-none transition"
                        />
                        <p v-if="form.errors.thumbnail" class="text-rose-500 text-xs mt-1">{{ form.errors.thumbnail }}</p>
                    </div>

                    <!-- TITLE -->
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-sky-800">
                            Judul Berita
                        </label>
                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Masukkan judul berita..."
                            class="w-full rounded-xl border border-sky-200 bg-sky-50/30 px-4 py-3 text-sky-950 placeholder-sky-300 focus:ring-2 focus:ring-sky-400 focus:border-sky-400 focus:outline-none transition"
                        />
                        <p v-if="form.errors.title" class="text-rose-500 text-xs">{{ form.errors.title }}</p>
                    </div>

                    <!-- CONTENT -->
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-sky-800">
                            Isi Berita
                        </label>
                        <textarea
                            v-model="form.content"
                            rows="10"
                            placeholder="Tulis isi berita..."
                            class="w-full rounded-xl border border-sky-200 bg-sky-50/30 px-4 py-3 text-sky-950 placeholder-sky-300 focus:ring-2 focus:ring-sky-400 focus:border-sky-400 focus:outline-none resize-none transition"
                        ></textarea>
                        <p v-if="form.errors.content" class="text-rose-500 text-xs">{{ form.errors.content }}</p>
                    </div>

                    <!-- SUBMIT -->
                    <div class="flex justify-end pt-2 border-t border-sky-100">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center gap-2 px-7 py-3 rounded-xl bg-sky-500 hover:bg-sky-600 active:bg-sky-700 text-white text-sm font-bold shadow-sm hover:shadow-[0_4px_12px_rgba(14,165,233,0.3)] transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <svg v-if="!form.processing" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            <span>{{ form.processing ? 'Menyimpan...' : 'Simpan Berita' }}</span>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </AdminLayout>
</template>