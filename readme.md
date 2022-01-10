## Cara menggunakan Aplikasi

- Buat database untuk menyimpan tabel di phpMySql
- 'your_database' bisa disesuaikan dengan nama database
- nama pkm disarankan 'pkm'
```sql
CREATE DATABASE `your_database`
```

- Setting file .env untuk masuk ke database yang telah dibuat
- Apabila nama database adalah 'pkm' maka bisa melewati tahap ini
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE='your_database'
DB_USERNAME=root
DB_PASSWORD=
```

- Migrate tabel yang sudah tersedia
```cmd
php artisan migrate
```

- Buat akun admin dengan seeding

- Email default admin : superAdmin@admin.com  
- Password default admin : secret
- Login admin dan user satu page

```cmd
php artisan db:seed
```

- Setting max_upload karena default cuma 2 mb di php.ini

- harusnya filenya ada di C:\xampp\php\php.ini ada 2 file dua duanya diganti
```cmd
upload_max_filesize = 8M
```

- Jalankan Local Server
```cmd
php artisan serve
```

- Aplikasi bisa dibuka 
```cmd
127.0.0.1:8000
```

Fitur yang sudah tersedia
Untuk User

- Login + Register ketua
- Registrasi PKM
- Input Class Sesuai Dengan Lecturer Yang Sudah Dibuat
- Upload File Sesuai Session Yang Dibuat Admin

Untuk Admin

- Add New Lecturer
- Add Class Sesuai Lecturer
- Add Session Untuk Jadwal Upload
- Add Term
- Download uploaded pkm
