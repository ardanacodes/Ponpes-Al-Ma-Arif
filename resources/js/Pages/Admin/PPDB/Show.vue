<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'

const props = defineProps({
    ppdb: Object
})
</script>

<template>
    <AdminLayout>

        <!-- HEADER -->
        <div class="detail-page-header">
            <div class="header-icon-wrap">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="header-icon">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div>
                <h1 class="detail-title">Detail PPDB</h1>
                <p class="detail-subtitle">Informasi lengkap data pendaftaran santri</p>
            </div>
        </div>

        <!-- PROFILE BANNER -->
        <div class="profile-banner">
            <div class="profile-avatar-large">
                {{ ppdb.name?.charAt(0) }}
            </div>
            <div class="profile-info">
                <h2 class="profile-name">{{ ppdb.name }}</h2>
                <div class="profile-badges">
                    <span :class="ppdb.program_type === 'Mukim' ? 'badge-mukim' : 'badge-nonmukim'">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3 h-3">
                            <path d="M8 .5a.5.5 0 0 1 .447.276l1.431 2.9 3.2.465a.5.5 0 0 1 .277.854l-2.316 2.256.546 3.185a.5.5 0 0 1-.725.527L8 9.347l-2.86 1.504a.5.5 0 0 1-.724-.527l.546-3.185L2.645 4.995a.5.5 0 0 1 .277-.854l3.2-.465L7.553.776A.5.5 0 0 1 8 .5Z"/>
                        </svg>
                        {{ ppdb.program_type }}
                    </span>
                    <span class="badge-level">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3 h-3">
                            <path d="M2 3.5A1.5 1.5 0 0 1 3.5 2h9A1.5 1.5 0 0 1 14 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 12.5v-9Z"/>
                        </svg>
                        {{ ppdb.education_level }}
                    </span>
                    <span :class="ppdb.gender === 'Laki-laki' ? 'badge-male' : 'badge-female'">
                        {{ ppdb.gender }}
                    </span>
                </div>
            </div>
        </div>

        <!-- DETAIL CARD -->
        <div class="detail-card">

            <!-- SECTION: DATA PRIBADI -->
            <div class="section-label">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="section-icon">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-7 9a7 7 0 1 1 14 0H3Z" clip-rule="evenodd"/>
                </svg>
                Data Pribadi
            </div>

            <div class="detail-grid">

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                        </svg>
                        Nama Lengkap
                    </p>
                    <p class="field-value">{{ ppdb.name }}</p>
                </div>

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z"/>
                            <path d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.607-.714.607-1.204v-1a.75.75 0 0 0-.75-.75h-1a.75.75 0 0 1-.75-.75V11h2.25a.75.75 0 0 0 0-1.5H15.5V8h2.25a.75.75 0 0 0 0-1.5H15.5V5.75a.75.75 0 0 0-.75-.75h-1.5Z"/>
                        </svg>
                        Jenis Kelamin
                    </p>
                    <p class="field-value">{{ ppdb.gender }}</p>
                </div>

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path fill-rule="evenodd" d="M5.05 3.113c.183-.842.932-1.363 1.655-1.363h2.59c.723 0 1.472.521 1.655 1.363L11.5 5H13a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1.5l.55-1.887ZM10 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" clip-rule="evenodd"/>
                        </svg>
                        Tempat Lahir
                    </p>
                    <p class="field-value">{{ ppdb.birth_place }}</p>
                </div>

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0 0 2h7a1 1 0 0 0 0-2h-7Z" clip-rule="evenodd"/>
                        </svg>
                        Tanggal Lahir
                    </p>
                    <p class="field-value">{{ ppdb.birth_date }}</p>
                </div>

                <div class="detail-field md-col-span-2">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path fill-rule="evenodd" d="m7.539 14.841.003.003.002.002a.755.755 0 0 0 .912 0l.002-.002.003-.003.012-.009a5.57 5.57 0 0 0 .19-.153 15.588 15.588 0 0 0 2.046-2.082c1.101-1.362 2.291-3.342 2.291-5.597A5 5 0 0 0 3 7c0 2.255 1.19 4.235 2.292 5.597a15.591 15.591 0 0 0 2.046 2.082 8.916 8.916 0 0 0 .189.153l.012.01ZM8 8.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" clip-rule="evenodd"/>
                        </svg>
                        Alamat
                    </p>
                    <p class="field-value">{{ ppdb.address }}</p>
                </div>

            </div>

            <div class="section-divider"></div>

            <!-- SECTION: KONTAK & ASAL SEKOLAH -->
            <div class="section-label">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="section-icon">
                    <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd"/>
                </svg>
                Kontak & Asal Sekolah
            </div>

            <div class="detail-grid">

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path fill-rule="evenodd" d="M1 2.75A.75.75 0 0 1 1.75 2h10.5a.75.75 0 0 1 0 1.5H12v13.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1-.75-.75v-2.5a.75.75 0 0 0-.75-.75h-2.5a.75.75 0 0 0-.75.75v2.5a.75.75 0 0 1-.75.75h-3a.75.75 0 0 1-.75-.75V3.5H1.75A.75.75 0 0 1 1 2.75Z" clip-rule="evenodd"/>
                        </svg>
                        Asal Sekolah
                    </p>
                    <p class="field-value">{{ ppdb.school_origin }}</p>
                </div>

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd"/>
                        </svg>
                        No HP
                    </p>
                    <p class="field-value">{{ ppdb.phone }}</p>
                </div>

            </div>

            <div class="section-divider"></div>

            <!-- SECTION: DATA ORANG TUA -->
            <div class="section-label">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="section-icon">
                    <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 17a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                </svg>
                Data Orang Tua
            </div>

            <div class="detail-grid">

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                        </svg>
                        Nama Ayah
                    </p>
                    <p class="field-value">{{ ppdb.father_name }}</p>
                </div>

                <div class="detail-field">
                    <p class="field-label">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-3.5 h-3.5">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"/>
                        </svg>
                        Nama Ibu
                    </p>
                    <p class="field-value">{{ ppdb.mother_name }}</p>
                </div>

            </div>

            <div class="section-divider"></div>

            <!-- SECTION: PROGRAM PENDAFTARAN -->
            <div class="section-label">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="section-icon">
                    <path d="M10.75 16.82A7.462 7.462 0 0 1 15 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0 0 18 15.06v-11a.75.75 0 0 0-.546-.721A9.006 9.006 0 0 0 15 3a8.963 8.963 0 0 0-4.25 1.065V16.82ZM9.25 4.065A8.963 8.963 0 0 0 5 3c-.85 0-1.673.118-2.454.339A.75.75 0 0 0 2 4.06v11a.75.75 0 0 0 .954.721A7.506 7.506 0 0 1 5 15.5c1.579 0 3.042.487 4.25 1.32V4.065Z"/>
                </svg>
                Program Pendaftaran
            </div>

            <div class="detail-grid">

                <div class="detail-field">
                    <p class="field-label">Program</p>
                    <div class="mt-1">
                        <span :class="ppdb.program_type === 'Mukim' ? 'badge-mukim-lg' : 'badge-nonmukim-lg'">
                            {{ ppdb.program_type }}
                        </span>
                    </div>
                </div>

                <div class="detail-field">
                    <p class="field-label">Jenjang Pendidikan</p>
                    <p class="field-value">{{ ppdb.education_level }}</p>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="detail-actions">
                <a href="/admin/ppdb" class="btn-back">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                    </svg>
                    Kembali ke Daftar
                </a>
            </div>

        </div>

    </AdminLayout>
</template>

<style scoped>
/* ─── HEADER ─────────────────────────────────────────────────── */
.detail-page-header {
    display: flex;
    align-items: center;
    gap: 1rem;
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

.detail-title {
    font-size: 1.625rem;
    font-weight: 800;
    color: #0c4a6e;
    letter-spacing: -0.02em;
}

.detail-subtitle {
    color: #7dd3fc;
    font-size: 0.875rem;
    margin-top: 0.125rem;
    font-weight: 500;
}

/* ─── PROFILE BANNER ─────────────────────────────────────────── */
.profile-banner {
    background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    border-radius: 1.25rem;
    padding: 1.5rem 1.75rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    margin-bottom: 1.25rem;
    box-shadow: 0 8px 28px rgba(14, 165, 233, 0.3);
}

.profile-avatar-large {
    width: 4rem;
    height: 4rem;
    background: rgba(255, 255, 255, 0.2);
    border: 2.5px solid rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 900;
    color: white;
    flex-shrink: 0;
    backdrop-filter: blur(4px);
}

.profile-name {
    font-size: 1.25rem;
    font-weight: 800;
    color: white;
    letter-spacing: -0.01em;
}

.profile-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-top: 0.4rem;
}

/* ─── DETAIL CARD ────────────────────────────────────────────── */
.detail-card {
    background: #ffffff;
    border: 1px solid #e0f2fe;
    border-radius: 1.25rem;
    padding: 1.75rem;
    box-shadow: 0 4px 24px rgba(14, 165, 233, 0.06);
}

/* ─── SECTION LABEL ──────────────────────────────────────────── */
.section-label {
    display: flex;
    align-items: center;
    gap: 0.45rem;
    font-size: 0.72rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #0284c7;
    margin-bottom: 1rem;
}

.section-icon {
    width: 0.875rem;
    height: 0.875rem;
    color: #38bdf8;
}

.section-divider {
    border: none;
    border-top: 1.5px solid #f0f9ff;
    margin: 1.5rem 0;
}

/* ─── DETAIL GRID ────────────────────────────────────────────── */
.detail-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 1.125rem;
    margin-bottom: 0.25rem;
}

@media (min-width: 768px) {
    .detail-grid { grid-template-columns: repeat(2, 1fr); }
    .md-col-span-2 { grid-column: span 2; }
}

/* ─── FIELD ──────────────────────────────────────────────────── */
.detail-field {
    background: #f8fcff;
    border: 1px solid #e0f2fe;
    border-radius: 0.75rem;
    padding: 0.875rem 1rem;
    transition: border-color 0.15s;
}

.detail-field:hover { border-color: #7dd3fc; }

.field-label {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: #0284c7;
    margin-bottom: 0.3rem;
}

.field-value {
    font-size: 0.9375rem;
    font-weight: 600;
    color: #0c4a6e;
    line-height: 1.4;
}

/* ─── BADGES ─────────────────────────────────────────────────── */
.badge-male,
.badge-female,
.badge-mukim,
.badge-nonmukim,
.badge-level {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.2rem 0.65rem;
    border-radius: 99px;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.01em;
}

.badge-male    { background: rgba(219, 234, 254, 0.5); color: #fff; border: 1px solid rgba(255,255,255,0.4); }
.badge-female  { background: rgba(252, 231, 243, 0.5); color: #fff; border: 1px solid rgba(255,255,255,0.4); }
.badge-mukim   { background: rgba(220, 252, 231, 0.5); color: #fff; border: 1px solid rgba(255,255,255,0.4); }
.badge-nonmukim{ background: rgba(224, 242, 254, 0.5); color: #fff; border: 1px solid rgba(255,255,255,0.4); }
.badge-level   { background: rgba(255,255,255,0.2); color: #fff; border: 1px solid rgba(255,255,255,0.4); }

.badge-mukim-lg,
.badge-nonmukim-lg {
    display: inline-flex;
    align-items: center;
    padding: 0.3rem 0.85rem;
    border-radius: 99px;
    font-size: 0.8125rem;
    font-weight: 700;
}

.badge-mukim-lg    { background: #dcfce7; color: #15803d; }
.badge-nonmukim-lg { background: #e0f2fe; color: #0369a1; }

/* ─── BACK BUTTON ────────────────────────────────────────────── */
.detail-actions {
    margin-top: 1.75rem;
    padding-top: 1.25rem;
    border-top: 1.5px solid #f0f9ff;
}

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 600;
    border: 1.5px solid #bae6fd;
    border-radius: 0.625rem;
    color: #0369a1;
    background: #fff;
    text-decoration: none;
    transition: background 0.15s, border-color 0.15s;
}

.btn-back:hover {
    background: #f0f9ff;
    border-color: #7dd3fc;
}
</style>