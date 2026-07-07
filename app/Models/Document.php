<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id', 'uploaded_by', 'title', 'type', 'file_path', 'day_number', 'size_kb',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function dayLabel(): string
    {
        return 'Jour ' . $this->day_number;
    }

    public function getFileExtension(): string
    {
        $extension = strtolower(pathinfo($this->file_path ?: '', PATHINFO_EXTENSION) ?: '');

        if ($extension !== '' && $extension !== 'bin') {
            return $extension;
        }

        $titleExtension = strtolower(pathinfo($this->title ?: '', PATHINFO_EXTENSION) ?: '');
        $knownExtensions = [
            'pdf', 'ppt', 'pptx', 'pps', 'ppsx',
            'xls', 'xlsx', 'csv',
            'doc', 'docx',
            'mp4', 'mov', 'avi', 'webm',
            'zip', 'rar',
        ];

        if (in_array($titleExtension, $knownExtensions, true)) {
            return $titleExtension;
        }

        $titleAsExtension = strtolower(trim($this->title ?? ''));
        if (in_array($titleAsExtension, $knownExtensions, true)) {
            return $titleAsExtension;
        }

        if ($this->type === 'pdf') {
            return 'pdf';
        }
        if ($this->type === 'video') {
            return 'mp4';
        }

        if ($this->type === 'pptx') {
            if ($this->file_path && \Illuminate\Support\Facades\Storage::exists($this->file_path)) {
                $fullPath = \Illuminate\Support\Facades\Storage::path($this->file_path);
                $handle = @fopen($fullPath, 'rb');
                if ($handle) {
                    $bytes = fread($handle, 4);
                    fclose($handle);
                    if ($bytes === "PK\x03\x04") {
                        return 'pptx';
                    }
                }
            }
            return 'ppt';
        }

        if ($this->file_path && \Illuminate\Support\Facades\Storage::exists($this->file_path)) {
            $fullPath = \Illuminate\Support\Facades\Storage::path($this->file_path);
            $handle = @fopen($fullPath, 'rb');
            if ($handle) {
                $bytes = fread($handle, 4);
                fclose($handle);
                if ($bytes === "PK\x03\x04") {
                    $data = @file_get_contents($fullPath);
                    if ($data !== false) {
                        if (strpos($data, 'word/document.xml') !== false) {
                            return 'docx';
                        }
                        if (strpos($data, 'xl/workbook.xml') !== false || strpos($data, 'xl/worksheets/') !== false) {
                            return 'xlsx';
                        }
                        if (strpos($data, 'ppt/presentation.xml') !== false) {
                            return 'pptx';
                        }
                    }
                    return 'zip';
                }
            }
        }

        return $extension;
    }
}
