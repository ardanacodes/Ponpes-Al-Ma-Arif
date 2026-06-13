<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link, router } from '@inertiajs/vue3'

import {
    FlexRender,
    getCoreRowModel,
    useVueTable
} from '@tanstack/vue-table'

const props = defineProps({
    extracurriculars: Array
})

const destroy = (id) => {
    if (confirm('Yakin ingin menghapus data ini?')) {
        router.delete(`/admin/extracurriculars/${id}`)
    }
}

const columns = [
    {
        accessorKey: 'thumbnail',
        header: 'Thumbnail'
    },

    {
        accessorKey: 'title',
        header: 'Ekstrakurikuler'
    },

    {
        accessorKey: 'description',
        header: 'Deskripsi'
    },

    {
        id: 'action',
        header: 'Aksi'
    }
]

const table = useVueTable({
    get data() {
        return props.extracurriculars
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
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800">
                        Data Ekstrakurikuler
                    </h1>

                    <p class="text-gray-500 mt-1">
                        Kelola data ekstrakurikuler sekolah
                    </p>

                </div>

                <!-- BUTTON -->
                <Link
                    href="/admin/extracurriculars/create"
                    class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#1591DC] hover:bg-[#127fc1] text-white font-semibold shadow-sm transition"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Ekstrakurikuler

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

                                <!-- THUMBNAIL -->
                                <td class="px-6 py-4">

                                    <img
                                        :src="
                                            row.original.thumbnail
                                                ? '/storage/' + row.original.thumbnail
                                                : 'https://placehold.co/120x80'
                                        "
                                        class="w-24 h-16 rounded-xl object-cover border border-gray-100"
                                    />

                                </td>

                                <!-- TITLE -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <!-- ICON -->
                                        <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center">

                                            <i
                                                class="fa-solid fa-users text-[#1591DC]"
                                            ></i>

                                        </div>

                                        <!-- TITLE -->
                                        <div>

                                            <h2 class="font-semibold text-gray-800">
                                                {{ row.original.title }}
                                            </h2>

                                            <p class="text-xs text-gray-400 mt-1">
                                                Ekstrakurikuler sekolah
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- DESCRIPTION -->
                                <td class="px-6 py-4">

                                    <p class="text-sm text-gray-500 line-clamp-2 max-w-md">
                                        {{ row.original.description }}
                                    </p>

                                </td>

                                <!-- ACTION -->
                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <!-- EDIT -->
                                        <Link
                                            :href="`/admin/extracurriculars/${row.original.id}/edit`"
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
                                    class="py-16 text-center"
                                >

                                    <div class="flex flex-col items-center">

                                        <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mb-4">

                                            <i
                                                class="fa-solid fa-folder-open text-4xl text-gray-300"
                                            ></i>

                                        </div>

                                        <h2 class="text-lg font-semibold text-gray-700">
                                            Belum ada ekstrakurikuler
                                        </h2>

                                        <p class="text-sm text-gray-400 mt-1">
                                            Tambahkan data ekstrakurikuler untuk ditampilkan
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