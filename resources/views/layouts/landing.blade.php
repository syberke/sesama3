<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'BAZMA Pertamina - Berbagi Kebaikan')</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --bazma-blue: #0071bc;
      --bazma-gold: #ffd700;
    }

    * {margin: 0; padding: 0; box-sizing: border-box;}
    body {
      font-family: "Inter", sans-serif;
      background-color: #f8fafc;
      color: #1a1a1a;
      overflow-x: hidden;
    }

    /* === NAVBAR === */
    header {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 60px;
      background: transparent;
      z-index: 100;
      transition: background 0.3s ease, backdrop-filter 0.3s ease;
    }

    header.scrolled {
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(6px);
    }

    .logo {
      color: #fff;
      font-weight: 800;
      font-size: 22px;
      display: flex;
      align-items: center;
      gap: 8px;
      letter-spacing: 0.5px;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 32px;
    }

    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: var(--bazma-gold);
    }

    .btn-login {
      display: inline-block;
      border-radius: 50px;
      background: #fff;
      color: var(--bazma-blue);
      padding: 10px 22px;
      font-weight: 700;
      font-size: 15px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      background: var(--bazma-gold);
      color: #000;
      transform: translateY(-2px);
    }

    /* === RESPONSIVE === */
    .menu-toggle {
      display: none;
      font-size: 28px;
      color: #fff;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      header {
        padding: 16px 24px;
      }

      nav ul {
        position: absolute;
        top: 70px;
        right: 0;
        width: 220px;
        flex-direction: column;
        background: rgba(0, 0, 0, 0.9);
        border-radius: 12px;
        padding: 20px;
        gap: 20px;
        display: none;
      }

      nav ul.active {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }
    }

    main {
      padding-top: 100px;
    }

    footer {
      background: #1e3a8a;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">BAZMA Pertamina</div>
    <nav>
      <ul id="nav-links">
        <li><a href="{{ route('landing') }}">Beranda</a></li>
        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
        <li><a href="{{ route('zakat') }}">zakat</a></li>
        <li><a href="{{ route('wakaf') }}">wakaf</a></li>
        <li><a href="{{ route('kontak') }}">kontak</a></li>
        <li><a href="{{ route('kontak') }}">Volunteer</a></li>
      </ul>
      <div class="menu-toggle" id="menu-toggle">☰</div>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    <p class="mb-0">&copy; {{ date('Y') }} BAZMA Pertamina — Berbagi Kebaikan</p>
  </footer>

  <script>
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 50);
    });

    const menuToggle = document.getElementById('menu-toggle');
    const navLinks = document.getElementById('nav-links');
    menuToggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });
  </script>
</body>
</html>
