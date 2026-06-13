```vue
<script setup>
import FrontLayout from '@/Layouts/FrontLayout.vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const props = defineProps({
    news: Object,
    otherNews: Array
})

/*
|--------------------------------------------------------------------------
| SHARE
|--------------------------------------------------------------------------
*/
const shareTo = (platform) => {
    const url = window.location.href
    const text = `Baca berita terbaru: ${props.news.title}`

    let shareUrl = ''

    if (platform === 'whatsapp') {
        shareUrl =
            `https://api.whatsapp.com/send?text=${
                encodeURIComponent(text + ' ' + url)
            }`
    }

    else if (platform === 'facebook') {
        shareUrl =
            `https://www.facebook.com/sharer/sharer.php?u=${
                encodeURIComponent(url)
            }`
    }

    window.open(shareUrl, '_blank')
}

/*
|--------------------------------------------------------------------------
| COPY LINK
|--------------------------------------------------------------------------
*/
const copyLink = () => {
    navigator.clipboard.writeText(window.location.href)

    alert('Link berhasil disalin!')
}
</script>

<template>
    <FrontLayout>

        <!-- SUCCESS ALERT -->
        <transition name="fade">

            <div
                v-if="$page.props.flash.success"
                class="fixed top-6 right-6 z-[9999]
                       bg-green-600 text-white
                       px-6 py-4 shadow-2xl
                       flex items-start gap-3
                       max-w-md"
            >

                <div class="text-xl">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <div>

                    <h3 class="font-bold">
                        Berhasil
                    </h3>

                    <p
                        class="text-sm text-white/90
                               mt-1 leading-relaxed"
                    >
                        {{ $page.props.flash.success }}
                    </p>

                </div>

            </div>

        </transition>

        <!-- HERO -->
        <section
            class="relative h-[400px] md:h-[500px] overflow-hidden"
        >

            <img
                :src="
                    news.thumbnail
                        ? '/storage/' + news.thumbnail
                        : 'https://placehold.co/1600x900'
                "
                class="w-full h-full object-cover"
            />

            <div class="absolute inset-0 bg-black/60"></div>

            <div class="absolute inset-0 flex items-center">

                <div class="max-w-7xl mx-auto px-6 w-full">

                    <div
                        class="inline-flex items-center gap-2
                               px-4 py-2 rounded-full
                               bg-white/20 backdrop-blur
                               text-white text-sm font-bold mb-6"
                    >
                        📰 Berita Sekolah
                    </div>

                    <h1
                        class="text-3xl md:text-5xl
                               font-black text-white
                               leading-tight max-w-4xl"
                    >
                        {{ news.title }}
                    </h1>

                </div>

            </div>

        </section>

        <!-- CONTENT -->
        <section class="py-12 md:py-20 bg-gray-50">

            <div class="max-w-7xl mx-auto px-6">

                <!-- BACK -->
                <a
                    href="/#news"
                    class="inline-flex items-center gap-2
                           text-green-700 font-bold
                           hover:gap-3 transition-all mb-8"
                >
                    ← Kembali ke berita
                </a>

                <div
                    class="grid grid-cols-1 lg:grid-cols-12
                           gap-12 items-start"
                >

                    <!-- MAIN -->
                    <main
                        class="lg:col-span-8 space-y-8"
                    >

                        <!-- ARTICLE -->
                        <div
                            class="bg-white p-6 md:p-10
                                   rounded-2xl border
                                   border-gray-100 shadow-sm"
                        >

                            <article
                                class="prose prose-lg max-w-none
                                       prose-headings:font-black
                                       prose-img:rounded-2xl
                                       prose-p:text-gray-600 mb-10"
                            >

                                <div
                                    class="text-gray-700 leading-relaxed
                                           text-base md:text-lg
                                           whitespace-pre-line"
                                >
                                    {{ news.content }}
                                </div>

                            </article>

                            <!-- SHARE -->
                            <div
                                class="pt-8 border-t border-gray-100"
                            >

                                <p
                                    class="text-sm font-bold
                                           text-gray-400 uppercase
                                           tracking-widest mb-4"
                                >
                                    Bagikan Berita Ini:
                                </p>

                                <div class="flex flex-wrap gap-3">

                                    <!-- WA -->
                                    <button
                                        @click="shareTo('whatsapp')"
                                        class="inline-flex items-center gap-2
                                               px-5 py-2.5
                                               bg-[#25D366] text-white
                                               rounded-xl font-bold text-sm
                                               hover:scale-105
                                               transition-transform"
                                    >
                                        <i
                                            class="fa-brands fa-whatsapp text-lg"
                                        ></i>

                                        WhatsApp
                                    </button>

                                    <!-- FB -->
                                    <button
                                        @click="shareTo('facebook')"
                                        class="inline-flex items-center gap-2
                                               px-5 py-2.5
                                               bg-[#1877F2] text-white
                                               rounded-xl font-bold text-sm
                                               hover:scale-105
                                               transition-transform"
                                    >
                                        <i
                                            class="fa-brands fa-facebook text-lg"
                                        ></i>

                                        Facebook
                                    </button>

                                    <!-- COPY -->
                                    <button
                                        @click="copyLink"
                                        class="inline-flex items-center gap-2
                                               px-5 py-2.5
                                               bg-gray-100 text-gray-700
                                               rounded-xl font-bold text-sm
                                               hover:bg-gray-200
                                               transition-colors"
                                    >
                                        <i
                                            class="fa-solid fa-link text-sm"
                                        ></i>

                                        Salin Link
                                    </button>

                                </div>

                            </div>


                             <div
                            class="bg-white p-6 md:p-8
                                   rounded-2xl border
                                   border-gray-100 shadow-sm"
                        >

                            <h2
                                class="text-2xl font-black
                                       text-gray-800 mb-2"
                            >
                                Tinggalkan Komentar
                            </h2>

                            <p
                                class="text-gray-500 text-sm mb-6"
                            >
                                Komentar akan ditinjau terlebih dahulu
                                oleh admin sebelum ditampilkan.
                            </p>

                            <form
                                :action="`/news/${news.id}/comment`"
                                method="POST"
                                class="space-y-5"
                            >

                                <input
                                    type="hidden"
                                    name="_token"
                                    :value="$page.props.csrf_token"
                                >

                                <!-- NAME -->
                                <div>

                                    <label
                                        class="block text-sm font-bold
                                               text-gray-700 mb-2"
                                    >
                                        Nama
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Masukkan nama Anda"
                                        class="w-full border border-gray-200
                                               rounded-xl px-4 py-3
                                               focus:ring-2 focus:ring-green-600
                                               focus:border-green-600
                                               outline-none"
                                        required
                                    >

                                </div>

                                <!-- EMAIL -->
                                <div>

                                    <label
                                        class="block text-sm font-bold
                                               text-gray-700 mb-2"
                                    >
                                        Email (Opsional)
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="contoh@email.com"
                                        class="w-full border border-gray-200
                                               rounded-xl px-4 py-3
                                               focus:ring-2 focus:ring-green-600
                                               focus:border-green-600
                                               outline-none"
                                    >

                                </div>

                                <!-- COMMENT -->
                                <div>

                                    <label
                                        class="block text-sm font-bold
                                               text-gray-700 mb-2"
                                    >
                                        Komentar
                                    </label>

                                    <textarea
                                        name="comment"
                                        rows="5"
                                        placeholder="Tulis komentar..."
                                        class="w-full border border-gray-200
                                               rounded-xl px-4 py-3
                                               focus:ring-2 focus:ring-green-600
                                               focus:border-green-600
                                               outline-none"
                                        required
                                    ></textarea>

                                </div>

                                <!-- BUTTON -->
                                <button
                                    type="submit"
                                    class="bg-green-700 hover:bg-green-800
                                           text-white px-6 py-3
                                           rounded-xl font-bold
                                           transition"
                                >
                                    Kirim Komentar
                                </button>

                            </form>

                        </div>

                        <!-- COMMENT LIST -->
                        <div
                            class="bg-white p-6 md:p-8
                                   rounded-2xl border
                                   border-gray-100 shadow-sm"
                        >

                            <h3
                                class="text-2xl font-black
                                       text-gray-800 mb-8"
                            >
                                Komentar Pengguna
                            </h3>

                            <!-- COMMENTS -->
                            <div
                                v-if="news.comments.length > 0"
                                class="space-y-6"
                            >

                                <div
                                    v-for="comment in news.comments"
                                    :key="comment.id"
                                    class="bg-gray-50 border border-gray-100
                                           rounded-2xl p-5"
                                >

                                    <div
                                        class="flex items-start
                                               justify-between gap-4"
                                    >

                                        <div
                                            class="flex items-start gap-4"
                                        >

                                            <!-- AVATAR -->
                                            <div
                                                class="w-12 h-12
                                                       rounded-full
                                                       bg-green-100
                                                       text-green-700
                                                       flex items-center
                                                       justify-center
                                                       font-black"
                                            >
                                                {{
                                                    comment.name
                                                        ?.charAt(0)
                                                        .toUpperCase()
                                                }}
                                            </div>

                                            <div>

                                                <h4
                                                    class="font-bold
                                                           text-gray-800"
                                                >
                                                    {{ comment.name }}
                                                </h4>

                                                <p
                                                    class="text-xs
                                                           text-gray-400 mt-1"
                                                >
                                                    {{ comment.created_at }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                    <p
                                        class="mt-5 text-gray-600
                                               leading-relaxed"
                                    >
                                        {{ comment.comment }}
                                    </p>

                                </div>

                            </div>

                            <!-- EMPTY -->
                            <div
                                v-else
                                class="text-center py-12"
                            >

                                <div
                                    class="w-16 h-16 mx-auto
                                           rounded-full bg-gray-100
                                           flex items-center justify-center
                                           mb-4"
                                >
                                    <i
                                        class="fa-regular fa-comments
                                               text-2xl text-gray-400"
                                    ></i>
                                </div>

                                <h3
                                    class="font-bold text-gray-700"
                                >
                                    Belum Ada Komentar
                                </h3>

                                <p
                                    class="text-sm text-gray-400 mt-1"
                                >
                                    Jadilah yang pertama memberikan komentar.
                                </p>

                            </div>

                        </div>
                        </div>

                        <!-- COMMENT FORM -->
                       

                    </main>

                    <!-- SIDEBAR -->
                    <aside
                        class="lg:col-span-4
                               lg:sticky lg:top-6
                               space-y-6"
                    >

                        <div
                            class="bg-white p-6
                                   rounded-2xl border
                                   border-gray-100 shadow-sm"
                        >

                            <h3
                                class="text-lg font-bold
                                       text-gray-950 mb-4
                                       pb-3 border-b border-gray-100"
                            >
                                Berita Terkait Lainnya
                            </h3>

                            <div class="space-y-4">

                                <Link
                                    v-for="item in otherNews"
                                    :key="item.id"
                                    :href="'/news/' + item.slug"
                                    class="flex gap-4
                                           group/item items-start"
                                >

                                    <div
                                        class="w-20 h-20 rounded-xl
                                               overflow-hidden
                                               flex-shrink-0 bg-gray-100"
                                    >

                                        <img
                                            :src="
                                                item.thumbnail
                                                    ? '/storage/' + item.thumbnail
                                                    : 'https://placehold.co/150x150'
                                            "
                                            class="w-full h-full object-cover
                                                   group-hover/item:scale-105
                                                   transition-transform duration-300"
                                        />

                                    </div>

                                    <div class="flex-1 min-w-0">

                                        <h4
                                            class="font-bold text-sm
                                                   text-gray-800 line-clamp-2
                                                   group-hover/item:text-green-700
                                                   transition-colors"
                                        >
                                            {{ item.title }}
                                        </h4>

                                        <p
                                            class="text-[10px] text-gray-400
                                                   mt-1 uppercase font-bold
                                                   tracking-wider"
                                        >
                                            {{
                                                item.formatted_date || 'Terbaru'
                                            }}
                                        </p>

                                    </div>

                                </Link>

                                <div
                                    v-if="!otherNews || otherNews.length === 0"
                                    class="text-gray-400 text-sm italic py-2"
                                >
                                    Tidak ada berita lain saat ini.
                                </div>

                            </div>

                        </div>

                    </aside>

                </div>

            </div>

        </section>

    </FrontLayout>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all .3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>
```
