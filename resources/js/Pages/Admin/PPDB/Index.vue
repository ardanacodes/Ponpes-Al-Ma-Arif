<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

const props = defineProps({
    ppdb: Array,
    filters: Object
})

/*
|--------------------------------------------------------------------------
| FILTER STATE
|--------------------------------------------------------------------------
*/
const programType = ref(props.filters?.program_type || '')
const educationLevel = ref(props.filters?.education_level || '')
const major = ref(props.filters?.major || '')

/*
|--------------------------------------------------------------------------
| WATCH FILTER (SERVER SIDE)
|--------------------------------------------------------------------------
*/
watch([programType, educationLevel, major], () => {
    router.get('/admin/ppdb', {
        program_type: programType.value,
        education_level: educationLevel.value,
        major: major.value,
    }, {
        preserveState: true,
        replace: true
    })
})

/*
|--------------------------------------------------------------------------
| RESET FILTER
|--------------------------------------------------------------------------
*/
const resetFilter = () => {
    programType.value = ''
    educationLevel.value = ''
    major.value = ''

    router.get('/admin/ppdb', {}, {
        preserveState: true,
        replace: true
    })
}

/*
|--------------------------------------------------------------------------
| PRINT
|--------------------------------------------------------------------------
*/
const printPage = () => {
    window.print()
}

/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/
const destroyData = (id) => {
    if (confirm('Yakin ingin menghapus data ini?')) {
        router.delete(`/admin/ppdb/${id}`)
    }
}
</script>

<template>
    <AdminLayout>

        <!-- PRINT AREA -->
        <div class="ppdb-wrapper print-area">

            <!-- HEADER -->
            <div class="ppdb-header print:p-4">
                <div class="header-icon-wrap print:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z"/>
                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.71 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.44.121-2.869.255-4.284a48.45 48.45 0 0 1 7.666 3.282c.165.084.33.165.5.245.17-.08.335-.16.5-.245Z"/>
                        <path d="M15.75 17.521a48.49 48.49 0 0 0-7.5 0v-1.5a48.45 48.45 0 0 1 7.5 0v1.5Z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="ppdb-title print:text-xl">Data PPDB</h1>
                    <p class="ppdb-subtitle print:hidden">Kelola data pendaftaran santri baru</p>
                </div>
            </div>

            <!-- FILTER -->
            <div class="ppdb-filter-bar print:hidden">

                <div class="filter-group">
                    <label class="filter-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="filter-label-icon">
                            <path d="M10.75 10.818v2.614A3.13 3.13 0 0 0 11.888 13c.482-.315.612-.648.612-.875 0-.227-.13-.56-.612-.875a3.13 3.13 0 0 0-1.138-.432ZM8.33 8.62c.053.055.115.11.184.164.208.16.46.284.736.363V6.603a2.45 2.45 0 0 0-.35.13c-.14.065-.27.143-.386.233-.377.292-.514.627-.514.909 0 .184.058.39.33.576Z"/>
                            <path fill-rule="evenodd" d="M9.99 1.83A8.17 8.17 0 1 0 9.99 18.17 8.17 8.17 0 0 0 9.99 1.83ZM10 2.5a7.67 7.67 0 1 1 0 15.34A7.67 7.67 0 0 1 10 2.5Zm0 2.5a.75.75 0 0 1 .75.75V6a3.75 3.75 0 0 1 3 3.75c0 .414-.336.75-.75.75h-.75a.75.75 0 0 1-.75-.75 2.25 2.25 0 0 0-1.5-2.122V9.75a.75.75 0 0 1-.75.75H8.5a.75.75 0 0 1-.75-.75V5.75A.75.75 0 0 1 10 5Z" clip-rule="evenodd"/>
                        </svg>
                        Program
                    </label>
                    <select v-model="programType" class="filter-select">
                        <option value="">Semua Program</option>
                        <option value="Mukim">Mukim</option>
                        <option value="Non Mukim">Non Mukim</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="filter-label-icon">
                            <path d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z"/>
                        </svg>
                        Jenjang
                    </label>
                    <select v-model="educationLevel" class="filter-select">
                        <option value="">Semua Jenjang</option>
                        <option value="MTs">MTs</option>
                        <option value="SMA Plus">SMA Plus</option>
                        <option value="SMK">SMK</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label class="filter-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="filter-label-icon">
                            <path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 0 1 8.75 1h2.5A2.75 2.75 0 0 1 14 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 0 1 6 4.193V3.75Zm6.5 0v.325a41.622 41.622 0 0 0-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25ZM10 10a1 1 0 0 0-1 1v.01a1 1 0 0 0 1 1h.01a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H10Z" clip-rule="evenodd"/>
                            <path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 0 1-9.274 0C3.985 17.585 3 16.402 3 15.055Z"/>
                        </svg>
                        Jurusan
                    </label>
                    <select v-model="major" class="filter-select" :disabled="educationLevel !== 'SMK'">
                        <option value="">Semua Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="TBSM">TBSM</option>
                    </select>
                </div>

            </div>

            <!-- ACTION BAR -->
            <div class="ppdb-action-bar print:hidden">

                <div class="data-count-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 17a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                    </svg>
                    <span>Total <strong>{{ ppdb.length }}</strong> Pendaftar</span>
                </div>

                <div class="action-buttons">
                    <button @click="resetFilter" class="btn-reset">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M7.793 2.232a.75.75 0 0 1-.025 1.06L6.053 5h6.447a.75.75 0 0 1 0 1.5H6.053l1.715 1.708a.75.75 0 1 1-1.061 1.064l-3.098-3.084a.75.75 0 0 1 0-1.064l3.098-3.084a.75.75 0 0 1 1.086.092Zm6.417 8.5a.75.75 0 0 1 1.06.025l3.098 3.084a.75.75 0 0 1 0 1.064l-3.098 3.084a.75.75 0 1 1-1.085-1.036l1.715-1.708H7.5a.75.75 0 0 1 0-1.5h8.4l-1.715-1.708a.75.75 0 0 1 .025-1.06Z" clip-rule="evenodd"/>
                        </svg>
                        Reset
                    </button>

                    <button @click="printPage" class="btn-print">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0 1 18 8.653v4.097A2.25 2.25 0 0 1 15.75 15h-.241l.305 1.984A1.75 1.75 0 0 1 14.084 19H5.916a1.75 1.75 0 0 1-1.73-2.016L4.491 15H4.25A2.25 2.25 0 0 1 2 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.749-.107 1.126-.153V2.75Zm4.5 12.5h1a.75.75 0 0 0 0-1.5h-1a.75.75 0 0 0 0 1.5Zm-2.5.75a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
                        </svg>
                        Cetak
                    </button>

                    <a :href="`/admin/ppdb/export?program_type=${programType}&education_level=${educationLevel}&major=${major}`" class="btn-export">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M13.75 7h-3V3.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 4.74a.75.75 0 0 0 1.1 1.02l1.95-2.1V7h-3A2.25 2.25 0 0 0 4 9.25v7.5A2.25 2.25 0 0 0 6.25 19h7.5A2.25 2.25 0 0 0 16 16.75v-7.5A2.25 2.25 0 0 0 13.75 7Zm-3 0h-1.5v5.25a.75.75 0 0 0 1.5 0V7Z" clip-rule="evenodd"/>
                        </svg>
                        Export Excel
                    </a>
                </div>

            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="ppdb-table print:text-xs">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="th-icon">
                                        <path d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z"/>
                                    </svg>
                                    Nama
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="th-icon">
                                        <path d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z"/>
                                        <path d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.607-.714.607-1.204v-1a.75.75 0 0 0-.75-.75h-1a.75.75 0 0 1-.75-.75V11h2.25a.75.75 0 0 0 0-1.5H15.5V8h2.25a.75.75 0 0 0 0-1.5H15.5V5.75a.75.75 0 0 0-.75-.75h-1.5Z"/>
                                        <path d="M15.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"/>
                                    </svg>
                                    Gender
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="th-icon">
                                        <path fill-rule="evenodd" d="M1 2.75A.75.75 0 0 1 1.75 2h10.5a.75.75 0 0 1 0 1.5H12v13.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75v-2.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 0-.75.75v2.5a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75V2.75ZM4 6a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 4 6Zm0 3a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 4 9Zm3-3a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 7 6Zm0 3a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 7 9Z" clip-rule="evenodd"/>
                                        <path d="M12.75 2.75a.75.75 0 0 0-1.5 0v.25h1.5V2.75ZM14 2.75a.75.75 0 0 1 .75-.75h3.5a.75.75 0 0 1 0 1.5h-.75V14a.75.75 0 0 1-.75.75h-2a.75.75 0 0 1-.75-.75V3.5H14V2.75Z"/>
                                    </svg>
                                    Asal Sekolah
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="th-icon">
                                        <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.684-2.051a1 1 0 0 1 .632-.632l2.051-.684a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.632-.633L6.95 5.684Z"/>
                                    </svg>
                                    Program
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="th-icon">
                                        <path d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z"/>
                                    </svg>
                                    Jenjang
                                </div>
                            </th>
                            <th class="print:hidden text-right pr-6">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="item in ppdb" :key="item.id" class="table-row">
                            <td class="px-6 py-4">
                                <div class="name-cell">
                                    <div class="name-avatar">{{ item.name?.charAt(0) }}</div>
                                    <span class="font-semibold text-gray-800">{{ item.name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span :class="item.gender === 'Laki-laki' ? 'badge-male' : 'badge-female'">
                                    {{ item.gender }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ item.school_origin }}</td>
                            <td class="px-6 py-4">
                                <span :class="item.program_type === 'Mukim' ? 'badge-mukim' : 'badge-nonmukim'">
                                    {{ item.program_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ item.education_level }}</td>
                            <td class="px-6 py-4 text-right space-x-2 print:hidden">
                                <a :href="`/admin/ppdb/${item.id}`" class="btn-detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                        <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41Z" clip-rule="evenodd"/>
                                    </svg>
                                    Detail
                                </a>
                                <button @click="destroyData(item.id)" class="btn-delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd"/>
                                    </svg>
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        <tr v-if="ppdb.length === 0">
                            <td colspan="6" class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 mx-auto mb-3 text-sky-200">
                                    <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875Zm5.845 17.03a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V12a.75.75 0 0 0-1.5 0v4.19l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3Z" clip-rule="evenodd"/>
                                    <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z"/>
                                </svg>
                                <p class="text-gray-400 font-medium">Data tidak ditemukan</p>
                                <p class="text-gray-300 text-sm mt-1">Coba ubah filter pencarian</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
/* ─── ROOT VARS ─────────────────────────────────────────────── */
:root {
    --sky-50: #f0f9ff;
    --sky-100: #e0f2fe;
    --sky-200: #bae6fd;
    --sky-400: #38bdf8;
    --sky-500: #0ea5e9;
    --sky-600: #0284c7;
    --sky-700: #0369a1;
}

/* ─── WRAPPER ────────────────────────────────────────────────── */
.ppdb-wrapper {
    background: #ffffff;
    border: 1px solid #e0f2fe;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 4px 24px 0 rgba(14, 165, 233, 0.07);
}

/* ─── HEADER ─────────────────────────────────────────────────── */
.ppdb-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem 1.75rem;
    border-bottom: 1px solid #e0f2fe;
    background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%);
}

.header-icon-wrap {
    width: 3rem;
    height: 3rem;
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    border-radius: 0.875rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
}

.header-icon {
    width: 1.375rem;
    height: 1.375rem;
    color: white;
}

.ppdb-title {
    font-size: 1.625rem;
    font-weight: 800;
    color: #0c4a6e;
    letter-spacing: -0.02em;
}

.ppdb-subtitle {
    color: #7dd3fc;
    font-size: 0.875rem;
    margin-top: 0.125rem;
    font-weight: 500;
}

/* ─── FILTER BAR ─────────────────────────────────────────────── */
.ppdb-filter-bar {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 0.875rem;
    padding: 1.125rem 1.75rem;
    border-bottom: 1px solid #e0f2fe;
    background: #f8fcff;
}

@media (min-width: 768px) {
    .ppdb-filter-bar { grid-template-columns: repeat(3, 1fr); }
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
}

.filter-label {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #0284c7;
}

.filter-label-icon {
    width: 0.875rem;
    height: 0.875rem;
}

.filter-select {
    appearance: none;
    background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%230ea5e9'%3E%3Cpath fill-rule='evenodd' d='M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.168l3.71-3.938a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06z'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
    background-size: 1rem;
    padding: 0.5rem 2rem 0.5rem 0.75rem;
    border: 1.5px solid #bae6fd;
    border-radius: 0.625rem;
    font-size: 0.875rem;
    color: #0c4a6e;
    font-weight: 500;
    transition: border-color 0.15s, box-shadow 0.15s;
    cursor: pointer;
}

.filter-select:focus {
    outline: none;
    border-color: #0ea5e9;
    box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.12);
}

.filter-select:disabled {
    opacity: 0.45;
    cursor: not-allowed;
    background-color: #f0f9ff;
}

/* ─── ACTION BAR ─────────────────────────────────────────────── */
.ppdb-action-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.875rem 1.75rem;
    border-bottom: 1px solid #e0f2fe;
    background: #fff;
}

.data-count-badge {
    display: flex;
    align-items: center;
    gap: 0.45rem;
    background: #f0f9ff;
    border: 1px solid #bae6fd;
    color: #0369a1;
    font-size: 0.8125rem;
    padding: 0.35rem 0.75rem;
    border-radius: 99px;
}

.data-count-badge strong { font-weight: 700; }

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-reset {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.45rem 0.9rem;
    font-size: 0.8125rem;
    font-weight: 600;
    border: 1.5px solid #bae6fd;
    border-radius: 0.625rem;
    color: #0369a1;
    background: #fff;
    cursor: pointer;
    transition: background 0.15s, border-color 0.15s;
}

.btn-reset:hover {
    background: #f0f9ff;
    border-color: #7dd3fc;
}

.btn-print {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.45rem 0.9rem;
    font-size: 0.8125rem;
    font-weight: 600;
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    color: white;
    border: none;
    border-radius: 0.625rem;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(14, 165, 233, 0.25);
    transition: opacity 0.15s, box-shadow 0.15s;
}

.btn-print:hover {
    opacity: 0.9;
    box-shadow: 0 4px 14px rgba(14, 165, 233, 0.35);
}

.btn-export {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.45rem 0.9rem;
    font-size: 0.8125rem;
    font-weight: 600;
    background: linear-gradient(135deg, #16a34a, #15803d);
    color: white;
    border-radius: 0.625rem;
    text-decoration: none;
    box-shadow: 0 2px 8px rgba(22, 163, 74, 0.2);
    transition: opacity 0.15s, box-shadow 0.15s;
}

.btn-export:hover {
    opacity: 0.9;
    box-shadow: 0 4px 14px rgba(22, 163, 74, 0.3);
}

/* ─── TABLE ──────────────────────────────────────────────────── */
.ppdb-table {
    width: 100%;
    min-width: 100%;
    font-size: 0.875rem;
    border-collapse: collapse;
}

.ppdb-table thead {
    background: #f0f9ff;
    border-bottom: 1.5px solid #bae6fd;
}

.ppdb-table thead tr th {
    padding: 0.75rem 1.5rem;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #0369a1;
    text-align: left;
}

.th-content {
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.th-icon {
    width: 0.875rem;
    height: 0.875rem;
    color: #38bdf8;
}

.table-row {
    border-bottom: 1px solid #f0f9ff;
    transition: background 0.12s;
}

.table-row:hover {
    background: #f8fcff;
}

.table-row:last-child { border-bottom: none; }

/* ─── NAME CELL ──────────────────────────────────────────────── */
.name-cell {
    display: flex;
    align-items: center;
    gap: 0.625rem;
}

.name-avatar {
    width: 2rem;
    height: 2rem;
    background: linear-gradient(135deg, #bae6fd, #7dd3fc);
    color: #0369a1;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8125rem;
    font-weight: 800;
    flex-shrink: 0;
}

/* ─── BADGES ─────────────────────────────────────────────────── */
.badge-male,
.badge-female,
.badge-mukim,
.badge-nonmukim {
    display: inline-flex;
    align-items: center;
    padding: 0.2rem 0.6rem;
    border-radius: 99px;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.01em;
}

.badge-male   { background: #dbeafe; color: #1d4ed8; }
.badge-female { background: #fce7f3; color: #be185d; }
.badge-mukim    { background: #dcfce7; color: #15803d; }
.badge-nonmukim { background: #e0f2fe; color: #0369a1; }

/* ─── ACTION BUTTONS ─────────────────────────────────────────── */
.btn-detail,
.btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 0.3rem 0.65rem;
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;
    transition: background 0.12s;
}

.btn-detail {
    color: #0284c7;
    background: #e0f2fe;
}

.btn-detail:hover { background: #bae6fd; }

.btn-delete {
    color: #dc2626;
    background: #fee2e2;
}

.btn-delete:hover { background: #fecaca; }

/* ─── EMPTY STATE ────────────────────────────────────────────── */
.empty-state {
    text-align: center;
    padding: 3.5rem 1.5rem;
}

/* ─── PRINT ──────────────────────────────────────────────────── */
@media print {
    @page { size: A4; margin: 10mm; }

    body { background: white !important; }

    .ppdb-wrapper {
        width: 100% !important;
        border: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }

    button, select, .print-hidden { display: none !important; }

    table { width: 100% !important; font-size: 11px; }

    th, td { padding: 6px !important; }

    tr { page-break-inside: avoid; }
}
</style>