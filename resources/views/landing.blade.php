<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BAZMA Pertamina - Program Berbagi Kebaikan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --bazma-blue: #0071bc;
      --bazma-green: #00a651;
      --bazma-gold: #ffd700;
      --text-dark: #1a1a1a;
      --text-light: #666;
      --bg-light: #f8f9fa;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; scroll-behavior: smooth; }
    body {
      font-family: "Inter", sans-serif;
      background: #fff;
      color: var(--text-dark);
      overflow-x: hidden;
      line-height: 1.6;
    }
    /* === HEADER / NAVBAR === */
header {
  position: fixed;
  top: 0; left: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 18px 60px;
  z-index: 100;
  background: transparent;
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
  letter-spacing: 1px;
}

nav {
  display: flex;
  align-items: center;
  gap: 30px;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 32px;
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s ease;
}

.nav-links a:hover {
  color: var(--bazma-gold);
}

/* === RESPONSIVE NAVBAR === */
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

  .nav-links {
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

  .nav-links.active {
    display: flex;
  }

  .menu-toggle {
    display: block;
  }
}

.volunteer-banner {
  position: relative;
  margin: 100px auto;
  width: 90%;
  max-width: 1400px;
  height: 400px;
  background: url('https://images.pexels.com/photos/6646918/pexels-photo-6646918.jpeg') center/cover no-repeat;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 8px 24px rgba(0,0,0,0.15);
}

.vol-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(0,113,188,0.9), rgba(0,166,81,0.7));
  color: #fff;
  text-align: center;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
}

.vol-overlay h2 {
  font-size: 40px;
  font-weight: 800;
  margin-bottom: 12px;
}

.vol-overlay h2 span {
  color: #ffd700;
}

.vol-overlay p {
  font-size: 18px;
  margin-bottom: 28px;
  opacity: 0.95;
}

.btn-volunteer {
  background: #e53935;
  color: #fff;
  font-weight: 700;
  padding: 12px 28px;
  border-radius: 50px;
  text-decoration: none;
  font-size: 16px;
  transition: all 0.3s ease;
}

.btn-volunteer:hover {
  background: #fff;
  color: #e53935;
  transform: translateY(-2px);
}

@media (max-width: 768px) {
  .volunteer-banner {
    height: 240px;
  }
  .vol-overlay h2 {
    font-size: 28px;
  }
  .vol-overlay p {
    font-size: 15px;
  }
}

    /* HEADER */
  header {
  position: fixed;
  top: 0; left: 0; width: 100%;
  display: flex; justify-content: space-between; align-items: center;
  padding: 18px 60px;
  z-index: 50;
  background: transparent;
  transition: background 0.3s ease, backdrop-filter 0.3s ease;
}

header.scrolled {
  background: rgba(234, 230, 230, 0.85);
  backdrop-filter: blur(6px);
}


    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #fff;
      font-weight: 700;
      font-size: 20px;
    }

    nav {
      display: flex;
      gap: 32px;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    nav a:hover {
      color: var(--bazma-gold);
    }

    /* HERO */
    .hero {
      position: relative;
      height: 100vh;
      min-height: 600px;
      overflow: hidden;
    }
    .slide {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      opacity: 0;
      transition: opacity 2s ease-in-out;
    }
    .slide.active { opacity: 1; }
    .hero::after {
      content: "";
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(0,113,188,0.8), rgba(0,166,81,0.7));
      z-index: 1;
    }
    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      color: #fff;
      top: 50%;
      transform: translateY(-50%);
      max-width: 900px;
      margin: 0 auto;
      padding: 0 20px;
      animation: fadeInUp 1.2s ease;
    }
    .hero-content h1 {
      font-size: 56px;
      font-weight: 800;
      margin-bottom: 24px;
      text-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    .hero-content p {
      font-size: 20px;
      margin-bottom: 32px;
      color: #f0f0f0;
    }

    .hero-stats {
      display: flex;
      justify-content: center;
      gap: 48px;
      flex-wrap: wrap;
      margin-top: 48px;
    }
    .stat-item {
      text-align: center;
    }
    .stat-number {
      font-size: 42px;
      font-weight: 800;
      color: var(--bazma-gold);
    }
    .stat-label {
      font-size: 14px;
      text-transform: uppercase;
    }

    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(40px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* INTRO */
    .intro {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 120px 60px;
      gap: 100px;
      flex-wrap: wrap;
      background: var(--bg-light);
    }
    .intro img {
      width: 480px;
      border-radius: 16px;
      box-shadow: 0 12px 32px rgba(0,0,0,0.12);
      transition: transform 0.3s ease;
    }
    .intro img:hover { transform: scale(1.02); }

    .intro-text {
      max-width: 640px;
    }
    .intro-text h3 {
      color: var(--bazma-blue);
      font-weight: 700;
      font-size: 14px;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }
    .intro-text h2 {
      font-size: 42px;
      font-weight: 800;
      margin-bottom: 20px;
    }
    .intro-text p {
      color: var(--text-light);
      font-size: 17px;
      margin-bottom: 16px;
    }

    /* PROGRAM */
    .program-wrapper {
      text-align: center;
      padding: 100px 60px;
      background: #fff;
    }

    .program-wrapper h2 {
      font-size: 42px;
      font-weight: 800;
      margin-bottom: 16px;
    }
    .program-wrapper > p {
      color: var(--text-light);
      margin-bottom: 64px;
      font-size: 18px;
      max-width: 700px;
      margin-inline: auto;
    }

    .program-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 32px;
      text-align: left;
      max-width: 1400px;
      margin: 0 auto;
    }

    .program-card {
      position: relative;
      height: 420px;
      background-size: cover;
      background-position: center;
      border-radius: 16px;
      overflow: hidden;
      display: flex;
      align-items: flex-end;
      padding: 32px;
      color: #fff;
      box-shadow: 0 8px 24px rgba(0,0,0,0.12);
      transition: all 0.4s ease;
    }
    .program-card::after {
      content: "";
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2));
      transition: all 0.4s ease;
    }
    .program-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 16px 40px rgba(0,0,0,0.25);
    }
    .program-card:hover::after {
      background: linear-gradient(to top, rgba(0,113,188,0.9), rgba(0,166,81,0.4));
    }
    .program-content {
      position: relative;
      z-index: 2;
    }
    .program-content h5 {
      font-size: 12px;
      letter-spacing: 2px;
      margin-bottom: 10px;
      opacity: 0.9;
    }
    .program-content h3 {
      font-size: 24px;
      font-weight: 800;
      margin-bottom: 16px;
    }

    .btn-login {
      display: inline-block;
      border-radius: 50px;
      background: #fff;
      color: var(--bazma-blue);
      padding: 12px 28px;
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

    /* FOOTER */
    footer {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
      color: #fff;
      padding: 60px 20px;
    }
    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 40px;
      max-width: 1200px;
      margin: 0 auto 40px;
    }
    .footer-grid h4 {
      margin-bottom: 16px;
      font-size: 18px;
      font-weight: 700;
      color: var(--bazma-gold);
    }
    .footer-grid p, .footer-grid a {
      color: #ccc;
      font-size: 15px;
      text-decoration: none;
      line-height: 1.8;
    }
    .footer-grid a:hover { color: #fff; }
    .footer-bottom {
      text-align: center;
      border-top: 1px solid rgba(255,255,255,0.1);
      padding-top: 20px;
      font-size: 14px;
      color: #aaa;
    }

    @media (max-width: 768px) {
      header { padding: 16px 24px; }
      .hero-content h1 { font-size: 36px; }
      .hero-content p { font-size: 16px; }
      .intro { padding: 80px 24px; gap: 48px; }
      .program-wrapper { padding: 80px 24px; }
      .program-wrapper h2 { font-size: 32px; }
    }
  </style>
</head>
<body>
  <header>
 <div class="logo">
  <img src="{{ asset('image/logo.png') }}"
       alt="Bazma x Pertamina Logo"
       style="height:60px;width:auto;object-fit:contain;border-radius:6px;
       onerror="this.onerror=null;this.src='{{ asset('image/foto.png') }}';">
</div>


  <nav>
    <ul class="nav-links">
      <li><a href="{{ route('landing') }}">Beranda</a></li>
      <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
      <li><a href="{{ route(name: 'program') }}">Program</a></li>
      <li><a href="{{ route('zakat') }}">zakat</a></li>
      <li><a href="{{ route('wakaf') }}">wakaf</a></li>
      <li><a href="{{ route('kontak') }}">kontak</a></li>
    </ul>
    <div class="menu-toggle" id="menu-toggle">
      ☰
    </div>
  </nav>
</header>


  <!-- HERO -->
  <section class="hero" id="beranda">
    <div class="slide active" style="background-image:url('https://images.pexels.com/photos/8613089/pexels-photo-8613089.jpeg');"></div>
    <div class="slide" style="background-image:url('https://images.pexels.com/photos/5905492/pexels-photo-5905492.jpeg');"></div>
    <div class="slide" style="background-image:url('https://images.pexels.com/photos/6646918/pexels-photo-6646918.jpeg');"></div>

    <div class="hero-content">
      <h1>Berbagi Kebaikan untuk Masa Depan Lebih Cerah</h1>
      <p>Bersama BAZMA Pertamina, wujudkan masa depan Indonesia yang lebih sejahtera melalui pendidikan, kesehatan, dan pemberdayaan masyarakat.</p>
      <div class="hero-stats">
        <div class="stat-item"><span class="stat-number">10K+</span><span class="stat-label">Penerima Manfaat</span></div>
        <div class="stat-item"><span class="stat-number">50+</span><span class="stat-label">Program Aktif</span></div>
        <div class="stat-item"><span class="stat-number">100+</span><span class="stat-label">Mitra</span></div>
      </div>
    </div>
  </section>

  <!-- INTRO -->
  <section class="intro" id="tentang">
    <img src="https://images.pexels.com/photos/6646917/pexels-photo-6646917.jpeg" alt="Program BAZMA Pertamina">
    <div class="intro-text">
      <h3>TENTANG KAMI</h3>
      <h2>Menjembatani Kebaikan untuk Masyarakat</h2>
      <p>BAZMA Pertamina adalah lembaga filantropi milik Pertamina yang berkomitmen menyalurkan bantuan sosial, pendidikan, dan pemberdayaan ekonomi kepada masyarakat yang membutuhkan.</p>
      <p>Kami menjunjung tinggi transparansi dan akuntabilitas dalam setiap langkah untuk memastikan setiap bantuan memberi dampak nyata.</p>
    </div>
  </section>

  <!-- PROGRAM -->
  <section class="program-wrapper" id="program">
    <h2>Program Unggulan Kami</h2>
    <p>Berbagai program sosial yang kami jalankan untuk memberikan dampak nyata bagi masyarakat Indonesia.</p>

    <div class="program-section">
      <div class="program-card" style="background-image:url('https://images.pexels.com/photos/8465217/pexels-photo-8465217.jpeg');">
        <div class="program-content">
          <h5>PENDIDIKAN</h5>
          <h3>Bantuan Perlengkapan Sekolah</h3>
          <a href="{{ route('login') }}" class="btn-login">Kelola Program →</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://images.pexels.com/photos/5905497/pexels-photo-5905497.jpeg');">
        <div class="program-content">
          <h5>BEASISWA</h5>
          <h3>Program Beasiswa Pendidikan</h3>
          <a href="{{ route('login') }}" class="btn-login">Kelola Program →</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://images.pexels.com/photos/6647035/pexels-photo-6647035.jpeg');">
        <div class="program-content">
          <h5>KESEHATAN</h5>
          <h3>Layanan Kesehatan Gratis</h3>
          <a href="{{ route('login') }}" class="btn-login">Kelola Program →</a>
        </div>
      </div>

      <div class="program-card" style="background-image:url('https://images.pexels.com/photos/4226140/pexels-photo-4226140.jpeg');">
        <div class="program-content">
          <h5>EKONOMI</h5>
          <h3>Pemberdayaan UMKM</h3>
          <a href="{{ route('login') }}" class="btn-login">Kelola Program →</a>
        </div>
      </div>
    </div>
  </section>
 <section class="volunteer-banner" id="volunteer">
  <div class="vol-overlay">
    <h2>Gabung <span>#JadiVolunteer</span></h2>
    <p>Yuk bergabung dalam setiap program kebaikan Bazma</p>
    <a href="{{ route('login') }}" class="btn-volunteer">Daftar Volunteer →</a>
  </div>
</section>

  <!-- FOOTER -->
  <footer>
  <style>
    footer {
      background: rgba(0, 0, 0, 0.85);
      backdrop-filter: blur(8px);
      color: #f5f5f5;
      padding: 60px 10%;
      border-top: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0 -3px 20px rgba(255, 255, 255, 0.05);
      font-family: "Poppins", sans-serif;
      position: relative;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 40px;
    }

    .footer-grid h4 {
      font-size: 1.3rem;
      color: #ffd700;
      margin-bottom: 15px;
      border-left: 4px solid #ffd700;
      padding-left: 10px;
    }

    .footer-grid p {
      color: #e6e6e6;
      line-height: 1.7;
      font-size: 0.95rem;
    }

    .footer-grid a {
      color: #f1c232;
      text-decoration: none;
      font-size: 0.95rem;
      transition: color 0.3s ease, transform 0.2s ease;
      display: inline-block;
      margin: 5px 0;
    }

    .footer-grid a:hover {
      color: #fff;
      transform: translateX(5px);
    }

    .footer-bottom {
      text-align: center;
      margin-top: 50px;
      padding-top: 25px;
      border-top: 1px solid rgba(255, 255, 255, 0.2);
      color: #bbb;
      font-size: 0.9rem;
    }

    /* Efek garis dekoratif */
    footer::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, #ffd700, transparent, #ffd700);
      opacity: 0.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
      footer {
        padding: 40px 6%;
      }

      .footer-grid {
        gap: 30px;
      }

      .footer-grid h4 {
        font-size: 1.1rem;
      }
    }

    /* Animasi halus saat muncul */
    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    footer {
      animation: fadeUp 1s ease-in-out;
    }
  </style>

  <div class="footer-grid">
    <div>
      <h4>Tentang Kami</h4>
      <p>
        BAZMA Pertamina adalah lembaga filantropi PT Pertamina (Persero) yang
        bergerak di bidang sosial, pendidikan, kesehatan, dan pemberdayaan
        masyarakat.
      </p>
    </div>

    <div>
      <h4>Tautan Cepat</h4>
      <a href="#beranda">Beranda</a><br />
      <a href="#program">Program</a><br />
      <a href="#tentang">Tentang</a>
    </div>

    <div>
      <h4>Kontak</h4>
      <p>Email: info@bazmapertamina.org</p>
      <p>Telp: (021) 123-4567</p>
      <p>Alamat: Jl. Medan Merdeka Timur No.1, Jakarta</p>
    </div>
  </div>

  <div class="footer-bottom">
    &copy;
    <script>
      document.write(new Date().getFullYear());
    </script>
    FABYAP. Semua hak cipta dilindungi.
  </div>
</footer>


  <script>
    const slides = document.querySelectorAll('.slide');
    let index = 0;
    setInterval(() => {
      slides[index].classList.remove('active');
      index = (index + 1) % slides.length;
      slides[index].classList.add('active');
    }, 5000);

    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
      header.classList.toggle('scrolled', window.scrollY > 50);
    });
  </script>
</body>
</html>
