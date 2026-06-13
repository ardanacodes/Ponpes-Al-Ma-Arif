<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue'

defineProps({
    news: Array
})
</script>

<template>
    <FrontLayout>

        <!-- HERO -->
        <section class="relative overflow-hidden pt-36 pb-20 bg-cover bg-center" 
         style="background-image: url('/images/hero3.webp');">
    
    <!-- Overlay Gelap (Agar Teks Putih Terlihat Jelas) -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-6 lg:px-8 text-center">

        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-500/20 border border-green-400/30 text-green-300 text-sm font-semibold mb-6 backdrop-blur-md">
            <i class="fa-solid fa-sparkles"></i>
            Informasi & Kegiatan Terbaru
        </div>

        <h1 class="text-4xl md:text-6xl font-black text-white leading-tight drop-shadow-lg">
            Berita Sekolah
        </h1>

        <p class="mt-5 max-w-2xl mx-auto text-gray-200 text-lg leading-relaxed drop-shadow-md">
            Temukan berbagai informasi terbaru, kegiatan santri,
            pengumuman sekolah, serta dokumentasi aktivitas
            Pondok Pesantren Al-Ma’arif.
        </p>

    </div>

    <!-- Hiasan Blur (Opsional, dikurangi intensitasnya agar tidak menutupi foto) -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-green-500/20 rounded-full blur-3xl"></div>
</section>

        <!-- CONTENT -->
        <section
            id="news"
            class="py-20 bg-gradient-to-b from-white via-green-50/40 to-white"
        >
            <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">

                <!-- Jika kosong -->
                <div
                    v-if="news.length === 0"
                    class="text-center py-24"
                >
                    <div
                        class="w-24 h-24 mx-auto rounded-full bg-green-100 flex items-center justify-center text-4xl mb-6"
                    >
                        <i class="fa-regular fa-newspaper text-green-700"></i>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-700 mb-3">
                        Belum Ada Berita
                    </h2>

                    <p class="text-gray-500 max-w-md mx-auto">
                        Saat ini berita sekolah masih kosong.
                        Nantikan update informasi terbaru dari sekolah.
                    </p>
                </div>

                <!-- List News -->
                <div
                    v-else
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >

                    <a
                        v-for="item in news"
                        :key="item.id"
                        :href="'/news/' + item.slug"
                        class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-2"
                    >

                        <!-- Thumbnail -->
                        <div class="relative overflow-hidden h-64">

                            <img
                                :src="item.thumbnail
                                    ? '/storage/' + item.thumbnail
                                    : 'https://placehold.co/600x400'"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />

                            <!-- Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"
                            ></div>

                            <!-- Badge -->
                            <div
                                class="absolute top-5 left-5 bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-black text-green-700 shadow flex items-center gap-2"
                            >
                                <i class="fa-solid fa-book-open"></i>
                                BERITA SEKOLAH
                            </div>

                        </div>

                        <!-- Content -->
                        <div class="p-7">

                            <h3
                                class="font-black text-2xl text-gray-800 leading-snug group-hover:text-green-700 transition-colors duration-300 line-clamp-2"
                            >
                                {{ item.title }}
                            </h3>

                            <p
                                class="mt-4 text-gray-500 text-sm leading-relaxed line-clamp-3"
                            >
                                {{
                                    item.content
                                        ? item.content
                                            .replace(/<[^>]*>/g, '')
                                            .substring(0, 120) + '...'
                                        : 'Baca informasi lengkap mengenai kegiatan dan berita terbaru sekolah.'
                                }}
                            </p>

                            <!-- Footer -->
                           <!-- Footer -->
<div
    class="mt-7 flex items-center justify-between"
>

    <!-- LEFT -->
    <div class="flex items-center gap-4">

        <!-- tanggal -->
        <div
            class="flex items-center gap-2 text-gray-400 text-sm"
        >
            <i class="fa-regular fa-calendar"></i>
            <span>Update Berita</span>
        </div>

        <!-- komentar -->
        <div
            class="flex items-center gap-2 text-gray-400 text-sm"
        >
            <i class="fa-regular fa-comment"></i>

            <span>
                {{
                    item.comments_count > 0
                        ? item.comments_count + ' Komentar'
                        : 'Belum Ada Komentar'
                }}
            </span>
        </div>

    </div>

    <!-- RIGHT -->
    <div
        class="flex items-center gap-2 text-green-700 font-bold text-sm"
    >
        Baca

        <i
            class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"
        ></i>
    </div>

</div>

                        </div>

                    </a>

                </div>

            </div>
        </section>

    </FrontLayout>
</template>