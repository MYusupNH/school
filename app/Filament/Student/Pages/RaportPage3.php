<?php

namespace App\Filament\Student\Pages;

use App\Models\cps3;
use App\Models\Student;
use Filament\Pages\Page;

class RaportPage3 extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.student.pages.raport-page3';

    protected static ?string $navigationLabel = 'Raport Semester 3';

    public $student; // Properti student didefinisikan
    public $cpSemesters;

    public function mount()
    {
        // Ambil data student berdasarkan user yang login
        $this->student = Student::where('user_id', auth()->id())
            ->with(['smt3']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['usmt3']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['esmt3']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['Kindustri.jengke']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['Pkl.jengke']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['UjiKom.jengke']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['dsmt3']) // Muat data smt1
            ->first();

        $this->student = Student::where('user_id', auth()->id())
            ->with(['psmt3']) // Muat data smt1
            ->first();

        $this->cpSemesters = cps3::all();

        if (!$this->student) {
            abort(404, 'Data student tidak ditemukan untuk user yang sedang login.');
        }
    }
}


