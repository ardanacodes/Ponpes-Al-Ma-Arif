<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
    announcement: Object
})

const form = useForm({
    title: props.announcement.title,
    content: props.announcement.content,
    date: props.announcement.date,
    is_active: props.announcement.is_active
})

const submit = () => {
    form.put(`/admin/announcements/${props.announcement.id}`)
}
</script>

<template>
    <Head title="Edit Pengumuman" />

    <AdminLayout>

        <div class="p-6 max-w-3xl space-y-6">

            <div class="flex items-center gap-3.5">
                <div class="header-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                    </svg>
                </div>
                <div>
                    <h1 class="sched-title">Edit Pengumuman</h1>
                    <p class="sched-subtitle">Ubah informasi atau pengumuman yang sudah diterbitkan</p>
                </div>
            </div>

            <div class="form-wrapper">
                <form @submit.prevent="submit" class="space-y-5">
                    
                    <div class="form-group">
                        <label class="form-label">Judul Pengumuman</label>
                        <input
                            v-model="form.title"
                            type="text"
                            class="form-input"
                            placeholder="Masukkan judul pengumuman..."
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Isi Pengumuman</label>
                        <textarea
                            v-model="form.content"
                            rows="6"
                            class="form-input resize-none"
                            placeholder="Tuliskan detail informasi di sini..."
                            required
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tanggal Terbit</label>
                        <input
                            v-model="form.date"
                            type="date"
                            class="form-input"
                            required
                        >
                    </div>

                    <div class="checkbox-container">
                        <label class="flex items-center gap-3 cursor-pointer select-none">
                            <input
                                v-model="form.is_active"
                                type="checkbox"
                                class="form-checkbox"
                            >
                            <span class="checkbox-label">
                                Aktifkan Pengumuman (Dapat dilihat oleh publik/santri)
                            </span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-4 border-t border-sky-50">
                        <Link 
                            href="/admin/announcements" 
                            class="btn-secondary"
                        >
                            Batal
                        </Link>
                        
                        <button
                            type="submit"
                            class="btn-primary"
                            :disabled="form.processing"
                        >
                            <span v-if="form.processing">Menyimpan...</span>
                            <span v-else>Simpan Perubahan</span>
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
/* ─── HEADER LAYOUT ────────────────────────────────────────── */
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

.header-icon { width: 1.375rem; height: 1.375rem; color: white; }

.sched-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #0c4a6e;
    letter-spacing: -0.02em;
}

.sched-subtitle {
    color: #0ea5e9;
    font-size: 0.875rem;
    font-weight: 500;
    margin-top: 0.1rem;
}

/* ─── FORM CONTAINER ─────────────────────────────────────────── */
.form-wrapper {
    background: #ffffff;
    border: 1px solid #e0f2fe;
    border-radius: 1.5rem;
    padding: 2rem;
    box-shadow: 0 4px 24px rgba(14, 165, 233, 0.05);
}

.form-group {
    display: flex;
    flex-col: column;
    gap: 0.5rem;
}

.form-label {
    display: block;
    font-size: 0.8125rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #0369a1;
}

.form-input {
    width: 100%;
    background-color: #fafafa;
    border: 1px solid #e2e8f0;
    border-radius: 0.875rem;
    padding: 0.875rem 1.125rem;
    font-size: 0.9375rem;
    color: #0c4a6e;
    outline: none;
    transition: all 0.2s ease-in-out;
}

.form-input:focus {
    background-color: #ffffff;
    border-color: #38bdf8;
    box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.15);
}

.form-input::placeholder {
    color: #94a3b8;
}

/* ─── CHECKBOX CUSTOMIZATION ─────────────────────────────────── */
.checkbox-container {
    padding: 0.5rem 0.25rem;
}

.form-checkbox {
    width: 1.25rem;
    height: 1.25rem;
    border-radius: 0.375rem;
    border: 1px solid #cbd5e1;
    accent-color: #0ea5e9;
    cursor: pointer;
}

.checkbox-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #334155;
}

/* ─── BUTTONS ────────────────────────────────────────────────── */
.btn-primary {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    color: #ffffff;
    padding: 0.75rem 1.5rem;
    border-radius: 0.875rem;
    font-size: 0.875rem;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25);
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(14, 165, 233, 0.35);
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
}

.btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.btn-secondary {
    background: #f1f5f9;
    color: #475569;
    padding: 0.75rem 1.5rem;
    border-radius: 0.875rem;
    font-size: 0.875rem;
    font-weight: 700;
    transition: all 0.15s ease;
    text-align: center;
}

.btn-secondary:hover {
    background: #e2e8f0;
    color: #334155;
}
</style>