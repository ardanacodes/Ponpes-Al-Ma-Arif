<script setup>
import { ref, reactive, computed, watch } from 'vue'
import GuruLayout from '@/Layouts/GuruLayout.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    recap: Array,
    month: String,
    classes: Array
})

const selectedClass = ref('Semua')
const selectedMonth = ref(props.month)
const form = reactive({ class_id: '' })

watch(() => props.month, (newVal) => {
    selectedMonth.value = newVal
})

const classList = computed(() => ['Semua', ...new Set(props.recap.map(i => i.class))])

const filteredRecap = computed(() => {
    if (selectedClass.value === 'Semua') return props.recap
    return props.recap.filter(item => item.class === selectedClass.value)
})

const summary = computed(() => {
    return filteredRecap.value.reduce((acc, s) => {
        acc.hadir += s.hadir; acc.izin += s.izin;
        acc.sakit += s.sakit; acc.alpha += s.alpha;
        return acc
    }, { hadir: 0, izin: 0, sakit: 0, alpha: 0 })
})

const cetakPdf = () => {
    if (!form.class_id) {
        alert('Pilih kelas dulu')
        return
    }
    window.open(`/guru/attendance-recap/pdf?class_id=${form.class_id}`, '_blank')
}

const handleMonthChange = () => {
    router.get('/guru/attendance-recap', { month: selectedMonth.value }, { preserveState: true })
}
</script>

<template>
    <GuruLayout>
        <div class="p-4 sm:p-1 max-w-7xl mx-auto space-y-5">

            <!-- ── PAGE HEADER ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.06)] px-6 py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-sky-100 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-sky-950 tracking-tight">Rekap Absensi Siswa</h1>
                        <p class="text-xs text-sky-400 font-medium">Ringkasan kehadiran per siswa berdasarkan bulan</p>
                    </div>
                </div>
                <div class="hidden sm:flex items-center gap-1.5 bg-sky-50 border border-sky-200/70 px-3 py-1.5 rounded-xl">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                    <span class="text-[11px] font-semibold text-sky-500">{{ filteredRecap.length }} siswa</span>
                </div>
            </div>

            <!-- ── TOOLBAR: PDF + BULAN ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.05)] p-5">
                <div class="flex flex-wrap justify-between items-center gap-4">

                    <!-- PDF Controls -->
                    <div class="flex items-center gap-2.5">
                        <div class="relative">
                            <select
                                v-model="form.class_id"
                                class="appearance-none bg-sky-50 border border-sky-200 text-sky-700 text-sm font-semibold rounded-xl pl-4 pr-9 py-2.5 outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition cursor-pointer"
                            >
                                <option value="">Pilih Kelas untuk PDF</option>
                                <option v-for="c in classes" :key="c.id" :value="c.id">{{ c.name }}</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <button
                            @click="cetakPdf"
                            class="inline-flex items-center gap-2 bg-rose-500 hover:bg-rose-600 active:bg-rose-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition-all duration-200 shadow-sm hover:shadow-[0_4px_12px_rgba(244,63,94,0.3)]"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            Cetak PDF
                        </button>
                    </div>

                    <!-- Month Picker -->
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <input
                            type="month"
                            v-model="selectedMonth"
                            @change="handleMonthChange"
                            class="bg-sky-50 border border-sky-200 text-sky-700 text-sm font-semibold rounded-xl pl-9 pr-4 py-2.5 outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition"
                        />
                    </div>
                </div>
            </div>

            <!-- ── CLASS FILTER PILLS ── -->
            <div class="flex flex-wrap gap-2">
                <button
                    v-for="kelas in classList"
                    :key="kelas"
                    @click="selectedClass = kelas"
                    :class="[
                        'px-4 py-2 rounded-xl text-xs font-bold transition-all duration-200',
                        selectedClass === kelas
                            ? 'bg-sky-500 text-white shadow-[0_4px_12px_rgba(14,165,233,0.3)]'
                            : 'bg-white border border-sky-100 text-sky-600 hover:bg-sky-50 hover:border-sky-200'
                    ]"
                >
                    {{ kelas }}
                </button>
            </div>

            <!-- ── SUMMARY STATS ── -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                <!-- Hadir -->
                <div class="group bg-gradient-to-br from-emerald-50 to-white p-5 rounded-2xl border border-emerald-100 hover:border-emerald-200 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(16,185,129,0.1)] transition-all duration-200 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-emerald-400 tracking-widest uppercase block mb-1">Hadir</span>
                        <span class="text-3xl font-extrabold text-emerald-600">{{ summary.hadir }}</span>
                    </div>
                    <div class="p-2.5 bg-emerald-100 rounded-xl group-hover:bg-emerald-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Izin -->
                <div class="group bg-gradient-to-br from-sky-50 to-white p-5 rounded-2xl border border-sky-100 hover:border-sky-200 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(14,165,233,0.1)] transition-all duration-200 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-sky-400 tracking-widest uppercase block mb-1">Izin</span>
                        <span class="text-3xl font-extrabold text-sky-600">{{ summary.izin }}</span>
                    </div>
                    <div class="p-2.5 bg-sky-100 rounded-xl group-hover:bg-sky-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-500 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>

                <!-- Sakit -->
                <div class="group bg-gradient-to-br from-amber-50 to-white p-5 rounded-2xl border border-amber-100 hover:border-amber-200 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(245,158,11,0.1)] transition-all duration-200 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-amber-400 tracking-widest uppercase block mb-1">Sakit</span>
                        <span class="text-3xl font-extrabold text-amber-600">{{ summary.sakit }}</span>
                    </div>
                    <div class="p-2.5 bg-amber-100 rounded-xl group-hover:bg-amber-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Alpha -->
                <div class="group bg-gradient-to-br from-rose-50 to-white p-5 rounded-2xl border border-rose-100 hover:border-rose-200 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(244,63,94,0.1)] transition-all duration-200 flex items-center justify-between">
                    <div>
                        <span class="text-[10px] font-bold text-rose-400 tracking-widest uppercase block mb-1">Alpha</span>
                        <span class="text-3xl font-extrabold text-rose-600">{{ summary.alpha }}</span>
                    </div>
                    <div class="p-2.5 bg-rose-100 rounded-xl group-hover:bg-rose-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- ── DATA TABLE ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.05)] overflow-hidden">

                <!-- Table Header Bar -->
                <div class="px-6 py-4 border-b border-sky-100 bg-gradient-to-r from-sky-50/60 to-white flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="text-sm font-bold text-sky-950">Data Siswa</span>
                    </div>
                    <span class="text-[11px] text-sky-400 font-medium">{{ selectedClass === 'Semua' ? 'Semua Kelas' : selectedClass }}</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="bg-sky-50/50 border-b border-sky-100 text-sky-400 font-bold text-[10px] tracking-widest uppercase">
                                <th class="py-3.5 px-5">NIS</th>
                                <th class="py-3.5 px-5">Nama Siswa</th>
                                <th class="py-3.5 px-5">Kelas</th>
                                <th class="py-3.5 px-5 text-center">Hadir</th>
                                <th class="py-3.5 px-5 text-center">Izin</th>
                                <th class="py-3.5 px-5 text-center">Sakit</th>
                                <th class="py-3.5 px-5 text-center">Alpha</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-sky-50">
                            <tr
                                v-for="s in filteredRecap"
                                :key="s.id"
                                class="hover:bg-sky-50/40 transition-colors duration-150"
                            >
                                <td class="py-3.5 px-5 text-sky-400 font-mono text-xs">{{ s.nis }}</td>
                                <td class="py-3.5 px-5 font-semibold text-sky-950">{{ s.name }}</td>
                                <td class="py-3.5 px-5">
                                    <span class="text-[11px] font-bold bg-sky-100 text-sky-600 px-2.5 py-0.5 rounded-md">{{ s.class }}</span>
                                </td>
                                <td class="py-3.5 px-5 text-center">
                                    <span class="inline-block min-w-[2rem] text-center text-xs font-bold bg-emerald-100 text-emerald-600 px-2.5 py-1 rounded-lg">{{ s.hadir }}</span>
                                </td>
                                <td class="py-3.5 px-5 text-center">
                                    <span class="inline-block min-w-[2rem] text-center text-xs font-bold bg-sky-100 text-sky-600 px-2.5 py-1 rounded-lg">{{ s.izin }}</span>
                                </td>
                                <td class="py-3.5 px-5 text-center">
                                    <span class="inline-block min-w-[2rem] text-center text-xs font-bold bg-amber-100 text-amber-600 px-2.5 py-1 rounded-lg">{{ s.sakit }}</span>
                                </td>
                                <td class="py-3.5 px-5 text-center">
                                    <span class="inline-block min-w-[2rem] text-center text-xs font-bold bg-rose-100 text-rose-600 px-2.5 py-1 rounded-lg">{{ s.alpha }}</span>
                                </td>
                            </tr>

                            <!-- Empty Row -->
                            <tr v-if="filteredRecap.length === 0">
                                <td colspan="7" class="py-16 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="p-4 bg-sky-50 rounded-xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-bold text-sky-950">Data tidak ditemukan</p>
                                        <p class="text-xs text-sky-400">Coba ubah filter kelas atau bulan yang dipilih.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </GuruLayout>
</template>