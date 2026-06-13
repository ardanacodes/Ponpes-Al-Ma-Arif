<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'

defineProps({
    attendance: Object
})
</script>

<template>
    <AdminLayout>

        <div class="bg-white p-6 rounded shadow">

            <h1 class="text-2xl font-bold mb-5">
                Detail Absensi
            </h1>

            <div class="mb-4">
                <p>
                    Guru:
                    <b>{{ attendance.teacher?.name }}</b>
                </p>

                <p>
                    Kelas:
                    <b>
                        {{
                            attendance.teaching_schedule
                                ?.school_class?.name
                        }}
                    </b>
                </p>

                <p>
                    Tanggal:
                    <b>
                        {{ attendance.attendance_date }}
                    </b>
                </p>
            </div>

            <table class="w-full">

                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <tr
                        v-for="detail in attendance.details"
                        :key="detail.id"
                    >
                        <td>
                            {{ detail.student?.name }}
                        </td>

                        <td>
                            {{ detail.status }}
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </AdminLayout>
</template>