<script setup>
import { onMounted, ref } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const toggleDark = () => {
    const html = document.documentElement

    html.classList.toggle('dark')

    localStorage.theme =
        html.classList.contains('dark')
            ? 'dark'
            : 'light'
}

onMounted(() => {
    if (localStorage.theme === 'dark') {
        document.documentElement.classList.add('dark')
    }
})

const openNotification = () => {
    alert('Notifikasi dibuka')
}

const openMessage = () => {
    alert('Pesan dibuka')
}

const notificationOpen = ref(false)
</script>

<template>

<div class="relative">

  <div
    class="absolute top-0 left-0 right-0 h-36
           bg-gradient-to-r
           from-[#2C5EAD]
           via-[#2176C9]
           to-[#1591DC]

           dark:from-[#0F172A]
           dark:via-[#111827]
           dark:to-[#1E293B]

           rounded-b-[40px]
           shadow-2xl shadow-[#2C5EAD]/20
           z-0"
></div>

    <!-- HEADER -->
    <header
        class="relative z-20 h-16 flex items-center justify-between px-4 lg:px-8"
    >

        <!-- LEFT -->
        <div class="flex items-center gap-3">

            <!-- MOBILE BUTTON -->
            <button
                @click="$emit('toggleSidebar')"
                class="lg:hidden w-10 h-10 rounded-xl
                       bg-white/15 backdrop-blur-md
                       text-white flex items-center justify-center
                       border border-white/10
                       hover:bg-white/20
                       transition-all"
            >
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- TITLE -->
            <div>
                <h2 class="text-lg font-black text-white">
                    Admin Sekolah
                </h2>

                <p class="hidden sm:block text-xs text-[#C4E2F5]">
                    Welcome back, Administrator
                </p>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-2 lg:gap-4 relative z-30">

            <!-- SEARCH -->
            <div class="hidden md:flex items-center relative">

                <i
                    class="fa-solid fa-magnifying-glass absolute left-4 text-white/60 text-sm"
                ></i>

                <input
                    type="text"
                    placeholder="Cari menu..."
                    class="w-64 pl-11 pr-4 py-2.5
                           rounded-2xl
                           bg-white/10
                            text-white

                            dark:bg-white/5
                            dark:border-white/5
                           backdrop-blur-md
                           border border-white/10
                           placeholder:text-white/60
                          
                           focus:border-white/20
                           focus:ring-4
                           focus:ring-white/10
                           outline-none
                           text-sm"
                />

            </div>

            <!-- DARK MODE -->
            <button
                @click="toggleDark"
                class="w-10 h-10 rounded-2xl
       bg-white/10
       dark:bg-white/5
       backdrop-blur-md
       border border-white/10
       text-white
       hover:bg-white/20
       flex items-center justify-center"
            >
                <i class="fa-solid fa-moon text-sm"></i>
            </button>

            <!-- NOTIFICATION -->
            <!-- NOTIFICATION -->
<div class="relative">

    <button
        @click="notificationOpen = !notificationOpen"
        class="relative w-10 h-10 rounded-2xl
               bg-white/10
               backdrop-blur-md
               border border-white/10
               text-white
               hover:bg-white/20
               flex items-center justify-center"
    >

        <i class="fa-regular fa-bell text-sm"></i>

        <!-- BADGE -->
        <span
            v-if="$page.props.notifications.pending_comments_count > 0"
            class="absolute -top-1 -right-1
                   min-w-[18px] h-[18px]
                   px-1 rounded-full
                   bg-red-500 text-white
                   text-[10px] font-black
                   flex items-center justify-center"
        >
            {{ $page.props.notifications.pending_comments_count }}
        </span>

    </button>

    <!-- DROPDOWN -->
    <transition name="fade">

        <div
            v-if="notificationOpen"
            class="absolute right-0 mt-3 w-[340px]
                   bg-white dark:bg-[#111827]
                   border border-gray-100
                   dark:border-white/10
                   shadow-2xl z-50 overflow-hidden"
        >

            <!-- HEADER -->
            <div
                class="px-4 py-3 border-b border-gray-100
                       dark:border-white/10"
            >

                <h3
                    class="font-bold text-gray-800 dark:text-white"
                >
                    Notifikasi Komentar
                </h3>

            </div>

            <!-- LIST -->
            <div
                v-if="$page.props.notifications.latest_comments.length > 0"
                class="max-h-[350px] overflow-y-auto"
            >

                <a
                    v-for="item in $page.props.notifications.latest_comments"
                    :key="item.id"
                    href="/admin/comments"
                    class="block px-4 py-4
                           border-b border-gray-100
                           dark:border-white/10
                           hover:bg-gray-50
                           dark:hover:bg-white/5
                           transition"
                >

                    <div
                        class="flex items-start gap-3"
                    >

                        <!-- ICON -->
                        <div
                            class="w-10 h-10
                                   bg-yellow-100
                                   text-yellow-700
                                   flex items-center justify-center
                                   flex-shrink-0"
                        >
                            <i class="fa-regular fa-comments"></i>
                        </div>

                        <div class="flex-1">

                            <h4
                                class="font-semibold text-sm
                                       text-gray-800 dark:text-white"
                            >
                                {{ item.name }}
                            </h4>

                            <p
                                class="text-xs text-gray-500
                                       dark:text-gray-400 mt-1
                                       line-clamp-2"
                            >
                                mengomentari:
                                {{ item.news.title }}
                            </p>

                        </div>

                    </div>

                </a>

            </div>

            <!-- EMPTY -->
            <div
                v-else
                class="py-10 text-center"
            >

                <i
                    class="fa-regular fa-bell
                           text-3xl text-gray-300"
                ></i>

                <p
                    class="text-sm text-gray-400 mt-3"
                >
                    Belum ada notifikasi
                </p>

            </div>

            <!-- FOOTER -->
            <div
                class="p-3 bg-gray-50
                       dark:bg-white/5"
            >

                <a
                    href="/admin/comments"
                    class="block text-center text-sm
                           font-bold text-[#1591DC]"
                >
                    Lihat Semua Komentar
                </a>

            </div>

        </div>

    </transition>

</div>

            <!-- MESSAGE -->
            <button
                @click="openMessage"
                class="hidden sm:flex relative
                       w-10 h-10 rounded-2xl
                       bg-white/10
                       backdrop-blur-md
                       border border-white/10
                       text-white
                       hover:bg-white/20
                       items-center justify-center"
            >

                <i class="fa-regular fa-envelope text-sm"></i>

                <span
                    class="absolute top-2 right-2
                           min-w-[18px] h-[18px]
                           px-1 rounded-full
                           bg-white text-[#1591DC]
                           text-[10px] font-black
                           flex items-center justify-center"
                >
                    3
                </span>

            </button>

            <!-- PROFILE -->
            <div
                class="flex items-center gap-3
                       pl-2 lg:pl-4
                       border-l border-white/10"
            >

                <!-- TEXT -->
                <div class="hidden sm:block text-right">

                    <p class="text-sm font-bold text-white">
                        Administrator
                    </p>

                    <p class="text-[11px] text-[#C4E2F5]">
                        Super Admin
                    </p>

                </div>

                <!-- AVATAR -->
                <div class="relative">

                    <div
                        class="w-11 h-11 rounded-2xl
                               bg-white text-[#2C5EAD]
                               flex items-center justify-center
                               font-black text-sm"
                    >
                        A
                    </div>

                    <span
                        class="absolute bottom-0 right-0
                               w-3 h-3
                               bg-emerald-400
                               border-2 border-[#1591DC]
                               rounded-full dynamic-pulse"
                    ></span>

                </div>

            </div>

        </div>

    </header>

</div>

</template>

<style scoped>
@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }

    50% {
        transform: scale(1.15);
        opacity: 0.8;
    }
}

.dynamic-pulse {
    animation: pulse 2s infinite ease-in-out;
}
</style>