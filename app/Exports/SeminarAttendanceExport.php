<?php

namespace App\Exports;

use App\Models\Seminar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SeminarAttendanceExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles
{
    protected $seminarId;
    protected $seminar;
    protected $totalDays;

    public function __construct($seminarId)
    {
        $this->seminarId = $seminarId;
        $this->seminar = Seminar::with(['registrations.user', 'attendances'])->findOrFail($seminarId);
        $this->totalDays = $this->seminar->start_date ? $this->seminar->start_date->diffInDays($this->seminar->end_date) + 1 : 1;
    }

    public function collection()
    {
        return $this->seminar->registrations;
    }

    public function headings(): array
    {
        $headings = [
            'Nom',
            'Prénom',
            'Institution'
        ];

        for ($i = 1; $i <= $this->totalDays; $i++) {
            $headings[] = 'Jour ' . $i;
        }

        return $headings;
    }

    public function map($registration): array
    {
        $row = [
            $registration->user->last_name ?? '',
            $registration->user->first_name ?? '',
            $registration->user->institution ?? ''
        ];

        for ($i = 1; $i <= $this->totalDays; $i++) {
            $isPresent = $this->seminar->attendances->where('registration_id', $registration->id)->where('day_number', $i)->isNotEmpty();
            $row[] = $isPresent ? 'Présent' : 'Absent';
        }

        return $row;
    }

    public function title(): string
    {
        return 'Présences - ' . substr($this->seminar->theme, 0, 20);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
