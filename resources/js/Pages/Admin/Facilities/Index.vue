<script setup>
import { Link, router } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'

defineOptions({
  layout: AdminLayout
})

defineProps({
  facilities: Array
})

const destroy = (id) => {
  if (confirm('Yakin hapus fasilitas ini?')) {
    router.delete(`/admin/facilities/${id}`)
  }
}
</script>

<template>
  <div class="facilities-wrapper">

    <!-- HEADER -->
    <div class="fac-header">
      <div class="fac-header-left">
        <div class="header-icon-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
            <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5H15v-18a.75.75 0 0 0 0-1.5H3ZM6.75 19.5v-2.25a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h.75a.75.75 0 0 1 0 1.5h-.75A.75.75 0 0 1 6 6.75ZM6.75 9a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM6 12.75a.75.75 0 0 1 .75-.75h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 6a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75Zm-.75 3.75A.75.75 0 0 1 10.5 9h.75a.75.75 0 0 1 0 1.5h-.75a.75.75 0 0 1-.75-.75ZM10.5 12a.75.75 0 0 0 0 1.5h.75a.75.75 0 0 0 0-1.5h-.75ZM16.5 6.75v15h5.25a.75.75 0 0 0 0-1.5H21v-12a.75.75 0 0 0 0-1.5h-4.5Zm1.5 4.5a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 0 1.5H18.75a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h.008a.75.75 0 0 0 0-1.5H18.75Zm-.75 4.5a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 0 1.5H18.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <div>
          <h1 class="fac-title">Data Fasilitas</h1>
          <p class="fac-subtitle">Kelola fasilitas sekolah</p>
        </div>
      </div>

      <Link href="/admin/facilities/create" class="btn-add">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
          <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z"/>
        </svg>
        Tambah Fasilitas
      </Link>
    </div>

    <!-- EMPTY STATE -->
    <div v-if="!facilities || facilities.length === 0" class="empty-state">
      <div class="empty-icon-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-sky-300">
          <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5H15v-18a.75.75 0 0 0 0-1.5H3Z" clip-rule="evenodd"/>
        </svg>
      </div>
      <p class="text-gray-400 font-semibold mt-3">Belum ada fasilitas</p>
      <p class="text-gray-300 text-sm mt-1">Klik tombol Tambah untuk menambahkan fasilitas baru</p>
    </div>

    <!-- GRID CARDS -->
    <div v-else class="fac-grid">
      <div
        v-for="item in facilities"
        :key="item.id"
        class="fac-card"
      >
        <!-- IMAGE -->
        <div class="fac-img-wrap">
          <img
            v-if="item.photo"
            :src="`/storage/${item.photo}`"
            class="fac-img"
            alt="Foto Fasilitas"
          />
          <div v-else class="fac-img-placeholder">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-sky-200">
              <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sky-300 text-xs font-medium mt-1">Belum ada foto</span>
          </div>
        </div>

        <!-- CONTENT -->
        <div class="fac-content">
          <h2 class="fac-name">{{ item.title }}</h2>
          <p class="fac-desc">{{ item.description }}</p>

          <div class="fac-actions">
            <Link :href="`/admin/facilities/${item.id}/edit`" class="btn-edit">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z"/>
                <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z"/>
              </svg>
              Edit
            </Link>

            <button @click="destroy(item.id)" class="btn-delete">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3.5 h-3.5">
                <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd"/>
              </svg>
              Hapus
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</template>

<style scoped>
.facilities-wrapper {
  padding: 1.5rem;
}

/* ─── HEADER ─────────────────────────────────────────────────── */
.fac-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 1.75rem;
  flex-wrap: wrap;
  gap: 1rem;
}

.fac-header-left {
  display: flex;
  align-items: center;
  gap: 0.875rem;
}

.header-icon-wrap {
  width: 3rem;
  height: 3rem;
  background: linear-gradient(135deg, #0ea5e9, #0284c7);
  border-radius: 0.875rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
}

.header-icon {
  width: 1.375rem;
  height: 1.375rem;
  color: white;
}

.fac-title {
  font-size: 1.625rem;
  font-weight: 800;
  color: #0c4a6e;
  letter-spacing: -0.02em;
}

.fac-subtitle {
  color: #7dd3fc;
  font-size: 0.875rem;
  font-weight: 500;
  margin-top: 0.1rem;
}

.btn-add {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.55rem 1.1rem;
  font-size: 0.875rem;
  font-weight: 700;
  background: linear-gradient(135deg, #0ea5e9, #0284c7);
  color: white;
  border-radius: 0.75rem;
  text-decoration: none;
  box-shadow: 0 4px 14px rgba(14, 165, 233, 0.28);
  transition: opacity 0.15s, box-shadow 0.15s;
}

.btn-add:hover {
  opacity: 0.9;
  box-shadow: 0 6px 18px rgba(14, 165, 233, 0.38);
}

/* ─── EMPTY STATE ────────────────────────────────────────────── */
.empty-state {
  text-align: center;
  padding: 4rem 1.5rem;
  background: #f8fcff;
  border: 1.5px dashed #bae6fd;
  border-radius: 1.25rem;
}

.empty-icon-wrap {
  width: 4rem;
  height: 4rem;
  background: #e0f2fe;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
}

/* ─── GRID ───────────────────────────────────────────────────── */
.fac-grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 1.25rem;
}

@media (min-width: 768px) {
  .fac-grid { grid-template-columns: repeat(3, 1fr); }
}

/* ─── CARD ───────────────────────────────────────────────────── */
.fac-card {
  background: #fff;
  border: 1px solid #e0f2fe;
  border-radius: 1.125rem;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(14, 165, 233, 0.07);
  transition: box-shadow 0.2s, transform 0.2s;
  display: flex;
  flex-direction: column;
}

.fac-card:hover {
  box-shadow: 0 8px 28px rgba(14, 165, 233, 0.14);
  transform: translateY(-2px);
}

/* ─── IMAGE ──────────────────────────────────────────────────── */
.fac-img-wrap {
  width: 100%;
  height: 11rem;
  overflow: hidden;
  background: #f0f9ff;
  flex-shrink: 0;
}

.fac-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s;
}

.fac-card:hover .fac-img {
  transform: scale(1.04);
}

.fac-img-placeholder {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
}

/* ─── CONTENT ────────────────────────────────────────────────── */
.fac-content {
  padding: 1rem 1.125rem 1.125rem;
  display: flex;
  flex-direction: column;
  flex: 1;
}

.fac-name {
  font-size: 0.9375rem;
  font-weight: 700;
  color: #0c4a6e;
  margin-bottom: 0.3rem;
}

.fac-desc {
  font-size: 0.8125rem;
  color: #64748b;
  line-height: 1.5;
  flex: 1;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ─── ACTIONS ────────────────────────────────────────────────── */
.fac-actions {
  display: flex;
  gap: 0.5rem;
  margin-top: 0.875rem;
  padding-top: 0.75rem;
  border-top: 1px solid #f0f9ff;
}

.btn-edit,
.btn-delete {
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  font-size: 0.8rem;
  font-weight: 700;
  padding: 0.325rem 0.7rem;
  border-radius: 0.5rem;
  border: none;
  cursor: pointer;
  text-decoration: none;
  transition: background 0.12s;
}

.btn-edit {
  color: #0284c7;
  background: #e0f2fe;
}

.btn-edit:hover { background: #bae6fd; }

.btn-delete {
  color: #dc2626;
  background: #fee2e2;
}

.btn-delete:hover { background: #fecaca; }
</style>