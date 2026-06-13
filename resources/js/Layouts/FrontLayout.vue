<script setup>
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue'
</script>

<template>
    <div>
        <Navbar />

        <main class="min-h-screen">
            <slot />
        </main>

        <Footer />
    </div>
</template>