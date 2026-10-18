# Cara Memperbaiki Error Database Connection

## Masalah: Host 'localhost' is not allowed to connect to this MariaDB server

### Solusi Manual (Langkah-langkah):

1. **Buka XAMPP Control Panel**
   - Jalankan sebagai Administrator
   - Stop service MySQL jika sedang berjalan

2. **Edit file my.ini**
   - Buka file `C:\xampp\mysql\bin\my.ini`
   - Tambahkan baris ini di bagian `[mysqld]`:
     ```
     skip-grant-tables
     ```

3. **Start MySQL dengan skip-grant-tables**
   - Di XAMPP Control Panel, klik Start pada MySQL
   - MySQL akan start tanpa memeriksa permissions

4. **Buka Command Prompt sebagai Administrator**
   - Jalankan CMD sebagai Administrator
   - Masuk ke direktori MySQL:
     ```
     cd C:\xampp\mysql\bin
     ```

5. **Connect ke MySQL tanpa password**
   ```
   mysql -u root
   ```

6. **Jalankan perintah GRANT di MySQL prompt**
   ```sql
   USE mysql;
   UPDATE user SET host='%' WHERE user='root' AND host='localhost';
   UPDATE user SET host='%' WHERE user='root' AND host='127.0.0.1';
   FLUSH PRIVILEGES;
   EXIT;
   ```

7. **Stop MySQL di XAMPP**
   - Stop service MySQL

8. **Hapus skip-grant-tables dari my.ini**
   - Hapus baris `skip-grant-tables` yang tadi ditambahkan

9. **Start MySQL normal**
   - Start MySQL di XAMPP Control Panel

10. **Test koneksi**
    ```
    cd C:\Laravel\booking_pkl
    php artisan migrate:status
    ```

### Atau Solusi Alternatif:

Jika cara di atas tidak berhasil, coba:

1. **Reset MySQL root password**
2. **Buat user baru dengan permissions penuh**
3. **Update .env file dengan user baru**

### File .env saat ini:
```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=booking_pkl
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database `booking_pkl` sudah ada di MySQL!