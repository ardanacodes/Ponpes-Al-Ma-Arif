<script setup>
import GuruSidebar from '@/Components/Guru/GuruSidebar.vue'
</script>

<template>

    <div class="flex min-h-screen bg-gray-100">

        <GuruSidebar />

        <main class="flex-1 p-6 overflow-auto">
            <slot />
        </main>

    </div>

</template>