<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import FrontLayout from '@/Layouts/FrontLayout.vue'
const openAnnouncement = ref(false)

defineProps({
    news: Array,
    galleries: Array,
    videos: Array,
        announcements: Array

})

// Logika Slider
const currentSlide = ref(0)
const slides = [
    '/images/hero1.webp', 
    '/images/hero2.webp',
    '/images/hero3.webp'
]

let slideInterval;


// Fungsi untuk menjalankan slider otomatis
const startSlider = () => {
    slideInterval = setInterval(() => {
        currentSlide.value = (currentSlide.value + 1) % slides.length
    }, 5000)
}

onMounted(() => {
    startSlider()
})

onUnmounted(() => {
    clearInterval(slideInterval)
})

// Fungsi jika dot di bawah diklik manual
const goToSlide = (index) => {
    currentSlide.value = index;
    // Reset timer agar tidak langsung ganti setelah diklik manual
    clearInterval(slideInterval);
    startSlider();
}


const getYoutubeEmbed = (url) => {

    if (!url) return ''

    // youtube.com/watch?v=
    let regExp =
        /^.*(youtube\.com\/watch\?v=|youtu\.be\/)([^#&?]*).*/

    let match = url.match(regExp)

    if (match && match[2].length === 11) {
        return `https://www.youtube.com/embed/${match[2]}`
    }

    return ''
}


// Logika FAQ Accordion
const activeFaq = ref(null)
const toggleFaq = (index) => {
    activeFaq.value = activeFaq.value === index ? null : index
}

// Data FAQ berdasarkan isi Poster
const faqs = [
    {
        question: "Apa saja dokumen persyaratan yang harus disiapkan?",
        answer: "Persyaratan meliputi: Salinan Ijazah dilegalisir, SKL/NISN, Foto berwarna santri (2x3, 3x4, 4x6 masing-masing 6 lembar), Foto orang tua (3x4), Fotokopi Akta Kelahiran & KK, Surat Kelakuan Baik, serta Tanda Bukti Golongan Darah."
    },
    {
        question: "Bagaimana proses seleksi masuknya?",
        answer: "Selain melengkapi berkas administrasi, calon santri diwajibkan untuk Lulus Tes Baca Al-Qur'an yang akan diuji langsung oleh panitia di lokasi."
    },
    {
        question: "Apakah ada tes kesehatan?",
        answer: "Calon santri (Lulusan MTs/SMP) diminta menyertakan surat keterangan dokter atau bersedia mengikuti tes kesehatan langsung di Pondok Pesantren Al-Ma'arif."
    },
    {
        question: "Bolehkah mendaftar jika Ijazah belum keluar?",
        answer: "Boleh. Salinan ijazah dan surat keterangan lulus dapat menyusul jika memang belum diterbitkan oleh sekolah asal."
    }
]



const announcementOpen = ref(false)


</script>
<style scoped>

.slide-announcement-enter-active,
.slide-announcement-leave-active {
    transition: all .3s ease;
}

.slide-announcement-enter-from,
.slide-announcement-leave-to {
    opacity: 0;
    transform: translateX(-20px) translateY(-50%);
}


</style>
<template>
    <FrontLayout>

        <section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    
    <!-- SLIDE IMAGES -->
    <div 
        v-for="(slide, index) in slides" 
        :key="index"
        class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
        :class="index === currentSlide ? 'opacity-100' : 'opacity-0'"
    >
        <img 
            :src="slide" 
            alt="Background Al-Ma'arif" 
            class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-[10000ms] ease-linear" 
            :class="index === currentSlide ? 'scale-100' : 'scale-110'" 
        />
    </div>

    <!-- OVERLAY: Menggunakan campuran hitam dan biru identitas -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#008ecc]/80 via-black/60 to-black/80 z-10"></div>

    <!-- CONTENT -->
    <div class="relative z-20 text-center px-6 max-w-4xl mx-auto flex flex-col items-center">
        
        <div class="mb-6 inline-block px-4 py-1 border border-white/30 rounded-full bg-white/10 backdrop-blur-sm text-white text-xs font-bold tracking-[0.2em] uppercase">
            Official Website
        </div>

        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-6 tracking-tight font-serif">
            أَهْلًا وَسَهْلًا
        </h1>
        
        <p class="text-white/90 text-sm md:text-lg lg:text-xl mx-auto font-light leading-relaxed max-w-2xl mb-10">
            Selamat Datang di Situs Resmi Pondok Pesantren Al-Ma'arif. 
            Pusat pendidikan Islam yang berkomitmen mencetak generasi unggul, 
            beradab, dan siap menjawab tantangan zaman.
        </p>

        <!-- BUTTON: Menggunakan warna #008ecc -->
        <a href="/profile-sekolah" class="group relative px-12 py-4 overflow-hidden rounded-xl bg-[#008ecc] text-white font-extrabold uppercase tracking-widest text-sm transition-all shadow-2xl hover:shadow-[#008ecc]/40 hover:-translate-y-1">
            <span class="relative z-10">Telusuri Profil</span>
            <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
        </a>
    </div>

    <!-- INDICATORS / DOTS -->
    <div class="absolute bottom-12 z-30 flex gap-4">
        <button 
            v-for="(slide, index) in slides" 
            :key="'dot-'+index"
            @click="goToSlide(index)"
            class="h-1.5 transition-all duration-500 rounded-full"
            :class="index === currentSlide ? 'w-12 bg-[#008ecc]' : 'w-6 bg-white/30 hover:bg-white/60'"
            :aria-label="'Pergi ke gambar ' + (index + 1)"
        ></button>
    </div>

</section>

        <section id="news" class="py-24 px-6 bg-gradient-to-b from-white via-[#008ecc]/5 to-white">

    <div class="max-w-7xl mx-auto">

        <!-- HEADING -->
        <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-14 gap-5">

            <div>

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#008ecc]/10 text-[#008ecc] text-sm font-bold mb-5"
                >
                    <i class="fa-regular fa-newspaper"></i>
                    Informasi Sekolah
                </div>

                <h2
                    class="text-4xl md:text-5xl font-black text-gray-800"
                >
                    Berita Terbaru
                </h2>

                <p
                    class="mt-4 text-gray-500 max-w-2xl leading-relaxed"
                >
                    Temukan berbagai informasi terbaru, kegiatan santri,
                    pengumuman sekolah, dan dokumentasi aktivitas
                    Pondok Pesantren Al-Ma’arif.
                </p>

            </div>

            <a
                href="/news"
                class="group inline-flex items-center gap-3 bg-[#008ecc] hover:bg-[#007ab0] text-white px-7 py-4 rounded-2xl font-bold shadow-lg transition-all duration-300"
            >
                Lihat Semua

                <i
                    class="fa-solid fa-arrow-right transition-transform duration-300 group-hover:translate-x-1"
                ></i>
            </a>

        </div>

        <!-- BERITA TERBARU BESAR -->
        <a
            v-if="news.length"
            :href="'/news/' + news[0].slug"
            class="group relative block overflow-hidden rounded-[2.5rem] h-[420px] mb-10 shadow-xl"
        >

            <!-- IMAGE -->
            <img
                :src="news[0].thumbnail ? '/storage/' + news[0].thumbnail : 'https://placehold.co/1200x700'"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
            />

            <!-- OVERLAY -->
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"
            ></div>

            <!-- CONTENT -->
            <div
                class="absolute bottom-0 left-0 p-10 md:p-14 text-white w-full"
            >

                <!-- BADGE -->
                <div
                    class="inline-flex items-center gap-2 bg-[#008ecc]/80 backdrop-blur-md px-5 py-2 rounded-full text-sm font-bold mb-5"
                >
                    <i class="fa-solid fa-star"></i>
                    BERITA TERBARU
                </div>

                <h3
                    class="text-3xl md:text-5xl font-black leading-tight max-w-4xl"
                >
                    {{ news[0].title }}
                </h3>

                <p
                    class="mt-5 text-white/80 leading-relaxed max-w-3xl text-lg line-clamp-2"
                >
                    {{
                        news[0].content
                            ? news[0].content.replace(/<[^>]*>/g, '').substring(0, 180) + '...'
                            : 'Baca informasi lengkap mengenai berita terbaru sekolah.'
                    }}
                </p>

            </div>

        </a>

        <!-- 3 CARD DI BAWAH -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
        >

            <a
                v-for="item in news.slice(1, 4)"
                :key="item.id"
                :href="'/news/' + item.slug"
                class="group bg-white rounded-[2rem] overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-[#008ecc]/10"
            >

                <!-- IMAGE -->
                <div class="relative overflow-hidden h-60">

                    <img
                        :src="item.thumbnail ? '/storage/' + item.thumbnail : 'https://placehold.co/600x400'"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    />

                    <!-- OVERLAY -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"
                    ></div>

                    <!-- BADGE -->
                    <div
                        class="absolute top-5 left-5 bg-white/90 px-4 py-2 rounded-full text-xs font-black text-[#008ecc] flex items-center gap-2"
                    >
                        <i class="fa-solid fa-book-open"></i>
                        BERITA
                    </div>

                </div>

                <!-- CONTENT -->
                <div class="p-7">

                    <h3
                        class="text-2xl font-black text-gray-800 leading-snug line-clamp-2 group-hover:text-[#008ecc] transition-colors duration-300"
                    >
                        {{ item.title }}
                    </h3>

                    <p
                        class="mt-4 text-gray-500 leading-relaxed text-sm line-clamp-3"
                    >
                        {{
                            item.content
                                ? item.content.replace(/<[^>]*>/g, '').substring(0, 100) + '...'
                                : 'Baca informasi lengkap mengenai berita terbaru sekolah.'
                        }}
                    </p>

                    <!-- FOOTER -->
                    <div
                        class="mt-6 flex items-center justify-between"
                    >

                        <div
                            class="flex items-center gap-2 text-gray-400 text-sm"
                        >
                            <i class="fa-regular fa-calendar"></i>
                            Sekolah
                        </div>

                        <div
                            class="flex items-center gap-2 text-[#008ecc] font-bold text-sm"
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
<!-- SECTION AJAKAN PENDAFTARAN -->
<section class="relative overflow-hidden py-24 px-6 bg-[#008ecc]">

    <!-- ORNAMEN GEOMETRIS HALUS -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-black/5 -skew-x-12 translate-x-20"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- KIRI: KONTEN -->
            <div class="order-2 lg:order-1">

                <!-- BADGE -->
                <div class="inline-flex items-center gap-2 bg-blue-400/30 border border-white/20 text-white px-4 py-1.5 rounded-lg text-sm font-semibold mb-8">
                    <span class="flex h-2 w-2 rounded-full bg-yellow-400 animate-pulse"></span>
                    Pendaftaran Santri Baru Telah Dibuka
                </div>

                <!-- TITLE -->
                <h2 class="text-4xl md:text-6xl font-bold text-white leading-[1.1] tracking-tight">
                    Wujudkan Generasi <span class="text-blue-100">Islami & Berprestasi</span>
                </h2>

                <!-- DESC -->
                <p class="mt-8 text-white/90 leading-relaxed text-lg max-w-xl">
                    Pondok Pesantren Al-Ma’arif memadukan kurikulum salafiyah dan modern untuk melahirkan generasi yang kokoh dalam aqidah serta unggul dalam ilmu pengetahuan.
                </p>

                <!-- FITUR / POIN -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="flex items-center gap-3 text-white">
                        <div class="p-2 bg-white/15 rounded-lg">
                            <i class="fa-solid fa-check text-yellow-400"></i>
                        </div>
                        <span class="font-medium">Tahfidz Al-Qur'an</span>
                    </div>
                    <div class="flex items-center gap-3 text-white">
                        <div class="p-2 bg-white/15 rounded-lg">
                            <i class="fa-solid fa-check text-yellow-400"></i>
                        </div>
                        <span class="font-medium">Kajian Kitab Kuning</span>
                    </div>
                    <div class="flex items-center gap-3 text-white">
                        <div class="p-2 bg-white/15 rounded-lg">
                            <i class="fa-solid fa-check text-yellow-400"></i>
                        </div>
                        <span class="font-medium">Ekskul Teknologi</span>
                    </div>
                    <div class="flex items-center gap-3 text-white">
                        <div class="p-2 bg-white/15 rounded-lg">
                            <i class="fa-solid fa-check text-yellow-400"></i>
                        </div>
                        <span class="font-medium">Bahasa Arab & Inggris</span>
                    </div>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="mt-12 flex flex-wrap gap-5">
                    <a href="/ppdb" class="px-10 py-4 bg-white text-[#008ecc] font-bold rounded-xl hover:bg-blue-50 transition-colors shadow-xl shadow-black/10">
                        Daftar Sekarang
                    </a>
                    <a href="/contact" class="px-10 py-4 border-2 border-white/40 text-white font-bold rounded-xl hover:bg-white/10 transition-all">
                        Konsultasi Program
                    </a>
                </div>
            </div>

            <!-- KANAN: VISUAL -->
            <div class="order-1 lg:order-2 relative">
                <!-- FRAME DEKORATIF -->
                <div class="absolute -top-4 -right-4 w-full h-full border-2 border-white/20 rounded-3xl hidden md:block"></div>
                
                <div class="relative group">
                <img
                :src="'/images/foto.jpg'"
                alt="Santri Al-Ma'arif"
                class="rounded-3xl shadow-2xl object-cover w-full h-[500px] lg:h-[600px]"
                />
                    
                    <!-- FLOATING INFO -->
                    <div class="absolute bottom-8 -left-8 bg-white p-6 rounded-2xl shadow-2xl hidden md:flex items-center gap-4 animate-bounce-slow">
                        <div class="w-12 h-12 bg-[#008ecc]/10 rounded-full flex items-center justify-center text-[#008ecc]">
                            <i class="fa-solid fa-users text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium leading-none">Total Santri</p>
                            <p class="text-xl font-bold text-gray-800">1.200+</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- VIDEO YOUTUBE -->
<section class="py-24 px-6 bg-white">
    <div class="max-w-7xl mx-auto">

        <!-- HEADING: Disamakan dengan konsep Berita Terbaru -->
        <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-14 gap-5">
            <div>
                <!-- Badge Multimedia -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#008ecc]/10 text-[#008ecc] text-sm font-bold mb-5">
                    <i class="fa-solid fa-video"></i>
                    Galeri Multimedia
                </div>

                <h2 class="text-4xl md:text-5xl font-black text-gray-800">
                    Video Kegiatan
                </h2>

                <p class="mt-4 text-gray-500 max-w-2xl leading-relaxed">
                    Dokumentasi resmi kegiatan santri, proses pembelajaran, 
                    kajian islami, dan seluruh aktivitas rutin di lingkungan 
                    Pondok Pesantren Al-Ma'arif.
                </p>
            </div>

            
        </div>

        <!-- VIDEO GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
                v-for="video in videos"
                :key="video.id"
                class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300"
            >
                <!-- IFRAME VIDEO -->
                <div class="aspect-video bg-black">
                    <iframe
                        class="w-full h-full"
                        :src="getYoutubeEmbed(video.youtube_url)"
                        title="YouTube video"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>

                <!-- CONTENT -->
                <div class="p-6">
                    <div class="flex items-center gap-2 mb-3 text-red-600">
                        <i class="fa-brands fa-youtube"></i>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-400">YouTube</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 line-clamp-2 leading-snug">
                        {{ video.title }}
                    </h3>
                </div>
            </div>
        </div>

    </div>
</section>
<section class="py-24 px-4 bg-[#fafafa] border-t border-gray-100 antialiased selection:bg-[#008ecc] selection:text-white">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section: Clean & Bold Editorial Style -->
        <div class="mb-16 border-b border-gray-200 pb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-6">
            <div>
                <span class="text-xs font-black uppercase tracking-widest text-[#008ecc] block mb-3">
                    [ INFO PENDAFTARAN ]
                </span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">
                    Prosedur & <br class="hidden md:block">Pertanyaan.
                </h2>
            </div>
            <div class="max-w-md">
                <p class="text-gray-500 text-sm md:text-base font-medium leading-relaxed">
                    Mengisi formulir pendaftaran bersama orang tua/wali dan menyelesaikan administrasi keuangan untuk memulai langkah awal.
                </p>
            </div>
        </div>

        <!-- Main Layout: Bento-inspired Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Kiri: FAQ (Sleek Minimalist Accordion) -->
            <div class="lg:col-span-7 space-y-4">
                <details v-for="(faq, index) in faqs" :key="index" class="group bg-white border border-gray-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-gray-400 dynamic-faq">
                    <summary class="flex items-center justify-between p-6 font-bold text-gray-800 cursor-pointer list-none focus:outline-none select-none">
                        <span class="pr-6 text-base md:text-lg tracking-tight">{{ faq.question }}</span>
                        <!-- Icon Minimalis: Berubah dari + menjadi - saat terbuka -->
                        <div class="relative w-5 h-5 flex items-center justify-center flex-shrink-0 text-gray-400 group-hover:text-gray-900 transition-colors">
                            <span class="absolute w-4 h-0.5 bg-current rounded-full"></span>
                            <span class="absolute h-4 w-0.5 bg-current rounded-full transition-transform duration-300 group-open:rotate-90"></span>
                        </div>
                    </summary>
                    <div class="px-6 pb-6 text-gray-500 text-sm md:text-base leading-relaxed font-medium">
                        {{ faq.answer }}
                    </div>
                </details>
            </div>

            <!-- Kanan: Pusat Unduhan & Kontak (Minimalist Dark Card) -->
            <div class="lg:col-span-5 lg:sticky lg:top-8 space-y-4">
                <div class="bg-gray-900 rounded-3xl p-8 text-white shadow-sm border border-gray-800">
                    
                    <div class="mb-8">
                        <h3 class="text-2xl font-black tracking-tight mb-2">Pusat Unduhan</h3>
                        <p class="text-gray-400 text-xs font-medium">
                            Silakan unduh dokumen resmi di bawah ini untuk informasi yang lebih komprehensif.
                        </p>
                    </div>

                    <!-- List Download (Industrial / Tech Vibe) -->
                    <div class="space-y-3">
                        <a href="/images/BANNER-2-1200x3179.jpg" download class="flex items-center justify-between p-4 bg-gray-800/50 border border-gray-800 rounded-xl hover:bg-white hover:text-gray-900 transition-all duration-200 group">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-10 h-10 rounded-lg bg-gray-800 text-gray-400 flex items-center justify-center text-sm font-mono group-hover:bg-[#008ecc]/10 group-hover:text-[#008ecc] transition-colors">
                                    IMG
                                </div>
                                <div class="truncate">
                                    <h4 class="font-bold text-sm tracking-tight">Poster Alur & Syarat</h4>
                                    <p class="text-[10px] text-gray-400 group-hover:text-gray-500 uppercase font-mono mt-0.5">1.2 MB</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-down-long text-gray-500 group-hover:text-gray-900 transition-colors mr-2"></i>
                        </a>

                        <a href="/documents/brosur-lengkap-al-maarif.pdf" download class="flex items-center justify-between p-4 bg-gray-800/50 border border-gray-800 rounded-xl hover:bg-white hover:text-gray-900 transition-all duration-200 group">
                            <div class="flex items-center gap-4 min-w-0">
                                <div class="w-10 h-10 rounded-lg bg-gray-800 text-gray-400 flex items-center justify-center text-sm font-mono group-hover:bg-red-500/10 group-hover:text-red-500 transition-colors">
                                    PDF
                                </div>
                                <div class="truncate">
                                    <h4 class="font-bold text-sm tracking-tight">Brosur & Rincian Biaya</h4>
                                    <p class="text-[10px] text-gray-400 group-hover:text-gray-500 uppercase font-mono mt-0.5">3.5 MB</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-arrow-down-long text-gray-500 group-hover:text-gray-900 transition-colors mr-2"></i>
                        </a>
                    </div>

                    <!-- Kontak & Lokasi (Clean Border Grid) -->
                    <div class="mt-8 pt-8 border-t border-gray-800 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="block text-[10px] font-black text-[#008ecc] uppercase tracking-widest mb-1">[ WA ]</span>
                                <span class="text-sm font-bold font-mono tracking-tight text-gray-200">0856-0159-5212</span>
                            </div>
                            <div>
                                <span class="block text-[10px] font-black text-[#008ecc] uppercase tracking-widest mb-1">[ TELP ]</span>
                                <span class="text-sm font-bold font-mono tracking-tight text-gray-200">0878-3248-1383</span>
                            </div>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-800/60">
                            <span class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-1.5">LOKASI SEKOLAH</span>
                            <p class="text-xs text-gray-400 font-medium leading-relaxed">
                                Jl. Cikande - Carenang, Km. 03, Desa Songgom Jaya, Kec. Cikande, Banten.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Tambahan CSS Kecil untuk menghilangkan arrow bawaan browser pada tag <summary> -->


<!-- FLOATING ANNOUNCEMENT -->
<!-- FLOAT BUTTON -->
<button
    @click="openAnnouncement = true"
    class="fixed left-4 top-1/2 -translate-y-1/2 z-50
           bg-[#008ecc] hover:bg-[#0077b3]
           text-white shadow-xl
           w-12 h-12 rounded-r-2xl rounded-l-md
           flex items-center justify-center"
>
    <i class="fa-solid fa-bullhorn"></i>
</button>

<!-- OVERLAY -->
<div
    v-if="openAnnouncement"
    @click="openAnnouncement = false"
    class="fixed inset-0 bg-black/40 z-50"
></div>

<!-- PANEL -->
<div
    :class="[
        'fixed top-0 left-0 h-full w-[340px] bg-white z-50 shadow-2xl transition-all duration-300 overflow-y-auto',
        openAnnouncement ? 'translate-x-0' : '-translate-x-full'
    ]"
>

    <!-- HEADER -->
    <div class="p-6 border-b flex items-center justify-between">
        <div>
            <h2 class="text-xl font-black text-gray-800">
                Pengumuman
            </h2>

            <p class="text-sm text-gray-400 mt-1">
                Informasi terbaru pondok
            </p>
        </div>

        <button
            @click="openAnnouncement = false"
            class="w-10 h-10 rounded-xl hover:bg-gray-100"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- CONTENT -->
    <div class="p-5 space-y-4">

        <div
            v-for="item in announcements"
            :key="item.id"
            class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition"
        >

            <!-- DATE -->
            <div
                class="inline-flex items-center gap-2
                       text-xs font-bold text-[#008ecc]
                       bg-[#008ecc]/10 px-3 py-1 rounded-full mb-3"
            >
                <i class="fa-regular fa-calendar"></i>
                {{ item.date }}
            </div>

            <!-- TITLE -->
            <h3 class="font-black text-gray-800 text-lg leading-snug">
                {{ item.title }}
            </h3>

            <!-- CONTENT -->
            <p class="mt-3 text-sm text-gray-500 leading-relaxed">
                {{ item.content }}
            </p>

        </div>

        <!-- EMPTY -->
        <div
            v-if="announcements.length === 0"
            class="text-center py-10 text-gray-400"
        >
            Belum ada pengumuman
        </div>

    </div>

</div>


    </FrontLayout>
</template>