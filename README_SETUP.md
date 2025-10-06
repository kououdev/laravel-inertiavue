# Laravel InertiaJS Vue Bootstrap Dashboard

## Setup yang telah dibuat:

### 1. **Technology Stack:**

-   ✅ Laravel 11
-   ✅ InertiaJS
-   ✅ Vue 3
-   ✅ Bootstrap CSS 5 (bukan Tailwind)
-   ✅ Bootstrap Icons

### 2. **Features yang sudah dibuat:**

#### **Dashboard:**

-   Halaman dashboard dengan layout Bootstrap
-   Menu navigasi atas dengan menu Dashboard dan Customer
-   Menampilkan "Welcome to Dashboard Page"
-   Statistik total customers

#### **Customer Management (CRUD):**

-   ✅ **Create** - Modal form untuk tambah customer baru
-   ✅ **Read** - Tampilan tabel dengan pagination dan search
-   ✅ **Update** - Modal form untuk edit customer
-   ✅ **Delete** - Modal konfirmasi hapus customer

#### **Modal Features:**

-   ✅ Add Customer Modal dengan form validation
-   ✅ Edit Customer Modal dengan pre-filled data
-   ✅ Delete Confirmation Modal dengan preview data
-   ✅ Success Alert Modal (auto close 3 detik)
-   ✅ **Tidak ada alert()** - semua menggunakan modal Bootstrap

#### **Search & Filter:**

-   ✅ Pencarian customer berdasarkan nama, email, phone
-   ✅ Real-time search dengan clear button
-   ✅ Pagination support

### 3. **Database:**

-   Table `customers` dengan fields:
    -   id (primary key)
    -   name (required)
    -   email (required, unique)
    -   phone (optional)
    -   address (optional)
    -   timestamps

### 4. **UI/UX Features:**

-   ✅ Responsive design dengan Bootstrap 5
-   ✅ Loading spinners pada form submissions
-   ✅ Form validation (client & server side)
-   ✅ Beautiful icons dari Bootstrap Icons
-   ✅ Clean and modern design
-   ✅ Success/Error feedback menggunakan modal

### 5. **Sample Data:**

-   5 sample customers sudah dibuat melalui seeder

## Cara Menjalankan:

1. **Install dependencies:**

    ```bash
    composer install
    npm install
    ```

2. **Setup database:**

    ```bash
    php artisan migrate
    php artisan db:seed --class=CustomerSeeder
    ```

3. **Build assets:**

    ```bash
    npm run build
    # atau untuk development:
    npm run dev
    ```

4. **Run server:**

    ```bash
    php artisan serve
    ```

5. **Akses aplikasi:**
    - Dashboard: http://127.0.0.1:8000/dashboard
    - Customer: http://127.0.0.1:8000/customers

## Menu Navigasi:

### Dashboard

-   URL: `/dashboard`
-   Menampilkan halaman welcome dengan statistik

### Customer

-   URL: `/customers`
-   CRUD customer dengan modal interface
-   Search dan pagination
-   Add/Edit/Delete menggunakan modal Bootstrap

## Semua permintaan sudah terpenuhi:

-   ✅ Laravel + InertiaJS + Vue
-   ✅ Bootstrap CSS 5 (bukan Tailwind)
-   ✅ Dashboard simple dengan menu navigasi
-   ✅ CRUD Customer menggunakan modal
-   ✅ Search, Add, Edit, Delete pakai modal
-   ✅ Tidak pakai alert(), semua modal Bootstrap
-   ✅ Design responsive dan modern
