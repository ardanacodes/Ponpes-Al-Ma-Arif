<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import {
    FlexRender,
    getCoreRowModel,
    useVueTable
} from '@tanstack/vue-table'
import { h } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    news: Array
})

const columns = [
    {
        accessorKey: 'title',
        header: 'Judul Berita',
        cell: ({ row }) => {
            return h('div', { class: 'flex items-center gap-3' }, [
                h('div', { class: 'w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center flex-shrink-0' }, [
                    h('svg', {
                        xmlns: 'http://www.w3.org/2000/svg',
                        class: 'w-5 h-5 text-sky-500',
                        fill: 'none',
                        viewBox: '0 0 24 24',
                        stroke: 'currentColor'
                    }, [
                        h('path', {
                            'stroke-linecap': 'round',
                            'stroke-linejoin': 'round',
                            'stroke-width': '2',
                            d: 'M19 11H5m14-4H9m10 8H9m-4 4h14'
                        })
                    ])
                ]),
                h('div', {}, [
                    h('h2', { class: 'font-semibold text-sky-950' }, row.original.title),
                    h('p', { class: 'text-xs text-sky-400' }, 'Berita website sekolah')
                ])
            ])
        }
    },
    {
        id: 'action',
        header: 'Aksi',
        cell: ({ row }) => {
            const id = row.original.id
            return h('div', { class: 'flex justify-end gap-2' }, [
                h('a', {
                    href: `/admin/news/${id}/edit`,
                    class: 'px-4 py-2 rounded-xl border border-sky-300 text-sky-600 hover:bg-sky-500 hover:text-white hover:border-sky-500 transition font-medium text-sm'
                }, 'Edit'),
                h('button', {
                    class: 'px-4 py-2 rounded-xl border border-rose-300 text-rose-500 hover:bg-rose-500 hover:text-white hover:border-rose-500 transition font-medium text-sm',
                    onClick: () => {
                        if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                            router.delete(`/admin/news/${id}`)
                        }
                    }
                }, 'Hapus')
            ])
        }
    }
]

const table = useVueTable({
    get data() { return props.news },
    get columns() { return columns },
    getCoreRowModel: getCoreRowModel()
})
</script>

<template>
    <AdminLayout>
        <div class="p-4 sm:p-1 max-w-7xl mx-auto space-y-5">

            <!-- ── PAGE HEADER ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.06)] px-6 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-sky-100 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14-4H9m10 8H9m-4 4h14" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold text-sky-950 tracking-tight">Data Berita</h1>
                        <p class="text-xs text-sky-400 font-medium">Kelola berita website sekolah</p>
                    </div>
                </div>

                <a
                    href="/admin/news/create"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-sky-500 hover:bg-sky-600 active:bg-sky-700 text-white text-sm font-bold shadow-sm hover:shadow-[0_4px_12px_rgba(14,165,233,0.3)] transition-all duration-200 self-start md:self-auto"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Berita
                </a>
            </div>

            <!-- ── TABLE CARD ── -->
            <div class="bg-white rounded-2xl border border-sky-100 shadow-[0_4px_24px_rgba(14,165,233,0.05)] overflow-hidden">

                <!-- Table Top Bar -->
                <div class="px-6 py-4 border-b border-sky-100 bg-gradient-to-r from-sky-50/60 to-white flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                        <span class="text-sm font-bold text-sky-950">Daftar Berita</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                        <span class="text-[11px] text-sky-400 font-medium">{{ news.length }} artikel</span>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">

                        <thead>
                            <tr
                                v-for="headerGroup in table.getHeaderGroups()"
                                :key="headerGroup.id"
                                class="bg-sky-50/50 border-b border-sky-100"
                            >
                                <th
                                    v-for="header in headerGroup.headers"
                                    :key="header.id"
                                    class="px-6 py-3.5 text-left text-[10px] font-bold text-sky-400 tracking-widest uppercase"
                                    :class="{ 'text-right': header.id === 'action' }"
                                >
                                    <FlexRender
                                        :render="header.column.columnDef.header"
                                        :props="header.getContext()"
                                    />
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-sky-50">
                            <tr
                                v-for="row in table.getRowModel().rows"
                                :key="row.id"
                                class="hover:bg-sky-50/40 transition-colors duration-150"
                            >
                                <td
                                    v-for="cell in row.getVisibleCells()"
                                    :key="cell.id"
                                    class="px-6 py-4"
                                >
                                    <FlexRender
                                        :render="cell.column.columnDef.cell"
                                        :props="cell.getContext()"
                                    />
                                </td>
                            </tr>

                            <!-- Empty State -->
                            <tr v-if="table.getRowModel().rows.length === 0">
                                <td :colspan="columns.length" class="py-16 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <div class="p-5 bg-sky-50 rounded-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <p class="text-sm font-bold text-sky-950">Belum ada berita</p>
                                        <p class="text-xs text-sky-400">Tambahkan berita baru untuk ditampilkan di website.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>