<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kalender - Birthday Reminder</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{display:flex;min-height:100vh;background:#FDF2F2;}
.sidebar{width:240px;background:#FDEEEE;padding:30px 20px;position:fixed;height:100vh;}
.sidebar-logo{font-size:18px;font-weight:700;color:#703030;margin-bottom:40px;display:flex;align-items:center;gap:8px;}
.sidebar-nav a{display:flex;align-items:center;gap:12px;padding:12px 14px;margin-bottom:6px;border-radius:10px;color:#777;text-decoration:none;font-size:15px;}
.sidebar-nav a:hover{background:#F8D8D8;}
.sidebar-nav a.active{background:#F8D8D8;color:#904040;font-weight:600;}
.main{flex:1;margin-left:240px;padding:40px 50px;}
h1{font-size:28px;color:#703033;margin-bottom:8px;}
p{color:#999;}
</style>
</head>
<body>
<aside class="sidebar">
<div class="sidebar-logo">🎂 BIRTHDAY Reminder</div>
<nav class="sidebar-nav">
<a href="{{ route('dashboard') }}"><span>🏠</span> Dashboard</a>
<a href="{{ route('friends.index') }}"><span>👥</span> Friends</a>
<a href="{{ route('notification') }}"><span>🔔</span> Notification</a>
<a href="{{ route('calendar') }}" class="active"><span>📅</span> Calendar</a>
<a href="{{ route('profile') }}"><span>👤</span> Profile</a>
</nav>
</aside>
<main class="main">
  <h1>Kalender 📅</h1>
  <p>Halaman kalender berhasil dibuka ✅</p>
</main>
</body>
</html>
