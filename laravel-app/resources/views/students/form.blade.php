<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $student ? 'Edit' : 'Tambah' }} Siswa | NJB Smart School</title>
<style>
*{box-sizing:border-box}body{margin:0;background:#f7f8f3;color:#263020;font-family:system-ui,sans-serif}header{background:#708238;color:white;padding:18px}header a{color:white;text-decoration:none;font-weight:800}main{max-width:800px;margin:auto;padding:22px 16px}h1{font-size:25px}.card{background:white;border:1px solid #e5e7de;border-radius:16px;padding:18px}.grid{display:grid;grid-template-columns:1fr;gap:14px}@media(min-width:600px){.grid{grid-template-columns:1fr 1fr}}label{display:block;font-size:13px;font-weight:750;margin-bottom:6px}input,select{width:100%;padding:11px;border:1px solid #d9ddcf;border-radius:9px;background:white;font:inherit}.error{font-size:12px;color:#a22;margin-top:5px}.btn{display:inline-block;border:0;background:#708238;color:white;padding:12px 15px;border-radius:10px;text-decoration:none;font-weight:800;font-size:13px;cursor:pointer}.secondary{background:#fff;color:#263020;border:1px solid #d9ddcf}.actions{display:flex;gap:10px;margin-top:20px;flex-wrap:wrap}
</style>
</head>
<body>
<header><a href="{{ route('dashboard') }}">NJB Smart School</a></header>
<main>
<h1>{{ $student ? 'Edit Data Siswa' : 'Tambah Siswa' }}</h1>
<p>Isi data sesuai dokumen resmi sekolah.</p>
<div class="card">
<form method="POST" action="{{ $student ? route('students.update', $student->id) : route('students.store') }}">
@csrf
@if($student) @method('PUT') @endif
<div class="grid">
<div><label for="student_number">Nomor Induk Siswa (NIS) *</label><input id="student_number" name="student_number" value="{{ old('student_number', $student->student_number ?? '') }}" required maxlength="40">@error('student_number')<div class="error">{{ $message }}</div>@enderror</div>
<div><label for="name">Nama lengkap *</label><input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required maxlength="150">@error('name')<div class="error">{{ $message }}</div>@enderror</div>
<div><label for="unit">Unit pendidikan *</label><select id="unit" name="unit" required>@foreach(['KB-TK','SMP','SMK','Pesantren Putri'] as $unit)<option value="{{ $unit }}" @selected(old('unit', $student->unit ?? '') === $unit)>{{ $unit }}</option>@endforeach</select></div>
<div><label for="class_name">Kelas</label><input id="class_name" name="class_name" value="{{ old('class_name', $student->class_name ?? '') }}" maxlength="80"></div>
<div><label for="gender">Jenis kelamin *</label><select id="gender" name="gender" required>@foreach(['Laki-laki','Perempuan'] as $gender)<option value="{{ $gender }}" @selected(old('gender', $student->gender ?? '') === $gender)>{{ $gender }}</option>@endforeach</select></div>
<div><label for="status">Status *</label><select id="status" name="status" required>@foreach(['Aktif','Pindah','Lulus'] as $status)<option value="{{ $status }}" @selected(old('status', $student->status ?? 'Aktif') === $status)>{{ $status }}</option>@endforeach</select></div>
<div><label for="guardian_name">Nama orang tua/wali</label><input id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name ?? '') }}" maxlength="150"></div>
<div><label for="guardian_phone">Nomor HP orang tua/wali</label><input id="guardian_phone" name="guardian_phone" value="{{ old('guardian_phone', $student->guardian_phone ?? '') }}" maxlength="30" inputmode="tel"></div>
</div>
<div class="actions"><button class="btn" type="submit">Simpan Data</button><a class="btn secondary" href="{{ route('students.index') }}">Batal</a></div>
</form></div></main></body></html>