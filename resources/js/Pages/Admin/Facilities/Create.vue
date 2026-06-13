<script setup>
import { useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { ref } from 'vue'

defineOptions({
  layout: AdminLayout
})

const form = useForm({
  title: '',
  description: '',
  photo: null
})

const previewUrl = ref(null)

const handleFile = (e) => {
  const file = e.target.files[0]
  form.photo = file
  if (file) {
    previewUrl.value = URL.createObjectURL(file)
  } else {
    previewUrl.value = null
  }
}

const submit = () => {
  form.post('/admin/facilities')
}
</script>

<template>
  <div class="form-wrapper">

    <!-- HEADER -->
    <div class="form-header">
      <div class="header-icon-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
          <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
        </svg>
      </div>
      <div>
        <h1 class="form-title">Tambah Fasilitas</h1>
        <p class="form-subtitle">Isi data fasilitas baru</p>
      </div>
    </div>

    <!-- CARD FORM -->
    <div class="form-card">
      <form @submit.prevent="submit" class="form-body">

        <!-- JUDUL -->
        <div class="field-group">
          <label class="field-label">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
              <path d="M2.75 2a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5H2.75ZM2.75 5.5a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5H2.75ZM2 9.75A.75.75 0 0 1 2.75 9h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 2 9.75Z"/>
            </svg>
            Judul Fasilitas
          </label>
          <input
            v-model="form.title"
            type="text"
            placeholder="Contoh: Laboratorium Komputer"
            class="field-input"
            :class="{ 'field-input-error': form.errors.title }"
          />
          <p v-if="form.errors.title" class="field-error">{{ form.errors.title }}</p>
        </div>

        <!-- DESKRIPSI -->
        <div class="field-group">
          <label class="field-label">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
              <path fill-rule="evenodd" d="M2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Zm2 .75A.75.75 0 0 1 4.75 4h6.5a.75.75 0 0 1 0 1.5h-6.5A.75.75 0 0 1 4 4.75Zm0 3A.75.75 0 0 1 4.75 7h6.5a.75.75 0 0 1 0 1.5h-6.5A.75.75 0 0 1 4 7.75Zm0 3A.75.75 0 0 1 4.75 10h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 4 10.75Z" clip-rule="evenodd"/>
            </svg>
            Deskripsi
          </label>
          <textarea
            v-model="form.description"
            rows="4"
            placeholder="Jelaskan fasilitas ini..."
            class="field-input resize-none"
            :class="{ 'field-input-error': form.errors.description }"
          />
          <p v-if="form.errors.description" class="field-error">{{ form.errors.description }}</p>
        </div>

        <!-- UPLOAD FOTO -->
        <div class="field-group">
          <label class="field-label">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
              <path fill-rule="evenodd" d="M2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Zm7.78 1.97a.75.75 0 0 0-1.06 0L6.22 8.47a.75.75 0 0 0 1.06 1.06l1.22-1.22V11a.75.75 0 0 0 1.5 0V8.31l1.22 1.22a.75.75 0 1 0 1.06-1.06L9.78 5.97Z" clip-rule="evenodd"/>
            </svg>
            Foto Fasilitas
          </label>

          <!-- Preview -->
          <div v-if="previewUrl" class="img-preview-wrap">
            <img :src="previewUrl" class="img-preview" alt="Preview" />
            <button type="button" @click="previewUrl = null; form.photo = null" class="img-preview-remove">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
              </svg>
            </button>
          </div>

          <label v-else class="upload-zone">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-9 h-9 text-sky-300">
              <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd"/>
            </svg>
            <span class="upload-text">Klik untuk pilih foto</span>
            <span class="upload-hint">PNG, JPG, WEBP maks. 2MB</span>
            <input type="file" accept="image/*" class="sr-only" @change="handleFile" />
          </label>

          <p v-if="form.errors.photo" class="field-error">{{ form.errors.photo }}</p>
        </div>

        <!-- ACTIONS -->
        <div class="form-actions">
          <a href="/admin/facilities" class="btn-cancel">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
              <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
            </svg>
            Batal
          </a>

          <button type="submit" :disabled="form.processing" class="btn-submit">
            <svg v-if="!form.processing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
              <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd"/>
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4 animate-spin">
              <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" stroke-dasharray="31.416" stroke-dashoffset="10" stroke-linecap="round"/>
            </svg>
            {{ form.processing ? 'Menyimpan...' : 'Simpan Fasilitas' }}
          </button>
        </div>

      </form>
    </div>

  </div>
</template>

<style scoped>
.form-wrapper {
  max-width: 42rem;
  padding: 0.25rem;
}

/* ─── HEADER ─────────────────────────────────────────────────── */
.form-header {
  display: flex;
  align-items: center;
  gap: 0.875rem;
  margin-bottom: 1.5rem;
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

.form-title {
  font-size: 1.625rem;
  font-weight: 800;
  color: #0c4a6e;
  letter-spacing: -0.02em;
}

.form-subtitle {
  color: #7dd3fc;
  font-size: 0.875rem;
  font-weight: 500;
  margin-top: 0.1rem;
}

/* ─── CARD ───────────────────────────────────────────────────── */
.form-card {
  background: #ffffff;
  border: 1px solid #e0f2fe;
  border-radius: 1.25rem;
  box-shadow: 0 4px 24px rgba(14, 165, 233, 0.07);
  overflow: hidden;
}

.form-body {
  padding: 1.75rem;
  display: flex;
  flex-direction: column;
  gap: 1.375rem;
}

/* ─── FIELDS ─────────────────────────────────────────────────── */
.field-group {
  display: flex;
  flex-direction: column;
  gap: 0.375rem;
}

.field-label {
  display: flex;
  align-items: center;
  gap: 0.3rem;
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: #0284c7;
}

.field-input {
  width: 100%;
  padding: 0.625rem 0.875rem;
  border: 1.5px solid #bae6fd;
  border-radius: 0.625rem;
  font-size: 0.9rem;
  color: #0c4a6e;
  background: #fff;
  transition: border-color 0.15s, box-shadow 0.15s;
  outline: none;
  font-family: inherit;
}

.field-input::placeholder { color: #94a3b8; }

.field-input:focus {
  border-color: #0ea5e9;
  box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.12);
}

.field-input-error {
  border-color: #fca5a5 !important;
  box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.08) !important;
}

.field-error {
  font-size: 0.775rem;
  color: #dc2626;
  font-weight: 500;
}

/* ─── UPLOAD ─────────────────────────────────────────────────── */
.upload-zone {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0.3rem;
  padding: 2.25rem 1.5rem;
  border: 2px dashed #bae6fd;
  border-radius: 0.875rem;
  background: #f8fcff;
  cursor: pointer;
  transition: border-color 0.15s, background 0.15s;
}

.upload-zone:hover {
  border-color: #38bdf8;
  background: #f0f9ff;
}

.upload-text {
  font-size: 0.875rem;
  font-weight: 600;
  color: #0284c7;
}

.upload-hint {
  font-size: 0.75rem;
  color: #94a3b8;
}

.img-preview-wrap {
  position: relative;
  border-radius: 0.875rem;
  overflow: hidden;
  border: 1.5px solid #bae6fd;
}

.img-preview {
  width: 100%;
  height: 12rem;
  object-fit: cover;
  display: block;
}

.img-preview-remove {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
  width: 1.75rem;
  height: 1.75rem;
  background: rgba(0,0,0,0.55);
  color: white;
  border: none;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background 0.12s;
}

.img-preview-remove:hover { background: rgba(0,0,0,0.75); }

/* ─── ACTIONS ────────────────────────────────────────────────── */
.form-actions {
  display: flex;
  align-items: center;
  gap: 0.625rem;
  padding-top: 0.25rem;
  border-top: 1.5px solid #f0f9ff;
  margin-top: 0.25rem;
}

.btn-cancel {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  padding: 0.55rem 1.1rem;
  font-size: 0.875rem;
  font-weight: 600;
  border: 1.5px solid #bae6fd;
  border-radius: 0.625rem;
  color: #0369a1;
  background: #fff;
  text-decoration: none;
  transition: background 0.15s;
}

.btn-cancel:hover { background: #f0f9ff; }

.btn-submit {
  display: inline-flex;
  align-items: center;
  gap: 0.375rem;
  padding: 0.55rem 1.375rem;
  font-size: 0.875rem;
  font-weight: 700;
  background: linear-gradient(135deg, #0ea5e9, #0284c7);
  color: white;
  border: none;
  border-radius: 0.625rem;
  cursor: pointer;
  box-shadow: 0 4px 14px rgba(14, 165, 233, 0.28);
  transition: opacity 0.15s, box-shadow 0.15s;
}

.btn-submit:hover:not(:disabled) {
  opacity: 0.9;
  box-shadow: 0 6px 18px rgba(14, 165, 233, 0.38);
}

.btn-submit:disabled {
  opacity: 0.65;
  cursor: not-allowed;
}

.animate-spin {
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}
</style>