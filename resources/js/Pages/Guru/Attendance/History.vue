<script setup>
import GuruLayout from '@/Layouts/GuruLayout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
    attendances: Array
})
</script>

<template>
    <GuruLayout>
        <div class="p-4 sm:p-1 max-w-4xl mx-auto space-y-5">

            <!-- ── PAGE HEADER ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.06)] px-6 py-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-sky-100 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-sky-950 tracking-tight">Riwayat Absensi</h1>
                        <p class="text-xs text-sky-400 font-medium">Rekap kehadiran siswa per sesi mengajar</p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center gap-1.5 bg-sky-50 border border-sky-200/70 px-3 py-1.5 rounded-xl">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                    <span class="text-[11px] font-semibold text-sky-500">{{ attendances.length }} sesi</span>
                </div>
            </div>

            <!-- ── ATTENDANCE LIST ── -->
            <div v-if="attendances.length" class="space-y-4">
                <div
                    v-for="attendance in attendances"
                    :key="attendance.id"
                    class="group bg-white rounded-2xl border border-sky-100 hover:border-sky-200 shadow-[0_2px_12px_rgba(14,165,233,0.05)] hover:shadow-[0_8px_24px_rgba(14,165,233,0.1)] hover:-translate-y-0.5 transition-all duration-200 overflow-hidden"
                >
                    <!-- Card Top: Subject & Date -->
                    <div class="px-6 pt-5 pb-4 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                        <div class="flex items-start gap-3">
                            <div class="p-2.5 bg-sky-100 text-sky-500 rounded-xl flex-shrink-0 group-hover:bg-sky-500 group-hover:text-white transition-all duration-300 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sky-950 text-base leading-tight">{{ attendance.teaching_schedule?.subject }}</h3>
                                <span class="inline-flex items-center gap-1 mt-1 text-[11px] font-semibold bg-sky-100 text-sky-600 px-2.5 py-0.5 rounded-md">
                                    {{ attendance.teaching_schedule?.school_class?.name }}
                                </span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1.5 bg-sky-50 border border-sky-200/70 text-sky-600 text-xs font-bold px-3 py-1.5 rounded-xl self-start flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ attendance.attendance_date }}
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="mx-6 border-t border-sky-100/70"></div>

                    <!-- Card Bottom: Status Grid + Action -->
                    <div class="px-6 py-4 flex flex-col sm:flex-row sm:items-center gap-4">

                        <!-- Status Badges -->
                        <div class="grid grid-cols-4 gap-2 flex-1">

                            <!-- Hadir -->
                            <div class="flex flex-col items-center py-2.5 px-2 rounded-xl bg-emerald-50 border border-emerald-100">
                                <span class="text-[10px] font-bold text-emerald-400 tracking-wider uppercase mb-1">Hadir</span>
                                <span class="text-lg font-extrabold text-emerald-600">
                                    {{ attendance.details.filter(d => d.status === 'hadir').length }}
                                </span>
                            </div>

                            <!-- Izin -->
                            <div class="flex flex-col items-center py-2.5 px-2 rounded-xl bg-sky-50 border border-sky-100">
                                <span class="text-[10px] font-bold text-sky-400 tracking-wider uppercase mb-1">Izin</span>
                                <span class="text-lg font-extrabold text-sky-600">
                                    {{ attendance.details.filter(d => d.status === 'izin').length }}
                                </span>
                            </div>

                            <!-- Sakit -->
                            <div class="flex flex-col items-center py-2.5 px-2 rounded-xl bg-amber-50 border border-amber-100">
                                <span class="text-[10px] font-bold text-amber-400 tracking-wider uppercase mb-1">Sakit</span>
                                <span class="text-lg font-extrabold text-amber-600">
                                    {{ attendance.details.filter(d => d.status === 'sakit').length }}
                                </span>
                            </div>

                            <!-- Alpha -->
                            <div class="flex flex-col items-center py-2.5 px-2 rounded-xl bg-rose-50 border border-rose-100">
                                <span class="text-[10px] font-bold text-rose-400 tracking-wider uppercase mb-1">Alpha</span>
                                <span class="text-lg font-extrabold text-rose-600">
                                    {{ attendance.details.filter(d => d.status === 'alpha').length }}
                                </span>
                            </div>
                        </div>

                        <!-- Detail Button -->
                        <Link
                            :href="`/guru/attendance-history/${attendance.id}`"
                            class="inline-flex items-center gap-2 bg-sky-500 hover:bg-sky-600 active:bg-sky-700 text-white text-xs font-bold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-sm hover:shadow-[0_4px_12px_rgba(14,165,233,0.3)] flex-shrink-0 self-end sm:self-auto"
                        >
                            Lihat Detail Sesi
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>

            <!-- ── EMPTY STATE ── -->
            <div v-else class="bg-white rounded-2xl border border-sky-100 flex flex-col items-center justify-center py-20 text-center shadow-[0_4px_24px_rgba(14,165,233,0.06)]">
                <div class="p-5 bg-sky-50 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <p class="font-bold text-sky-950 text-sm">Belum ada riwayat absensi</p>
                <p class="text-sky-400 text-xs mt-1">Data absensi akan muncul setelah sesi mengajar dicatat.</p>
            </div>

        </div>
    </GuruLayout>
</template>