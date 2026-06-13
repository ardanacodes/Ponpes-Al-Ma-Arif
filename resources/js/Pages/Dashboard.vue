<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'
</script>

<template>
    <Head title="Dashboard Admin" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Dashboard Admin
                    </h2>
                    <p class="text-sm text-gray-500">
                        Selamat datang di panel administrasi sekolah
                    </p>
                </div>
            </div>
        </template>

        <div class="py-8">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <!-- Statistik -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">

                    <!-- Card -->
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">
                                    Total Berita
                                </p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                                    12
                                </h3>
                            </div>

                            <div
                                class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center"
                            >
                                📰
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">
                                    Data Gallery
                                </p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                                    28
                                </h3>
                            </div>

                            <div
                                class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center"
                            >
                                🖼️
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">
                                    Pendaftar PPDB
                                </p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                                    54
                                </h3>
                            </div>

                            <div
                                class="w-14 h-14 rounded-xl bg-yellow-100 flex items-center justify-center"
                            >
                                🎓
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="bg-white rounded-2xl shadow-sm border p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">
                                    Ekstrakurikuler
                                </p>
                                <h3 class="text-3xl font-bold text-gray-800 mt-2">
                                    8
                                </h3>
                            </div>

                            <div
                                class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center"
                            >
                                ⚽
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Menu Cepat -->
                <div class="mt-8 bg-white rounded-2xl shadow-sm border p-6">

                    <h3 class="text-lg font-bold text-gray-800 mb-5">
                        Menu Cepat
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

                        <Link
                            href="/admin/news"
                            class="p-5 rounded-xl border hover:bg-gray-50 transition"
                        >
                            <div class="text-3xl mb-3">📰</div>
                            <h4 class="font-semibold text-gray-800">
                                Kelola Berita
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Tambah dan edit berita sekolah
                            </p>
                        </Link>

                        <Link
                            href="/admin/gallery"
                            class="p-5 rounded-xl border hover:bg-gray-50 transition"
                        >
                            <div class="text-3xl mb-3">🖼️</div>
                            <h4 class="font-semibold text-gray-800">
                                Gallery
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Kelola foto kegiatan sekolah
                            </p>
                        </Link>

                        <Link
                            href="/admin/ppdb"
                            class="p-5 rounded-xl border hover:bg-gray-50 transition"
                        >
                            <div class="text-3xl mb-3">🎓</div>
                            <h4 class="font-semibold text-gray-800">
                                Data PPDB
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Lihat data pendaftar siswa
                            </p>
                        </Link>

                        <Link
                            href="/admin/profile"
                            class="p-5 rounded-xl border hover:bg-gray-50 transition"
                        >
                            <div class="text-3xl mb-3">🏫</div>
                            <h4 class="font-semibold text-gray-800">
                                Profil Sekolah
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">
                                Edit informasi sekolah
                            </p>
                        </Link>

                    </div>

                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>