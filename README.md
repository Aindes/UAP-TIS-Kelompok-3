# 🏫 Mahasiswa, Prodi dan Mata Kuliah

## 👥 Anggota Kelompok 3

| No | Nama Lengkap                  | NIM               | Nama GitHub                          |
|----|-------------------------------|-------------------|-------------------------------------------|
| 1  | Melani Sitohang           | 235150700111042   | melanisitohang              |
| 2  | Intan Desi Purnomo        | 235150701111050   | Aindes              |
| 3  | Eriza Dinda Febriana      | 235150707111047   | ErizaDinda                     |
| 4  | Graine Ivana Lumbantobing | 235150701111042   | graineivanalumbantobing            |
| 5  | Noor Azizah Zeliana Putri | 235150700111044   | Zeliana20                         |
| 6  | Mutiara Dwi Artono        | 235150701111052   | mutiaradw      |
-----

## 💻 Kontribusi Member

### 🧑‍💻 Anggota 1: Melani Sitohang (235150700111042)  
Kelompok: Otentikasi & Pengaturan Inti  
- Menambahkan fitur register untuk menyimpan data mahasiswa baru ke database.
- Menambahkan fitur login untuk memeriksa NIM dan password lalu mengirimkan token JWT.
- Mengatur koneksi database dan JWT di file .env.
- Memeriksa pengaturan autentikasi di AuthServiceProvider.php.
- Membuat middleware Authenticate.php untuk mengecek token JWT di setiap request.
---

### 🧑‍💻 Anggota 2: Intan Desi Purnomo (235150701111050)  
Kelompok: Manajemen Mahasiswa & Relasi  
- Menambahkan model Mahasiswa.php dengan field yang dapat diisi (fillable), menetapkan nim sebagai primary key, serta membangun relasi ke model Prodi dan Matakuliah.
- Membuat metode index() di MahasiswaController.php untuk mengambil semua data mahasiswa sekaligus melakukan eager loading terhadap relasi prodi.
- Membuat metode filterByProdi() untuk memfilter data mahasiswa berdasarkan ID prodi, termasuk validasi jika data kosong atau tidak ditemukan.
- Menambahkan file migrasi create_mahasiswas_table.php dengan skema tabel yang mencakup primary key nim, serta mendefinisikan relasi kunci asing ke tabel prodis.
- Membuat ERD (Entity Relationship Diagram) untuk memvisualisasikan struktur relasi antar tabel, serta menambahkan dokumentasi singkat dalam bentuk README di GitHub untuk menjelaskan fungsi dan struktur proyek.
---

### 🧑‍💻 Anggota 3: Eriza Dinda Febriana (235150707111047)  
Kelompok: Manajemen Mata Kuliah (Menambah & Mendaftar)  
- Membuat model Matakuliah.php yang berisi field isian (fillable) dan mendefinisikan relasi many-to-many dengan model Mahasiswa, karena satu mahasiswa bisa mengambil banyak mata kuliah, dan sebaliknya.
- Mengimplementasikan metode index() dalam MatakuliahController.php untuk mengambil seluruh daftar mata kuliah yang tersedia dari database.
- ⁠Membuat metode addCourse() agar mahasiswa dapat menambahkan mata kuliah yang ingin diambil, dilengkapi dengan validasi data dan pengecekan agar tidak terjadi duplikasi mata kuliah.
- Menambahkan metode myCourses() untuk mengambil daftar mata kuliah yang telah diambil oleh mahasiswa yang sedang login.
- Membuat file migrasi create_matakuliahs_table.php untuk mendefinisikan struktur tabel matakuliah di database, seperti id dan nama mata kuliah.
---

### 🧑‍💻 Anggota 4: Graine Ivana Lumbantobing (235150701111042)  
Kelompok: Pengaturan Tabel Prodi & Pivot  
- Membuat model Prodi.php dengan menentukan field $fillable dan menambahkan relasi one-to-many ke model Mahasiswa.
- Mengimplementasikan metode index() di ProdiController.php untuk mengambil dan menampilkan semua data prodi dari database.
- Membuat file migration create_prodis_table.php untuk mendefinisikan struktur tabel prodis beserta kolom yang diperlukan.
- Membuat file migration create_mahasiswa_matakuliah_table.php sebagai tabel pivot many-to-many antara mahasiswa dan matakuliah, dengan foreign key dan composite key.
- Menambahkan route di file web.php untuk mengarahkan request ke ProdiController, sehingga data prodi dapat diakses melalui URL yang sesuai.
---

### 🧑‍💻 Anggota 5: Noor Azizah Zeliana Putri (235150700111044)  
Kelompok: Routing & Seeding  
- Menambahkan route POST /register dan POST /login pada web.php untuk menangani proses registrasi dan login pengguna.
- Mendefinisikan grup route dengan middleware auth untuk membatasi akses ke MahasiswaController, ProdiController, dan MatakuliahController hanya bagi pengguna yang telah terautentikasi.
- Mengimplementasikan ProdiTableSeeder.php untuk mengisi data awal program studi ke dalam tabel prodis.
- Mengimplementasikan MatakuliahTableSeeder.php untuk mengisi data awal mata kuliah ke dalam tabel matakuliahs.
- Memperbarui DatabaseSeeder.php agar memanggil ProdiTableSeeder dan MatakuliahTableSeeder saat proses seeding database dijalankan.
---

### 🧑‍💻 Anggota 6: Mutiara Dwi Artono (235150701111052)  
Kelompok: Konfigurasi Aplikasi & Setup Lainnya  
- Mengaktifkan withFacades() dan withEloquent() di bootstrap/app.php untuk mendukung fitur dasar Lumen.
- Mendaftarkan alias JWTAuth dan JWTFactory di bootstrap/app.php agar penggunaan facade JWT lebih praktis.
- Memastikan middleware auth (App\Http\Middleware\Authenticate::class) dan ExampleMiddleware telah terdaftar dengan benar.
- Mendaftarkan AppServiceProvider, AuthServiceProvider, EventServiceProvider, dan Tymon\JWTAuth\Providers\LumenServiceProvider sebagai service provider untuk mengaktifkan fitur inti dan JWT.
- Membuat file konfigurasi jwt.php di dalam folder config/ dan menyesuaikannya dengan pengaturan secret, ttl, alg, model pengguna (App\Models\Mahasiswa), serta identifier (nim) untuk mendukung mekanisme autentikasi JWT.
- Mengatur nilai APP_KEY dan JWT_SECRET di file .env dengan string acak untuk mendukung keamanan aplikasi dan autentikasi JWT.
- Menginstal package tymon/jwt-auth versi ^2.0 yang kompatibel dengan Lumen.
- Mengonfigurasi config/auth.php agar menggunakan driver jwt dan provider mahasiswas.
- Menggunakan Carbon::now() untuk mengisi nilai created_at dan updated_at saat proses seeding di ProdiTableSeeder dan MataKuliahTableSeeder.
- Menjalankan perintah php artisan db:seed untuk mengeksekusi seeder yang telah dipanggil di DatabaseSeeder.php.

## 📮 End-Point API

| Metode | Endpoint               | Deskripsi                                               | Perlu Autentikasi? |
|--------|------------------------|----------------------------------------------------------|---------------------|
| POST   | /register              | Register mahasiswa baru                                  | Tidak               |
| POST   | /login                 | Login dan mendapatkan JWT token                          | Tidak               |
| GET    | /mahasiswa             | Lihat semua mahasiswa                                    | Ya                  |
| GET    | /prodi                 | Lihat semua prodi                                        | Ya                  |
| GET    | /mahasiswa/prodi/{id} | Filter mahasiswa berdasarkan ID prodi                    | Ya                  |
| GET    | /matkul                | Lihat semua daftar mata kuliah                           | Ya                  |
| POST   | /matkul/tambah         | Tambahkan mata kuliah ke mahasiswa yang login            | Ya                  |
| GET    | /matkul/{id}           | Lihat daftar mata kuliah milik mahasiswa yang login      | Ya                  |

## 📸 Screenshot Postman:
- /register
  
  ![image](https://github.com/user-attachments/assets/138ea450-5aa9-4261-be28-e4a0c7dd1775)

- /login

  ![image](https://github.com/user-attachments/assets/6d735d9b-8cbf-43e7-860e-3b7b48f40aa3)

- /mahasiswa

  ![image](https://github.com/user-attachments/assets/b9dee412-2237-497a-b1b5-e76d80e9df39)

- /prodi

  ![image](https://github.com/user-attachments/assets/53b50144-b931-4f73-a40e-86a1015cb176)

- /mahasiswa/prodi/{id}

  ![image](https://github.com/user-attachments/assets/c25840c0-730f-4893-aa76-0839be914d07)

- /matkul

  ![image](https://github.com/user-attachments/assets/8b0e64e5-0901-4a28-94d5-3c9dbd99f150)

- /matkul/tambah

  ![image](https://github.com/user-attachments/assets/16ec078b-78c9-43b8-a6cb-d39e39d525d8)

- /matkul/{id}

  ![image](https://github.com/user-attachments/assets/2691d33a-1985-4862-b3d4-0419ecc0931a)

## 📹 Screenshot Database:
- mahasiswas

  ![image](https://github.com/user-attachments/assets/5575f8ef-4e95-47c1-896a-82bd49b46105)

- mahasiswa_matakuliah

  ![image](https://github.com/user-attachments/assets/56f7af34-dafd-46d6-8fcf-a0b25984a770)

- matakuliahs

  ![image](https://github.com/user-attachments/assets/0f0c7a87-8f4b-4bb2-8198-a2ef50223287)

- migrations

  ![image](https://github.com/user-attachments/assets/20c77433-0996-4158-9f7c-c12b49789c59)

- prodis

  ![image](https://github.com/user-attachments/assets/a78a8c0f-4d46-448d-a6e2-3518cbad9200)

## 🖼️ ERD

![ERD_UAP_TIS](https://github.com/user-attachments/assets/097ee1c8-d8c2-4af2-9722-cef7b0ee9c86)

## 🎥 Video Presentasi

Presentasi proyek ini dapat ditonton melalui link berikut:

🔗 https://drive.google.com/drive/folders/1rV-ktACp8D_BAw8CIWacn02OvTixY5zi?usp=sharing
