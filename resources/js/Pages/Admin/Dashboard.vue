<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

defineProps({
    totalNews: Number,
    totalExtracurricular: Number,
    totalGallery: Number,
    totalFacility: Number
})
</script>

<template>
    <Head title="Dashboard Admin" />

    <AdminLayout>
        <div class="p-4 sm:p-1 max-w-7xl mx-auto">

            <!-- MAIN CARD CONTAINER -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.07)] p-6 sm:p-8 space-y-6">

                <!-- ── HEADER ── -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0 border-b border-sky-100 pb-6">
                    <div>
                        <div class="flex items-center gap-2.5 mb-1">
                            <!-- School cap icon -->
                            <div class="p-2 bg-sky-100 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                            </div>
                            <h1 class="text-2xl font-extrabold text-sky-950 tracking-tight">Dashboard Admin</h1>
                        </div>
                        <p class="text-sky-400 text-sm font-medium pl-0.5">
                            Ringkasan aktivitas dan pengelolaan data operasional sekolah hari ini.
                        </p>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-sky-50 border border-sky-200/70 px-4 py-2 rounded-xl text-xs font-semibold text-sky-600 shadow-sm self-start md:self-auto">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Sistem Berjalan Normal</span>
                    </div>
                </div>

                <!-- ── STATS GRID ── -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                    <!-- Card Berita -->
                    <div class="group relative bg-gradient-to-br from-sky-50 to-white p-5 rounded-2xl border border-sky-100 hover:border-sky-300 hover:shadow-[0_8px_24px_rgba(14,165,233,0.15)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-between overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-sky-400 to-blue-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-sky-400 tracking-widest uppercase block">Total Berita</span>
                            <span class="text-3xl font-extrabold text-sky-950 block group-hover:text-sky-600 transition-colors duration-200">{{ totalNews }}</span>
                            <span class="text-[10px] text-sky-300 font-medium">Artikel dipublikasikan</span>
                        </div>
                        <div class="p-3 bg-sky-100 text-sky-500 rounded-xl group-hover:bg-sky-500 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1M19 20a2 2 0 002-2V8a2 2 0 00-2-2h-5M19 20H5" />
                            </svg>
                        </div>
                    </div>

                    <!-- Card Ekstrakurikuler -->
                    <div class="group relative bg-gradient-to-br from-violet-50 to-white p-5 rounded-2xl border border-violet-100 hover:border-violet-300 hover:shadow-[0_8px_24px_rgba(139,92,246,0.15)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-between overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-violet-400 to-purple-500 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-violet-400 tracking-widest uppercase block">Ekstrakurikuler</span>
                            <span class="text-3xl font-extrabold text-violet-950 block group-hover:text-violet-600 transition-colors duration-200">{{ totalExtracurricular }}</span>
                            <span class="text-[10px] text-violet-300 font-medium">Kegiatan aktif</span>
                        </div>
                        <div class="p-3 bg-violet-100 text-violet-500 rounded-xl group-hover:bg-violet-500 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Card Galeri -->
                    <div class="group relative bg-gradient-to-br from-amber-50 to-white p-5 rounded-2xl border border-amber-100 hover:border-amber-300 hover:shadow-[0_8px_24px_rgba(245,158,11,0.15)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-between overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-amber-400 to-orange-400 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-amber-400 tracking-widest uppercase block">Foto Galeri</span>
                            <span class="text-3xl font-extrabold text-amber-950 block group-hover:text-amber-600 transition-colors duration-200">{{ totalGallery }}</span>
                            <span class="text-[10px] text-amber-300 font-medium">Foto terunggah</span>
                        </div>
                        <div class="p-3 bg-amber-100 text-amber-500 rounded-xl group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Card Fasilitas -->
                    <div class="group relative bg-gradient-to-br from-emerald-50 to-white p-5 rounded-2xl border border-emerald-100 hover:border-emerald-300 hover:shadow-[0_8px_24px_rgba(16,185,129,0.15)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-between overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-t-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-emerald-400 tracking-widest uppercase block">Fasilitas</span>
                            <span class="text-3xl font-extrabold text-emerald-950 block group-hover:text-emerald-600 transition-colors duration-200">{{ totalFacility }}</span>
                            <span class="text-[10px] text-emerald-300 font-medium">Unit tersedia</span>
                        </div>
                        <div class="p-3 bg-emerald-100 text-emerald-500 rounded-xl group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- ── MIDDLE LAYOUT: Quick Actions & Module Summary ── -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                    <!-- Quick Actions -->
                    <div class="bg-gradient-to-br from-sky-50/80 to-white p-6 rounded-2xl border border-sky-100 space-y-4">
                        <div class="flex items-center gap-2.5">
                            <!-- Zap icon -->
                            <div class="p-1.5 bg-sky-100 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-sky-900">Aksi Cepat</h2>
                                <p class="text-[11px] text-sky-400">Pintas manajemen data sekolah</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-2 pt-1">
                            <!-- Tulis Berita -->
                            <Link href="/admin/news" class="group/btn flex items-center gap-3 p-3.5 rounded-xl bg-white border border-sky-100 hover:border-sky-300 hover:bg-sky-50 transition-all duration-200 shadow-sm">
                                <div class="p-2 bg-sky-100 rounded-lg group-hover/btn:bg-sky-500 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500 group-hover/btn:text-white transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-sm font-semibold text-sky-900">Tulis Berita Baru</span>
                                    <span class="text-[11px] text-sky-400">Publikasi artikel sekolah</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-300 group-hover/btn:text-sky-500 group-hover/btn:translate-x-0.5 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>

                            <!-- Upload Galeri -->
                            <Link href="/admin/galleries" class="group/btn flex items-center gap-3 p-3.5 rounded-xl bg-white border border-amber-100 hover:border-amber-300 hover:bg-amber-50 transition-all duration-200 shadow-sm">
                                <div class="p-2 bg-amber-100 rounded-lg group-hover/btn:bg-amber-500 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500 group-hover/btn:text-white transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <span class="block text-sm font-semibold text-amber-900">Upload Foto Galeri</span>
                                    <span class="text-[11px] text-amber-400">Tambah koleksi foto</span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-300 group-hover/btn:text-amber-500 group-hover/btn:translate-x-0.5 transition-all duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    </div>

                    <!-- Module Summary Table -->
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-sky-100 overflow-hidden shadow-sm">
                        <div class="px-6 py-4 border-b border-sky-100 bg-gradient-to-r from-sky-50/60 to-white flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <!-- Grid icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <h2 class="text-sm font-bold text-sky-900">Ringkasan Modul Terkini</h2>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                                <span class="text-[11px] text-sky-400 font-medium">Auto-synced</span>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="bg-sky-50/50 border-b border-sky-100 text-sky-400 font-bold text-[10px] tracking-widest uppercase">
                                        <th class="py-3.5 px-6">Nama Komponen</th>
                                        <th class="py-3.5 px-6">Status Sistem</th>
                                        <th class="py-3.5 px-6 text-right">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-sky-50 text-sky-800">
                                    <tr class="hover:bg-sky-50/30 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-2.5">
                                                <div class="p-1.5 bg-sky-100 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1" />
                                                    </svg>
                                                </div>
                                                <span class="font-semibold text-sky-950">Berita Resmi Sekolah</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-[11px] font-bold rounded-full bg-sky-100 text-sky-600 border border-sky-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-sky-500"></span>
                                                Aktif
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-right text-[11px] text-sky-400">Terintegrasi Database</td>
                                    </tr>
                                    <tr class="hover:bg-sky-50/30 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-2.5">
                                                <div class="p-1.5 bg-emerald-100 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                                                    </svg>
                                                </div>
                                                <span class="font-semibold text-sky-950">Fasilitas Infrastruktur</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-[11px] font-bold rounded-full bg-emerald-100 text-emerald-600 border border-emerald-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Aktif
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-right text-[11px] text-sky-400">Terintegrasi Database</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ── BOTTOM INFO SECTION ── -->
                <div class="space-y-4 pt-4 border-t border-sky-100">
                    <div>
                        <h2 class="text-lg font-bold text-sky-950">Informasi Tambahan & Parameter Sistem</h2>
                        <p class="text-sky-400 text-xs mt-0.5">Data pelengkap identitas sekolah dan performa lingkungan aplikasi web.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        <!-- Card: Profil & Akreditasi -->
                        <div class="bg-gradient-to-br from-sky-50/70 to-white p-6 rounded-2xl border border-sky-100 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-sky-100 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-sky-950 text-sm">Profil & Akreditasi</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-sm border-b border-sky-100 pb-2.5">
                                    <span class="text-sky-400 font-medium text-xs">Status Sekolah</span>
                                    <span class="font-bold text-sky-800 text-xs bg-sky-100 px-2.5 py-0.5 rounded-full">Akreditasi A+</span>
                                </div>
                                <div class="flex justify-between items-center text-sm border-b border-sky-100 pb-2.5">
                                    <span class="text-sky-400 font-medium text-xs">Kurikulum</span>
                                    <span class="font-bold text-sky-700 text-xs">Merdeka Belajar</span>
                                </div>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-sky-400 font-medium text-xs">Tahun Ajaran</span>
                                    <span class="font-bold text-sky-700 text-xs">2026 / 2027</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Status Server -->
                        <div class="bg-gradient-to-br from-slate-50/70 to-white p-6 rounded-2xl border border-sky-100 space-y-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-rose-100 rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-sky-950 text-sm">Status Server Web</h3>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-[11px] mb-1.5">
                                        <span class="text-sky-400 font-medium">Penggunaan Memori</span>
                                        <span class="font-bold text-sky-700">32%</span>
                                    </div>
                                    <div class="w-full bg-sky-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-gradient-to-r from-sky-400 to-blue-500 h-2 w-[32%] rounded-full transition-all duration-700"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-[11px] mb-1.5">
                                        <span class="text-sky-400 font-medium">Penyimpanan Storage</span>
                                        <span class="font-bold text-sky-700">14.8 GB / 50 GB</span>
                                    </div>
                                    <div class="w-full bg-sky-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-gradient-to-r from-amber-400 to-orange-400 h-2 w-[29%] rounded-full transition-all duration-700"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card: Catatan Petunjuk (dark blue sky) -->
                        <div class="bg-gradient-to-br from-sky-700 to-sky-900 p-6 rounded-2xl text-white shadow-[0_8px_32px_rgba(14,165,233,0.2)] relative overflow-hidden flex flex-col justify-between">
                            <!-- Decorative background circle -->
                            <div class="absolute -right-8 -bottom-8 w-40 h-40 rounded-full bg-sky-600/20"></div>
                            <div class="absolute -right-2 -top-4 w-24 h-24 rounded-full bg-white/5"></div>

                            <div class="space-y-2.5 relative z-10">
                                <div class="flex items-center gap-2 mb-1">
                                    <!-- Bell icon -->
                                    <div class="p-1.5 bg-white/10 rounded-lg backdrop-blur-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.07 6.07 0 00-1-3.5M9 17v1a3 3 0 006 0v-1M9 17h6M9 17H4l1.405-1.405A2.032 2.032 0 005 14.158V11a6.07 6.07 0 011-3.5" />
                                        </svg>
                                    </div>
                                    <span class="text-[10px] bg-white/10 text-sky-200 font-bold px-2.5 py-0.5 rounded-md uppercase tracking-wider">Catatan Petunjuk</span>
                                </div>
                                <h3 class="font-bold text-lg text-white leading-snug">Butuh bantuan teknis?</h3>
                                <p class="text-xs text-sky-200/90 leading-relaxed">
                                    Pastikan ukuran gambar yang di-upload ke modul Berita & Galeri tidak melebihi batas sistem (maksimal 2MB per file).
                                </p>
                            </div>
                            <div class="pt-5 flex items-center justify-between relative z-10">
                                <span class="text-[11px] text-sky-300/70 font-mono">v2.1.0-stable build</span>
                                <div class="flex gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400/60"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400/40"></span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400/20"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>