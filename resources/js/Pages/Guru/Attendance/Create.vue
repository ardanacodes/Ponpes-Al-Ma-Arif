<script setup>
import { reactive, onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    schedule: Object,
    students: Array
})

// STATE
const form = reactive({
    attendances: []
})

// INIT DATA SISWA
onMounted(() => {
    props.students.forEach(s => {
        form.attendances.push({
            student_id: s.id,
            status: 'hadir'
        })
    })
})
</script>

<template>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Absensi
        </h1>

        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="font-bold">
                {{ schedule?.schoolClass?.name }}
            </h2>

            <p>
                {{ schedule?.subject }}
            </p>
        </div>

        <div
            v-for="(student, index) in students"
            :key="student.id"
            class="border p-3 mb-2 rounded"
        >
            
            <div class="font-bold">
                {{ student.name }}
            </div>

            <div class="flex gap-2 mt-2">
                
                <button class="bg-gray-200 px-2 py-1 rounded" @click="form.attendances[index].status = 'hadir'">
                    Hadir
                </button>

                <button class="bg-gray-200 px-2 py-1 rounded" @click="form.attendances[index].status = 'izin'">
                    Izin
                </button>

                <button class="bg-gray-200 px-2 py-1 rounded" @click="form.attendances[index].status = 'alpha'">
                    Alpha
                </button>

                <button class="bg-gray-200 px-2 py-1 rounded" @click="form.attendances[index].status = 'sakit'">
                    Sakit
                </button>

            </div>
            
            <div class="text-sm mt-1">
                Status: {{ form.attendances[index]?.status }}
            </div>

        </div>

        <button
            class="bg-blue-500 text-white px-4 py-2 rounded mt-4"
            @click="router.post(`/guru/attendance/${schedule.id}`, form)"
        >
            Simpan Absensi
        </button>

    </div>
</template>