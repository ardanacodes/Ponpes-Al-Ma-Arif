<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { router, Link } from '@inertiajs/vue3'

defineProps({
    schedules: Array
})

const destroy = (id) => {
    if (confirm('Hapus jadwal?')) {
        router.delete(route('teaching-schedules.destroy', id))
    }
}

const dayColor = (day) => {
    const map = {
        'Senin':  'day-senin',
        'Selasa': 'day-selasa',
        'Rabu':   'day-rabu',
        'Kamis':  'day-kamis',
        'Jumat':  'day-jumat',
        'Sabtu':  'day-sabtu',
    }
    return map[day] || 'day-default'
}
</script>

<template>
    <AdminLayout>

        <div class="sched-wrapper">

            <!-- HEADER -->
            <div class="sched-header">
                <div class="sched-header-left">
                    <div class="header-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="sched-title">Jadwal Mengajar</h1>
                        <p class="sched-subtitle">Kelola jadwal mengajar guru</p>
                    </div>
                </div>

                <Link :href="route('teaching-schedules.create')" class="btn-add">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z"/>
                    </svg>
                    Tambah Jadwal
                </Link>
            </div>

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="sched-table">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                                    </svg>
                                    Guru
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
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z"/>
                                    </svg>
                                    Mata Pelajaran
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path fill-rule="evenodd" d="M1 2.75A.75.75 0 0 1 1.75 2h12.5a.75.75 0 0 1 0 1.5h-12.5A.75.75 0 0 1 1 2.75Zm1 3.5a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 6.25ZM3.5 10a.75.75 0 0 1 .75-.75h7a.75.75 0 0 1 0 1.5h-7A.75.75 0 0 1 3.5 10Zm1 3.5a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5h-5.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
                                    </svg>
                                    Hari
                                </div>
                            </th>
                            <th>
                                <div class="th-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8Zm7-4.75a.75.75 0 0 0-1.5 0v5a.75.75 0 0 0 .33.624l2.5 1.667a.75.75 0 0 0 .84-1.248L8 8.944V3.25Z" clip-rule="evenodd"/>
                                    </svg>
                                    Jam
                                </div>
                            </th>
                            <th class="text-right pr-6">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="schedule in schedules" :key="schedule.id" class="sched-row">
                            <td class="px-5 py-3.5">
                                <div class="teacher-cell">
                                    <div class="teacher-avatar">{{ schedule.teacher.name?.charAt(0) }}</div>
                                    <span class="font-semibold text-sky-900 text-sm">{{ schedule.teacher.name }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-3.5">
                                <span class="class-badge">{{ schedule.school_class.name }}</span>
                            </td>
                            <td class="px-5 py-3.5 text-gray-600 text-sm">{{ schedule.subject }}</td>
                            <td class="px-5 py-3.5">
                                <span :class="['day-badge', dayColor(schedule.day)]">{{ schedule.day }}</span>
                            </td>
                            <td class="px-5 py-3.5">
                                <div class="time-cell">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5 text-sky-400 flex-shrink-0">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8Zm7-4.75a.75.75 0 0 0-1.5 0v5a.75.75 0 0 0 .33.624l2.5 1.667a.75.75 0 0 0 .84-1.248L8 8.944V3.25Z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm font-medium text-sky-800">{{ schedule.start_time }} – {{ schedule.end_time }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-right">
                                <div class="action-group">
                                    <Link :href="route('teaching-schedules.edit', schedule.id)" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"/>
                                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"/>
                                        </svg>
                                        Edit
                                    </Link>
                                    <button @click="destroy(schedule.id)" class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                                            <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd"/>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr v-if="!schedules || schedules.length === 0">
                            <td colspan="6" class="empty-state">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 mx-auto mb-3 text-sky-200">
                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                                </svg>
                                <p class="text-gray-400 font-medium">Belum ada jadwal mengajar</p>
                                <p class="text-gray-300 text-sm mt-1">Klik tombol Tambah Jadwal untuk memulai</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
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

.day-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.2rem 0.65rem;
    border-radius: 99px;
    font-size: 0.75rem;
    font-weight: 700;
}

.day-senin  { background: #dbeafe; color: #1d4ed8; }
.day-selasa { background: #ede9fe; color: #6d28d9; }
.day-rabu   { background: #d1fae5; color: #065f46; }
.day-kamis  { background: #fef3c7; color: #92400e; }
.day-jumat  { background: #fee2e2; color: #991b1b; }
.day-sabtu  { background: #fce7f3; color: #9d174d; }
.day-default{ background: #f0f9ff; color: #0369a1; }

/* ─── TIME CELL ──────────────────────────────────────────────── */
.time-cell {
    display: flex;
    align-items: center;
    gap: 0.35rem;
    background: #f0f9ff;
    border: 1px solid #e0f2fe;
    border-radius: 0.5rem;
    padding: 0.25rem 0.6rem;
    width: fit-content;
}

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