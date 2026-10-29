
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NJB Smart School</title>
<style>
:root {
  --olive: #708238;
  --cream: #F1E5C0;
  --brown: #A98B6E;
  --dark: #25301D;
  --white: #ffffff;
}
* { box-sizing: border-box; }
body {
  margin: 0;
  font-family: Arial, sans-serif;
  background: #f7f6f0;
  color: #263020;
}
header {
  background: var(--olive);
  color: white;
  padding: 22px 20px;
}
.brand {
  display: flex;
  align-items: center;
  gap: 12px;
}
.logo {
  background: var(--cream);
  color: var(--dark);
  border-radius: 12px;
  padding: 12px;
  font-weight: bold;
  font-size: 20px;
}
header h1 { margin: 0; font-size: 21px; }
header p { margin: 6px 0 0; font-size: 12px; }
.container {
  max-width: 1100px;
  margin: auto;
  padding: 22px 16px;
}
.welcome {
  background: var(--cream);
  padding: 24px;
  border-radius: 18px;
  margin-bottom: 22px;
}
.welcome h2 { margin: 0 0 10px; font-size: 25px; }
.welcome p { line-height: 1.6; margin-bottom: 0; }
.section-title { margin: 25px 0 14px; }
.stats {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 12px;
}
.card {
  background: white;
  padding: 18px;
  border-radius: 14px;
  border: 1px solid #e7e5d9;
  box-shadow: 0 3px 10px #26302008;
}
.card .number {
  font-size: 25px;
  font-weight: bold;
  color: var(--olive);
  margin-top: 12px;
}
.card small { color: #777; }
.units {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 12px;
}
.unit {
  display: block;
  text-decoration: none;
  color: inherit;
  background: white;
  padding: 18px 12px;
  border-radius: 14px;
  border: 1px solid #e7e5d9;
}
.unit .emoji { font-size: 27px; }
.unit h3 { margin: 10px 0 6px; font-size: 16px; }
.unit p { margin: 0; font-size: 12px; color: #777; }
.menu {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 10px;
}
.menu a {
  background: #fff;
  color: var(--dark);
  border: 1px solid #e7e5d9;
  padding: 14px 10px;
  border-radius: 10px;
  text-decoration: none;
  font-size: 14px;
}
footer {
  text-align: center;
  padding: 25px 12px;
  color: #777;
  font-size: 12px;
}
@media (min-width: 700px) {
  .stats { grid-template-columns: repeat(4, 1fr); }
  .units { grid-template-columns: repeat(4, 1fr); }
  .menu { grid-template-columns: repeat(4, 1fr); }
}
</style>
</head>
<body>
<header>
  <div class="brand">
    <div class="logo">NJB</div>
    <div>
      <h1>NJB Smart School</h1>
      <p>Yayasan Nurul Jadid Batam</p>
    </div>
  </div>
</header>

<main class="container">
  <section class="welcome">
    <small>EKOSISTEM DIGITAL TERPADU</small>
    <h2>Selamat Datang 👋</h2>
    <p>
      Satu platform untuk mendukung pengelolaan pendidikan,
      administrasi, akademik, dan layanan sekolah
      di lingkungan Yayasan Nurul Jadid Batam.
    </p>
    <strong>Cerdas Berintegritas.</strong>
  </section>

  <h2 class="section-title">Ringkasan Sistem</h2>
  <section class="stats">
    <div class="card">
      <small>Unit Pendidikan</small>
      <div class="number">4</div>
    </div>
    <div class="card">
      <small>Data Siswa</small>
      <div class="number">—</div>
      <small>Belum terhubung</small>
    </div>
    <div class="card">
      <small>Data Guru</small>
      <div class="number">—</div>
      <small>Belum terhubung</small>
    </div>
    <div class="card">
      <small>Akademik</small>
      <div class="number">Aktif</div>
      <small>Tampilan prototipe</small>
    </div>
  </section>

  <h2 class="section-title">Unit Pendidikan</h2>
  <section class="units">
    <a class="unit" href="#kbtk">
      <div class="emoji">🧸</div>
      <h3>KB – TK</h3>
      <p>Pendidikan usia dini</p>
    </a>
    <a class="unit" href="#smp">
      <div class="emoji">📚</div>
      <h3>SMP</h3>
      <p>Akademik dan kesiswaan</p>
    </a>
    <a class="unit" href="#smk">
      <div class="emoji">💻</div>
      <h3>SMK</h3>
      <p>Kompetensi dan kejuruan</p>
    </a>
    <a class="unit" href="#pesantren">
      <div class="emoji">🕌</div>
      <h3>Pesantren Putri</h3>
      <p>Tahfiz dan kajian kitab</p>
    </a>
  </section>

  <h2 class="section-title">Menu Administrasi</h2>
  <section class="menu">
    <a href="#siswa">👨‍🎓 Data Siswa</a>
    <a href="#guru">👩‍🏫 Data Guru</a>
    <a href="#absensi">📋 Absensi</a>
    <a href="#akademik">📖 Akademik</a>
    <a href="#keuangan">💳 Keuangan</a>
    <a href="#laporan">📊 Laporan</a>
    <a href="#pengumuman">📢 Pengumuman</a>
    <a href="#pengaturan">⚙️ Pengaturan</a>
  </section>
</main>

<footer>
  NJB Smart School v1.0 · Yayasan Nurul Jadid Batam
  <br>Prototipe awal — data belum terhubung ke database.
</footer>
</body>
</html>
