<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'

import {
    FlexRender,
    getCoreRowModel,
    useVueTable
} from '@tanstack/vue-table'

const props = defineProps({
    videos: Array
})

const destroy = (id) => {
    if (confirm('Yakin ingin menghapus video ini?')) {
        router.delete('/admin/videos/' + id)
    }
}

const columns = [
    {
        accessorKey: 'title',
        header: 'Video'
    },

    {
        accessorKey: 'youtube_url',
        header: 'Link YouTube'
    },

    {
        id: 'action',
        header: 'Aksi'
    }
]

const table = useVueTable({
    get data() {
        return props.videos
    },

    get columns() {
        return columns
    },

    getCoreRowModel: getCoreRowModel()
})
</script>

<template>
    <AdminLayout>

        <div class="min-h-screen bg-gray-50 p-6">

            <!-- HEADER -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        Data Video
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Kelola video YouTube website sekolah
                    </p>
                </div>

                <!-- BUTTON -->
                <Link
                    href="/admin/videos/create"
                    class="inline-flex items-center justify-center px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-semibold shadow-sm transition"
                >
                    + Tambah Video
                </Link>

            </div>

            <!-- TABLE -->
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <!-- HEAD -->
                        <thead class="bg-gray-50 border-b border-gray-200">

                            <tr
                                v-for="headerGroup in table.getHeaderGroups()"
                                :key="headerGroup.id"
                            >

                                <th
                                    v-for="header in headerGroup.headers"
                                    :key="header.id"
                                    class="px-6 py-4 text-left font-semibold text-gray-700"
                                >

                                    <FlexRender
                                        :render="header.column.columnDef.header"
                                        :props="header.getContext()"
                                    />

                                </th>

                            </tr>

                        </thead>

                        <!-- BODY -->
                        <tbody>

                            <tr
                                v-for="row in table.getRowModel().rows"
                                :key="row.id"
                                class="border-b border-gray-100 hover:bg-gray-50 transition"
                            >

                                <!-- VIDEO -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-4">

                                        <!-- ICON -->
                                        <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-6 h-6 text-red-600"
                                                fill="currentColor"
                                                viewBox="0 0 24 24">

                                                <path d="M19.615 3.184C16.403 2.964 7.597 2.964 4.385 3.184 1.488 3.383.125 5.333 0 8.223c-.167 3.809-.167 3.745 0 7.554.125 2.89 1.488 4.84 4.385 5.039 3.212.22 12.018.22 15.23 0 2.897-.199 4.26-2.149 4.385-5.039.167-3.809.167-3.745 0-7.554-.125-2.89-1.488-4.84-4.385-5.039zM9 15.5v-7l6 3.5-6 3.5z"/>
                                            </svg>

                                        </div>

                                        <!-- TITLE -->
                                        <div>

                                            <h2 class="font-semibold text-gray-800">
                                                {{ row.original.title }}
                                            </h2>

                                            <p class="text-xs text-gray-400 mt-1">
                                                Video YouTube sekolah
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- URL -->
                                <td class="px-6 py-4">

                                    <a
                                        :href="row.original.youtube_url"
                                        target="_blank"
                                        class="text-blue-600 hover:underline truncate block max-w-sm"
                                    >
                                        {{ row.original.youtube_url }}
                                    </a>

                                </td>

                                <!-- ACTION -->
                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <!-- EDIT -->
                                        <Link
                                            :href="'/admin/videos/' + row.original.id + '/edit'"
                                            class="px-4 py-2 rounded-xl border border-yellow-500 text-yellow-600 hover:bg-yellow-500 hover:text-white transition font-medium"
                                        >
                                            Edit
                                        </Link>

                                        <!-- DELETE -->
                                        <button
                                            @click="destroy(row.original.id)"
                                            class="px-4 py-2 rounded-xl border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition font-medium"
                                        >
                                            Hapus
                                        </button>

                                    </div>

                                </td>

                            </tr>

                            <!-- EMPTY -->
                            <tr
                                v-if="table.getRowModel().rows.length === 0"
                            >

                                <td
                                    :colspan="columns.length"
                                    class="py-14 text-center"
                                >

                                    <div class="flex flex-col items-center">

                                        <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mb-4">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-10 h-10 text-gray-300"
                                                fill="currentColor"
                                                viewBox="0 0 24 24">

                                                <path d="M19.615 3.184C16.403 2.964 7.597 2.964 4.385 3.184 1.488 3.383.125 5.333 0 8.223c-.167 3.809-.167 3.745 0 7.554.125 2.89 1.488 4.84 4.385 5.039 3.212.22 12.018.22 15.23 0 2.897-.199 4.26-2.149 4.385-5.039.167-3.809.167-3.745 0-7.554-.125-2.89-1.488-4.84-4.385-5.039z"/>
                                            </svg>

                                        </div>

                                        <h2 class="text-lg font-semibold text-gray-700">
                                            Belum ada video
                                        </h2>

                                        <p class="text-sm text-gray-400 mt-1">
                                            Tambahkan video YouTube untuk ditampilkan
                                        </p>

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