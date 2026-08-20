@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        <div class="mb-8 rounded-2xl bg-white p-6 shadow-sm border border-slate-200/80">
            <h2 class="text-2xl font-black text-[#061743] mb-6">Nouvelle Actualité</h2>
            
            <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Titre *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Slug * (Identifiant URL)</label>
                        <input type="text" name="slug" value="{{ old('slug') }}" required class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Sous-titre</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}" class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Catégorie</label>
                        <input type="text" name="category" value="{{ old('category') }}" class="w-full rounded-lg border-slate-200" placeholder="ex: 🎓 Séminaire international">
                    </div>
                    <div class="col-span-1 md:col-span-2 mt-4 p-5 md:p-6 bg-slate-50 border-l-4 border-[#061743] rounded-r-xl shadow-sm">
                        <div class="mb-5 flex items-center gap-3">
                            <div class="bg-[#061743] p-2 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-[#061743]">Informations Pratiques</h3>
                                <p class="text-xs text-slate-500">Ces informations seront affichées en haut de la page de l'actualité.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Date -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    Date de l'événement
                                </label>
                                <input type="text" id="date-input" name="date" value="{{ old('date') }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm cursor-pointer bg-white" placeholder="Sélectionnez une ou plusieurs dates...">
                            </div>
                            
                            <!-- Lieu -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Lieu
                                </label>
                                <input type="text" name="location" value="{{ old('location') }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm" placeholder="ex: Tunis, Tunisie">
                            </div>

                            <!-- Badge Pays -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                                    Badge Pays
                                </label>
                                <input type="text" name="country_badge" value="{{ old('country_badge') }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm" placeholder="ex: 🇹🇳 Tunisie · 🇸🇳 Sénégal">
                            </div>

                            <!-- Thème -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    Thème
                                </label>
                                <input type="text" name="theme" value="{{ old('theme') }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm" placeholder="ex: Audit LCB/FT">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Résumé (Summary)</label>
                        <textarea name="summary" rows="3" class="w-full rounded-lg border-slate-200">{{ old('summary') }}</textarea>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Contenu</label>
                        <!-- Quill Editor -->
                        <div id="quill-editor" class="bg-white rounded-b-lg border-slate-200" style="min-height: 200px;">{!! old('content_text') !!}</div>
                        <input type="hidden" name="content_text" id="content_text" value="{{ old('content_text') }}">
                    </div>
                    
                    <div class="col-span-1 md:col-span-2 p-4 bg-slate-50 border border-slate-200 rounded-lg">
                        <h3 class="font-bold text-lg mb-3">Partenaire (Optionnel)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Titre du Partenaire</label>
                                <input type="text" name="partner_title" value="{{ old('partner_title') }}" class="w-full rounded-lg border-slate-200">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Icône (ex: bi-shield-check)</label>
                                <input type="text" name="partner_icon" value="{{ old('partner_icon') }}" class="w-full rounded-lg border-slate-200">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Texte du Partenaire</label>
                                <textarea name="partner_text" rows="2" class="w-full rounded-lg border-slate-200">{{ old('partner_text') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-1 md:col-span-2">
                        <h3 class="font-bold text-lg mb-3">Images</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Image Principale</label>
                                <input type="file" name="main_image" accept="image/*" class="w-full">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Texte Alternatif de l'image (Alt)</label>
                                <input type="text" name="main_image_alt" value="{{ old('main_image_alt') }}" class="w-full rounded-lg border-slate-200">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <h3 class="font-bold text-lg mb-3">Galerie</h3>
                        <div class="mb-4">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Titre de la galerie</label>
                            <input type="text" name="gallery_title" value="{{ old('gallery_title') }}" class="w-full rounded-lg border-slate-200">
                        </div>
                        
                        <div id="gallery-container" class="space-y-4">
                            <!-- Les champs de la galerie seront ajoutés ici dynamiquement -->
                        </div>
                        <button type="button" onclick="addGalleryItem()" class="mt-4 px-4 py-2 border-2 border-dashed border-slate-300 text-slate-600 font-bold rounded-lg hover:bg-slate-50 hover:border-slate-400 transition w-full text-center">
                            + Ajouter une photo à la galerie
                        </button>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('admin.actualites.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-bold hover:bg-slate-50">Annuler</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-[#061743] text-white font-bold hover:bg-[#0a2463]">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Quill Editor -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Saisissez le contenu ici...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        // Sync content to hidden input on form submit
        document.querySelector('form').onsubmit = function() {
            var content = document.querySelector('#content_text');
            content.value = quill.root.innerHTML;
        };
    });

    let galleryIndex = 0;
    function addGalleryItem() {
        const container = document.getElementById('gallery-container');
        const item = document.createElement('div');
        item.className = 'p-4 border border-slate-200 rounded-lg bg-white relative';
        item.innerHTML = `
            <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-red-500 hover:text-red-700 bg-red-50 rounded-full w-8 h-8 flex items-center justify-center font-bold">✖</button>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Image *</label>
                    <input type="file" name="gallery_images[${galleryIndex}]" accept="image/*" class="w-full text-sm" required onchange="previewImage(this)">
                    <img class="mt-2 h-20 w-auto object-cover rounded hidden preview-img border border-slate-200">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Titre de la photo</label>
                    <input type="text" name="gallery_titles[${galleryIndex}]" class="w-full rounded-lg border-slate-200 text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Description</label>
                    <input type="text" name="gallery_descs[${galleryIndex}]" class="w-full rounded-lg border-slate-200 text-sm">
                </div>
            </div>
        `;
        container.appendChild(item);
        galleryIndex++;
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = input.parentElement.querySelector('.preview-img');
                img.src = e.target.result;
                img.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- Flatpickr for Calendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr("#date-input", {
            mode: "range",
            locale: "fr",
            dateFormat: "d F Y",
            allowInput: true
        });
    });
</script>
@endsection
