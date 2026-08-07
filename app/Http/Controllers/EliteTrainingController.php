<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EliteTrainingController extends Controller
{
    /**
     * Mapping des slugs vers les noms exacts des domaines
     */
    protected array $domainsMap = [
        'audit-comptabilite-finance' => [
            'name' => 'Audit, Comptabilité & Finance',
            'code_prefix' => 'ACF',
            'title' => 'Audit, Comptabilité & Finance (normes IFRS & Gestion financière)',
            'subtitle' => 'Maîtrisez les principes comptables IFRS, l\'analyse financière, le reporting et l\'audit d\'entreprise.',
            'img' => 'assets/img/img3.jpg',
            'icon' => 'bi-calculator-fill',
        ],
        'controle-de-gestion' => [
            'name' => 'Contrôle de Gestion',
            'code_prefix' => 'GC',
            'title' => 'Contrôle de Gestion & Trésorerie',
            'subtitle' => 'Pilotez la performance financière, le cadrage budgétaire et la gestion de trésorerie.',
            'img' => 'assets/img/img3.jpg',
            'icon' => 'bi-graph-up-arrow',
        ],
        'informatique-ntic' => [
            'name' => 'Informatique & NTIC',
            'code_prefix' => 'INT',
            'title' => 'Informatique, Cybersécurité & NTIC',
            'subtitle' => 'Audit de sécurité, investigation numérique, performance des réseaux et transformation digitale.',
            'img' => 'assets/img/company.jpg',
            'icon' => 'bi-shield-lock-fill',
        ],
        'soft-skills' => [
            'name' => 'Soft Skills & Développement Personnel',
            'code_prefix' => 'DPS',
            'title' => 'Développement Personnel & Soft Skills',
            'subtitle' => 'Gestion du temps, intelligence émotionnelle, communication assertive et leadership.',
            'img' => 'assets/img/professionel.jpg',
            'icon' => 'bi-person-badge-fill',
        ],
        'projets-developpement' => [
            'name' => 'Projets & Programmes de Développement',
            'code_prefix' => 'PPD',
            'title' => 'Projets & Programmes de Développement en Afrique',
            'subtitle' => 'Planification, exécution, suivi-évaluation, audit et gestion financière des projets.',
            'img' => 'assets/img/cta-bg.jpg',
            'icon' => 'bi-diagram-3-fill',
        ],
        'projet-educatif' => [
            'name' => 'Projet Éducatif en Afrique',
            'code_prefix' => 'PEA',
            'title' => 'Gouvernance & Pilotage du Secteur Éducatif en Afrique',
            'subtitle' => 'Stratégies nationales d\'éducation, décentralisation et amélioration de la qualité de l\'enseignement.',
            'img' => 'assets/img/services.jpg',
            'icon' => 'bi-journal-check',
        ],
        'ecommerce-fintech' => [
            'name' => 'E-Commerce, Fintech & Développement Durable',
            'code_prefix' => 'EF',
            'title' => 'E-Commerce, Fintech & Intelligence Artificielle',
            'subtitle' => 'IA appliquée, transformation numérique des services financiers et transition écologique.',
            'img' => 'assets/img/services.jpg',
            'icon' => 'bi-cpu-fill',
        ],
        'marches-publics' => [
            'name' => 'Marchés Publics',
            'code_prefix' => 'MP',
            'title' => 'Passation & Exécution des Marchés Publics',
            'subtitle' => 'Procédures d\'appel d\'offres, exécution des contrats et cadre réglementaire des marchés.',
            'img' => 'assets/img/im1.jpg',
            'icon' => 'bi-briefcase-fill',
        ],
        'droit-ohada' => [
            'name' => 'Droit des Affaires & Droit OHADA',
            'code_prefix' => 'OHADA',
            'title' => 'Droit des Affaires & Espace OHADA',
            'subtitle' => 'Sécurité juridique des opérations commerciales, droit des contrats et sociétés.',
            'img' => 'assets/img/im1.jpg',
            'icon' => 'bi-bank2',
        ],
        'marketing-communication' => [
            'name' => 'Marketing, Communication & Distribution',
            'code_prefix' => 'MCD',
            'title' => 'Marketing Stratégique, Communication & Distribution',
            'subtitle' => 'Stratégies modernes de marketing digital, communication institutionnelle et vente.',
            'img' => 'assets/img/img2.jpg',
            'icon' => 'bi-megaphone-fill',
        ],
    ];

    /**
     * Page principale /elite-training
     */
    public function index()
    {
        if (\Illuminate\Support\Facades\Schema::hasTable('formations')) {
            $certifiantes = Formation::certifiante()->active()->get();
            $diplomantes  = Formation::diplomante()->active()->get();
            $surMesure    = Formation::surMesure()->active()->get();
            $elearning    = Formation::elearning()->active()->get();
            $allFormations = Formation::active()->get();
        } else {
            $certifiantes  = collect();
            $diplomantes   = collect();
            $surMesure     = collect();
            $elearning     = collect();
            $allFormations = collect();
        }
        $domainsConfig = $this->domainsMap;

        return view('elite-training.index', compact('certifiantes', 'diplomantes', 'surMesure', 'elearning', 'allFormations', 'domainsConfig'));
    }

    /**
     * Page dédiée à un domaine spécifique /elite-training/domaine/{slug}
     */
    public function domain(Request $request, $slug)
    {
        // Récupérer la configuration du domaine ou fallback
        $domainInfo = $this->domainsMap[$slug] ?? null;

        if (!$domainInfo) {
            // Chercher par comparaison souple
            foreach ($this->domainsMap as $key => $info) {
                if (Str::slug($info['name']) === $slug) {
                    $domainInfo = $info;
                    break;
                }
            }
        }

        if (!$domainInfo) {
            // Fallback générique
            $domainName = Str::headline($slug);
            $domainInfo = [
                'name' => $domainName,
                'code_prefix' => strtoupper(substr($slug, 0, 3)),
                'title' => 'Formations en ' . $domainName,
                'subtitle' => 'Découvrez les programmes certifiants et spécialisés dans le domaine ' . $domainName,
                'img' => 'assets/img/img3.jpg',
                'icon' => 'bi-bookmark-check-fill',
            ];
        }

        $domainName = $domainInfo['name'];

        // Requête des formations du domaine si la table existe
        if (\Illuminate\Support\Facades\Schema::hasTable('formations')) {
            $query = Formation::active()->where(function($q) use ($domainName, $domainInfo) {
                $q->where('domain', 'like', "%{$domainName}%");
                if (!empty($domainInfo['code_prefix'])) {
                    $q->orWhere('code', 'like', $domainInfo['code_prefix'] . '-%');
                }
            });

            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('code', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }

            $formations = $query->orderBy('code')->get();
        } else {
            $formations = collect();
        }

        // Récupérer toutes les catégories pour le menu latéral
        $allDomains = $this->domainsMap;

        return view('elite-training.domain', compact('domainInfo', 'formations', 'allDomains', 'slug'));
    }

    public function diplomaMiniMBA()
    {
        return view('elite-training.diploma-mini-mba');
    }

    public function diplomaExecutiveMBA()
    {
        return view('elite-training.diploma-executive-mba');
    }

    public function nosCycles()
    {
        $dbCycles = Formation::active()->where('type', 'cycle')->orderBy('code')->get();

        if ($dbCycles->count() > 0) {
            $cycles = $dbCycles->map(function ($f) {
                return [
                    'id'          => $f->id,
                    'title'       => $f->title,
                    'code'        => $f->code ?? 'CP-' . sprintf('%03d', $f->id),
                    'duration'    => $f->duration ?? '2 Semaines',
                    'price'       => $f->price ? (number_format($f->price, 0, ',', ' ') . '€') : '3 400€',
                    'description' => $f->description ?? '',
                    'link'        => '#',
                ];
            });
        } else {
            $cycles = [
                [
                    'title' => 'Cycle de perfectionnement Manager Spécialiste en Sécurité Alimentaire',
                    'code' => 'CP-001',
                    'duration' => '2 Semaines',
                    'price' => '3400€',
                    'description' => 'Maîtrisez les normes et outils pour garantir la sécurité alimentaire dans tout type de structure.',
                    'link' => 'https://caei-afri.com/Elitetraining/formulaire.html?cycle=1',
                ],
                [
                    'title' => 'Cycle perfectionnement Manager Spécialiste en Hygiène Alimentaire',
                    'code' => 'CP-002',
                    'duration' => '2 Semaines',
                    'price' => '3400€',
                    'description' => 'Maîtrisez les normes et outils pour garantir l’hygiène alimentaire dans tous types de structures.',
                    'link' => 'https://caei-afri.com/Elitetraining/formulaire.html?cycle=2',
                ],
            ];
        }

        return view('elite-training.nos-cycles', compact('cycles'));
    }



    public function diplomaDoctorat()
    {
        return view('elite-training.diploma-doctorat');
    }
}
