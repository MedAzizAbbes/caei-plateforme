<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Seminar $seminar)
    {
        $this->authorizeSeminarAccess($seminar);

        $documentsByDay = $seminar->documents()->orderBy('day_number')->get()->groupBy('day_number');

        return view('admin.documents.index', compact('seminar', 'documentsByDay'));
    }

    public function store(Request $request, Seminar $seminar)
    {
        $this->authorizeSeminarAccess($seminar);

        $data = $request->validate([
            'title'      => ['required', 'string', 'max:150'],
            'day_number' => ['required', 'integer', 'min:1', 'max:30'],
            'file'       => ['required', 'file', 'mimes:pdf,pptx,ppt,mp4,mov', 'max:512000'], // 500 Mo
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $type = match (true) {
            $extension === 'pdf' => 'pdf',
            in_array($extension, ['ppt', 'pptx']) => 'pptx',
            in_array($extension, ['mp4', 'mov']) => 'video',
            default => 'autre',
        };

        $path = $file->store("documents/seminar_{$seminar->id}");

        $seminar->documents()->create([
            'uploaded_by' => $request->user()->id,
            'title'       => $data['title'],
            'type'        => $type,
            'file_path'   => $path,
            'day_number'  => $data['day_number'],
            'size_kb'     => intdiv($file->getSize(), 1024),
        ]);

        return back()->with('success', 'Support ajouté.');
    }

    public function destroy(Request $request, Seminar $seminar, int $documentId)
    {
        $this->authorizeSeminarAccess($seminar);

        if ($request->isMethod('GET')) {
            return redirect()->route($request->user()->isFormateur() ? 'formateur.documents.index' : 'admin.documents.index', $seminar);
        }

        $seminar->documents()->findOrFail($documentId)->delete();

        return back()->with('success', 'Support retiré.');
    }

    private function authorizeSeminarAccess(Seminar $seminar): void
    {
        $user = request()->user();

        if ($user?->isAdmin()) {
            return;
        }

        $isAssignedTrainer = $user?->isFormateur()
            && $seminar->trainers()->whereKey($user->id)->exists();

        abort_unless($isAssignedTrainer, 403, 'Acces reserve au formateur assigne a ce seminaire.');
    }
}
