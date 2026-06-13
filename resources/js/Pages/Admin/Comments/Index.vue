```vue
<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { router } from '@inertiajs/vue3'

defineProps({
    comments: Array
})

const approve = (id) => {
    router.patch(`/admin/comments/${id}/approve`)
}

const destroy = (id) => {
    if (confirm('Hapus komentar ini?')) {
        router.delete(`/admin/comments/${id}`)
    }
}
</script>

<template>
    <AdminLayout>

        <div class="min-h-screen bg-gray-50 p-6">

            <!-- MAIN CARD -->
            <div
                class="bg-white dark:bg-[#111827]
                       border border-gray-100
                       dark:border-white/10
                       shadow-sm"
            >

                <!-- HEADER -->
                <div
                    class="px-6 py-5 border-b border-gray-100
                           dark:border-white/10"
                >

                    <div
                        class="flex flex-col md:flex-row
                               md:items-center md:justify-between gap-4"
                    >

                        <div>

                            <h1
                                class="text-2xl font-black
                                       text-gray-800 dark:text-white"
                            >
                                Komentar Berita
                            </h1>

                            <p
                                class="text-gray-500 dark:text-gray-400
                                       mt-1 text-sm"
                            >
                                Kelola komentar pengguna yang masuk ke berita sekolah.
                            </p>

                        </div>

                        <!-- TOTAL -->
                        <div
                            class="flex items-center gap-3"
                        >

                            <div
                                class="px-4 py-2
                                       bg-yellow-50 text-yellow-700
                                       border border-yellow-100
                                       text-sm font-bold"
                            >
                                Pending:
                                {{
                                    comments.filter(c => c.status === 'pending').length
                                }}
                            </div>

                            <div
                                class="px-4 py-2
                                       bg-green-50 text-green-700
                                       border border-green-100
                                       text-sm font-bold"
                            >
                                Approved:
                                {{
                                    comments.filter(c => c.status === 'approved').length
                                }}
                            </div>

                        </div>

                    </div>

                </div>

                <!-- CONTENT -->
                <div class="p-6">

                    <!-- TABLE CARD -->
                    <div
                        class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden"
                    >

                        <div class="overflow-x-auto">

                            <table class="w-full">

                                <!-- HEAD -->
                                <thead
                                    class="bg-gray-50 dark:bg-white/5"
                                >
                                    <tr>

                                        <th class="table-head">
                                            Nama
                                        </th>

                                        <th class="table-head">
                                            Berita
                                        </th>

                                        <th class="table-head">
                                            Komentar
                                        </th>

                                        <th class="table-head">
                                            Status
                                        </th>

                                        <th class="table-head">
                                            Tanggal
                                        </th>

                                        <th class="table-head text-center">
                                            Action
                                        </th>

                                    </tr>
                                </thead>

                                <!-- BODY -->
                                <tbody>

                                    <tr
                                        v-for="comment in comments"
                                        :key="comment.id"
                                        class="border-t border-gray-100
                                               dark:border-white/10
                                               hover:bg-gray-50/70
                                               dark:hover:bg-white/5
                                               transition"
                                    >

                                        <!-- USER -->
                                        <td class="table-body">

                                            <div class="flex items-start gap-3">

                                                <!-- AVATAR -->
                                                <div
                                                    class="w-10 h-10
                                                           bg-[#C4E2F5]
                                                           text-[#2C5EAD]
                                                           flex items-center justify-center
                                                           font-bold text-sm"
                                                >
                                                    {{
                                                        comment.name
                                                            ?.charAt(0)
                                                            .toUpperCase()
                                                    }}
                                                </div>

                                                <div>

                                                    <h3
                                                        class="font-semibold
                                                               text-gray-800
                                                               dark:text-white"
                                                    >
                                                        {{ comment.name }}
                                                    </h3>

                                                    <p
                                                        class="text-xs
                                                               text-gray-400 mt-1"
                                                    >
                                                        {{
                                                            comment.email || 'No Email'
                                                        }}
                                                    </p>

                                                </div>

                                            </div>

                                        </td>

                                        <!-- BERITA -->
                                        <td class="table-body">

                                            <div
                                                class="max-w-[220px]
                                                       truncate
                                                       font-medium
                                                       text-gray-700
                                                       dark:text-gray-300"
                                            >
                                                {{ comment.news.title }}
                                            </div>

                                        </td>

                                        <!-- KOMENTAR -->
                                        <td class="table-body">

                                            <div
                                                class="max-w-[320px]
                                                       line-clamp-2
                                                       text-gray-600
                                                       dark:text-gray-300
                                                       leading-relaxed"
                                            >
                                                {{ comment.comment }}
                                            </div>

                                        </td>

                                        <!-- STATUS -->
                                        <td class="table-body">

                                            <span
                                                v-if="comment.status === 'pending'"
                                                class="inline-flex items-center gap-2
                                                       px-3 py-1.5
                                                       bg-yellow-100
                                                       text-yellow-700
                                                       text-xs font-bold"
                                            >

                                                <span
                                                    class="w-2 h-2 bg-yellow-500"
                                                ></span>

                                                Pending

                                            </span>

                                            <span
                                                v-else
                                                class="inline-flex items-center gap-2
                                                       px-3 py-1.5
                                                       bg-green-100
                                                       text-green-700
                                                       text-xs font-bold"
                                            >

                                                <span
                                                    class="w-2 h-2 bg-green-500"
                                                ></span>

                                                Approved

                                            </span>

                                        </td>

                                        <!-- TANGGAL -->
                                        <td class="table-body">

                                            <div
                                                class="text-sm
                                                       text-gray-500
                                                       dark:text-gray-400"
                                            >
                                                {{ comment.created_at }}
                                            </div>

                                        </td>

                                        <!-- ACTION -->
                                        <td class="table-body">

                                            <div
                                                class="flex items-center
                                                       justify-center gap-2"
                                            >

                                                <!-- APPROVE -->
                                                <button
                                                    v-if="comment.status === 'pending'"
                                                    @click="approve(comment.id)"
                                                    class="px-4 py-2
                                                           bg-green-600
                                                           hover:bg-green-700
                                                           text-white
                                                           text-xs font-bold
                                                           transition"
                                                >
                                                    Approve
                                                </button>

                                                <!-- DELETE -->
                                                <button
                                                    @click="destroy(comment.id)"
                                                    class="px-4 py-2
                                                           bg-red-600
                                                           hover:bg-red-700
                                                           text-white
                                                           text-xs font-bold
                                                           transition"
                                                >
                                                    Hapus
                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                    <!-- EMPTY -->
                                    <tr v-if="comments.length === 0">

                                        <td
                                            colspan="6"
                                            class="py-20 text-center"
                                        >

                                            <div
                                                class="flex flex-col items-center"
                                            >

                                                <div
                                                    class="w-16 h-16
                                                           bg-gray-100
                                                           dark:bg-white/5
                                                           flex items-center justify-center
                                                           mb-4"
                                                >
                                                    <i
                                                        class="fa-regular fa-comments
                                                               text-2xl text-gray-400"
                                                    ></i>
                                                </div>

                                                <h3
                                                    class="font-bold
                                                           text-gray-700
                                                           dark:text-gray-300"
                                                >
                                                    Belum Ada Komentar
                                                </h3>

                                                <p
                                                    class="text-sm text-gray-400 mt-1"
                                                >
                                                    Komentar pengguna akan muncul di sini.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
.table-head {
    @apply px-6 py-4 text-left text-xs font-black uppercase tracking-wider
           text-gray-500 dark:text-gray-400;
}

.table-body {
    @apply px-6 py-5 text-sm align-top;
}
</style>
```
