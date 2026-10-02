<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Teman Baru - Birthday Reminder</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{display:flex;min-height:100vh;background:#FDF2F2;}
.sidebar{width:240px;background:#FDEEEE;padding:30px 20px;position:fixed;height:100vh;}
.sidebar-logo{font-size:18px;font-weight:700;color:#703030;margin-bottom:40px;display:flex;align-items:center;gap:8px;}
.sidebar-nav a{display:flex;align-items:center;gap:12px;padding:12px 14px;margin-bottom:6px;border-radius:10px;color:#777;text-decoration:none;font-size:15px;}
.sidebar-nav a:hover{background:#F8D8D8;}
.sidebar-nav a.active{background:#F8D8D8;color:#904040;font-weight:600;}
.main{flex:1;margin-left:240px;padding:40px 50px;}
.page-header h1{font-size:28px;color:#703033;margin-bottom:8px;}
.page-header p{color:#999;margin-bottom:40px;}
.form-card{background:white;border-radius:16px;padding:40px;max-width:520px;margin:0 auto;box-shadow:0 2px 8px rgba(0,0,0,0.03);}
.avatar-area{text-align:center;margin-bottom:30px;}
.avatar-circle{width:80px;height:80px;background:#FDE0E0;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:28px;color:#B85060;font-weight:700;margin:0 auto 15px;}
.avatar-buttons{display:flex;gap:10px;justify-content:center;}
.avatar-buttons button{padding:8px 16px;border:none;border-radius:20px;cursor:pointer;font-size:14px;}
.btn-upload{background:#E0E8F8;color:#4060B0;}
.btn-icon{background:#F0E8E8;color:#906060;}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-bottom:20px;}
.form-group{margin-bottom:20px;}
.form-group label{display:block;font-size:14px;color:#666;margin-bottom:8px;}
.form-group input{width:100%;padding:12px 16px;border:1px solid #F0E0E0;border-radius:10px;font-size:15px;background:#FDF8F8;}
.btn-simpan{width:100%;padding:14px;background:#C85060;color:white;border:none;border-radius:10px;font-size:16px;font-weight:600;cursor:pointer;margin-top:10px;}
.btn-simpan:hover{background:#B04050;}
</style>
</head>
<body>
<aside class="sidebar">
<div class="sidebar-logo">🎂 BIRTHDAY Reminder</div>
<nav class="sidebar-nav">
<a href="{{ route('dashboard') }}"><span>🏠</span> Dashboard</a>
<a href="{{ route('friends.index') }}"><span>👥</span> Friends</a>
<a href="{{ route('notification') }}"><span>🔔</span> Notification</a>
<a href="{{ route('calendar') }}"><span>📅</span> Calendar</a>
<a href="{{ route('profile') }}"><span>👤</span> Profile</a>
</nav>
</aside>

<main class="main">
<div class="page-header">
  <h1>Tambah Teman Baru</h1>
  <p>Isi formulir di bawah ini untuk menambahkan teman ke daftar pengingat ulang tahun</p>
</div>

<div class="form-card">
  <form action="{{ route('friends.store') }}" method="post">
    @csrf

    <div class="avatar-area">
      <div class="avatar-circle">TB</div>
      <div class="avatar-buttons">
        <button type="button" class="btn-upload">Upload Foto</button>
        <button type="button" class="btn-icon">Pilih Icon</button>
      </div>
      <p style="font-size:12px;color:#AAA;margin-top:8px;">Format: JPG, PNG, WEBP. Maksimal 2MB.</p>
    </div>

    <div class="form-group">
      <label>Nama Teman</label>
      <input type="text" name="nama_teman" placeholder="Masukan nama teman" required>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>No. Telepon (Opsional)</label>
        <input type="tel" name="no_telepon" placeholder="Masukan nomor telepon">
      </div>
      <div class="form-group">
        <label>Email (Opsional)</label>
        <input type="email" name="email" placeholder="Masukan alamat email">
      </div>
    </div>

    <div class="form-group">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" required>
    </div>

    <button type="submit" class="btn-simpan">Simpan Teman</button>
  </form>
</div>
</main>
</body>
</html>
