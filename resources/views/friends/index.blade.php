<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Teman - Birthday Reminder</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{display:flex;min-height:100vh;background:#FDF2F2;}
.sidebar{width:240px;background:#FDEEEE;padding:30px 20px;position:fixed;height:100vh;}
.sidebar-logo{font-size:18px;font-weight:700;color:#703030;margin-bottom:40px;display:flex;align-items:center;gap:8px;}
.sidebar-nav a{display:flex;align-items:center;gap:12px;padding:12px 14px;margin-bottom:6px;border-radius:10px;color:#777;text-decoration:none;font-size:15px;}
.sidebar-nav a:hover{background:#F8D8D8;}
.sidebar-nav a.active{background:#F8D8D8;color:#904040;font-weight:600;}
.main{flex:1;margin-left:240px;padding:40px 50px;}
.page-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;}
.page-header h1{font-size:28px;color:#703033;}
.btn-tambah{background:#C85060;color:white;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;}
.btn-tambah:hover{background:#B04050;}
table{width:100%;border-collapse:collapse;background:white;border-radius:16px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.03);}
th{background:#B85060;color:white;padding:14px;text-align:left;font-weight:600;}
td{padding:14px;border-bottom:1px solid #F0E0E0;color:#555;}
.btn-detail{background:#E8C8D8;color:#904040;padding:6px 12px;border-radius:6px;text-decoration:none;font-size:14px;display:inline-block;margin-right:4px;}
.btn-edit{background:#F0E0C8;color:#906030;padding:6px 12px;border-radius:6px;text-decoration:none;font-size:14px;display:inline-block;margin-right:4px;}
.btn-hapus{background:#D85060;color:white;padding:6px 12px;border-radius:6px;text-decoration:none;font-size:14px;display:inline-block;}
</style>
</head>
<body>
<aside class="sidebar">
<div class="sidebar-logo">🎂 BIRTHDAY Reminder</div>
<nav class="sidebar-nav">
<a href="{{ route('dashboard') }}"><span>🏠</span> Dashboard</a>
<a href="{{ route('friends.index') }}" class="active"><span>👥</span> Friends</a>
<a href="{{ route('notification') }}"><span>🔔</span> Notification</a>
<a href="{{ route('calendar') }}"><span>📅</span> Calendar</a>
<a href="{{ route('profile') }}"><span>👤</span> Profile</a>
</nav>
</aside>

<main class="main">
<div class="page-header">
  <h1>Daftar Teman 👥</h1>
  <a href="{{ route('friends.create') }}" class="btn-tambah">+ Tambah Teman</a>
</div>

<table>
  <thead>
    <tr>
      <th>Nama</th>
      <th>Tanggal Lahir</th>
      <th>No. Telepon</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($friends ?? [] as $f)
    <tr>
      <td>{{ $f->nama_teman }}</td>
      <td>{{ $f->tanggal_lahir }}</td>
      <td>{{ $f->no_telepon ?? '-' }}</td>
      <td>{{ $f->email ?? '-' }}</td>
      <td>
        <a href="#" class="btn-detail">Detail</a>
        <a href="#" class="btn-edit">Edit</a>
        <a href="#" class="btn-hapus">Hapus</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="5" style="text-align:center;color:#999;padding:30px;">
        Belum ada data teman. <a href="{{ route('friends.create') }}" style="color:#C85060;">Tambah sekarang →</a>
      </td>
    </tr>
    @endforelse
  </tbody>
</table>
</main>
</body>
</html>
