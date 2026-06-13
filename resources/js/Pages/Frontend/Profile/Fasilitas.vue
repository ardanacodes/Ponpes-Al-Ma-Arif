<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue'

defineProps({
    facilities: {
        type: Object,
        default: () => ({
            data: [],
            links: []
        })
    }
})
</script>

<template>
    <FrontLayout>

        <!-- HERO -->
        <section class="relative overflow-hidden pt-40 pb-20 bg-[#008ecc]">

            <div class="absolute top-0 right-0 w-1/3 h-full bg-black/5 -skew-x-12 translate-x-24"></div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">

                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-1.5 rounded-full text-white text-xs font-bold tracking-widest uppercase mb-6">
                    <i class="fa-solid fa-building text-yellow-300"></i>
                    Sarana & Prasarana
                </div>

                <h1 class="text-5xl md:text-7xl font-black text-white leading-tight">
                    Fasi<span class="text-blue-200">litas</span>
                </h1>

                <p class="mt-6 text-white/80 max-w-2xl mx-auto text-lg md:text-xl font-light leading-relaxed">
                    Fasilitas lengkap untuk mendukung kegiatan belajar, ibadah, dan pengembangan santri.
                </p>

            </div>
        </section>

        <!-- CONTENT -->
        <section class="py-24 bg-[#f8fafc] min-h-screen">

            <div class="max-w-7xl mx-auto px-6">

                <!-- EMPTY STATE -->
                <div
                    v-if="!facilities?.data || facilities.data.length === 0"
                    class="text-center py-20"
                >
                    <div class="text-6xl mb-4">🏫</div>
                    <h3 class="text-xl font-bold text-gray-700">
                        Belum ada fasilitas
                    </h3>
                    <p class="text-gray-500 mt-2">
                        Data fasilitas sedang dalam proses penambahan
                    </p>
                </div>

                <!-- GRID -->
                <div
                    v-else
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10"
                >

                    <div
                        v-for="item in facilities.data"
                        :key="item.id"
                        class="group bg-white rounded-[2rem] shadow-xl shadow-blue-900/5 overflow-hidden border border-gray-100 hover:border-[#008ecc]/30 transition-all duration-500 hover:-translate-y-2"
                    >

                        <!-- IMAGE -->
                        <div class="relative h-64 overflow-hidden">

                            <img
                                :src="item.photo ? '/storage/' + item.photo : 'https://placehold.co/600x400'"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />

                            <div class="absolute top-4 left-4">
                                <span class="bg-[#008ecc] text-white text-[10px] font-bold px-3 py-1 rounded-lg uppercase tracking-wider shadow-lg">
                                    Fasilitas
                                </span>
                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-8">

                            <h2 class="text-2xl font-black text-gray-800 group-hover:text-[#008ecc] transition-colors duration-300">
                                {{ item.title ?? 'Fasilitas Pondok' }}
                            </h2>

                            <p class="mt-4 text-gray-500 leading-relaxed text-sm line-clamp-3">
                                {{ item.description }}
                            </p>

                        </div>

                    </div>

                </div>

                <!-- PAGINATION -->
                <div class="mt-14 flex justify-center gap-2 flex-wrap">

                    <a
                        v-for="link in facilities.links"
                        :key="link.label"
                        :href="link.url"
                        v-html="link.label"
                        class="px-3 py-2 border rounded text-sm transition"
                        :class="{
                            'bg-[#008ecc] text-white border-[#008ecc]': link.active,
                            'text-gray-600 hover:bg-gray-100': !link.active
                        }"
                    />

                </div>

                <!-- INFO SECTION -->
                <div class="mt-20 p-10 bg-white border border-gray-100 rounded-[2.5rem] flex flex-col md:flex-row items-center justify-between gap-8 shadow-sm">

                    <div class="flex items-center gap-6">

                        <div class="w-16 h-16 bg-[#008ecc]/10 rounded-2xl flex items-center justify-center text-[#008ecc] text-2xl">
                            <i class="fa-solid fa-school"></i>
                        </div>

                        <div>
                            <h4 class="text-xl font-black text-gray-800">
                                Fasilitas Lengkap Pondok
                            </h4>
                            <p class="text-gray-500">
                                Mendukung kegiatan belajar, ibadah, dan kehidupan santri sehari-hari.
                            </p>
                        </div>

                    </div>

                    <a
                        href="/contact"
                        class="px-8 py-4 bg-[#008ecc] text-white font-bold rounded-xl hover:bg-blue-600 transition-all shadow-lg"
                    >
                        Hubungi Kami
                    </a>

                </div>

            </div>

        </section>

    </FrontLayout>
</template>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>