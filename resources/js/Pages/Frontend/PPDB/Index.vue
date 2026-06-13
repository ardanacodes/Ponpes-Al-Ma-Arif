<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue'
import { useForm, usePage } from '@inertiajs/vue3'

const page = usePage()

const form = useForm({

    name: '',
    gender: '',

    birth_place: '',
    birth_date: '',

    address: '',

    school_origin: '',
    phone: '',

    father_name: '',
    mother_name: '',

    program_type: '',
    education_level: '',
    major: '',
})

const submit = () => {
    form.post('/ppdb', {
        onSuccess: () => {
            form.reset('name', 'gender', 'birth_place', 'birth_date', 'address', 'school_origin', 'phone', 'father_name', 'mother_name', 'program_type', 'education_level', 'major')
        }
    })
}
</script>

<template>
    <FrontLayout>

        <section class="py-24 bg-[#f8fafc]">

            <div class="max-w-7xl mx-auto px-6">

                <!-- MAIN CARD -->
                <div class="bg-white border border-gray-200 rounded-[36px] overflow-hidden">

                    <!-- HEADER -->
                    <div class="px-8 md:px-14 py-10 border-b border-gray-100 bg-gradient-to-r from-[#f8fbff] to-white">

                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6">

                            <div>

                                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#008ecc]/10 text-[#008ecc] text-xs font-bold uppercase tracking-widest">
                                    <i class="fa-solid fa-user-graduate"></i>
                                    PPDB 2026 / 2027
                                </span>

                                <h2 class="mt-5 text-4xl md:text-5xl font-black text-gray-900">
                                    Formulir Pendaftaran
                                </h2>

                                <p class="mt-4 text-gray-500 max-w-2xl">
                                    Isi data dengan benar untuk menjadi bagian dari Pondok Pesantren Al-Ma’arif.
                                </p>

                            </div>

                            <div class="bg-[#008ecc] text-white rounded-3xl px-8 py-6 min-w-[260px]">
                                <p class="text-white/70 text-sm">Status</p>
                                <h3 class="text-3xl font-black mt-1">Dibuka</h3>
                                <p class="text-white/80 text-sm mt-3">
                                    Tunggu konfirmasi WhatsApp admin
                                </p>
                            </div>

                        </div>

                        <!-- FLASH MESSAGE -->
                        <div v-if="page.props.flash?.success"
                             class="mt-8 p-5 rounded-2xl bg-green-50 border border-green-200 text-green-700 font-medium">

                            <i class="fa-solid fa-circle-check mr-2"></i>
                            {{ page.props.flash.success }}

                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="grid grid-cols-1 lg:grid-cols-[1fr_360px]">

                        <!-- FORM -->
                        <div class="p-8 md:p-14">

                            <form @submit.prevent="submit" class="space-y-12">

                                <!-- DATA SANTRI -->
                                <div>

                                    <h3 class="text-2xl font-black mb-6">Data Santri</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <input v-model="form.name" placeholder="Nama Lengkap"
                                            class="input"/>

                                        <select v-model="form.gender" class="input">
                                            <option value="">Jenis Kelamin</option>
                                            <option>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        </select>

                                        <input v-model="form.phone" placeholder="Nomor HP" class="input"/>
                                        <input v-model="form.birth_place" placeholder="Tempat Lahir" class="input"/>
                                        <input type="date" v-model="form.birth_date" class="input"/>

                                        <input v-model="form.school_origin" placeholder="Asal Sekolah"
                                            class="md:col-span-2 input"/>

                                        <textarea v-model="form.address" rows="4"
                                            placeholder="Alamat Lengkap"
                                            class="md:col-span-2 input"></textarea>

                                    </div>

                                </div>

                                <!-- ORANG TUA -->
                                <div>

                                    <h3 class="text-2xl font-black mb-6">Data Orang Tua</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <input v-model="form.father_name" placeholder="Nama Ayah" class="input"/>
                                        <input v-model="form.mother_name" placeholder="Nama Ibu" class="input"/>

                                    </div>

                                </div>

                                <!-- PROGRAM -->
                                <div>

                                    <h3 class="text-2xl font-black mb-6">Program</h3>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                        <select v-model="form.program_type" class="input">
                                            <option value="">Program</option>
                                            <option>Mukim</option>
                                            <option>Non Mukim</option>
                                        </select>

                                        <select v-model="form.education_level" class="input">
                                            <option value="">Jenjang</option>
                                            <option>MTs</option>
                                            <option>SMA Plus</option>
                                            <option>SMK</option>
                                        </select>

                                        <select v-if="form.education_level === 'SMK'"
                                                v-model="form.major"
                                                class="md:col-span-2 input">
                                            <option value="">Jurusan</option>
                                            <option>RPL</option>
                                            <option>TKJ</option>
                                            <option>Multimedia</option>
                                            <option>TBSM</option>
                                        </select>

                                    </div>

                                </div>

                                <!-- BUTTON -->
                                <button type="submit"
                                    class="w-full md:w-auto px-10 py-4 bg-[#008ecc] text-white font-bold rounded-2xl hover:bg-[#0077b3] transition">

                                    Daftar Sekarang

                                </button>

                            </form>

                        </div>

                        <!-- SIDEBAR -->
                        <div class="bg-[#fcfdff] border-l border-gray-100 p-10">

                            <div class="sticky top-24 space-y-8">

                                <h3 class="text-2xl font-black">
                                    Kenapa Kami?
                                </h3>

                                <div class="space-y-6 text-sm text-gray-600">

                                    <p>✔ Pendidikan Islam & umum seimbang</p>
                                    <p>✔ Lingkungan pesantren modern</p>
                                    <p>✔ Fasilitas lengkap & nyaman</p>

                                </div>

                                <div class="bg-[#008ecc] text-white p-6 rounded-3xl">
                                    <p class="text-white/70 text-sm">Info PPDB</p>
                                    <h4 class="text-xl font-black mt-1">08xxxxxxxxxx</h4>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </FrontLayout>
</template>

<style>
.input {
    @apply w-full bg-gray-50 border border-gray-200 rounded-2xl px-5 py-4 focus:bg-white focus:ring-2 focus:ring-[#008ecc] outline-none transition;
}
</style>