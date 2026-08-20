<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallCenterController extends Controller
{
    public function index()
    {
        return view('callcenter.index');
    }

    public function about()
    {
        return view('callcenter.about');
    }

    public function services()
    {
        return view('callcenter.services');
    }

    public function energie()
    {
        return view('callcenter.secteurs.energie');
    }

    public function assurance()
    {
        return view('callcenter.secteurs.assurance');
    }

    public function technologie()
    {
        return view('callcenter.secteurs.technologie');
    }

    public function support()
    {
        return view('callcenter.support');
    }

    public function blog()
    {
        return view('callcenter.blog');
    }

    public function blogDetails($slug)
    {
        $articles = [
            'intelligence-artificielle' => [
                'title' => "L'intelligence artificielle : menace ou opportunité pour le support client ?",
                'category' => 'Analyse Stratégique',
                'date' => '20 Août 2026',
                'image' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=2070&auto=format&fit=crop',
                'content' => '
                    <p class="fs-5 mb-4" style="color: #e2e8f0;">L\'intégration des modèles linguistiques de grande taille (LLM) dans les flux de support technique est en train de redéfinir les normes de productivité et de qualité dans les centres de contact.</p>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">1. L\'évolution du support de niveau 1</h3>
                    <p style="color: #cbd5e1;">Historiquement, les agents de niveau 1 traitaient des volumes importants de requêtes simples et répétitives. L\'intelligence artificielle conversationnelle d\'aujourd\'hui est capable d\'absorber jusqu\'à 60% de ces interactions, offrant des résolutions instantanées aux clients tout en réduisant considérablement les temps d\'attente.</p>
                    <blockquote class="my-5 p-4 border-start border-4 border-primary" style="background: rgba(255,255,255,0.05); border-radius: 0 12px 12px 0;">
                        <p class="fs-5 fst-italic mb-0 text-white">"L\'IA ne remplace pas l\'agent humain, elle le dote de super-pouvoirs pour résoudre les problèmes complexes plus rapidement."</p>
                    </blockquote>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">2. De nouvelles compétences pour les agents</h3>
                    <p style="color: #cbd5e1;">Loin de constituer une menace pour l\'emploi, cette transition transforme le rôle de l\'agent de centre de contact. Libérés des tâches routinières, les conseillers peuvent se concentrer sur des interactions à forte valeur ajoutée nécessitant de l\'empathie, du jugement nuancé et des compétences en résolution de problèmes complexes.</p>
                    <p style="color: #cbd5e1;">Chez CAEI, nous avons observé que les agents soutenus par des outils d\'IA voient leur niveau de stress diminuer et leur satisfaction au travail augmenter de 35%.</p>
                '
            ],
            'retention-des-talents' => [
                'title' => "Rétention des talents : structurer l'évolution de carrière en centre de contact",
                'category' => 'Ressources Humaines',
                'date' => '15 Août 2026',
                'image' => 'https://images.unsplash.com/photo-1549923746-c502d488b3ea?q=80&w=2071&auto=format&fit=crop',
                'content' => '
                    <p class="fs-5 mb-4" style="color: #e2e8f0;">La gestion de l\'attrition est un KPI critique. Voici les méthodologies appliquées par CAEI pour maintenir un taux de turnover inférieur aux standards de l\'industrie.</p>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">1. La cartographie des compétences</h3>
                    <p style="color: #cbd5e1;">Dès l\'intégration d\'un nouvel agent, nous évaluons non seulement ses compétences techniques, mais aussi ses soft skills. Cela nous permet de tracer un parcours d\'évolution personnalisé. Un agent peut ainsi se diriger vers des postes de management, de formation, ou de support technique avancé.</p>
                    <blockquote class="my-5 p-4 border-start border-4 border-primary" style="background: rgba(255,255,255,0.05); border-radius: 0 12px 12px 0;">
                        <p class="fs-5 fst-italic mb-0 text-white">"Offrir une perspective d\'évolution claire est le meilleur levier de fidélisation."</p>
                    </blockquote>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">2. La formation continue</h3>
                    <p style="color: #cbd5e1;">Le monde du centre de contact évolue rapidement (nouveaux outils, nouveaux canaux). La formation continue permet aux agents de se sentir valorisés et de rester performants. Nous allouons 10% du temps de travail de nos agents à la formation continue.</p>
                '
            ],
            'deploiement-omnicanal' => [
                'title' => "Déploiement omnicanal : architecture logicielle et défis d'intégration",
                'category' => 'Technologie',
                'date' => '10 Août 2026',
                'image' => 'https://images.unsplash.com/photo-1556740714-a8395b3bf30f?q=80&w=2070&auto=format&fit=crop',
                'content' => '
                    <p class="fs-5 mb-4" style="color: #e2e8f0;">Comment garantir l\'intégrité de la donnée client lors du passage d\'un canal asynchrone (email) à un canal synchrone (voix).</p>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">1. Le défi du silo de données</h3>
                    <p style="color: #cbd5e1;">La majorité des entreprises utilisent des outils différents pour gérer les emails, les réseaux sociaux et la téléphonie. Le défi technique consiste à unifier ces flux au sein d\'une interface unique pour l\'agent. Le client ne doit pas avoir à répéter son problème lorsqu\'il change de canal.</p>
                    <blockquote class="my-5 p-4 border-start border-4 border-primary" style="background: rgba(255,255,255,0.05); border-radius: 0 12px 12px 0;">
                        <p class="fs-5 fst-italic mb-0 text-white">"L\'omnicanalité n\'est pas un choix technologique, c\'est une exigence client."</p>
                    </blockquote>
                    <h3 class="fw-bold mt-5 mb-3" style="color: var(--cc-primary-light);">2. Solutions architecturales</h3>
                    <p style="color: #cbd5e1;">Chez CAEI, nous utilisons des middlewares (bus de données) qui assurent la synchronisation en temps réel entre le CRM, le CTI (Couplage Téléphonie-Informatique) et les plateformes de messagerie. Chaque interaction alimente une fiche client unique (Vue 360°).</p>
                '
            ],
        ];

        $article = $articles[$slug] ?? null;

        if (!$article) {
            abort(404);
        }

        return view('callcenter.blog-details', compact('article'));
    }

    public function contact()
    {
        return view('callcenter.contact');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:50',
            'subject'       => 'required|string|max:255',
            'message'       => 'required|string|max:5000',
            'pays'          => 'nullable|string|max:255',
            'poste'         => 'nullable|string|max:255',
            'entreprise'    => 'nullable|string|max:255',
            'attachment'    => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,png,jpg,jpeg,zip',
                'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpeg,application/zip',
                'max:10240', // 10 MB max
            ],
        ]);

        $extraDetails = [];
        if ($request->filled('entreprise')) {
            $extraDetails[] = "• Entreprise / Institution : " . $request->input('entreprise');
        }
        if ($request->filled('poste')) {
            $extraDetails[] = "• Fonction / Poste : " . $request->input('poste');
        }
        if ($request->filled('pays')) {
            $extraDetails[] = "• Pays : " . $request->input('pays');
        }

        if (!empty($extraDetails)) {
            $validated['message'] = "--- Informations Entreprise ---\n" . implode("\n", $extraDetails) . "\n\n--- Message ---\n" . $validated['message'];
        }

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('callcenter_attachments', $fileName, 'public');
            $validated['attachment'] = $path;
        }

        unset($validated['pays'], $validated['poste'], $validated['entreprise']);

        \App\Models\CallCenterRequest::create($validated);

        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès. Notre équipe vous contactera dans les plus brefs délais.');
    }
}
