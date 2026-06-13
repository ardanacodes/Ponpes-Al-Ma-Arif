<script setup>
import {
    FlexRender,
    getCoreRowModel,
    useVueTable
} from '@tanstack/vue-table'

const props = defineProps({
    data: Array,
    columns: Array
})

const table = useVueTable({
    get data() {
        return props.data
    },

    get columns() {
        return props.columns
    },

    getCoreRowModel: getCoreRowModel()
})
</script>

<template>

    <div
        class="overflow-x-auto rounded-2xl
               border border-gray-200
               bg-white shadow-sm

               dark:bg-[#111827]
               dark:border-white/10"
    >

        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead
                class="bg-gray-50
                       dark:bg-white/5"
            >

                <tr
                    v-for="headerGroup in table.getHeaderGroups()"
                    :key="headerGroup.id"
                >

                    <th
                        v-for="header in headerGroup.headers"
                        :key="header.id"
                        class="px-6 py-4 text-left
                               font-semibold text-gray-700

                               dark:text-gray-200"
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
                    class="border-t border-gray-100
                           hover:bg-gray-50
                           dark:border-white/5
                           dark:hover:bg-white/5
                           transition"
                >

                    <td
                        v-for="cell in row.getVisibleCells()"
                        :key="cell.id"
                        class="px-6 py-4
                               text-gray-700

                               dark:text-gray-300"
                    >

                        <FlexRender
                            :render="cell.column.columnDef.cell"
                            :props="cell.getContext()"
                        />

                    </td>

                </tr>

                <!-- EMPTY -->
                <tr v-if="table.getRowModel().rows.length === 0">

                    <td
                        :colspan="columns.length"
                        class="text-center py-10
                               text-gray-400
                               dark:text-gray-500"
                    >
                        Tidak ada data
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</template>