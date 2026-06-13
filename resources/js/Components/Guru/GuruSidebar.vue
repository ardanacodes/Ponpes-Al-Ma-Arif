<script setup>
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const isActive = (url) => {
    return page.url.startsWith(url)
}
</script>

<template>
    <aside class="w-64 bg-white border-r border-sky-100 min-h-screen flex flex-col shadow-[2px_0_16px_rgba(14,165,233,0.06)]">

        <!-- ── HEADER ── -->
        <div class="p-5 border-b border-sky-100 bg-gradient-to-br from-sky-600 to-blue-800 relative overflow-hidden">
            <!-- Decorative circles -->
            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-white/5"></div>
            <div class="absolute -right-2 bottom-0 w-14 h-14 rounded-full bg-sky-500/20"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-2.5 mb-1">
                    <div class="p-1.5 bg-white/15 rounded-lg backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <h2 class="text-base font-extrabold text-white tracking-tight">Panel Guru</h2>
                </div>
                <p class="text-[11px] text-sky-200/80 font-medium pl-0.5">Sistem Akademik Sekolah</p>
            </div>
        </div>

        <!-- ── NAVIGATION ── -->
        <nav class="p-4 space-y-1.5 flex-1">

            <!-- Section label -->
            <p class="text-[10px] font-bold text-sky-300 tracking-widest uppercase px-3 pb-1">Menu Utama</p>

            <!-- Dashboard -->
            <Link
                href="/guru/dashboard"
                :class="[
                    'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200',
                    isActive('/guru/dashboard')
                        ? 'bg-sky-500 text-white shadow-[0_4px_12px_rgba(14,165,233,0.3)]'
                        : 'text-sky-700 hover:bg-sky-50 hover:text-sky-600'
                ]"
            >
                <span :class="[
                    'p-1.5 rounded-lg transition-colors duration-200',
                    isActive('/guru/dashboard') ? 'bg-white/20' : 'bg-sky-100'
                ]">
                    <svg xmlns="http://www.w3.org/2000/svg" :class="['h-3.5 w-3.5', isActive('/guru/dashboard') ? 'text-white' : 'text-sky-500']" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z" />
                    </svg>
                </span>
                Dashboard
                <span v-if="isActive('/guru/dashboard')" class="ml-auto w-1.5 h-1.5 rounded-full bg-white/60"></span>
            </Link>

            <!-- Riwayat Absensi -->
            <Link
                href="/guru/attendance-history"
                :class="[
                    'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200',
                    isActive('/guru/attendance-history')
                        ? 'bg-sky-500 text-white shadow-[0_4px_12px_rgba(14,165,233,0.3)]'
                        : 'text-sky-700 hover:bg-sky-50 hover:text-sky-600'
                ]"
            >
                <span :class="[
                    'p-1.5 rounded-lg transition-colors duration-200',
                    isActive('/guru/attendance-history') ? 'bg-white/20' : 'bg-sky-100'
                ]">
                    <svg xmlns="http://www.w3.org/2000/svg" :class="['h-3.5 w-3.5', isActive('/guru/attendance-history') ? 'text-white' : 'text-sky-500']" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </span>
                Riwayat Absensi
                <span v-if="isActive('/guru/attendance-history')" class="ml-auto w-1.5 h-1.5 rounded-full bg-white/60"></span>
            </Link>

            <!-- Rekap Kelas -->
            <Link
                href="/guru/attendance-recap"
                :class="[
                    'flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200',
                    isActive('/guru/attendance-recap')
                        ? 'bg-sky-500 text-white shadow-[0_4px_12px_rgba(14,165,233,0.3)]'
                        : 'text-sky-700 hover:bg-sky-50 hover:text-sky-600'
                ]"
            >
                <span :class="[
                    'p-1.5 rounded-lg transition-colors duration-200',
                    isActive('/guru/attendance-recap') ? 'bg-white/20' : 'bg-sky-100'
                ]">
                    <svg xmlns="http://www.w3.org/2000/svg" :class="['h-3.5 w-3.5', isActive('/guru/attendance-recap') ? 'text-white' : 'text-sky-500']" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </span>
                Rekap Kelas
                <span v-if="isActive('/guru/attendance-recap')" class="ml-auto w-1.5 h-1.5 rounded-full bg-white/60"></span>
            </Link>

        </nav>

        <!-- ── FOOTER / USER INFO ── -->
        <div class="border-t border-sky-100 p-4 bg-sky-50/50">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-blue-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] text-sky-400 font-medium">Login sebagai</p>
                    <p class="text-sm font-bold text-sky-900">Guru</p>
                </div>
                <div class="ml-auto">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 block animate-pulse"></span>
                </div>
            </div>
        </div>

    </aside>
</template>