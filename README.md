# StudyRoom

StudyRoom adalah aplikasi web yang dibangun menggunakan Laravel 8 untuk memfasilitasi ruang belajar dan manajemen pembelajaran.

## Tech Stack

-   **Laravel**: 8.x
-   **PHP**: 8.1.x
-   **MySQL**: 8.0.x
-   **Composer**: 2.4.x

## Requirements

Pastikan sistem Anda memiliki:

-   PHP 8.1.x atau lebih tinggi
-   MySQL 8.0.x atau lebih tinggi
-   Composer 2.4.x atau lebih tinggi
-   GCC 11.4.0 (untuk kompilasi kode C++)

## Installation & Setup

### 1. Clone Repository

```bash
git clone <repository-url>
cd studyroom
```

### 2. Install GCC 11.4.0

**Ubuntu/Debian:**

```bash
sudo apt update
sudo apt install build-essential gcc-11 g++-11

# Set as default compiler
sudo update-alternatives --install /usr/bin/gcc gcc /usr/bin/gcc-11 60
sudo update-alternatives --install /usr/bin/g++ g++ /usr/bin/g++-11 60

# Verify installation
gcc --version
g++ --version
```

**macOS:**

```bash
# Install Xcode Command Line Tools
xcode-select --install

# Install via Homebrew
brew install gcc@11

# Verify installation
gcc-11 --version
g++-11 --version
```

**Windows:**

```bash
# Install via MSYS2
pacman -S mingw-w64-x86_64-gcc

# Or install via Visual Studio Build Tools
# Download from Microsoft website
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Environment Configuration

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Database Configuration

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=studyroom
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 7. Database Setup

**Option A: Using Database File (Recommended)**
Jika tersedia file `studyroom.sql`, import database yang sudah siap pakai:

**MySQL Command Line:**

```bash
mysql -u your_username -p -e "CREATE DATABASE studyroom;"
mysql -u your_username -p studyroom < studyroom.sql
```

**phpMyAdmin:**

1. Buka phpMyAdmin
2. Buat database baru bernama `studyroom`
3. Pilih database `studyroom`
4. Klik tab **Import**
5. Pilih file `studyroom.sql`
6. Klik **Go**

**MySQL Workbench:**

1. Buka MySQL Workbench
2. Connect ke MySQL server
3. Buat schema baru: `CREATE DATABASE studyroom;`
4. Klik **Server** > **Data Import**
5. Pilih **Import from Self-Contained File**
6. Browse dan pilih file `studyroom.sql`
7. Pilih **Default Target Schema**: `studyroom`
8. Klik **Start Import**

**DBeaver:**

1. Buka DBeaver dan connect ke MySQL
2. Klik kanan pada connection, pilih **Create** > **Database**
3. Nama database: `studyroom`
4. Klik kanan pada database `studyroom`, pilih **SQL Editor** > **Execute SQL Script**
5. Pilih file `studyroom.sql`
6. Klik **Execute**

**Option B: Using Migrations & Seeders**
Jika tidak ada file `studyroom.sql`, gunakan Laravel migrations:

```bash
# Buat database kosong
mysql -u your_username -p -e "CREATE DATABASE studyroom;"

# Jalankan migrations
php artisan migrate

# (Optional) Seed database
php artisan db:seed
```

### 8. Create Storage Link

```bash
php artisan storage:link
```

## Running the Application

### Development Mode

Untuk menjalankan aplikasi dalam mode development:

```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://localhost:8000`

### Production Mode (Localhost)

#### 1. Optimize Application

```bash
# Clear dan cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

#### 2. Set Environment to Production

Edit file `.env`:

```env
APP_ENV=production
APP_DEBUG=false
```

#### 3. Generate Application Key (if not done)

```bash
php artisan key:generate
```

#### 4. Run with Production Server

Gunakan salah satu metode berikut:

**Option A: PHP Built-in Server**

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

**Option B: Using Apache/Nginx**

**Apache Configuration:**
Buat file virtual host baru (contoh: `/etc/apache2/sites-available/studyroom.conf`):

```apache
<VirtualHost *:80>
    ServerName studyroom.local
    DocumentRoot /path/to/studyroom/public

    <Directory /path/to/studyroom/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/studyroom_error.log
    CustomLog ${APACHE_LOG_DIR}/studyroom_access.log combined
</VirtualHost>
```

Enable site dan restart Apache:

```bash
sudo a2ensite studyroom.conf
sudo systemctl restart apache2
```

Tambahkan ke `/etc/hosts`:

```
127.0.0.1 studyroom.local
```

**Nginx Configuration:**
Buat file konfigurasi baru (contoh: `/etc/nginx/sites-available/studyroom`):

```nginx
server {
    listen 80;
    server_name studyroom.local;
    root /path/to/studyroom/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

Enable site dan restart Nginx:

```bash
sudo ln -s /etc/nginx/sites-available/studyroom /etc/nginx/sites-enabled/
sudo systemctl restart nginx
```

Tambahkan ke `/etc/hosts`:

```
127.0.0.1 studyroom.local
```

Akses aplikasi di: `http://studyroom.local`

**Option C: Using Laravel Valet (macOS)**

```bash
valet link studyroom
```

#### 5. Set Proper Permissions

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

## Additional Commands

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Run Tests

```bash
php artisan test
```

## Troubleshooting

### Permission Issues

```bash
sudo chown -R www-data:www-data storage
sudo chown -R www-data:www-data bootstrap/cache
```

### Storage Link (for file uploads)

```bash
php artisan storage:link
```

### Reset Database

```bash
php artisan migrate:fresh --seed
```
