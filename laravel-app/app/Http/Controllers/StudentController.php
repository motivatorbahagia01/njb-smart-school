<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('students');
        $search = trim((string) $request->query('q', ''));

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('student_number', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('unit', 'like', "%{$search}%")
                    ->orWhere('class_name', 'like', "%{$search}%");
            });
        }

        $students = $query->orderBy('name')->paginate(15)->withQueryString();

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.form', ['student' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('students')->insert($data);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(int $student)
    {
        $record = DB::table('students')->where('id', $student)->first();
        abort_if(! $record, 404);

        return view('students.form', ['student' => $record]);
    }

    public function update(Request $request, int $student)
    {
        abort_unless(DB::table('students')->where('id', $student)->exists(), 404);
        $data = $this->validated($request, $student);
        $data['updated_at'] = now();
        DB::table('students')->where('id', $student)->update($data);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(int $student)
    {
        abort_unless(DB::table('students')->where('id', $student)->exists(), 404);
        DB::table('students')->where('id', $student)->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    private function validated(Request $request, ?int $student = null): array
    {
        return $request->validate([
            'student_number' => ['required', 'string', 'max:40', Rule::unique('students', 'student_number')->ignore($student)],
            'name' => ['required', 'string', 'max:150'],
            'unit' => ['required', Rule::in(['KB-TK', 'SMP', 'SMK', 'Pesantren Putri'])],
            'class_name' => ['nullable', 'string', 'max:80'],
            'gender' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'status' => ['required', Rule::in(['Aktif', 'Pindah', 'Lulus'])],
            'guardian_name' => ['nullable', 'string', 'max:150'],
            'guardian_phone' => ['nullable', 'string', 'max:30'],
        ]);
    }
}
