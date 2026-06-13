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
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-yellow-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Visi & Misi
          </div>
          <h1 class="text-4xl font-extrabold text-white tracking-tight mb-4">Visi & Misi Pondok</h1>
          <p class="text-blue-100 text-base max-w-2xl mx-auto">
            Arah melangkah dan komitmen utama Pondok Pesantren dalam mencetak generasi masa depan.
          </p>
        </div>
      </section>

      <!-- Content Section -->
      <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 space-y-10">
          
          <!-- Visi Box -->
          <div class="border-b border-gray-100 pb-8">
            <div class="flex items-center gap-3 mb-4">
              <div class="p-3 bg-gradient-to-tr from-amber-50 to-orange-50 text-amber-500 rounded-xl border border-amber-100 shadow-sm">
                <!-- Icon Visi: Modern Compass/Target -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11a13.917 13.917 0 00-2.338-7.443l-.054-.09M12 11c0-3.517 1.009-6.799 2.753-9.571m3.44 2.04l-.054.09A13.916 13.916 0 0015 11a13.916 13.916 0 002.338 7.443l.054.09M12 11a1 1 0 110-2 1 1 0 010 2c0 .552-.448 1-1 1s-1-.448-1-1 1-1 1-1" />
                  <circle cx="12" cy="11" r="8" stroke-dasharray="3 3"/>
                </svg>
              </div>
              <h2 class="text-2xl font-bold text-gray-800">Visi Utama</h2>
            </div>
            <p class="text-gray-600 leading-relaxed text-lg italic bg-slate-50 p-6 rounded-xl border-l-4 border-l-[#008ecc]">
              "Menjadi lembaga pendidikan Islam terkemuka dalam mencetak generasi bertauhid, berakhlak mulia, dan unggul dalam iptek."
            </p>
          </div>

          <!-- Misi Box -->
          <div>
            <div class="flex items-center gap-3 mb-6">
              <div class="p-3 bg-gradient-to-tr from-emerald-50 to-teal-50 text-emerald-500 rounded-xl border border-emerald-100 shadow-sm">
                <!-- Icon Misi: Map/Milestones -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 4L9 7" />
                </svg>
              </div>
              <h2 class="text-2xl font-bold text-gray-800">Misi Pondok</h2>
            </div>
            <ul class="space-y-4">
              <li class="flex items-start gap-4 p-4 hover:bg-slate-50/80 rounded-xl transition">
                <span class="bg-[#008ecc] text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0 mt-0.5 shadow-md shadow-blue-200">1</span>
                <span class="text-gray-600 leading-relaxed">Menyelenggarakan pendidikan pesantren yang berbasis pada manhaj Ahlussunnah wal Jama'ah.</span>
              </li>
              <li class="flex items-start gap-4 p-4 hover:bg-slate-50/80 rounded-xl transition">
                <span class="bg-[#008ecc] text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0 mt-0.5 shadow-md shadow-blue-200">2</span>
                <span class="text-gray-600 leading-relaxed">Membentuk karakter santri yang mandiri, disiplin, dan berjiwa khidmat kepada masyarakat.</span>
              </li>
              <li class="flex items-start gap-4 p-4 hover:bg-slate-50/80 rounded-xl transition">
                <span class="bg-[#008ecc] text-white w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0 mt-0.5 shadow-md shadow-blue-200">3</span>
                <span class="text-gray-600 leading-relaxed">Mengembangkan potensi akademik dan non-akademik santri sesuai perkembangan zaman.</span>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </FrontLayout>
</template>