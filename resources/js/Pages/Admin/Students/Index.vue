<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, router } from '@inertiajs/vue3'

defineProps({
    students: Array
})

// Function untuk hapus (Logika asli dipertahankan)
const hapus = (id) => {
    if (!confirm('Hapus siswa?')) {
        return
    }

    // Menggunakan template string sesuai logika asli
    router.delete(`/admin/students/${id}`)
}
</script>

<template>
    <Head title="Data Siswa" />

    <AdminLayout>

        <div class="sched-wrapper">

            <div class="sched-header">
                <div class="sched-header-left">
                    <div class="header-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM3 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.363-.63l-.001-.122ZM17.25 19.125a7.125 7.125 0 0 1 4.5 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-.09 0-.179 0-.268-.002a11.233 11.233 0 0 0 2.892-2.623Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="sched-title">Data Siswa</h1>
                        <p class="sched-subtitle">Kelola data siswa sekolah</p>
                    </div>
                </div>

                <Link href="/admin/students/create" class="btn-add">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z"/>
                    </svg>
                    Tambah Siswa
                </Link>
            </div>

            <div class="overflow-x-auto">
                <table class="sched-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path fill-rule="evenodd" d="M15 4H1v8h14V4ZM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1Zm7.5 7.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM5 5a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H5Z" clip-rule="evenodd" />
                                    </svg>
                                    NIS
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                                    </svg>
                                    Nama
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path fill-rule="evenodd" d="M1 2.75A.75.75 0 0 1 1.75 2h10.5a.75.75 0 0 1 0 1.5H12v13.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75v-2.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 0-.75.75v2.5a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75V3.5H1.75A.75.75 0 0 1 1 2.75Z" clip-rule="evenodd"/>
                                    </svg>
                                    Kelas
                                </div>
                            </th>
                            <th class="text-right pr-6">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="student in students" :key="student.id" class="sched-row">
                            <td class="px-5 py-3.5 text-gray-600 text-sm font-medium tracking-wide">
                                {{ student.nis }}
                            </td>
                            
                            <td class="px-5 py-3.5">
                                <div class="teacher-cell">
                                    <div class="teacher-avatar">{{ student.name?.charAt(0) }}</div>
                                    <span class="font-semibold text-sky-900 text-sm">{{ student.name }}</span>
                                </div>
                            </td>
                            
                            <td class="px-5 py-3.5">
                                <span class="class-badge">{{ student.school_class?.name || '-' }}</span>
                            </td>
                            
                            <td class="px-5 py-3.5 text-right">
                                <div class="action-group">
                                    <Link :href="`/admin/students/${student.id}/edit`" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"/>
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"/>
                                        </svg>
                                        Edit
                                    </Link>
                                    
                                    <button @click="hapus(student.id)" class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr v-if="!students || students.length === 0">
                            <td colspan="4" class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 mx-auto mb-3 text-sky-200">
                                    <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM3 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.363-.63l-.001-.122ZM17.25 19.125a7.125 7.125 0 0 1 4.5 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-.09 0-.179 0-.268-.002a11.233 11.233 0 0 0 2.892-2.623Z" />
                                </svg>
                                <p class="text-gray-400 font-medium">Belum ada data siswa</p>
                                <p class="text-gray-300 text-sm mt-1">Klik tombol Tambah Siswa untuk memulai</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
/* Copied exactly from the example provided */
/* ─── WRAPPER ────────────────────────────────────────────────── */
.sched-wrapper {
    background: #ffffff;
    border: 1px solid #e0f2fe;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(14, 165, 233, 0.07);
}

/* ─── HEADER ─────────────────────────────────────────────────── */
.sched-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.375rem 1.75rem;
    border-bottom: 1px solid #e0f2fe;
    background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%);
    flex-wrap: wrap;
    gap: 0.875rem;
}

.sched-header-left {
    display: flex;
    align-items: center;
    gap: 0.875rem;
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

.header-icon { width: 1.375rem; height: 1.375rem; color: white; }

.sched-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0c4a6e;
    letter-spacing: -0.02em;
}

.sched-subtitle {
    color: #7dd3fc;
    font-size: 0.875rem;
    font-weight: 500;
    margin-top: 0.1rem;
}

.btn-add {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.5rem 1.05rem;
    font-size: 0.875rem;
    font-weight: 700;
    background: linear-gradient(135deg, #0ea5e9, #0284c7);
    color: white;
    border-radius: 0.75rem;
    text-decoration: none;
    box-shadow: 0 4px 14px rgba(14, 165, 233, 0.28);
    transition: opacity 0.15s, box-shadow 0.15s;
}

.btn-add:hover {
    opacity: 0.9;
    box-shadow: 0 6px 18px rgba(14, 165, 233, 0.38);
}

/* ─── TABLE ──────────────────────────────────────────────────── */
.sched-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.875rem;
}

.sched-table thead {
    background: #f0f9ff;
    border-bottom: 1.5px solid #bae6fd;
}

.sched-table thead th {
    padding: 0.75rem 1.25rem;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: #0369a1;
    text-align: left;
    white-space: nowrap;
}

.th-content {
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.th-icon { width: 0.875rem; height: 0.875rem; color: #38bdf8; }

/* ─── ROW ────────────────────────────────────────────────────── */
.sched-row {
    border-bottom: 1px solid #f0f9ff;
    transition: background 0.12s;
}

.sched-row:hover { background: #f8fcff; }
.sched-row:last-child { border-bottom: none; }

/* ─── TEACHER CELL ───────────────────────────────────────────── */
.teacher-cell {
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.teacher-avatar {
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
.class-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.2rem 0.65rem;
    background: #e0f2fe;
    color: #0369a1;
    border-radius: 99px;
    font-size: 0.75rem;
    font-weight: 700;
}

/* Day badge styles removed as they are not used in Student table */

/* ─── TIME CELL ──────────────────────────────────────────────── */
/* Time cell style removed as it is not used in Student table */

/* ─── ACTIONS ────────────────────────────────────────────────── */
.action-group {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 0.4rem;
}

.btn-edit, .btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    font-weight: 700;
    padding: 0.3rem 0.65rem;
    border-radius: 0.5rem;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.12s;
    white-space: nowrap;
}

.btn-edit   { color: #0284c7; background: #e0f2fe; }
.btn-edit:hover { background: #bae6fd; }

.btn-delete { color: #dc2626; background: #fee2e2; }
.btn-delete:hover { background: #fecaca; }

/* ─── EMPTY STATE ────────────────────────────────────────────── */
.empty-state {
    text-align: center;
    padding: 3.5rem 1.5rem;
}
</style>