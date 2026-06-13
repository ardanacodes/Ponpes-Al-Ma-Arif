<script setup>
import GuruLayout from '@/Layouts/GuruLayout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
    user: Object,
    today: String,
    schedules: Array
})
</script>

<template>
    <GuruLayout>
        <div class="p-4 sm:p-1 max-w-7xl mx-auto space-y-6">

            <!-- ── HERO GREETING HEADER ── -->
            <div class="relative bg-gradient-to-br from-sky-600 via-sky-700 to-blue-800 text-white p-8 rounded-2xl shadow-[0_8px_32px_rgba(14,165,233,0.25)] overflow-hidden">
                <!-- Decorative circles -->
                <div class="absolute -right-10 -top-10 w-48 h-48 rounded-full bg-white/5"></div>
                <div class="absolute right-16 -bottom-8 w-32 h-32 rounded-full bg-sky-500/20"></div>
                <div class="absolute right-4 top-4 w-16 h-16 rounded-full bg-white/5"></div>

                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2.5 mb-1">
                            <div class="p-1.5 bg-white/10 rounded-lg backdrop-blur-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                </svg>
                            </div>
                            <span class="text-[11px] font-bold text-sky-200/80 tracking-widest uppercase">Portal Guru</span>
                        </div>
                        <h1 class="text-2xl font-extrabold tracking-tight">Halo, {{ user.name }} 👋</h1>
                        <p class="text-sky-200 mt-1 text-sm font-medium">Jadwal Mengajar Hari {{ today }}</p>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 px-4 py-2 rounded-xl text-xs font-semibold text-sky-100 self-start sm:self-auto">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Sesi Aktif</span>
                    </div>
                </div>
            </div>

            <!-- ── STATS GRID ── -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <!-- Jadwal Hari Ini -->
                <div class="group bg-gradient-to-br from-sky-50 to-white p-5 rounded-2xl border border-sky-100 hover:border-sky-300 hover:shadow-[0_8px_24px_rgba(14,165,233,0.12)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-sky-400 tracking-widest uppercase block">Jadwal Hari Ini</span>
                        <span class="text-3xl font-extrabold text-sky-950 group-hover:text-sky-600 transition-colors duration-200 block">{{ schedules.length }}</span>
                        <span class="text-[10px] text-sky-300 font-medium">Sesi mengajar</span>
                    </div>
                    <div class="p-3 bg-sky-100 text-sky-500 rounded-xl group-hover:bg-sky-500 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Status Guru -->
                <div class="group bg-gradient-to-br from-emerald-50 to-white p-5 rounded-2xl border border-emerald-100 hover:border-emerald-300 hover:shadow-[0_8px_24px_rgba(16,185,129,0.12)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-emerald-400 tracking-widest uppercase block">Status Guru</span>
                        <span class="text-2xl font-extrabold text-emerald-600 block">Aktif</span>
                        <span class="text-[10px] text-emerald-300 font-medium">Terdaftar & terverifikasi</span>
                    </div>
                    <div class="p-3 bg-emerald-100 text-emerald-500 rounded-xl group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Sistem -->
                <div class="group bg-gradient-to-br from-violet-50 to-white p-5 rounded-2xl border border-violet-100 hover:border-violet-300 hover:shadow-[0_8px_24px_rgba(139,92,246,0.12)] hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-violet-400 tracking-widest uppercase block">Sistem</span>
                        <span class="text-2xl font-extrabold text-violet-600 block">Online</span>
                        <span class="text-[10px] text-violet-300 font-medium">Koneksi stabil</span>
                    </div>
                    <div class="p-3 bg-violet-100 text-violet-500 rounded-xl group-hover:bg-violet-500 group-hover:text-white transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- ── JADWAL MENGAJAR ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.06)] overflow-hidden">

                <!-- Section Header -->
                <div class="px-6 py-4 border-b border-sky-100 bg-gradient-to-r from-sky-50/60 to-white flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="p-1.5 bg-sky-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-sky-950">Jadwal Mengajar</h2>
                            <p class="text-[11px] text-sky-400">Daftar kelas untuk hari ini</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                        <span class="text-[11px] text-sky-400 font-medium">{{ schedules.length }} sesi</span>
                    </div>
                </div>

                <!-- Schedule List -->
                <div class="p-5">
                    <div v-if="schedules.length" class="space-y-3">
                        <div
                            v-for="(schedule, index) in schedules"
                            :key="schedule.id"
                            class="group flex items-center justify-between p-4 rounded-xl border border-sky-100 hover:border-sky-200 hover:bg-sky-50/40 hover:shadow-sm transition-all duration-200"
                        >
                            <div class="flex items-center gap-4">
                                <!-- Index number -->
                                <div class="hidden sm:flex w-7 h-7 rounded-full bg-sky-100 text-sky-500 text-xs font-bold items-center justify-center flex-shrink-0">
                                    {{ index + 1 }}
                                </div>
                                <!-- Book icon -->
                                <div class="p-3 bg-sky-100 text-sky-500 rounded-xl group-hover:bg-sky-500 group-hover:text-white transition-all duration-300 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-sky-950 text-sm">{{ schedule.subject }}</h3>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <!-- Class badge -->
                                        <span class="text-[11px] font-semibold bg-sky-100 text-sky-600 px-2 py-0.5 rounded-md">
                                            {{ schedule.school_class?.name }}
                                        </span>
                                        <!-- Time -->
                                        <span class="flex items-center gap-1 text-[11px] text-sky-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ schedule.start_time }} - {{ schedule.end_time }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action: Mulai Absensi -->
                            <div v-if="!schedule.already_attended">
                                <Link
                                    :href="`/guru/attendance/${schedule.id}`"
                                    class="inline-flex items-center gap-1.5 bg-sky-500 hover:bg-sky-600 active:bg-sky-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition-all duration-200 shadow-sm hover:shadow-[0_4px_12px_rgba(14,165,233,0.3)]"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                    Mulai Absensi
                                </Link>
                            </div>

                            <!-- Action: Sudah Absen -->
                            <div v-else class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-600 border border-emerald-200 text-xs font-bold px-4 py-2.5 rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Sudah Absen
                            </div>
                        </div>
                    </div>

                    <!-- Empty State -->
                    <div v-else class="flex flex-col items-center justify-center py-16 text-center">
                        <div class="p-5 bg-sky-50 rounded-2xl mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <p class="font-bold text-sky-950 text-sm">Tidak ada jadwal hari ini</p>
                        <p class="text-sky-400 text-xs mt-1">Jadwal mengajar tidak ditemukan untuk hari ini.</p>
                    </div>
                </div>
            </div>

        </div>
    </GuruLayout>
</template>