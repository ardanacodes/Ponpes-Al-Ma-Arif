<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
    news: Object
})

const preview = ref(
    props.news.thumbnail
        ? '/storage/' + props.news.thumbnail
        : null
)

const form = useForm({
    _method: 'put',
    title: props.news.title,
    content: props.news.content,
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
    form.post(`/admin/news/${props.news.id}`, {
        forceFormData: true
    })
}
</script>

<template>
    <AdminLayout>

        <div class="min-h-screen bg-gray-50 p-6">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Edit Berita
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Perbarui data berita sekolah
                    </p>
                </div>

                <!-- BACK -->
                <a
                    href="/admin/news"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-100 transition font-medium"
                >
                    Kembali
                </a>

            </div>

            <!-- FORM CARD -->
            <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">

                <form
                    @submit.prevent="submit"
                    class="p-8 space-y-8"
                >

                    <!-- THUMBNAIL -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Thumbnail Berita
                        </label>

                        <!-- PREVIEW -->
                        <div
                            class="w-full h-64 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 flex items-center justify-center overflow-hidden mb-4"
                        >

                            <img 
                            v-if="item.thumbnail" 
                            :src="`/storage/${item.thumbnail}`" 
                            class="w-full h-full object-cover" 
                            alt="Thumbnail Berita"
                        />

                            <div
                                v-else
                                class="text-center"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-12 h-12 text-gray-300 mx-auto mb-3"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M3 16l4-4a3 3 0 014.243 0L16 16m-2-2l1-1a3 3 0 014.243 0L21 14" />
                                </svg>

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
                        />

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
                            Judul Berita
                        </label>

                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Masukkan judul berita..."
                            class="w-full rounded-xl border border-gray-200 px-4 py-4 focus:ring-2 focus:ring-[#1591DC] focus:outline-none"
                        />

                        <div
                            v-if="form.errors.title"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.title }}
                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Isi Berita
                        </label>

                        <textarea
                            v-model="form.content"
                            rows="10"
                            placeholder="Tulis isi berita..."
                            class="w-full rounded-xl border border-gray-200 px-4 py-4 focus:ring-2 focus:ring-[#1591DC] focus:outline-none resize-none"
                        ></textarea>

                        <div
                            v-if="form.errors.content"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.content }}
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
                                Mengupdate...
                            </span>

                            <span v-else>
                                Update Berita
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </AdminLayout>
</template>