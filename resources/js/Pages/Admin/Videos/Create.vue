<script setup>
import { useForm, Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const form = useForm({
    title: '',
    youtube_url: ''
})

const submit = () => {
    form.post('/admin/videos')
}

// Preview thumbnail otomatis
const thumbnail = computed(() => {
    if (!form.youtube_url) return null

    const regExp =
        /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/

    const match = form.youtube_url.match(regExp)

    return match && match[2].length === 11
        ? `https://img.youtube.com/vi/${match[2]}/hqdefault.jpg`
        : null
})
</script>

<template>

    <AdminLayout>

        <div class="min-h-screen bg-gray-50 p-6">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Tambah Video
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Tambahkan video YouTube baru
                    </p>
                </div>

                <!-- BACK -->
                <Link
                    href="/admin/videos"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-gray-200 bg-white hover:bg-gray-100 font-medium transition"
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

                    <!-- PREVIEW -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Preview Thumbnail
                        </label>

                        <div
                            class="w-full h-64 rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 overflow-hidden flex items-center justify-center"
                        >

                            <img
                                v-if="thumbnail"
                                :src="thumbnail"
                                class="w-full h-full object-cover"
                            />

                            <div
                                v-else
                                class="text-center"
                            >

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-14 h-14 text-gray-300 mx-auto mb-3"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">

                                    <path d="M19.615 3.184C16.403 2.964 7.597 2.964 4.385 3.184 1.488 3.383.125 5.333 0 8.223c-.167 3.809-.167 3.745 0 7.554.125 2.89 1.488 4.84 4.385 5.039 3.212.22 12.018.22 15.23 0 2.897-.199 4.26-2.149 4.385-5.039.167-3.809.167-3.745 0-7.554-.125-2.89-1.488-4.84-4.385-5.039z"/>
                                </svg>

                                <p class="text-sm text-gray-400">
                                    Preview video akan muncul di sini
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- TITLE -->
                    <div>

                        <label class="block mb-3 text-sm font-semibold text-gray-700">
                            Judul Video
                        </label>

                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Masukkan judul video"
                            class="w-full rounded-xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-500"
                        >

                        <div
                            v-if="form.errors.title"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.title }}
                        </div>

                    </div>

                    <!-- URL -->
                    <div>

                        <label class="block mb-3 text-sm font-semibold text-gray-700">
                            Link YouTube
                        </label>

                        <input
                            v-model="form.youtube_url"
                            type="text"
                            placeholder="https://youtube.com/watch?v=xxxx"
                            class="w-full rounded-xl border border-gray-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-red-500"
                        >

                        <div
                            v-if="form.errors.youtube_url"
                            class="text-red-500 text-sm mt-2"
                        >
                            {{ form.errors.youtube_url }}
                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div class="flex justify-end">

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-7 py-4 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold shadow-sm transition disabled:opacity-50"
                        >

                            <span v-if="form.processing">
                                Menyimpan...
                            </span>

                            <span v-else>
                                Simpan Video
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </AdminLayout>

</template>