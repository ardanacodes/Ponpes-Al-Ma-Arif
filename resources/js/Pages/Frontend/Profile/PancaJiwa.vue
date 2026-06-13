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
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            Ruh Perjuangan
          </div>
          <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4">Panca Jiwa Pondok</h1>
          <p class="text-blue-100 text-base max-w-2xl mx-auto">
            Lima nilai murni dasar keikhlasan yang mengalir sebagai falsafah hidup santri.
          </p>
        </div>
      </section>

      <!-- Content Section -->
      <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
          <div class="space-y-2">
            
            <!-- Jiwa 1 - Keikhlasan (Sky Blue Theme) -->
            <div class="flex gap-5 p-5 hover:bg-sky-50/50 rounded-2xl transition duration-200 group">
              <div class="p-3 bg-gradient-to-tr from-sky-50 to-blue-50 text-sky-500 border border-sky-100 group-hover:bg-sky-500 group-hover:text-white group-hover:border-sky-500 rounded-xl shrink-0 h-12 w-12 flex items-center justify-center font-bold text-lg transition duration-300 shadow-sm">
                <!-- Icon Keikhlasan: Open Gift/Heart Bloom -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
              </div>
              <div>
                <h4 class="text-xl font-bold text-gray-800">01. Keikhlasan</h4>
                <p class="text-gray-600 text-sm mt-1.5 leading-relaxed">Segala gerak dan amal perbuatan diniatkan semata-mata mengharap ridha Allah SWT, sepi dari pamrih keuntungan duniawi atau pujian makhluk.</p>
              </div>
            </div>

            <!-- Jiwa 2 - Kesederhanaan (Teal Theme) -->
            <div class="flex gap-5 p-5 hover:bg-teal-50/50 rounded-2xl transition duration-200 group">
              <div class="p-3 bg-gradient-to-tr from-teal-50 to-emerald-50 text-teal-600 border border-teal-100 group-hover:bg-teal-500 group-hover:text-white group-hover:border-teal-500 rounded-xl shrink-0 h-12 w-12 flex items-center justify-center font-bold text-lg transition duration-300 shadow-sm">
                <!-- Icon Kesederhanaan: Infinite Balance / Sprout -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
              </div>
              <div>
                <h4 class="text-xl font-bold text-gray-800">02. Kesederhanaan</h4>
                <p class="text-gray-600 text-sm mt-1.5 leading-relaxed">Bukan berarti pasrah atau miskin, melainkan pola hidup yang wajar, bersahaja, melatih ketangguhan mental, dan tinggi rasa kesyukurannya.</p>
              </div>
            </div>

            <!-- Jiwa 3 - Berdikari (Orange Theme) -->
            <div class="flex gap-5 p-5 hover:bg-orange-50/50 rounded-2xl transition duration-200 group">
              <div class="p-3 bg-gradient-to-tr from-orange-50 to-amber-50 text-orange-600 border border-orange-100 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 rounded-xl shrink-0 h-12 w-12 flex items-center justify-center font-bold text-lg transition duration-300 shadow-sm">
                <!-- Icon Berdikari: Anchor / Independent Stand -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <div>
                <h4 class="text-xl font-bold text-gray-800">03. Berdikari (Self-Help)</h4>
                <p class="text-gray-600 text-sm mt-1.5 leading-relaxed">Jiwa kemandirian yang kuat. Kemampuan mengurus diri sendiri dan tidak menggantungkan nasib atau urusannya pada belas kasihan orang lain.</p>
              </div>
            </div>

            <!-- Jiwa 4 - Ukhuwah Islamiyah (Purple Theme) -->
            <div class="flex gap-5 p-5 hover:bg-purple-50/50 rounded-2xl transition duration-200 group">
              <div class="p-3 bg-gradient-to-tr from-purple-50 to-indigo-50 text-purple-600 border border-purple-100 group-hover:bg-purple-500 group-hover:text-white group-hover:border-purple-500 rounded-xl shrink-0 h-12 w-12 flex items-center justify-center font-bold text-lg transition duration-300 shadow-sm">
                <!-- Icon Ukhuwah: Interconnected Users / Unity Loop -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </div>
              <div>
                <h4 class="text-xl font-bold text-gray-800">04. Ukhuwah Islamiyah</h4>
                <p class="text-gray-600 text-sm mt-1.5 leading-relaxed">Ikatan persaudaraan islami yang erat. Meleburkan sekat perbedaan daerah, suku, dan warna kulit menjadi satu rasa di dalam ukhuwah.</p>
              </div>
            </div>

            <!-- Jiwa 5 - Kebebasan (Fuchsia Theme) -->
            <div class="flex gap-5 p-5 hover:bg-fuchsia-50/50 rounded-2xl transition duration-200 group">
              <div class="p-3 bg-gradient-to-tr from-fuchsia-50 to-pink-50 text-fuchsia-600 border border-fuchsia-100 group-hover:bg-fuchsia-500 group-hover:text-white group-hover:border-fuchsia-500 rounded-xl shrink-0 h-12 w-12 flex items-center justify-center font-bold text-lg transition duration-300 shadow-sm">
                <!-- Icon Kebebasan: Paper Airplane / Soaring Bird Spirit -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
              </div>
              <div>
                <h4 class="text-xl font-bold text-gray-800">05. Kebebasan</h4>
                <p class="text-gray-600 text-sm mt-1.5 leading-relaxed">Bebas dalam berpikir, bebas menentukan masa depan, dan bebas berkarya, dengan catatan selalu berdiri di atas koridor nilai dan syariat Islam.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </FrontLayout>
</template>