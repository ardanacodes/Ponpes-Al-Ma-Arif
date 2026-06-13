<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, router } from '@inertiajs/vue3'

defineProps({
    announcements: Array
})

const destroy = (id) => {
    if (confirm('Hapus pengumuman ini?')) {
        router.delete(`/admin/announcements/${id}`)
    }
}
</script>

<template>
    <Head title="Pengumuman" />

    <AdminLayout>

        <div class="p-6 space-y-6">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3.5">
                    <div class="header-icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                            <path d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L9.17 8.83H4.25A2.25 2.25 0 0 0 2 11.08v1.84c0 1.24 1.01 2.25 2.25 2.25h4.92l5.94 5.95c.49.49 1.28.49 1.77 0a1.25 1.25 0 0 0 .37-.88V3.75c0-.32-.13-.63-.37-.87ZM18.75 7a.75.75 0 0 1 .75.75v8.5a.75.75 0 0 1-1.5 0v-8.5a.75.75 0 0 1 .75-.75Zm2.25 2.5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5a.75.75 0 0 1 .75-.75Z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="sched-title">Pengumuman</h1>
                        <p class="sched-subtitle">Kelola informasi dan pengumuman pondok</p>
                    </div>
                </div>

                <Link href="/admin/announcements/create" class="btn-add">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    Tambah Pengumuman
                </Link>
            </div>

            <div class="sched-wrapper">
                <div class="overflow-x-auto">
                    <table class="sched-table">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                            <path d="M3 3.5A1.5 1.5 0 0 1 4.5 2h7A1.5 1.5 0 0 1 13 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 12.5v-9Zm1.5-.5a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-7Z"/>
                                            <path d="M5 5.75a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 5.75Zm0 3a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 8.75Zm0 3a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 0 1.5h-3a.75.75 0 0 1-.75-.75Z"/>
                                        </svg>
                                        Judul
                                    </div>
                                </th>
                                <th>
                                    <div class="th-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                            <path d="M2 3e5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm0 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm0 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5Zm0 3.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Z"/>
                                        </svg>
                                        Isi Pengumuman
                                    </div>
                                </th>
                                <th>
                                    <div class="th-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                            <path d="M5.75 1.5a.75.75 0 1 0-1.5 0v1H3A2.25 2.25 0 0 0 .75 4.75v8A2.25 2.25 0 0 0 3 15h10A2.25 2.25 0 0 0 15.25 12.75v-8A2.25 2.25 0 0 0 13 2.5h-1.25v-1a.75.75 0 1 0-1.5 0v1h-4.5v-1Z" />
                                        </svg>
                                        Tanggal
                                    </div>
                                </th>
                                <th>
                                    <div class="th-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="th-icon">
                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm3.844-8.791a.75.75 0 0 0-1.188-.918l-3.7 4.79-1.649-1.833a.75.75 0 1 0-1.114 1.008l2.25 2.5a.75.75 0 0 0 1.151-.045l4.25-5.5Z" clip-rule="evenodd" />
                                        </svg>
                                        Status
                                    </div>
                                </th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="item in announcements" :key="item.id" class="sched-row">
                                <td class="px-6 py-4.5 font-bold text-sky-950 text-sm align-top">
                                    {{ item.title }}
                                </td>

                                <td class="px-6 py-4.5 text-gray-600 text-sm align-top">
                                    <div class="max-w-[350px] line-clamp-2 leading-relaxed">
                                        {{ item.content }}
                                    </div>
                                </td>

                                <td class="px-6 py-4.5 text-gray-500 text-sm align-top whitespace-nowrap">
                                    {{ item.date }}
                                </td>

                                <td class="px-6 py-4.5 align-top">
                                    <span v-if="item.is_active" class="status-badge status-aktif">
                                        Aktif
                                    </span>
                                    <span v-else class="status-badge status-nonaktif">
                                        Nonaktif
                                    </span>
                                </td>

                                <td class="px-6 py-4.5 align-top">
                                    <div class="action-group">
                                        <Link :href="`/admin/announcements/${item.id}/edit`" class="btn-edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                                                <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L3.5 10.025V12.5h2.475l7.513-7.513a1.75 1.75 0 0 0 0-2.474Z" />
                                                <path d="M11.25 4.225l1.025 1.025-6.75 6.75H4.5v-1.025l6.75-6.75Z" />
                                            </svg>
                                            Edit
                                        </Link>

                                        <button @click="destroy(item.id)" class="btn-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                                                <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A1.25 1.25 0 0 0 9.75 2h-3.5A1.25 1.25 0 0 0 5 3.25Zm1.5 0V4h3v-.75a.25.25 0 0 0-.25-.25h-2.5a.25.25 0 0 0-.25.25ZM4.56 5.5h6.88l-.793 7.925a.25.25 0 0 1-.25.225H5.602a.25.25 0 0 1-.25-.225L4.56 5.5Z" clip-rule="evenodd" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr v-if="announcements.length === 0">
                                <td colspan="5" class="empty-state">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12 mx-auto mb-3 text-sky-200">
                                        <path d="M16.88 2.88a1.25 1.25 0 0 0-1.77 0L9.17 8.83H4.25A2.25 2.25 0 0 0 2 11.08v1.84c0 1.24 1.01 2.25 2.25 2.25h4.92l5.94 5.95c.49.49 1.28.49 1.77 0a1.25 1.25 0 0 0 .37-.88V3.75c0-.32-.13-.63-.37-.87Z" />
                                    </svg>
                                    <p class="text-gray-400 font-medium">Belum ada pengumuman</p>
                                    <p class="text-gray-300 text-sm mt-1">Gunakan tombol tambah untuk membuat pengumuman baru</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
/* ─── WRAPPER & LAYOUT ───────────────────────────────────────── */
.sched-wrapper {
    background: #ffffff;
    border: 1px solid #e0f2fe;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(14, 165, 233, 0.07);
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
    color: #0ea5e9;
    font-size: 0.875rem;
    font-weight: 500;
    margin-top: 0.1rem;
}

/* ─── BUTTON ADD ─────────────────────────────────────────────── */
.btn-add {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: #ffffff;
    padding: 0.75rem 1.25rem;
    border-radius: 0.875rem;
    font-size: 0.875rem;
    font-weight: 700;
    box-shadow: 0 4px 14px rgba(14, 165, 233, 0.3);
    transition: all 0.2s ease;
}

.btn-add:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(14, 165, 233, 0.4);
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
}

/* ─── TABLE STYLES ───────────────────────────────────────────── */
.sched-table {
    width: 100%;
    border-collapse: collapse;
}

.sched-table thead {
    background: #f0f9ff;
    border-bottom: 1.5px solid #bae6fd;
}

.sched-table thead th {
    padding: 0.875rem 1.5rem;
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
    gap: 0.4rem;
}

.th-icon { width: 0.875rem; height: 0.875rem; color: #38bdf8; }

.sched-row {
    border-bottom: 1px solid #f0f9ff;
    transition: background 0.12s;
}

.sched-row:hover { background: #f8fcff; }
.sched-row:last-child { border-bottom: none; }

/* ─── STATUS BADGES ──────────────────────────────────────────── */
.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    border-radius: 99px;
    font-size: 0.75rem;
    font-weight: 700;
}

.status-aktif { background: #d1fae5; color: #065f46; }
.status-nonaktif { background: #fee2e2; color: #991b1b; }

/* ─── ACTION GROUP BUTTONS ───────────────────────────────────── */
.action-group {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-edit, .btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.35rem 0.75rem;
    border-radius: 0.625rem;
    transition: all 0.15s ease;
    cursor: pointer;
    border: none;
}

.btn-edit {
    background: #fef3c7;
    color: #92400e;
}
.btn-edit:hover { background: #fde68a; }

.btn-delete {
    background: #fee2e2;
    color: #991b1b;
}
.btn-delete:hover { background: #fecaca; }

/* ─── EMPTY STATE ────────────────────────────────────────────── */
.empty-state {
    text-align: center;
    padding: 4rem 1.5rem;
}
</style>