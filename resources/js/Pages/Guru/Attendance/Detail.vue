<script setup>
import GuruLayout from '@/Layouts/GuruLayout.vue'

defineProps({
    attendance: Object
})
</script>

<template>

<GuruLayout>

    <h1 class="text-3xl font-bold mb-6">
        Detail Absensi
    </h1>

    <div class="bg-white p-6 rounded-xl shadow mb-6">

        <div class="mb-2">
            <strong>Mapel:</strong>
            {{ attendance.teaching_schedule.subject }}
        </div>

        <div class="mb-2">
            <strong>Kelas:</strong>
            {{ attendance.teaching_schedule.school_class.name }}
        </div>

        <div>
            <strong>Tanggal:</strong>
            {{ attendance.attendance_date }}
        </div>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-left">NIS</th>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-left">Status</th>
                </tr>

            </thead>

            <tbody>

                <tr
                    v-for="detail in attendance.details"
                    :key="detail.id"
                    class="border-t"
                >
                    <td class="p-3">
                        {{ detail.student.nis }}
                    </td>

                    <td class="p-3">
                        {{ detail.student.name }}
                    </td>

                    <td class="p-3">
                        {{ detail.status }}
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</GuruLayout>

</template>