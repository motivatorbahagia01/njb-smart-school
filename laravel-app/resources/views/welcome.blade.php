<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#708238">
<title>NJB Smart School | Yayasan Nurul Jadid Batam</title>
<style>
:root{--olive:#708238;--cream:#F1E5C0;--brown:#A98B6E;--dark:#25301D;--ink:#263020;--muted:#73776c;--line:#e7e8df;--paper:#f7f8f3;--white:#fff}
*{box-sizing:border-box}
body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:var(--paper);color:var(--ink)}
header{background:var(--olive);color:white;padding:18px 20px}
.header-inner{max-width:1120px;margin:auto;display:flex;align-items:center;justify-content:space-between;gap:14px}
.brand{display:flex;align-items:center;gap:12px}.logo{display:grid;place-items:center;background:var(--cream);color:var(--dark);border-radius:12px;width:48px;height:48px;font-weight:900;font-size:17px}
header h1{font-size:19px;margin:0}header p{font-size:12px;margin:4px 0 0;opacity:.9}
.status{font-size:12px;border:1px solid #ffffff70;border-radius:99px;padding:7px 10px;white-space:nowrap}
.container{max-width:1120px;margin:auto;padding:24px 16px 38px}
.welcome{background:linear-gradient(120deg,#f1e5c0,#faf5e6);border:1px solid #e8dcba;border-radius:20px;padding:25px;margin-bottom:22px}
.eyebrow{font-size:11px;letter-spacing:1.5px;font-weight:800;color:#68763a}
.welcome h2{font-size:clamp(24px,5vw,34px);line-height:1.15;margin:9px 0}
.welcome p{max-width:680px;line-height:1.65;margin:0 0 16px;color:#535746}
.welcome strong{display:inline-block;color:var(--dark);font-size:13px}
.section-title{font-size:18px;margin:25px 0 13px}
.stats{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.card,.unit,.menu a,.panel{background:white;border:1px solid var(--line);border-radius:15px}
.card{padding:17px}.card small{color:var(--muted);font-size:12px}.number{font-size:25px;font-weight:800;color:var(--olive);margin-top:9px}.hint{display:block;margin-top:3px;font-size:11px;color:var(--muted)}
.units{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}
.unit{padding:17px 14px;color:inherit;text-decoration:none;transition:transform .15s,border-color .15s}.unit:active,.menu a:active{transform:scale(.99)}
.emoji{font-size:25px}.unit h3{margin:9px 0 5px;font-size:15px}.unit p{margin:0;font-size:12px;color:var(--muted)}
.menu{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}
.menu a{display:flex;align-items:center;gap:9px;padding:14px 12px;color:var(--dark);text-decoration:none;font-size:13px;font-weight:650}
.menu a:hover,.unit:hover{border-color:#aab58b}
.panel{margin-top:18px;padding:18px;display:none}.panel.visible{display:block}.panel h3{margin:0 0 8px}.panel p{font-size:14px;line-height:1.6;color:#5c6254}.panel button{background:var(--olive);border:0;color:white;padding:10px 14px;border-radius:10px;font-weight:700}
.notice{background:#fff;border-left:4px solid var(--brown);padding:12px 14px;border-radius:8px;font-size:12px;line-height:1.6;color:#5d5d50;margin-top:18px}
footer{text-align:center;padding:24px 12px;color:var(--muted);font-size:12px}
@media(min-width:700px){header{padding:20px 28px}.stats{grid-template-columns:repeat(4,1fr)}.units{grid-template-columns:repeat(4,1fr)}.menu{grid-template-columns:repeat(4,1fr)}.welcome{padding:32px}}
</style>
</head>
<body>
<header><div class="header-inner"><div class="brand"><div class="logo">NJB</div><div><h1>NJB Smart School</h1><p>Yayasan Nurul Jadid Batam</p></div></div><div class="status">● Prototipe v1.1</div></div></header>
<main class="container">
<section class="welcome"><div class="eyebrow">EKOSISTEM DIGITAL TERPADU</div><h2>Selamat datang di NJB Smart School 👋</h2><p>Satu pintu untuk mendukung pengelolaan pendidikan, administrasi, akademik, dan layanan sekolah di lingkungan Yayasan Nurul Jadid Batam.</p><strong>Cerdas Berintegritas.</strong></section>
<h2 class="section-title">Ringkasan Sistem</h2>
<section class="stats">
<div class="card"><small>Unit Pendidikan</small><div class="number">4</div><span class="hint">KB–TK, SMP, SMK, Pesantren</span></div>
<div class="card"><small>Data Siswa</small><div class="number">—</div><span class="hint">Menunggu koneksi database</span></div>
<div class="card"><small>Data Guru</small><div class="number">—</div><span class="hint">Menunggu koneksi database</span></div>
<div class="card"><small>Status Aplikasi</small><div class="number" style="font-size:20px">Siap dikembangkan</div><span class="hint">Dashboard prototipe</span></div>
</section>
<h2 class="section-title">Unit Pendidikan</h2>
<section class="units">
<a class="unit" href="#kbtk" data-panel="kbtk"><div class="emoji">🧸</div><h3>KB – TK</h3><p>Pendidikan usia dini</p></a>
<a class="unit" href="#smp" data-panel="smp"><div class="emoji">📚</div><h3>SMP Nurul Jadid</h3><p>Akademik dan kesiswaan</p></a>
<a class="unit" href="#smk" data-panel="smk"><div class="emoji">💻</div><h3>SMK Nurul Jadid</h3><p>Kompetensi dan kejuruan</p></a>
<a class="unit" href="#pesantren" data-panel="pesantren"><div class="emoji">🕌</div><h3>Pesantren Putri</h3><p>Tahfiz dan kajian kitab</p></a>
</section>
<h2 class="section-title">Menu Administrasi</h2>
<nav class="menu" aria-label="Menu administrasi">
<a href="#siswa" data-panel="siswa">👨‍🎓 <span>Data Siswa</span></a><a href="#guru" data-panel="guru">👩‍🏫 <span>Data Guru</span></a>
<a href="#absensi" data-panel="absensi">📋 <span>Absensi</span></a><a href="#akademik" data-panel="akademik">📖 <span>Akademik</span></a>
<a href="#keuangan" data-panel="keuangan">💳 <span>Keuangan</span></a><a href="#laporan" data-panel="laporan">📊 <span>Laporan</span></a>
<a href="#pengumuman" data-panel="pengumuman">📢 <span>Pengumuman</span></a><a href="#pengaturan" data-panel="pengaturan">⚙️ <span>Pengaturan</span></a>
</nav>
<section id="detail-panel" class="panel" aria-live="polite"><h3 id="panel-title">Menu</h3><p id="panel-description"></p><button type="button" id="close-panel">Tutup</button></section>
<div class="notice"><strong>Catatan pengembangan:</strong> Dashboard dan navigasi awal sudah tersedia. Data siswa, guru, absensi, keuangan, serta laporan belum terhubung ke database; menu akan menampilkan status prototipe sampai modul dan penyimpanan datanya dibangun.</div>
</main>
<footer>NJB Smart School v1.1 · Yayasan Nurul Jadid Batam<br>Cerdas Berintegritas</footer>
<script>
const descriptions={
kbtk:"Unit KB–TK: ruang awal untuk administrasi peserta didik, kelas, guru, dan informasi orang tua.",
smp:"Unit SMP: modul yang direncanakan meliputi data siswa, kelas, akademik, absensi, dan kesiswaan.",
smk:"Unit SMK: modul yang direncanakan meliputi data siswa, program keahlian, praktik, akademik, dan kesiswaan.",
pesantren:"Pesantren Putri: modul yang direncanakan meliputi data santri, tahfiz Al-Qur’an, kajian kitab, dan kegiatan asrama.",
siswa:"Modul Data Siswa belum tersambung ke database. Tahap berikutnya adalah membuat tabel siswa, formulir tambah/edit, pencarian, dan detail siswa.",
guru:"Modul Data Guru belum tersambung ke database. Tahap berikutnya adalah membuat data guru, jabatan, unit pendidikan, dan akun akses.",
absensi:"Modul Absensi belum aktif. Data kehadiran perlu disimpan per siswa/guru, tanggal, dan status kehadiran.",
akademik:"Modul Akademik direncanakan untuk mengelola kelas, mata pelajaran, jadwal, nilai, dan tahun ajaran.",
keuangan:"Modul Keuangan belum aktif. Pencatatan pembayaran dan laporan harus menggunakan akses terbatas sesuai peran pengguna.",
laporan:"Modul Laporan akan merangkum data yang sudah tersimpan, seperti siswa, kehadiran, akademik, dan keuangan.",
pengumuman:"Modul Pengumuman akan digunakan untuk membuat dan menampilkan informasi resmi kepada warga sekolah.",
pengaturan:"Modul Pengaturan akan mengelola tahun ajaran, unit pendidikan, akun pengguna, serta hak akses."
};
document.querySelectorAll("[data-panel]").forEach(link=>link.addEventListener("click",event=>{
event.preventDefault();
const key=link.dataset.panel;
document.getElementById("panel-title").textContent=link.textContent.trim().replace(/^[^A-Za-z0-9]+/,"");
document.getElementById("panel-description").textContent=descriptions[key]||"Modul sedang disiapkan.";
const panel=document.getElementById("detail-panel");panel.classList.add("visible");panel.scrollIntoView({behavior:"smooth",block:"nearest"});
}));
document.getElementById("close-panel").addEventListener("click",()=>document.getElementById("detail-panel").classList.remove("visible"));
</script>
</body>
</html>