<div align="center">
 
# SI KOS
![Author](https://img.shields.io/badge/Author-ibnusyawall-blue.svg?style=for-the-badge&logo=github)
<p>Aplikasi Sistem Informasi KOS dibuat menggunakan Laravel dan VueJS</p>
</div>

## About Aplication
Aplikasi Sistem Informasi KOS, bertujuan guna untuk memudahkan pemilik kos dalam melakukan managemen user dan pembayaran user. Terdiri dari 2 role/ level, yaitu Admin dan User, dimana Admin dapat melakukan Tambah, Edit, Hapus User dan Fasilitas, sedangkan User hanya dapat melihat status pembayaran mereka.

## Installation

Use the package manager (composer) for installing

```bash
> git clone https://github.com/ibnusyawall/si-kos.git
> cd si-kos
> composer update
> npm install
> copy .env.example .env
> php artisan key:generate
```

Buat database dengan nama <b>si_kos</b>, setelah database berhasil dibuat, setting informasi database pada file .env

* Jika file .env tidak ada, ubah file .env.example menjadi .env dan jalankan command <b>php artisan key:generate</b>. Dan setting informasi database pada file .env
  
## Setup

Lakukan perintah dibawah ini jika sudah setting database di .env

```bash
> php artisan install
```

## Run

```bash
> npm run dev
> php artisan serve
```

pergi ke halaman login dengan akses url: http://localhost:8000/login

## Demo Account
Username: admin<br/>
Password: Admin12345<br/><br/>

Username: arya<br/>
Password: Arya12345<br/><br/>

Username: ajid<br/>
Password: Ajid12345<br/><br/>

## Screenshot

<p align="center">
  <img alt="halaman-login" src="https://raw.githubusercontent.com/ibnusyawall/si-kos/main/screenshots/sikos-login.png"/><br/><br/>
  <img alt="halaman-dashboard-admin" src="https://raw.githubusercontent.com/ibnusyawall/si-kos/main/screenshots/sikos-admin-dashboard.png"/><br/><br/>
  <img alt="halaman-fasilitas" src="https://raw.githubusercontent.com/ibnusyawall/si-kos/main/screenshots/sikos-admin-fasilitas.png"/><br/><br/>
  <img alt="halaman-dashboard-user" src="https://raw.githubusercontent.com/ibnusyawall/si-kos/main/screenshots/sikos-user-dashboard-1.png"/><br/><br/>
  <img alt="halaman-dashboard-user" src="https://raw.githubusercontent.com/ibnusyawall/si-kos/main/screenshots/sikos-user-dashboard-2.png"/><br/><br/>
</p>

## Contact Me
 
Informasi lebih lanjut bisa hubungi saya melalui:<br/>
<a href="https://wa.me/6282299265151"><img alt="WhatsApp" src="https://img.shields.io/badge/WhatsApp%20-25D366?style=for-the-badge&logo=whatsapp&logoColor=white"/></a>
