<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::withCount('registrations')
            ->with('trainers')
            ->orderByDesc('start_date')
            ->paginate(20);

        return view('admin.seminars.index', compact('seminars'));
    }

    public function create()
    {
        return view('admin.seminars.create');
    }

    public function edit(Seminar $seminar)
    {
        $seminar->load('trainers');
        return view('admin.seminars.edit', compact('seminar'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'theme'       => ['required', 'string', 'max:150'],
            'country'     => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'start_date'  => ['required', 'date'],
            'end_date'    => ['required', 'date', 'after_or_equal:start_date'],
            'status'      => ['required', 'in:draft,published,closed'],
            'hours'       => ['nullable', 'integer', 'min:1'],
            'price'       => ['nullable', 'numeric', 'min:0'],
            'trainers'    => ['nullable', 'array'],
            'trainers.*'  => ['exists:users,id'],
        ]);

        $seminarData = collect($data)->except(['trainers', 'image'])->all();

        if ($request->hasFile('image')) {
            $seminarData['image'] = $request->file('image')->store('seminars', 'public');
        }

        $seminar = Seminar::create([
            ...$seminarData,
            'created_by' => $request->user()->id,
        ]);

        if (! empty($data['trainers'])) {
            $seminar->trainers()->sync($data['trainers']);
        }

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Séminaire créé.');
    }

    public function update(Request $request, Seminar $seminar)
    {
        $data = $request->validate([
            'theme'       => ['required', 'string', 'max:150'],
            'country'     => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'start_date'  => ['required', 'date'],
            'end_date'    => ['required', 'date', 'after_or_equal:start_date'],
            'status'      => ['required', 'in:draft,published,closed'],
            'hours'       => ['nullable', 'integer', 'min:1'],
            'price'       => ['nullable', 'numeric', 'min:0'],
            'trainers'    => ['nullable', 'array'],
            'trainers.*'  => ['exists:users,id'],
        ]);

        $seminarData = collect($data)->except(['trainers', 'image'])->all();

        if ($request->hasFile('image')) {
            if ($seminar->image) {
                Storage::disk('public')->delete($seminar->image);
            }

            $seminarData['image'] = $request->file('image')->store('seminars', 'public');
        }

        $seminar->update($seminarData);
        $seminar->trainers()->sync($data['trainers'] ?? []);

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Séminaire mis à jour.');
    }

    public function destroy(Seminar $seminar)
    {
        if ($seminar->image) {
            Storage::disk('public')->delete($seminar->image);
        }

        $seminar->delete();

        return back()->with('success', 'Séminaire supprimé.');
    }
}
