<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actualites = \App\Models\Actualite::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.actualites.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.actualites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:actualites',
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'country_badge' => 'nullable|string|max:255',
            'theme' => 'nullable|string|max:255',
            'partner_title' => 'nullable|string|max:255',
            'partner_text' => 'nullable|string',
            'partner_icon' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content_text' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'main_image_alt' => 'nullable|string|max:255',
            'gallery_title' => 'nullable|string|max:255',
            'gallery_images.*' => 'image|max:2048',
            'gallery_titles.*' => 'nullable|string|max:255',
            'gallery_descs.*' => 'nullable|string|max:255',
        ]);

        $actualite = new \App\Models\Actualite();
        $actualite->title = $validated['title'];
        $actualite->slug = \Illuminate\Support\Str::slug($validated['slug']);
        $actualite->subtitle = $validated['subtitle'] ?? null;
        $actualite->category = $validated['category'] ?? null;
        $actualite->date = $validated['date'] ?? null;
        $actualite->location = $validated['location'] ?? null;
        $actualite->country_badge = $validated['country_badge'] ?? null;
        $actualite->theme = $validated['theme'] ?? null;
        $actualite->summary = $validated['summary'] ?? null;
        $actualite->main_image_alt = $validated['main_image_alt'] ?? null;
        $actualite->gallery_title = $validated['gallery_title'] ?? null;

        if ($request->has('partner_title')) {
            $actualite->partner = [
                'title' => $validated['partner_title'],
                'text' => $validated['partner_text'],
                'icon' => $validated['partner_icon'] ?? 'bi-shield-check'
            ];
        }

        if ($request->has('content_text')) {
            $html = $validated['content_text'];
            $html = str_replace(['<p><br></p>', '<p></p>'], '', $html);
            $paragraphs = explode('</p>', $html);
            $clean = [];
            foreach ($paragraphs as $p) {
                $p = trim(strip_tags($p, '<a><strong><em><b><i><u><br><ul><li><ol><span>'));
                if (!empty($p)) $clean[] = $p;
            }
            $actualite->content = !empty($clean) ? $clean : [$validated['content_text']];
        }

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('actualites', 'public');
            $actualite->main_image = 'storage/' . $path;
        }

        $gallery = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $key => $file) {
                $path = $file->store('actualites/gallery', 'public');
                $gallery[] = [
                    'image' => 'storage/' . $path,
                    'title' => $request->input("gallery_titles.{$key}") ?? '',
                    'desc' => $request->input("gallery_descs.{$key}") ?? '',
                ];
            }
        }
        $actualite->gallery = $gallery;

        $actualite->save();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité ajoutée avec succès.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $actualite = \App\Models\Actualite::findOrFail($id);
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(Request $request, string $id)
    {
        $actualite = \App\Models\Actualite::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:actualites,slug,' . $id,
            'subtitle' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'date' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'country_badge' => 'nullable|string|max:255',
            'theme' => 'nullable|string|max:255',
            'partner_title' => 'nullable|string|max:255',
            'partner_text' => 'nullable|string',
            'partner_icon' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'content_text' => 'nullable|string',
            'main_image' => 'nullable|image|max:2048',
            'main_image_alt' => 'nullable|string|max:255',
            'gallery_title' => 'nullable|string|max:255',
        ]);

        $actualite->title = $validated['title'];
        $actualite->slug = \Illuminate\Support\Str::slug($validated['slug']);
        $actualite->subtitle = $validated['subtitle'] ?? null;
        $actualite->category = $validated['category'] ?? null;
        $actualite->date = $validated['date'] ?? null;
        $actualite->location = $validated['location'] ?? null;
        $actualite->country_badge = $validated['country_badge'] ?? null;
        $actualite->theme = $validated['theme'] ?? null;
        $actualite->summary = $validated['summary'] ?? null;
        $actualite->main_image_alt = $validated['main_image_alt'] ?? null;
        $actualite->gallery_title = $validated['gallery_title'] ?? null;

        if ($request->has('partner_title') && !empty($validated['partner_title'])) {
            $actualite->partner = [
                'title' => $validated['partner_title'],
                'text' => $validated['partner_text'],
                'icon' => $validated['partner_icon'] ?? 'bi-shield-check'
            ];
        } else {
            $actualite->partner = null;
        }

        if ($request->has('content_text')) {
            $html = $validated['content_text'];
            $html = str_replace(['<p><br></p>', '<p></p>'], '', $html);
            $paragraphs = explode('</p>', $html);
            $clean = [];
            foreach ($paragraphs as $p) {
                $p = trim(strip_tags($p, '<a><strong><em><b><i><u><br><ul><li><ol><span>'));
                if (!empty($p)) $clean[] = $p;
            }
            $actualite->content = !empty($clean) ? $clean : [$validated['content_text']];
        }

        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('actualites', 'public');
            $actualite->main_image = 'storage/' . $path;
        }

        $gallery = [];
        if ($request->has('existing_gallery_images')) {
            foreach ($request->input('existing_gallery_images') as $key => $path) {
                $gallery[] = [
                    'image' => $path,
                    'title' => $request->input("existing_gallery_titles.{$key}") ?? '',
                    'desc' => $request->input("existing_gallery_descs.{$key}") ?? '',
                ];
            }
        }

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $key => $file) {
                if ($file) {
                    $path = $file->store('actualites/gallery', 'public');
                    $gallery[] = [
                        'image' => 'storage/' . $path,
                        'title' => $request->input("gallery_titles.{$key}") ?? '',
                        'desc' => $request->input("gallery_descs.{$key}") ?? '',
                    ];
                }
            }
        }
        $actualite->gallery = $gallery;

        $actualite->save();

        return redirect()->route('admin.actualites.index')->with('success', 'Actualité modifiée avec succès.');
    }

    public function destroy(string $id)
    {
        $actualite = \App\Models\Actualite::findOrFail($id);
        $actualite->delete();
        return redirect()->route('admin.actualites.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
