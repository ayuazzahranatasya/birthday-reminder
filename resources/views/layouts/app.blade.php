<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Reminder</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background: #fef2f4; min-height: 100vh; }
        .sidebar { width: 250px; background: #fde8eb; min-height: 100vh; padding: 20px 0; position: fixed; }
        .sidebar h2 { padding: 0 25px 25px; color: #7a2c3f; font-size: 18px; border-bottom: 1px solid #fcd7dc; }
        .sidebar a { display: block; padding: 12px 25px; color: #555; text-decoration: none; margin: 4px 10px; border-radius: 8px; }
        .sidebar a:hover, .sidebar a.active { background: #fcd7dc; color: #7a2c3f; font-weight: 600; }
        .content { flex: 1; margin-left: 250px; padding: 30px 40px; width: 100%; }
        h1 { color: #5a2433; margin-bottom: 8px; }
        .subtitle { color: #888; margin-bottom: 30px; }
        .card { background: #fff; padding: 25px; border-radius: 14px; box-shadow: 0 2px 10px rgba(0,0,0,0.04); }
        .btn { padding: 10px 22px; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; text-decoration: none; display: inline-block; }
        .btn-primary { background: #d6485c; color: white; }
        .btn-secondary { background: #e8effc; color: #366; margin: 0 4px; }
        .btn-light { background: #eee; color: #333; margin: 0 4px; }
        input { width: 100%; padding: 12px; margin: 8px 0 16px; border: 1px solid #f0d2d7; border-radius: 8px; font-size: 14px; background: #fff9fa; }
        input:focus { outline: none; border-color: #d6485c; }
        label { font-weight: 500; color: #666; font-size: 14px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 25px; }
        .num-big { font-size: 32px; font-weight: bold; color: #d6485c; margin-top: 10px; }
        .flex-between { display: flex; justify-content: space-between; align-items: center; }
        .avatar-circle { width: 70px; height: 70px; background: #fcd7dc; border-radius: 50%; line-height: 70px; font-size: 24px; color: #d6485c; text-align: center; margin: 0 auto; font-weight: bold; }
        .text-center { text-align: center; }
        .text-muted { color: #999; font-size: 13px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .success-msg { background: #e6ffed; color: #2a7; padding: 10px 15px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>🎂 BIRTHDAY Reminder</h2>
        <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('friends.index') }}" class="{{ request()->is('friends*') ? 'active' : '' }}">👥 Friends</a>
        <a href="{{ route('notification') }}" class="{{ request()->is('notification') ? 'active' : '' }}">🔔 Notification</a>
        <a href="{{ route('calendar') }}" class="{{ request()->is('calendar') ? 'active' : '' }}">📅 Calendar</a>
        <a href="{{ route('profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">👤 Profile</a>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="success-msg">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>