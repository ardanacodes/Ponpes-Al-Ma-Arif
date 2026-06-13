<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue'; 
</script>

<template>
  <FrontLayout>
    <div class="bg-gray-50 min-h-screen">
      <!-- Hero Section -->
      <section class="relative overflow-hidden pt-40 pb-20 bg-[#008ecc]">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-black/5 -skew-x-12 translate-x-24"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
          <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-1.5 rounded-full text-white text-xs font-bold tracking-widest uppercase mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            Semboyan Utama
          </div>
          <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4">Moto Pondok</h1>
          <p class="text-blue-100 text-base max-w-2xl mx-auto">
            Empat landasan utama pembentukan karakter bagi seluruh elemen di dalam pondok pesantren.
          </p>
        </div>
      </section>

      <!-- Content Section -->
      <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Moto 1 - Berbudi Tinggi (Rose Theme) -->
            <div class="p-6 border border-gray-100 bg-white hover:border-rose-200 hover:shadow-lg hover:shadow-rose-50/50 rounded-xl transition duration-300 group">
              <div class="w-12 h-12 bg-gradient-to-tr from-rose-50 to-pink-50 text-rose-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-rose-500 group-hover:text-white transition duration-300 shadow-sm border border-rose-100">
                <!-- Icon Akhlak: Sparkle Medal -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">1. Berbudi Tinggi</h3>
              <p class="text-gray-600 text-sm leading-relaxed">Menjadikan akhlakul karimah sebagai landasan utama dan paling tinggi dalam bertingkah laku sehari-hari.</p>
            </div>

            <!-- Moto 2 - Berbadan Sehat (Emerald Theme) -->
            <div class="p-6 border border-gray-100 bg-white hover:border-emerald-200 hover:shadow-lg hover:shadow-emerald-50/50 rounded-xl transition duration-300 group">
              <div class="w-12 h-12 bg-gradient-to-tr from-emerald-50 to-teal-50 text-emerald-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-emerald-500 group-hover:text-white transition duration-300 shadow-sm border border-emerald-100">
                <!-- Icon Sehat: Medical Activity / Pulse Badge -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.871 4A17.926 17.926 0 003 12c0 5.18 2.197 9.853 5.714 13.143L12 21l3.286 4.143A17.926 17.926 0 0021 12c0-2.793-.636-5.437-1.772-7.804M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">2. Berbadan Sehat</h3>
              <p class="text-gray-600 text-sm leading-relaxed">Menjaga kesehatan fisik dan jasmani agar senantiasa optimal dalam beribadah, belajar, serta mengabdi.</p>
            </div>

            <!-- Moto 3 - Berpengetahuan Luas (Indigo Theme) -->
            <div class="p-6 border border-gray-100 bg-white hover:border-indigo-200 hover:shadow-lg hover:shadow-indigo-50/50 rounded-xl transition duration-300 group">
              <div class="w-12 h-12 bg-gradient-to-tr from-indigo-50 to-blue-50 text-indigo-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-indigo-500 group-hover:text-white transition duration-300 shadow-sm border border-indigo-100">
                <!-- Icon Ilmu: Global Academic / Certificate Open -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 12H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">3. Berpengetahuan Luas</h3>
              <p class="text-gray-600 text-sm leading-relaxed">Terbuka terhadap wawasan keilmuan baru, menyeimbangkan ilmu agama (tafaqquh fiddin) dan sains modern.</p>
            </div>

            <!-- Moto 4 - Berpikiran Bebas (Amber Theme) -->
            <div class="p-6 border border-gray-100 bg-white hover:border-amber-200 hover:shadow-lg hover:shadow-amber-50/50 rounded-xl transition duration-300 group">
              <div class="w-12 h-12 bg-gradient-to-tr from-amber-50 to-yellow-50 text-amber-500 rounded-xl flex items-center justify-center mb-4 group-hover:bg-amber-500 group-hover:text-white transition duration-300 shadow-sm border border-amber-100">
                <!-- Icon Kritis: Key/Unlock Idea -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">4. Berpikiran Bebas</h3>
              <p class="text-gray-600 text-sm leading-relaxed">Mampu berpikir kritis, merdeka dari belenggu taklid buta, obyektif, serta bijak melihat dinamika zaman.</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </FrontLayout>
</template>