@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        <div class="mb-8 rounded-2xl bg-white p-6 shadow-sm border border-slate-200/80">
            <h2 class="text-2xl font-black text-[#061743] mb-6">Modifier l'Actualité</h2>
            
            <form action="{{ route('admin.actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Titre *</label>
                        <input type="text" name="title" value="{{ old('title', $actualite->title) }}" required class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Slug * (Identifiant URL)</label>
                        <input type="text" name="slug" value="{{ old('slug', $actualite->slug) }}" required class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Sous-titre</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $actualite->subtitle) }}" class="w-full rounded-lg border-slate-200">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Catégorie</label>
                        <input type="text" name="category" value="{{ old('category', $actualite->category) }}" class="w-full rounded-lg border-slate-200">
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
                                <input type="text" id="date-input" name="date" value="{{ old('date', $actualite->date) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm cursor-pointer bg-white" placeholder="Sélectionnez une ou plusieurs dates...">
                            </div>
                            
                            <!-- Lieu -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Lieu
                                </label>
                                <input type="text" id="location-input" name="location" value="{{ old('location', $actualite->location) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm" placeholder="Sélectionnez ou tapez un lieu...">
                            </div>

                            <!-- Badge Pays -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
                                    Badge Pays
                                </label>
                                <input type="text" id="country-badge" name="country_badge" value="{{ old('country_badge', $actualite->country_badge) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm" placeholder="Sélectionnez ou tapez un pays...">
                            </div>

                            <!-- Thème -->
                            <div>
                                <label class="flex items-center gap-2 text-sm font-bold text-slate-700 mb-2">
                                    <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    Thème
                                </label>
                                <input type="text" name="theme" value="{{ old('theme', $actualite->theme) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] shadow-sm">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Résumé (Summary)</label>
                        <textarea name="summary" rows="3" class="w-full rounded-lg border-slate-200">{{ old('summary', $actualite->summary) }}</textarea>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Contenu</label>
                        <!-- Quill Editor -->
                        <div id="quill-editor" class="bg-white rounded-b-lg border-slate-200" style="min-height: 200px;">{!! old('content_text', is_array($actualite->content) ? implode("<br><br>", $actualite->content) : $actualite->content) !!}</div>
                        <input type="hidden" name="content_text" id="content_text" value="{{ old('content_text', is_array($actualite->content) ? implode('<br><br>', $actualite->content) : $actualite->content) }}">
                    </div>
                    
                    <div class="col-span-1 md:col-span-2 p-4 bg-slate-50 border border-slate-200 rounded-lg">
                        <h3 class="font-bold text-lg mb-3">Partenaire (Optionnel)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Titre du Partenaire</label>
                                <input type="text" name="partner_title" value="{{ old('partner_title', $actualite->partner['title'] ?? '') }}" class="w-full rounded-lg border-slate-200">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Icône (ex: bi-shield-check)</label>
                                <input type="text" name="partner_icon" value="{{ old('partner_icon', $actualite->partner['icon'] ?? '') }}" class="w-full rounded-lg border-slate-200">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Texte du Partenaire</label>
                                <textarea name="partner_text" rows="2" class="w-full rounded-lg border-slate-200">{{ old('partner_text', $actualite->partner['text'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-1 md:col-span-2 mt-6">
                        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                            <h3 class="font-bold text-lg text-[#061743] mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Image Principale
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Image de couverture <span class="text-xs text-slate-400 font-normal">(Laisser vide pour ne pas modifier)</span></label>
                                    @if($actualite->main_image)
                                        <div class="mb-3 relative group w-max">
                                            <img src="{{ asset($actualite->main_image) }}" class="h-24 w-auto rounded-lg border border-slate-200 shadow-sm object-cover">
                                        </div>
                                    @endif
                                    <input type="file" name="main_image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-[#061743] file:text-white hover:file:bg-[#0a2463] border border-slate-300 rounded-lg cursor-pointer bg-slate-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Texte Alternatif (Alt)</label>
                                    <input type="text" name="main_image_alt" value="{{ old('main_image_alt', $actualite->main_image_alt) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743]" placeholder="Description de l'image (SEO)">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-span-1 md:col-span-2 mt-2">
                        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                            <h3 class="font-bold text-lg text-[#061743] mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                Galerie de photos
                            </h3>
                            <div class="mb-5">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Titre de la galerie</label>
                                <input type="text" name="gallery_title" value="{{ old('gallery_title', $actualite->gallery_title) }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743]" placeholder="Ex: Retour en images sur le séminaire">
                            </div>
                            
                            <div id="gallery-container" class="space-y-4">
                                @if(is_array($actualite->gallery))
                                    @foreach($actualite->gallery as $i => $photo)
                                        <div class="gallery-item p-5 border border-slate-200 rounded-xl bg-slate-50 relative">
                                            <div class="flex justify-between items-center mb-3">
                                                <span class="font-bold text-sm text-[#061743]">Photo existante</span>
                                                <button type="button" onclick="this.closest('.gallery-item').remove()" class="text-red-500 hover:text-red-700 bg-white border border-red-200 hover:bg-red-50 px-2 py-1 rounded-md text-xs font-bold flex items-center gap-1 transition-colors shadow-sm">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    Supprimer
                                                </button>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                <div>
                                                    <label class="block text-xs font-bold text-slate-700 mb-2">Image</label>
                                                    <input type="hidden" name="existing_gallery_images[{{ $i }}]" value="{{ $photo['image'] }}">
                                                    <img src="{{ asset($photo['image']) }}" class="h-24 w-full object-cover rounded-lg border border-slate-200 shadow-sm">
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-bold text-slate-700 mb-2">Titre de la photo</label>
                                                    <input type="text" name="existing_gallery_titles[{{ $i }}]" value="{{ $photo['title'] ?? '' }}" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] text-sm" placeholder="Ex: Cérémonie d'ouverture">
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-bold text-slate-700 mb-2">Description</label>
                                                    <textarea name="existing_gallery_descs[{{ $i }}]" rows="2" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] text-sm" placeholder="Courte description de la photo...">{{ $photo['desc'] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" onclick="addGalleryItem()" class="mt-5 px-4 py-3 border-2 border-dashed border-slate-300 text-[#061743] font-bold rounded-lg hover:bg-slate-50 hover:border-[#061743] transition-colors w-full flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Ajouter une nouvelle photo
                            </button>
                        </div>
                    </div>

                </div>

                <div class="flex justify-end gap-3 mt-6">
                    <a href="{{ route('admin.actualites.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-700 font-bold hover:bg-slate-50">Annuler</a>
                    <button type="submit" class="px-5 py-2.5 rounded-lg bg-[#061743] text-white font-bold hover:bg-[#0a2463]">Enregistrer les modifications</button>
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

    let galleryIndex = 999;
    function addGalleryItem() {
        const container = document.getElementById('gallery-container');
        const item = document.createElement('div');
        item.className = 'gallery-item p-5 border border-slate-200 rounded-xl bg-slate-50 relative';
        item.innerHTML = `
            <div class="flex justify-between items-center mb-3">
                <span class="font-bold text-sm text-[#061743]">Nouvelle photo</span>
                <button type="button" onclick="this.closest('.gallery-item').remove()" class="text-red-500 hover:text-red-700 bg-white border border-red-200 hover:bg-red-50 px-2 py-1 rounded-md text-xs font-bold flex items-center gap-1 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Supprimer
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Image <span class="text-red-500">*</span></label>
                    <input type="file" name="gallery_images[${galleryIndex}]" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#061743] file:text-white hover:file:bg-[#0a2463] border border-slate-300 rounded-lg cursor-pointer bg-white" required onchange="previewImage(this)">
                    <img class="mt-3 h-24 w-full object-cover rounded-lg hidden preview-img border border-slate-200 shadow-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Titre de la photo</label>
                    <input type="text" name="gallery_titles[${galleryIndex}]" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] text-sm" placeholder="Ex: Cérémonie d'ouverture">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2">Description</label>
                    <textarea name="gallery_descs[${galleryIndex}]" rows="2" class="w-full rounded-lg border-slate-300 focus:border-[#061743] focus:ring-[#061743] text-sm" placeholder="Courte description de la photo..."></textarea>
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

<!-- Tom Select for Badges -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

<style>
    .ts-control {
        border-radius: 0.5rem;
        border-color: #cbd5e1;
        padding: 0.6rem 0.75rem;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    }
    .ts-control.focus {
        border-color: #061743;
        box-shadow: 0 0 0 1px #061743;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Init Flatpickr
        flatpickr("#date-input", {
            mode: "range",
            locale: "fr",
            dateFormat: "d F Y",
            allowInput: true
        });

        // Init Tom Select for Lieu
        new TomSelect("#location-input", {
            persist: false,
            createOnBlur: true,
            create: true,
            maxItems: 1,
            placeholder: 'Sélectionnez ou tapez un lieu...',
            options: [
                {value: 'Pretoria, Afrique du Sud', text: 'Pretoria, Afrique du Sud'},
                {value: 'Johannesburg, Afrique du Sud', text: 'Johannesburg, Afrique du Sud'},
                {value: 'Alger, Algérie', text: 'Alger, Algérie'},
                {value: 'Luanda, Angola', text: 'Luanda, Angola'},
                {value: 'Cotonou, Bénin', text: 'Cotonou, Bénin'},
                {value: 'Gaborone, Botswana', text: 'Gaborone, Botswana'},
                {value: 'Ouagadougou, Burkina Faso', text: 'Ouagadougou, Burkina Faso'},
                {value: 'Bujumbura, Burundi', text: 'Bujumbura, Burundi'},
                {value: 'Yaoundé, Cameroun', text: 'Yaoundé, Cameroun'},
                {value: 'Douala, Cameroun', text: 'Douala, Cameroun'},
                {value: 'Praia, Cap-Vert', text: 'Praia, Cap-Vert'},
                {value: 'Bangui, Centrafrique', text: 'Bangui, Centrafrique'},
                {value: 'Moroni, Comores', text: 'Moroni, Comores'},
                {value: 'Brazzaville, Congo', text: 'Brazzaville, Congo'},
                {value: 'Kinshasa, RD Congo', text: 'Kinshasa, RD Congo'},
                {value: 'Abidjan, Côte d\'Ivoire', text: 'Abidjan, Côte d\'Ivoire'},
                {value: 'Djibouti, Djibouti', text: 'Djibouti, Djibouti'},
                {value: 'Le Caire, Égypte', text: 'Le Caire, Égypte'},
                {value: 'Asmara, Érythrée', text: 'Asmara, Érythrée'},
                {value: 'Mbabane, Eswatini', text: 'Mbabane, Eswatini'},
                {value: 'Addis-Abeba, Éthiopie', text: 'Addis-Abeba, Éthiopie'},
                {value: 'Libreville, Gabon', text: 'Libreville, Gabon'},
                {value: 'Banjul, Gambie', text: 'Banjul, Gambie'},
                {value: 'Accra, Ghana', text: 'Accra, Ghana'},
                {value: 'Conakry, Guinée', text: 'Conakry, Guinée'},
                {value: 'Bissau, Guinée-Bissau', text: 'Bissau, Guinée-Bissau'},
                {value: 'Malabo, Guinée équatoriale', text: 'Malabo, Guinée équatoriale'},
                {value: 'Nairobi, Kenya', text: 'Nairobi, Kenya'},
                {value: 'Maseru, Lesotho', text: 'Maseru, Lesotho'},
                {value: 'Monrovia, Liberia', text: 'Monrovia, Liberia'},
                {value: 'Tripoli, Libye', text: 'Tripoli, Libye'},
                {value: 'Antananarivo, Madagascar', text: 'Antananarivo, Madagascar'},
                {value: 'Lilongwe, Malawi', text: 'Lilongwe, Malawi'},
                {value: 'Bamako, Mali', text: 'Bamako, Mali'},
                {value: 'Rabat, Maroc', text: 'Rabat, Maroc'},
                {value: 'Casablanca, Maroc', text: 'Casablanca, Maroc'},
                {value: 'Marrakech, Maroc', text: 'Marrakech, Maroc'},
                {value: 'Port-Louis, Maurice', text: 'Port-Louis, Maurice'},
                {value: 'Nouakchott, Mauritanie', text: 'Nouakchott, Mauritanie'},
                {value: 'Maputo, Mozambique', text: 'Maputo, Mozambique'},
                {value: 'Windhoek, Namibie', text: 'Windhoek, Namibie'},
                {value: 'Niamey, Niger', text: 'Niamey, Niger'},
                {value: 'Abuja, Nigéria', text: 'Abuja, Nigéria'},
                {value: 'Lagos, Nigéria', text: 'Lagos, Nigéria'},
                {value: 'Kampala, Ouganda', text: 'Kampala, Ouganda'},
                {value: 'Kigali, Rwanda', text: 'Kigali, Rwanda'},
                {value: 'São Tomé, Sao Tomé-et-Principe', text: 'São Tomé, Sao Tomé-et-Principe'},
                {value: 'Dakar, Sénégal', text: 'Dakar, Sénégal'},
                {value: 'Victoria, Seychelles', text: 'Victoria, Seychelles'},
                {value: 'Freetown, Sierra Leone', text: 'Freetown, Sierra Leone'},
                {value: 'Mogadiscio, Somalie', text: 'Mogadiscio, Somalie'},
                {value: 'Khartoum, Soudan', text: 'Khartoum, Soudan'},
                {value: 'Djouba, Soudan du Sud', text: 'Djouba, Soudan du Sud'},
                {value: 'Dar es Salam, Tanzanie', text: 'Dar es Salam, Tanzanie'},
                {value: 'N\'Djaména, Tchad', text: 'N\'Djaména, Tchad'},
                {value: 'Lomé, Togo', text: 'Lomé, Togo'},
                {value: 'Tunis, Tunisie', text: 'Tunis, Tunisie'},
                {value: 'Sousse, Tunisie', text: 'Sousse, Tunisie'},
                {value: 'Lusaka, Zambie', text: 'Lusaka, Zambie'},
                {value: 'Harare, Zimbabwe', text: 'Harare, Zimbabwe'},
                {value: 'Paris, France', text: 'Paris, France'}
            ],
            render: {
                option_create: function(data, escape) {
                    return '<div class="create">Ajouter <strong>' + escape(data.input) + '</strong>&hellip;</div>';
                },
                no_results: function(data, escape) {
                    return '<div class="no-results">Aucun lieu trouvé. Appuyez sur Entrée pour ajouter.</div>';
                }
            }
        });

        // Init Tom Select for Country Badge
        new TomSelect("#country-badge", {
            persist: false,
            createOnBlur: true,
            create: true,
            delimiter: ' · ',
            placeholder: 'Ajouter un ou plusieurs pays...',
            options: [
                {value: '🇦🇫 Afghanistan', text: '🇦🇫 Afghanistan'},
                {value: '🇿🇦 Afrique du Sud', text: '🇿🇦 Afrique du Sud'},
                {value: '🇦🇱 Albanie', text: '🇦🇱 Albanie'},
                {value: '🇩🇿 Algérie', text: '🇩🇿 Algérie'},
                {value: '🇩🇪 Allemagne', text: '🇩🇪 Allemagne'},
                {value: '🇦🇩 Andorre', text: '🇦🇩 Andorre'},
                {value: '🇦🇴 Angola', text: '🇦🇴 Angola'},
                {value: '🇦🇬 Antigua-et-Barbuda', text: '🇦🇬 Antigua-et-Barbuda'},
                {value: '🇸🇦 Arabie Saoudite', text: '🇸🇦 Arabie Saoudite'},
                {value: '🇦🇷 Argentine', text: '🇦🇷 Argentine'},
                {value: '🇦🇲 Arménie', text: '🇦🇲 Arménie'},
                {value: '🇦🇺 Australie', text: '🇦🇺 Australie'},
                {value: '🇦🇹 Autriche', text: '🇦🇹 Autriche'},
                {value: '🇦🇿 Azerbaïdjan', text: '🇦🇿 Azerbaïdjan'},
                {value: '🇧🇸 Bahamas', text: '🇧🇸 Bahamas'},
                {value: '🇧🇭 Bahreïn', text: '🇧🇭 Bahreïn'},
                {value: '🇧🇩 Bangladesh', text: '🇧🇩 Bangladesh'},
                {value: '🇧🇧 Barbade', text: '🇧🇧 Barbade'},
                {value: '🇧🇪 Belgique', text: '🇧🇪 Belgique'},
                {value: '🇧🇿 Belize', text: '🇧🇿 Belize'},
                {value: '🇧🇯 Bénin', text: '🇧🇯 Bénin'},
                {value: '🇧🇹 Bhoutan', text: '🇧🇹 Bhoutan'},
                {value: '🇧🇾 Biélorussie', text: '🇧🇾 Biélorussie'},
                {value: '🇲🇲 Birmanie (Myanmar)', text: '🇲🇲 Birmanie (Myanmar)'},
                {value: '🇧🇴 Bolivie', text: '🇧🇴 Bolivie'},
                {value: '🇧🇦 Bosnie-Herzégovine', text: '🇧🇦 Bosnie-Herzégovine'},
                {value: '🇧🇼 Botswana', text: '🇧🇼 Botswana'},
                {value: '🇧🇷 Brésil', text: '🇧🇷 Brésil'},
                {value: '🇧🇳 Brunei', text: '🇧🇳 Brunei'},
                {value: '🇧🇬 Bulgarie', text: '🇧🇬 Bulgarie'},
                {value: '🇧🇫 Burkina Faso', text: '🇧🇫 Burkina Faso'},
                {value: '🇧🇮 Burundi', text: '🇧🇮 Burundi'},
                {value: '🇰🇭 Cambodge', text: '🇰🇭 Cambodge'},
                {value: '🇨🇲 Cameroun', text: '🇨🇲 Cameroun'},
                {value: '🇨🇦 Canada', text: '🇨🇦 Canada'},
                {value: '🇨🇻 Cap-Vert', text: '🇨🇻 Cap-Vert'},
                {value: '🇨🇱 Chili', text: '🇨🇱 Chili'},
                {value: '🇨🇳 Chine', text: '🇨🇳 Chine'},
                {value: '🇨🇾 Chypre', text: '🇨🇾 Chypre'},
                {value: '🇨🇴 Colombie', text: '🇨🇴 Colombie'},
                {value: '🇰🇲 Comores', text: '🇰🇲 Comores'},
                {value: '🇨🇬 Congo (Brazzaville)', text: '🇨🇬 Congo (Brazzaville)'},
                {value: '🇨🇩 Congo (Kinshasa)', text: '🇨🇩 Congo (Kinshasa)'},
                {value: '🇰🇵 Corée du Nord', text: '🇰🇵 Corée du Nord'},
                {value: '🇰🇷 Corée du Sud', text: '🇰🇷 Corée du Sud'},
                {value: '🇨🇷 Costa Rica', text: '🇨🇷 Costa Rica'},
                {value: '🇨🇮 Côte d\'Ivoire', text: '🇨🇮 Côte d\'Ivoire'},
                {value: '🇭🇷 Croatie', text: '🇭🇷 Croatie'},
                {value: '🇨🇺 Cuba', text: '🇨🇺 Cuba'},
                {value: '🇩🇰 Danemark', text: '🇩🇰 Danemark'},
                {value: '🇩🇯 Djibouti', text: '🇩🇯 Djibouti'},
                {value: '🇩🇲 Dominique', text: '🇩🇲 Dominique'},
                {value: '🇪🇬 Égypte', text: '🇪🇬 Égypte'},
                {value: '🇦🇪 Émirats Arabes Unis', text: '🇦🇪 Émirats Arabes Unis'},
                {value: '🇪🇨 Équateur', text: '🇪🇨 Équateur'},
                {value: '🇪🇷 Érythrée', text: '🇪🇷 Érythrée'},
                {value: '🇪🇸 Espagne', text: '🇪🇸 Espagne'},
                {value: '🇪🇪 Estonie', text: '🇪🇪 Estonie'},
                {value: '🇸🇿 Eswatini', text: '🇸🇿 Eswatini'},
                {value: '🇺🇸 États-Unis', text: '🇺🇸 États-Unis'},
                {value: '🇪🇹 Éthiopie', text: '🇪🇹 Éthiopie'},
                {value: '🇫🇯 Fidji', text: '🇫🇯 Fidji'},
                {value: '🇫🇮 Finlande', text: '🇫🇮 Finlande'},
                {value: '🇫🇷 France', text: '🇫🇷 France'},
                {value: '🇬🇦 Gabon', text: '🇬🇦 Gabon'},
                {value: '🇬🇲 Gambie', text: '🇬🇲 Gambie'},
                {value: '🇬🇪 Géorgie', text: '🇬🇪 Géorgie'},
                {value: '🇬🇭 Ghana', text: '🇬🇭 Ghana'},
                {value: '🇬🇷 Grèce', text: '🇬🇷 Grèce'},
                {value: '🇬🇩 Grenade', text: '🇬🇩 Grenade'},
                {value: '🇬🇹 Guatemala', text: '🇬🇹 Guatemala'},
                {value: '🇬🇳 Guinée', text: '🇬🇳 Guinée'},
                {value: '🇬🇶 Guinée équatoriale', text: '🇬🇶 Guinée équatoriale'},
                {value: '🇬🇼 Guinée-Bissau', text: '🇬🇼 Guinée-Bissau'},
                {value: '🇬🇾 Guyana', text: '🇬🇾 Guyana'},
                {value: '🇭🇹 Haïti', text: '🇭🇹 Haïti'},
                {value: '🇭🇳 Honduras', text: '🇭🇳 Honduras'},
                {value: '🇭🇺 Hongrie', text: '🇭🇺 Hongrie'},
                {value: '🇮🇳 Inde', text: '🇮🇳 Inde'},
                {value: '🇮🇩 Indonésie', text: '🇮🇩 Indonésie'},
                {value: '🇮🇶 Irak', text: '🇮🇶 Irak'},
                {value: '🇮🇷 Iran', text: '🇮🇷 Iran'},
                {value: '🇮🇪 Irlande', text: '🇮🇪 Irlande'},
                {value: '🇮🇸 Islande', text: '🇮🇸 Islande'},
                {value: '🇮🇱 Israël', text: '🇮🇱 Israël'},
                {value: '🇮🇹 Italie', text: '🇮🇹 Italie'},
                {value: '🇯🇲 Jamaïque', text: '🇯🇲 Jamaïque'},
                {value: '🇯🇵 Japon', text: '🇯🇵 Japon'},
                {value: '🇯🇴 Jordanie', text: '🇯🇴 Jordanie'},
                {value: '🇰🇿 Kazakhstan', text: '🇰🇿 Kazakhstan'},
                {value: '🇰🇪 Kenya', text: '🇰🇪 Kenya'},
                {value: '🇰🇬 Kirghizistan', text: '🇰🇬 Kirghizistan'},
                {value: '🇰🇮 Kiribati', text: '🇰🇮 Kiribati'},
                {value: '🇰🇼 Koweït', text: '🇰🇼 Koweït'},
                {value: '🇱🇦 Laos', text: '🇱🇦 Laos'},
                {value: '🇱🇸 Lesotho', text: '🇱🇸 Lesotho'},
                {value: '🇱🇻 Lettonie', text: '🇱🇻 Lettonie'},
                {value: '🇱🇧 Liban', text: '🇱🇧 Liban'},
                {value: '🇱🇷 Libéria', text: '🇱🇷 Libéria'},
                {value: '🇱🇾 Libye', text: '🇱🇾 Libye'},
                {value: '🇱🇮 Liechtenstein', text: '🇱🇮 Liechtenstein'},
                {value: '🇱🇹 Lituanie', text: '🇱🇹 Lituanie'},
                {value: '🇱🇺 Luxembourg', text: '🇱🇺 Luxembourg'},
                {value: '🇲🇰 Macédoine du Nord', text: '🇲🇰 Macédoine du Nord'},
                {value: '🇲🇬 Madagascar', text: '🇲🇬 Madagascar'},
                {value: '🇲🇾 Malaisie', text: '🇲🇾 Malaisie'},
                {value: '🇲🇼 Malawi', text: '🇲🇼 Malawi'},
                {value: '🇲🇻 Maldives', text: '🇲🇻 Maldives'},
                {value: '🇲🇱 Mali', text: '🇲🇱 Mali'},
                {value: '🇲🇹 Malte', text: '🇲🇹 Malte'},
                {value: '🇲🇦 Maroc', text: '🇲🇦 Maroc'},
                {value: '🇲🇺 Maurice', text: '🇲🇺 Maurice'},
                {value: '🇲🇷 Mauritanie', text: '🇲🇷 Mauritanie'},
                {value: '🇲🇽 Mexique', text: '🇲🇽 Mexique'},
                {value: '🇫🇲 Micronésie', text: '🇫🇲 Micronésie'},
                {value: '🇲🇩 Moldavie', text: '🇲🇩 Moldavie'},
                {value: '🇲🇨 Monaco', text: '🇲🇨 Monaco'},
                {value: '🇲🇳 Mongolie', text: '🇲🇳 Mongolie'},
                {value: '🇲🇪 Monténégro', text: '🇲🇪 Monténégro'},
                {value: '🇲🇿 Mozambique', text: '🇲🇿 Mozambique'},
                {value: '🇳🇦 Namibie', text: '🇳🇦 Namibie'},
                {value: '🇳🇷 Nauru', text: '🇳🇷 Nauru'},
                {value: '🇳🇵 Népal', text: '🇳🇵 Népal'},
                {value: '🇳🇮 Nicaragua', text: '🇳🇮 Nicaragua'},
                {value: '🇳🇪 Niger', text: '🇳🇪 Niger'},
                {value: '🇳🇬 Nigéria', text: '🇳🇬 Nigéria'},
                {value: '🇳🇺 Niue', text: '🇳🇺 Niue'},
                {value: '🇳🇴 Norvège', text: '🇳🇴 Norvège'},
                {value: '🇳🇿 Nouvelle-Zélande', text: '🇳🇿 Nouvelle-Zélande'},
                {value: '🇴🇲 Oman', text: '🇴🇲 Oman'},
                {value: '🇺🇬 Ouganda', text: '🇺🇬 Ouganda'},
                {value: '🇺🇿 Ouzbékistan', text: '🇺🇿 Ouzbékistan'},
                {value: '🇵🇰 Pakistan', text: '🇵🇰 Pakistan'},
                {value: '🇵🇼 Palaos', text: '🇵🇼 Palaos'},
                {value: '🇵🇸 Palestine', text: '🇵🇸 Palestine'},
                {value: '🇵🇦 Panama', text: '🇵🇦 Panama'},
                {value: '🇵🇬 Papouasie-Nouvelle-Guinée', text: '🇵🇬 Papouasie-Nouvelle-Guinée'},
                {value: '🇵🇾 Paraguay', text: '🇵🇾 Paraguay'},
                {value: '🇳🇱 Pays-Bas', text: '🇳🇱 Pays-Bas'},
                {value: '🇵🇪 Pérou', text: '🇵🇪 Pérou'},
                {value: '🇵🇭 Philippines', text: '🇵🇭 Philippines'},
                {value: '🇵🇱 Pologne', text: '🇵🇱 Pologne'},
                {value: '🇵🇹 Portugal', text: '🇵🇹 Portugal'},
                {value: '🇶🇦 Qatar', text: '🇶🇦 Qatar'},
                {value: '🇨🇫 République Centrafricaine', text: '🇨🇫 République Centrafricaine'},
                {value: '🇩🇴 République Dominicaine', text: '🇩🇴 République Dominicaine'},
                {value: '🇨🇿 République Tchèque', text: '🇨🇿 République Tchèque'},
                {value: '🇷🇴 Roumanie', text: '🇷🇴 Roumanie'},
                {value: '🇬🇧 Royaume-Uni', text: '🇬🇧 Royaume-Uni'},
                {value: '🇷🇺 Russie', text: '🇷🇺 Russie'},
                {value: '🇷🇼 Rwanda', text: '🇷🇼 Rwanda'},
                {value: '🇰🇳 Saint-Kitts-et-Nevis', text: '🇰🇳 Saint-Kitts-et-Nevis'},
                {value: '🇸🇲 Saint-Marin', text: '🇸🇲 Saint-Marin'},
                {value: '🇻🇨 Saint-Vincent-et-les-Grenadines', text: '🇻🇨 Saint-Vincent-et-les-Grenadines'},
                {value: '🇱🇨 Sainte-Lucie', text: '🇱🇨 Sainte-Lucie'},
                {value: '🇸🇧 Îles Salomon', text: '🇸🇧 Îles Salomon'},
                {value: '🇸🇻 Salvador', text: '🇸🇻 Salvador'},
                {value: '🇼🇸 Samoa', text: '🇼🇸 Samoa'},
                {value: '🇸🇹 Sao Tomé-et-Principe', text: '🇸🇹 Sao Tomé-et-Principe'},
                {value: '🇸🇳 Sénégal', text: '🇸🇳 Sénégal'},
                {value: '🇷🇸 Serbie', text: '🇷🇸 Serbie'},
                {value: '🇸🇨 Seychelles', text: '🇸🇨 Seychelles'},
                {value: '🇸🇱 Sierra Leone', text: '🇸🇱 Sierra Leone'},
                {value: '🇸🇬 Singapour', text: '🇸🇬 Singapour'},
                {value: '🇸🇰 Slovaquie', text: '🇸🇰 Slovaquie'},
                {value: '🇸🇮 Slovénie', text: '🇸🇮 Slovénie'},
                {value: '🇸🇴 Somalie', text: '🇸🇴 Somalie'},
                {value: '🇸🇩 Soudan', text: '🇸🇩 Soudan'},
                {value: '🇸🇸 Soudan du Sud', text: '🇸🇸 Soudan du Sud'},
                {value: '🇱🇰 Sri Lanka', text: '🇱🇰 Sri Lanka'},
                {value: '🇸🇪 Suède', text: '🇸🇪 Suède'},
                {value: '🇨🇭 Suisse', text: '🇨🇭 Suisse'},
                {value: '🇸🇷 Suriname', text: '🇸🇷 Suriname'},
                {value: '🇸🇾 Syrie', text: '🇸🇾 Syrie'},
                {value: '🇹🇯 Tadjikistan', text: '🇹🇯 Tadjikistan'},
                {value: '🇹🇼 Taïwan', text: '🇹🇼 Taïwan'},
                {value: '🇹🇿 Tanzanie', text: '🇹🇿 Tanzanie'},
                {value: '🇹🇩 Tchad', text: '🇹🇩 Tchad'},
                {value: '🇹🇭 Thaïlande', text: '🇹🇭 Thaïlande'},
                {value: '🇹🇱 Timor oriental', text: '🇹🇱 Timor oriental'},
                {value: '🇹🇬 Togo', text: '🇹🇬 Togo'},
                {value: '🇹🇴 Tonga', text: '🇹🇴 Tonga'},
                {value: '🇹🇹 Trinité-et-Tobago', text: '🇹🇹 Trinité-et-Tobago'},
                {value: '🇹🇳 Tunisie', text: '🇹🇳 Tunisie'},
                {value: '🇹🇲 Turkménistan', text: '🇹🇲 Turkménistan'},
                {value: '🇹🇷 Turquie', text: '🇹🇷 Turquie'},
                {value: '🇹🇻 Tuvalu', text: '🇹🇻 Tuvalu'},
                {value: '🇺🇦 Ukraine', text: '🇺🇦 Ukraine'},
                {value: '🇺🇾 Uruguay', text: '🇺🇾 Uruguay'},
                {value: '🇻🇺 Vanuatu', text: '🇻🇺 Vanuatu'},
                {value: '🇻🇦 Vatican', text: '🇻🇦 Vatican'},
                {value: '🇻🇪 Venezuela', text: '🇻🇪 Venezuela'},
                {value: '🇻🇳 Vietnam', text: '🇻🇳 Vietnam'},
                {value: '🇾🇪 Yémen', text: '🇾🇪 Yémen'},
                {value: '🇿🇲 Zambie', text: '🇿🇲 Zambie'},
                {value: '🇿🇼 Zimbabwe', text: '🇿🇼 Zimbabwe'}
            ],
            render: {
                option_create: function(data, escape) {
                    return '<div class="create">Ajouter <strong>' + escape(data.input) + '</strong>&hellip;</div>';
                },
                no_results: function(data, escape) {
                    return '<div class="no-results">Aucun pays trouvé. Appuyez sur Entrée pour ajouter.</div>';
                }
            }
        });
    });
</script>
@endsection
