<script setup>
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const page = usePage()
const isActive = (url) => computed(() => page.url.startsWith(url)).value

const mediaOpen = ref(false)
const sidebarOpen = ref(false)

const logout = () => {
    router.post(route('logout'))
}
</script>

<template>
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 h-16 bg-white border-b border-gray-100 dark:bg-[#111827] dark:border-white/10 flex items-center justify-between px-4 shadow-sm">
        <h1 class="text-base font-bold text-[#2C5EAD] dark:text-white">Admin Sekolah</h1>
        <button @click="sidebarOpen = true" class="w-10 h-10 rounded-xl bg-[#1591DC] text-white flex items-center justify-center">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <transition name="fade">
        <div v-if="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/40 z-40 lg:hidden"></div>
    </transition>

    <aside :class="['fixed top-0 left-0 z-50 w-64 h-screen bg-white border-r border-gray-100 dark:bg-[#111827] dark:border-white/10 flex flex-col justify-between shadow-sm transition-all duration-300', sidebarOpen ? 'translate-x-0' : '-translate-x-full', 'lg:translate-x-0']">
        <div>
            <div class="p-6 border-b border-gray-100 dark:border-white/10 relative text-center">
                <h1 class="text-base font-bold text-[#2C5EAD] dark:text-white tracking-tight">Sekolah APP</h1>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Management Panel</p>
                <button @click="sidebarOpen = false" class="lg:hidden absolute right-4 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg hover:bg-gray-100 dark:hover:bg-white/10 flex items-center justify-center">
                    <i class="fa-solid fa-xmark text-gray-600 dark:text-white"></i>
                </button>
            </div>

            <nav class="p-4 space-y-1 overflow-y-auto max-h-[calc(100vh-160px)] custom-scrollbar">
                
                <p class="sidebar-title">Utama</p>
                <Link :href="route('admin.dashboard')" :class="['sidebar-link', route().current('admin/dashboard') ? 'active' : '']">
                    <i class="fa-solid fa-house text-sm"></i> <span>Dashboard</span>
                </Link>
                <Link href="/admin/news" :class="['sidebar-link', isActive('/admin/news') ? 'active' : '']">
                    <i class="fa-solid fa-newspaper text-sm"></i> <span>Berita</span>
                </Link>
                <Link href="/admin/ppdb" :class="['sidebar-link', isActive('/admin/ppdb') ? 'active' : '']">
                    <i class="fa-solid fa-user-graduate text-sm"></i> <span>PPDB</span>
                </Link>

                <div class="pt-5">
                    <p class="sidebar-title">Media & Galeri</p>
                    <button @click="mediaOpen = !mediaOpen" class="dropdown-btn">
                        <div class="flex items-center gap-3"><i class="fa-solid fa-photo-film text-sm"></i> <span>Kelola Media</span></div>
                        <i class="fa-solid fa-chevron-down text-xs transition duration-300" :class="mediaOpen ? 'rotate-180' : ''"></i>
                    </button>
                    <transition name="dropdown">
                        <div v-show="mediaOpen" class="mt-2 ml-3 space-y-1 border-l border-gray-200 dark:border-white/10 pl-3">
                            <Link href="/admin/gallery" :class="['sidebar-link child-link', isActive('/admin/gallery') ? 'active' : '']"><i class="fa-solid fa-image text-sm"></i> <span>Foto Gallery</span></Link>
                            <Link href="/admin/videos" :class="['sidebar-link child-link', isActive('/admin/videos') ? 'active' : '']"><i class="fa-brands fa-youtube text-sm"></i> <span>Video Konten</span></Link>
                            <Link href="/admin/comments" :class="['sidebar-link child-link', isActive('/admin/comments') ? 'active' : '']"><i class="fa-regular fa-comments text-sm"></i> <span>Komentar Berita</span></Link>
                        </div>
                    </transition>
                </div>

                <div class="pt-5">
                    <p class="sidebar-title">Profile Sekolah</p>
                    <Link href="/admin/extracurriculars" :class="['sidebar-link', isActive('/admin/extracurriculars') ? 'active' : '']">
                        <i class="fa-solid fa-trophy text-sm"></i> <span>Ekstrakurikuler</span>
                    </Link>
                    <Link href="/admin/facilities" :class="['sidebar-link', isActive('/admin/facilities') ? 'active' : '']">
                        <i class="fa-solid fa-building text-sm"></i> <span>Fasilitas</span>
                    </Link>
                    <Link href="/admin/announcements" :class="['sidebar-link', isActive('/admin/announcements') ? 'active' : '']">
                        <i class="fa-solid fa-bullhorn text-sm"></i> <span>Pengumuman</span>
                    </Link>
                </div>

                <div class="pt-5">
                    <p class="sidebar-title">Akademik</p>
                    
                    <Link :href="route('teaching-schedules.index')" :class="['sidebar-link', route().current('teaching-schedules.*') ? 'active' : '']">
                        <i class="fa-solid fa-calendar-days text-sm"></i> <span>Jadwal Mengajar</span>
                    </Link>
                    
                    <Link href="/admin/students" :class="['sidebar-link', isActive('/admin/students') ? 'active' : '']">
                        <i class="fa-solid fa-users text-sm"></i> <span>Data Siswa</span>
                    </Link>
                
                </div>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-100 bg-gray-50/50 dark:border-white/10 dark:bg-white/5">
            <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-gray-600 dark:bg-[#1E293B] dark:text-gray-200 dark:border-white/10 text-sm font-semibold hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition-all duration-200 shadow-sm">
                <i class="fa-solid fa-right-from-bracket text-xs"></i> <span>Keluar Aplikasi</span>
            </button>
        </div>
    </aside>
</template>

<style scoped>
.sidebar-title {
    @apply px-3 mb-2 text-[10px] font-bold uppercase tracking-widest
        text-gray-400/80
        dark:text-gray-500;
}

.sidebar-link {
    @apply flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl
        text-gray-500 dark:text-gray-300
        font-medium text-sm
        hover:bg-[#C4E2F5]/30 hover:text-[#1591DC]
        dark:hover:bg-white/5 dark:hover:text-white
        transition-all duration-200;
}

.sidebar-link.active {
    @apply bg-[#C4E2F5]/50 text-[#2C5EAD]
        dark:bg-white/10 dark:text-white
        font-bold shadow-sm;
}

.sidebar-link.active i {
    @apply text-[#1591DC];
}

.dropdown-btn {
    @apply w-full flex items-center justify-between
        px-3.5 py-2.5 rounded-xl
        text-gray-500 dark:text-gray-300
        font-medium text-sm
        hover:bg-[#C4E2F5]/30 hover:text-[#1591DC]
        dark:hover:bg-white/5 dark:hover:text-white
        transition-all duration-200;
}

.child-link {
    @apply text-[13px];
}

/* SCROLLBAR */
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.08);
    border-radius: 10px;
}

/* FADE */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* DROPDOWN */
.dropdown-enter-active,
.dropdown-leave-active {
    transition: all 0.25s ease;
    overflow: hidden;
}

.dropdown-enter-from,
.dropdown-leave-to {
    opacity: 0;
    transform: translateY(-5px);
}
</style>