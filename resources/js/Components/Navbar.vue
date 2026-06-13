<template>
  <nav
    :class="[
      'fixed top-0 left-0 w-full z-50 transition-all duration-500',
      isScrolled
        ? 'bg-white/95 backdrop-blur-xl border-b border-gray-200 shadow-md'
        : 'bg-transparent'
    ]"
  >
    <div class="container mx-auto px-4 md:px-6 py-2 flex items-center justify-between">

      <!-- Logo -->
    <img
      :src="'/images/logo.png'"
      alt="Logo"
      class="h-14 sm:h-16 md:h-20 w-auto object-contain transition-transform duration-300 group-hover:scale-105"
    />
      

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-6">

        <a href="/" class="nav-link">Home</a>

        <!-- Dropdown Profile -->
        <div class="relative group">
          <button class="nav-link flex items-center gap-1">
            Profile
            <svg
              class="w-3.5 h-3.5 group-hover:rotate-180 transition-transform"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div
            class="absolute left-1/2 -translate-x-1/2 top-full pt-5
                   opacity-0 invisible group-hover:opacity-100 group-hover:visible
                   transition-all duration-300 translate-y-2 group-hover:translate-y-0"
          >
            <div class="w-72 bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl border p-3">
              <div class="flex flex-col gap-1">
                <a v-for="item in profiles" :key="item" :href="item.link" class="dropdown-item">
                  {{ item.name }}
                </a>
              </div>
            </div>
          </div>
        </div>

        <a href="/news" class="nav-link">News</a>
        <a href="/gallery" class="nav-link">Gallery</a>

        <a
          href="/ppdb"
          class="ml-2 px-5 py-2.5 rounded-full bg-[#8cc63f] text-white font-bold text-sm
                 hover:bg-[#7bb335] transition shadow-md"
        >
          Pendaftaran Santri
        </a>
      </div>

      <!-- Mobile Button -->
      <button @click="mobileMenu = !mobileMenu" class="md:hidden">
        <svg
          class="w-7 h-7 transition-colors"
          :class="isScrolled ? 'text-gray-700' : 'text-white'"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <transition name="fade">
      <div v-if="mobileMenu" class="md:hidden absolute top-full left-0 w-full px-4 py-3">
        <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl border p-4 flex flex-col gap-1">

          <a href="/" class="mobile-link">Home</a>

          <!-- Profile Accordion -->
          <div>
        <button
  @click="profileOpen = !profileOpen"
  class="mobile-link w-full flex justify-start gap-2"
>
  <span>Profile</span>

  <span
    :class="profileOpen ? 'rotate-180' : ''"
    class="transition-transform"
  >
    ⌄
  </span>
</button>

            <transition name="expand">
<div v-if="profileOpen" class="mt-2 flex flex-col gap-2">                <a
                  v-for="item in profiles"
                  :key="item"
                  :href="item.link"
                  class="mobile-sub-link"
                >
                  {{ item.name }}
                </a>
              </div>
            </transition>
          </div>

          <a href="/news" class="mobile-link">News</a>
          <a href="/gallery" class="mobile-link">Gallery</a>

          <a
            href="/ppdb"
            class="mt-3 text-center bg-[#8cc63f] hover:bg-[#7bb335] text-white font-bold py-3 rounded-xl shadow"
          >
            Pendaftaran Santri
          </a>
        </div>
      </div>
    </transition>
  </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const isScrolled = ref(false)
const mobileMenu = ref(false)
const profileOpen = ref(false)

const profiles = [
  { name: 'Sejarah', link: '/profile/sejarah' },
  { name: 'Visi Misi', link: '/profile/visi-misi' },
  { name: 'Fasilitas', link: '/profile/fasilitas' },
  { name: 'Ekstrakurikuler', link: '/profile/ekstrakurikuler' },
  { name: 'Motto Pondok', link: '/profile/motto' },
  { name: 'Panca Jiwa', link: '/profile/panca-jiwa' }
]

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50
}

onMounted(() => window.addEventListener('scroll', handleScroll))
onUnmounted(() => window.removeEventListener('scroll', handleScroll))
</script>

<style scoped>
.nav-link {
  @apply text-gray-700 font-semibold hover:text-green-600 transition;
}

.dropdown-item {
  @apply px-3 py-2 text-sm rounded-lg hover:bg-green-50 hover:text-green-700 transition;
}

.mobile-link {
  @apply px-4 py-3 font-bold text-sm uppercase text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-700 transition;
}

.mobile-sub-link {
  @apply text-sm text-gray-600 px-3 py-2 rounded-lg bg-white border hover:bg-green-50 hover:text-green-700 transition;
}

/* Animations */
.fade-enter-active,
.fade-leave-active {
  transition: all 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-10px);
}

.expand-enter-active,
.expand-leave-active {
  transition: all 0.3s ease;
  overflow: hidden;
}
.expand-enter-from,
.expand-leave-to {
  opacity: 0;
  max-height: 0;
}
</style>