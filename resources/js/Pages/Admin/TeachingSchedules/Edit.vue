<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    schedule: Object,
    teachers: Array,
    classes: Array
})

const form = useForm({
    teacher_id: props.schedule.teacher_id,
    school_class_id: props.schedule.school_class_id,
    subject: props.schedule.subject,
    day: props.schedule.day,
    start_time: props.schedule.start_time,
    end_time: props.schedule.end_time,
})

const submit = () => {
    form.put(
        `/admin/teaching-schedules/${props.schedule.id}`
    )
}
</script>

<template>
    <AdminLayout>

        <div class="bg-white p-6 rounded shadow max-w-3xl">

            <h1 class="text-2xl font-bold mb-6">
                Edit Jadwal Mengajar
            </h1>

            <form @submit.prevent="submit">

                <!-- Guru -->
                <div class="mb-4">
                    <label class="block mb-2">
                        Guru
                    </label>

                    <select
                        v-model="form.teacher_id"
                        class="w-full border rounded p-2"
                    >
                        <option
                            v-for="teacher in teachers"
                            :key="teacher.id"
                            :value="teacher.id"
                        >
                            {{ teacher.name }}
                        </option>
                    </select>
                </div>

                <!-- Kelas -->
                <div class="mb-4">
                    <label class="block mb-2">
                        Kelas
                    </label>

                    <select
                        v-model="form.school_class_id"
                        class="w-full border rounded p-2"
                    >
                        <option
                            v-for="kelas in classes"
                            :key="kelas.id"
                            :value="kelas.id"
                        >
                            {{ kelas.name }}
                        </option>
                    </select>
                </div>

                <!-- Mapel -->
                <div class="mb-4">
                    <label class="block mb-2">
                        Mata Pelajaran
                    </label>

                    <input
                        v-model="form.subject"
                        class="w-full border rounded p-2"
                    />
                </div>

                <!-- Hari -->
                <div class="mb-4">

                    <label class="block mb-2">
                        Hari
                    </label>

                    <select
                        v-model="form.day"
                        class="w-full border rounded p-2"
                    >
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                    </select>

                </div>

                <!-- Jam Mulai -->
                <div class="mb-4">

                    <label class="block mb-2">
                        Jam Mulai
                    </label>

                    <input
                        type="time"
                        v-model="form.start_time"
                        class="w-full border rounded p-2"
                    />

                </div>

                <!-- Jam Selesai -->
                <div class="mb-6">

                    <label class="block mb-2">
                        Jam Selesai
                    </label>

                    <input
                        type="time"
                        v-model="form.end_time"
                        class="w-full border rounded p-2"
                    />

                </div>

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-5 py-2 rounded"
                >
                    Update
                </button>

            </form>

        </div>

    </AdminLayout>
</template>