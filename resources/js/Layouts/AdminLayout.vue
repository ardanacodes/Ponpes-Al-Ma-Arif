<script setup>
import AdminNavbar from '@/Components/Admin/AdminNavbar.vue'
import AdminSidebar from '@/Components/Admin/AdminSidebar.vue'
</script>

<template>
    <div class="min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <AdminSidebar />

        <!-- Content -->
        <div class="md:ml-64">

            <!-- Navbar -->
            <AdminNavbar />

<!-- MAIN -->
<main class="relative z-10 px-6 pb-6">

    <!-- CONTENT WRAPPER -->
    <div class="-mt-14 relative z-30 pt-20">
        <slot />
    </div>

</main>

        </div>
    </div>
</template>