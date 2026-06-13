<?php

namespace App\Exports;

use App\Models\PPDB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PPDBExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = PPDB::query();

        if ($this->request->program_type) {
            $query->where('program_type', $this->request->program_type);
        }

        if ($this->request->education_level) {
            $query->where('education_level', $this->request->education_level);
        }

        if ($this->request->major) {
            $query->where('major', $this->request->major);
        }

        return $query->get([
            'name',
            'gender',
            'school_origin',
            'program_type',
            'education_level',
            'major',
            'phone',
        ]);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Gender',
            'Sekolah',
            'Program',
            'Jenjang',
            'Jurusan',
            'No HP'
        ];
    }
}
