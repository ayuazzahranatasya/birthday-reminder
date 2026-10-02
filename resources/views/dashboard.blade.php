<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Pengingat Ulang Tahun</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{display:flex;min-height:100vh;background:#FDF2F2;}
.sidebar{width:240px;background:#FDEEEE;padding:30px 20px;position:fixed;height:100vh;}
.sidebar-logo{font-size:18px;font-weight:700;color:#703030;margin-bottom:40px;}
.sidebar-nav a{display:block;padding:12px 14px;margin-bottom:6px;border-radius:8px;color:#666;text-decoration:none;}
.sidebar-nav a:hover{background:#F8D8D8;}
.sidebar-nav a.active{background:#F8D8D8;color:#903030;font-weight:600;}
.main{flex:1;margin-left:240px;padding:40px 50px;}
.page-header h1{font-size:28px;color:#703030;margin-bottom:8px;}
.page-header p{color:#999;margin-bottom:40px;}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;}
.stat-card{background:#fff;border-radius:16px;padding:30px;box-shadow:0 2px 8px rgba(0,0,0,0.03);}
.stat-card h3{font-size:16px;color:#666;margin-bottom:12px;}
.stat-card .num{font-size:36px;font-weight:700;color:#B85060;}
</style>
</head>
<body>
<aside class="sidebar">
  <div class="sidebar-logo">🎂 Pengingat Ulang Tahun</div>
  <nav class="sidebar-nav">
    <a href="{{ url('/dashboard') }}" class="active">🏠 Dashboard</a>
    <a href="{{ url('/friends') }}">👥 Teman</a>
    <a href="{{ url('/notification') }}">🔔 Notifikasi</a>
    <a href="{{ url('/calendar') }}">📅 Kalender</a>
    <a href="{{ url('/profile') }}">👤 Profil</a>
  </nav>
</aside>

<main class="main">
  <div class="page-header">
    <h1>Selamat Datang! 👋</h1>
    <p>Ringkasan Data Pengingat Ulang Tahun</p>
  </div>
  <div class="stats">
    <div class="stat-card">
      <h3>Total Teman</h3>
      <div class="num">{{ $total ?? 0 }}</div>
    </div>
    <div class="stat-card">
      <h3>Ulang Tahun Bulan Ini</h3>
      <div class="num">{{ $bulanIni ?? 0 }}</div>
    </div>
    <div class="stat-card">
      <h3>Hari Ini</h3>
      <div class="num">0</div>
    </div>
  </div>
</main>
</body>
</html>
