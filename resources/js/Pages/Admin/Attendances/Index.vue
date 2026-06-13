<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Link } from '@inertiajs/vue3'

defineProps({
    attendances: Array
})
</script>

<template>
    <AdminLayout>

        <div class="bg-white p-6 rounded shadow">

            <h1 class="text-2xl font-bold mb-5">
                Rekap Absensi
            </h1>

            <table class="w-full">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="a in attendances"
                        :key="a.id"
                    >
                        <td>{{ a.attendance_date }}</td>

                        <td>
                            {{ a.teacher?.name }}
                        </td>

                        <td>
                            {{ a.teaching_schedule?.school_class?.name }}
                        </td>

                        <td>
                            {{ a.teaching_schedule?.subject }}
                        </td>

                        <td>
                        <Link
                            :href="`/admin/attendances/${a.id}`"
                            class="bg-blue-600 text-white px-3 py-1 rounded">
                            Detail
                        </Link>
                    </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </AdminLayout>
</template>