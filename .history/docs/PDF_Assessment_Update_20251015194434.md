# Update: Implementasi Assessment Sesuai PDF

## 📋 **Perubahan Berdasarkan PDF**

### ✅ **Assessment 1: Instrumen Kriteria Diagnostik PTSD**
- **30 pertanyaan** sesuai PDF
- **Skala**: Benar (1) / Tidak Benar (0) 
- **6 kategori (A-F)**:
  - A: Terbayangi oleh Peristiwa Traumatis (Q1,7,13,19,25)
  - B: Harapan Masa Depan Rendah (Q2,8,14,20,26)
  - C: Berpikir Negatif (Q3,9,15,21,27)
  - D: Emosional (Q4,10,16,22,28)
  - E: Mengisolasi Diri (Q5,11,17,23,29)
  - F: Merasa Tidak Berdaya (Q6,12,18,24,30)

### ✅ **Assessment 2: Daftar Cek Masalah**
- **5 kategori gejala** pasca bencana:
  - **Gejala 1**: Fisik (17 item)
  - **Gejala 2**: Emosi (18 item) 
  - **Gejala 3**: Mental (8 item)
  - **Gejala 4**: Perilaku (14 item)
  - **Gejala 5**: Spiritual (12 item)
- **Total**: 69 gejala untuk dicek
- **Skala**: Ada (1) / Tidak Ada (0)

## 🔄 **File yang Diupdate:**

### 1. Service Classes
- `PTSDDiagnosticQuestions.php` (dulu PCL5Questions.php)
- `ChecklistMasalahQuestions.php` (dulu DASS21Questions.php)

### 2. Database
- Migration: Update enum types assessment 
- Seeder: Data assessment sesuai PDF

### 3. Controller & Routes
- Update method getQuestionsForAssessment()
- Support untuk 2 jenis assessment baru

### 4. Models & Views
- Support untuk format pertanyaan checklist
- UI adaptif untuk skala Ya/Tidak

## 📊 **Format Penilaian:**

### PTSD Diagnostic:
```
Kategori A-F: Jumlah per kategori
Total Skor: 0-30
Ranking per kategori untuk identifikasi hambatan traumatik
```

### Checklist Masalah:
```
Per Kategori:
- Fisik: 0-17
- Emosi: 0-18  
- Mental: 0-8
- Perilaku: 0-14
- Spiritual: 0-12
```

## 🎯 **Next Steps:**
1. Update calculation service untuk scoring yang tepat
2. Update views untuk tampilan checklist style
3. Test dengan user: `test@kosabangsa.com / password123`

---
**Status**: Updated sesuai PDF - Ready for UI adaptation