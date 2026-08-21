<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Formation;
use Illuminate\Http\Request;

class SeminarPublicController extends Controller
{
    /**
     * Page d'accueil publique — liste de tous les séminaires publiés et formations.
     */
    public function index()
    {
        $seminars = Seminar::where('status', 'published')
            ->withCount('registrations')
            ->with('trainers')
            ->orderBy('start_date')
            ->get();

        $formations = Formation::active()->take(6)->get();

        return view('welcome', compact('seminars', 'formations'));
    }

    /**
     * Page d'accueil principale / Alias pour la route home.
     */
    public function main()
    {
        return $this->index();
    }

    /**
     * Données complètes des actualités et événements CAEI Company Group.
     */
    public static function getActualitesList()
    {
        return [
            'audit-lcb-ft-tunis-2025' => [
                'slug' => 'audit-lcb-ft-tunis-2025',
                'title' => 'Audit du dispositif de conformité LCB/FT',
                'subtitle' => 'Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme',
                'category' => '🎓 Séminaire international',
                'date' => 'Décembre 2025',
                'location' => 'Tunis, Tunisie',
                'country_badge' => '🇹🇳 Tunisie · 🇸🇳 Sénégal',
                'theme' => 'Audit LCB/FT',
                'partner' => [
                    'title' => 'Partenariat Stratégique',
                    'text' => 'Avec la participation de la Banque Nationale pour le Développement Économique (BNDE) du Sénégal.',
                    'icon' => 'bi-shield-check'
                ],
                'summary' => 'Séminaire international de haut niveau consacré à l’audit du dispositif de conformité et à l’efficacité des mécanismes de contrôle interne dans le secteur bancaire.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a organisé en décembre 2025 un séminaire international consacré à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (LCB/FT).",
                    "Cette rencontre a réuni des professionnels du secteur financier autour des enjeux liés au renforcement des dispositifs de conformité, à l’identification des risques et à l’efficacité des mécanismes de contrôle interne."
                ],
                'main_image' => 'images/actualites/reunion-caei-6.jpg',
                'main_image_alt' => 'Séminaire international LCB/FT CAEI',
                'gallery_title' => 'Galerie Photos du Séminaire',
                'gallery' => [
                    ['image' => 'images/actualites/reunion-caei-1.jpg', 'title' => 'Cadrage & Travaux en Commission', 'desc' => 'Échanges et études de cas financiers'],
                    ['image' => 'images/actualites/reunion-caei-2.jpg', 'title' => 'Présentation Méthodologique', 'desc' => 'Normes et mécanismes de contrôle interne'],
                    ['image' => 'images/actualites/reunion-caei-3.jpg', 'title' => 'Coopération Internationale', 'desc' => 'Délégation BNDE Sénégal & Experts CAEI'],
                    ['image' => 'images/actualites/reunion-caei-4.jpg', 'title' => 'Identification des Risques', 'desc' => 'Cartographie des risques et gouvernance'],
                    ['image' => 'images/actualites/reunion-caei-5.jpg', 'title' => 'Intervention Expert LCB/FT', 'desc' => 'Dispositif de conformité et audit opérationnel'],
                    ['image' => 'images/actualites/reunion-caei-6.jpg', 'title' => 'Clôture & Synergie CAEI', 'desc' => 'Comité Africain d’Expertise Internationale'],
                ]
            ],
            'ged-archivage-abidjan-2025' => [
                'slug' => 'ged-archivage-abidjan-2025',
                'title' => 'Pilotage du projet GED et archivage numérique',
                'subtitle' => 'Gestion Électronique des Documents, Dématérialisation et Stratégie d’Archivage Numérique',
                'category' => '📁 Séminaire international',
                'date' => 'Décembre 2025',
                'location' => 'Abidjan, Côte d’Ivoire',
                'country_badge' => '🇨🇮 Côte d’Ivoire · 🇹🇳 Tunisie',
                'theme' => 'Pilotage GED & Archivage',
                'partner' => null,
                'summary' => 'Séminaire international à Abidjan pour approfondir les méthodes et bonnes pratiques de conception et déploiement d’un projet de digitalisation documentaire.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a organisé en décembre 2025 à Abidjan un séminaire international consacré au pilotage des projets de Gestion Électronique des Documents (GED) et d’archivage numérique.",
                    "Cette rencontre a permis aux participants d’approfondir les méthodes et bonnes pratiques nécessaires à la conception, au déploiement et au pilotage d’un projet de digitalisation documentaire, ainsi qu’à la mise en place d’une stratégie efficace d’archivage numérique."
                ],
                'main_image' => 'images/actualites/ged-abidjan-1.jpg',
                'main_image_alt' => 'Délégation et Formateurs Experts CAEI Abidjan',
                'gallery_title' => 'Galerie Photos — Session Abidjan',
                'gallery' => [
                    ['image' => 'images/actualites/ged-abidjan-presentation.jpg', 'title' => 'Présentation GED & BPM', 'desc' => 'Méthodologie & Workflow'],
                    ['image' => 'images/actualites/ged-abidjan-salle.jpg', 'title' => 'Salle & Participants', 'desc' => 'Travaux & échanges Abidjan'],
                    ['image' => 'images/actualites/ged-abidjan-3.jpg', 'title' => 'Remise des Certificats', 'desc' => 'Attestation de compétences'],
                    ['image' => 'images/actualites/ged-abidjan-4.jpg', 'title' => 'Clôture Officielle', 'desc' => 'Partage et certification'],
                ]
            ],
            'formation-vente-prospection-tunis-2024' => [
                'slug' => 'formation-vente-prospection-tunis-2024',
                'title' => 'Techniques de vente et prospection commerciale',
                'subtitle' => 'Développement Commercial, Négociation et Gestion de la Relation Client',
                'category' => '🎓 Formation professionnelle',
                'date' => 'Novembre 2024',
                'location' => 'Tunis, Tunisie',
                'country_badge' => '🇹🇳 Tunisie',
                'theme' => 'Vente & Prospection',
                'partner' => null,
                'summary' => 'Formation intensive dédiée aux techniques de vente, prospection commerciale, argumentation et traitement des objections.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a organisé à Tunis une formation professionnelle dédiée aux techniques de vente et de prospection commerciale.",
                    "Cette formation a permis aux participants de renforcer leurs compétences en matière de prospection, prise de contact, argumentation commerciale, traitement des objections et développement de la relation client."
                ],
                'main_image' => 'images/actualites/vente-prospection-2.png',
                'main_image_alt' => 'Formation professionnelle techniques de vente CAEI Tunis',
                'gallery_title' => 'Galerie Photos — Session Tunis',
                'gallery' => [
                    ['image' => 'images/actualites/vente-prospection-1.jpg', 'title' => 'Atelier Interactif', 'desc' => 'Prise de contact & vente'],
                    ['image' => 'images/actualites/vente-prospection-5.jpg', 'title' => 'Session de Travail', 'desc' => 'Études de cas & prospection'],
                    ['image' => 'images/actualites/vente-prospection-3.png', 'title' => 'Échanges & Pratique', 'desc' => 'Traitement des objections'],
                    ['image' => 'images/actualites/vente-prospection-4.jpg', 'title' => 'Moment Convivial', 'desc' => 'Équipe & participants CAEI'],
                ]
            ],
            'visite-archives-nationales-tunisie-2025' => [
                'slug' => 'visite-archives-nationales-tunisie-2025',
                'title' => 'Visite professionnelle — Archives Nationales de Tunisie',
                'subtitle' => 'Conservation, Valorisation, Modernisation et Gestion Documentaire',
                'category' => '🏛️ Visite professionnelle',
                'date' => 'Juillet 2025',
                'location' => 'Tunis, Tunisie',
                'country_badge' => '🇹🇳 Tunisie · 🇨🇮 Côte d’Ivoire',
                'theme' => 'Archives & Gestion',
                'partner' => [
                    'title' => 'Coopération Institutionnelle',
                    'text' => 'Avec la présence de représentants de la Banque Africaine de Développement (BAD) – Côte d’Ivoire.',
                    'icon' => 'bi-bank'
                ],
                'summary' => 'Visite technique et institutionnelle aux Archives Nationales de Tunisie autour des enjeux de gestion documentaire, avec la BAD Côte d’Ivoire.',
                'content' => [
                    "Dans le cadre de ses activités professionnelles et de ses échanges internationaux, le Comité Africain d’Expertise Internationale (CAEI) a organisé une visite aux Archives Nationales de Tunisie en juillet 2025.",
                    "Cette visite a réuni des professionnels autour des enjeux liés à la gestion documentaire, la conservation, la valorisation et la modernisation des archives, avec la présence de représentants de la Banque Africaine de Développement (BAD) de Côte d’Ivoire.",
                    "Cette rencontre a également permis de favoriser les échanges d’expériences et le partage de bonnes pratiques dans le domaine de la gestion et de l’archivage documentaire."
                ],
                'main_image' => 'images/actualites/archives-tunisie-1.jpg',
                'main_image_alt' => 'Visite professionnelle Archives Nationales de Tunisie CAEI BAD',
                'gallery_title' => 'Galerie Photos — Archives Nationales',
                'gallery' => [
                    ['image' => 'images/actualites/archives-tunisie-2.png', 'title' => 'Conservation & Rayonnages', 'desc' => 'Présentation des boîtes et registres'],
                    ['image' => 'images/actualites/archives-tunisie-3.png', 'title' => 'Échanges Techniques', 'desc' => 'Partage de méthodes et bonnes pratiques'],
                    ['image' => 'images/actualites/archives-tunisie-4.jpg', 'title' => 'Atelier de Traitement', 'desc' => 'Dématérialisation et archivage'],
                ]
            ],
            'remise-certificats-lcb-ft-abidjan-2026' => [
                'slug' => 'remise-certificats-lcb-ft-abidjan-2026',
                'title' => 'Remise des certificats internationaux — Séminaire LCB/FT',
                'subtitle' => 'Reconnaissance de l\'Excellence et Clôture du Séminaire International de Conformité',
                'category' => '🏆 Remise des certificats',
                'date' => '15 au 17 juin 2026',
                'location' => 'Abidjan, Côte d’Ivoire 🇨🇮',
                'country_badge' => '🇹🇳 Tunisie · 🇨🇮 Côte d’Ivoire · 🇬🇳 Guinée',
                'theme' => 'Audit LCB/FT',
                'partner' => [
                    'title' => 'Institutions participantes',
                    'text' => 'Trésor Public de Côte d’Ivoire · ARTWORKS INTERNATIONAL · THALYS CONSEILS & ASSOCIÉS · AVENI-RE',
                    'icon' => 'bi-award'
                ],
                'summary' => 'Cérémonie solennelle de remise des certificats internationaux aux lauréats et participants du séminaire d\'audit LCB/FT à Abidjan.',
                'content' => [
                    "À l’issue du séminaire international consacré à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (LCB/FT), le Comité Africain d’Expertise Internationale (CAEI) a organisé la remise des certificats internationaux aux participants.",
                    "Cette cérémonie a réuni plusieurs professionnels et représentants d’organisations, notamment le Trésor Public de Côte d’Ivoire, ARTWORKS INTERNATIONAL, THALYS CONSEILS & ASSOCIÉS et AVENI-RE.",
                    "Un moment de reconnaissance qui vient clôturer une session riche en échanges, en expertise et en partage d’expériences autour des enjeux de conformité et de lutte contre la criminalité financière."
                ],
                'main_image' => 'images/actualites/certificats-abidjan-groupe.jpg',
                'main_image_alt' => 'Photo de groupe officielle remise des certificats LCB/FT Abidjan CAEI',
                'gallery_title' => 'Galerie Photos — Remise Individuelle des Certificats',
                'gallery' => [
                    ['image' => 'images/actualites/certificats-abidjan-4.jpg', 'title' => 'Remise de Certificat', 'desc' => 'Mme Bamba Zeinab — Attestation CAEI'],
                    ['image' => 'images/actualites/certificats-abidjan-1.jpg', 'title' => 'Remise de Certificat', 'desc' => 'Attestation & sacoche officielle CAEI'],
                    ['image' => 'images/actualites/certificats-abidjan-2.jpg', 'title' => 'Certification & Honneur', 'desc' => 'Validation du cycle d\'audit LCB/FT'],
                    ['image' => 'images/actualites/certificats-abidjan-3.jpg', 'title' => 'Reconnaissance Officielle', 'desc' => 'Félicitations et certificat CAEI'],
                    ['image' => 'images/actualites/certificats-abidjan-5.jpg', 'title' => 'Excellence Professionnelle', 'desc' => 'M. Tassonou — Distinction CAEI'],
                    ['image' => 'images/actualites/certificats-abidjan-6.jpg', 'title' => 'Délégation & Cérémonie', 'desc' => 'Partage et clôture officielle'],
                    ['image' => 'images/actualites/certificats-abidjan-7.jpg', 'title' => 'Attestation de Compétences', 'desc' => 'Comité Africain d\'Expertise Internationale'],
                    ['image' => 'images/actualites/certificats-abidjan-8.jpg', 'title' => 'Distinction d\'Honneur', 'desc' => 'M. Agja Pierre — Certification LCB/FT'],
                    ['image' => 'images/actualites/certificats-abidjan-9.jpg', 'title' => 'Validation de Formation', 'desc' => 'M. Bosson — Remise officielle'],
                    ['image' => 'images/actualites/certificats-abidjan-10.jpg', 'title' => 'Reconnaissance & Mérite', 'desc' => 'Mme Becher — Conformité LCB/FT'],
                    ['image' => 'images/actualites/certificats-abidjan-11.jpg', 'title' => 'Excellence Professionnelle', 'desc' => 'Mme Koua — Certification CAEI'],
                    ['image' => 'images/actualites/certificats-abidjan-12.jpg', 'title' => 'Cérémonie & Félicitations', 'desc' => 'M. Kouakou — Audit LCB/FT'],
                    ['image' => 'images/actualites/certificats-abidjan-13.jpg', 'title' => 'Attestation Officielle', 'desc' => 'M. Konan Jean Pierre — Conformité LCB/FT'],
                    ['image' => 'images/actualites/certificats-abidjan-14.jpg', 'title' => 'Honneur & Clôture', 'desc' => 'M. N\'Gori — Certification CAEI'],
                ]
            ],
            'fete-fin-annee-caei-tunis-2024' => [
                'slug' => 'fete-fin-annee-caei-tunis-2024',
                'title' => 'Fête de fin d’année — CAEI',
                'subtitle' => 'Célébration des Réalisations, Convivialité et Cohésion d\'Équipe',
                'category' => '🎉 Événement interne',
                'date' => 'Décembre 2024',
                'location' => 'Tunis, Tunisie 🇹🇳',
                'country_badge' => '🇹🇳 Tunisie',
                'theme' => 'Fête de fin d’année',
                'partner' => null,
                'summary' => 'Moment de partage et de convivialité réunissant les équipes du CAEI pour célébrer les réussites de l\'année 2024 et accueillir 2025.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a célébré sa fête de fin d’année 2024 dans une ambiance conviviale, réunissant ses équipes autour d’un moment de partage et de convivialité.",
                    "Cette rencontre a été l’occasion de célébrer les réalisations de l’année, remercier les collaborateurs pour leur engagement et renforcer l’esprit d’équipe.",
                    "Un moment chaleureux pour clôturer l’année et commencer une nouvelle année avec de nouvelles ambitions. ✨"
                ],
                'main_image' => 'images/actualites/fete-fin-annee-1.jpg',
                'main_image_alt' => 'Fête de fin d\'année CAEI gâteau et équipe',
                'gallery_title' => 'Galerie Photos — Ambiance & Équipe',
                'gallery' => [
                    ['image' => 'images/actualites/fete-fin-annee-1.jpg', 'title' => 'Célébration & Partage', 'desc' => 'Équipe CAEI autour du gâteau de l\'an 2025'],
                    ['image' => 'images/actualites/fete-fin-annee-2.jpg', 'title' => 'Ambiance Festive & Accueil', 'desc' => 'Pôle CAEI Call Center aux couleurs de fête'],
                ]
            ],
            'demarrage-seminaire-lcb-ft-abidjan-2026' => [
                'slug' => 'demarrage-seminaire-lcb-ft-abidjan-2026',
                'title' => 'Démarrage du séminaire international — Audit LCB/FT',
                'subtitle' => 'Audit du Dispositif de Conformité, Gestion des Risques et Contrôle Interne',
                'category' => '🎓 Démarrage de séminaire',
                'date' => '15 juin 2026',
                'location' => 'Abidjan, Côte d’Ivoire 🇨🇮',
                'country_badge' => '🇹🇳 Tunisie · 🇨🇮 Côte d’Ivoire · 🇬🇳 Guinée',
                'theme' => 'Audit LCB/FT',
                'partner' => null,
                'summary' => 'Lancement officiel à Abidjan du séminaire international consacré à l\'audit du dispositif de conformité bancaire et financière.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a donné le coup d’envoi de sa session internationale consacrée à l’audit du dispositif de conformité en matière de Lutte contre le Blanchiment de Capitaux et le Financement du Terrorisme (LCB/FT).",
                    "Cette nouvelle session à Abidjan réunit des professionnels du secteur financier et institutionnel autour des enjeux de conformité, de gestion des risques, de contrôle et d’audit des dispositifs LCB/FT.",
                    "Une nouvelle occasion pour le CAEI de favoriser le partage d’expertise, les échanges professionnels et le développement des compétences à l’échelle africaine."
                ],
                'main_image' => 'images/actualites/lcbft-abidjan-session-7.jpg',
                'main_image_alt' => 'Démarrage séminaire international LCB/FT Abidjan CAEI',
                'gallery_title' => 'Galerie Photos — Session & Travaux d\'Audit',
                'gallery' => [
                    ['image' => 'images/actualites/lcbft-abidjan-session-8.jpg', 'title' => 'Séance Plénière', 'desc' => 'Présentation & projections'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-6.png', 'title' => 'Ouverture & Cadrage', 'desc' => 'Délégation CAEI Abidjan'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-10.png', 'title' => 'Méthodes & Tendances', 'desc' => 'Module Lutte Anti-Blanchiment'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-9.png', 'title' => 'Concertation & Débats', 'desc' => 'Échanges interactifs autour de la table'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-1.jpg', 'title' => 'Travaux d\'Audit', 'desc' => 'Études de cas opérationnels'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-5.jpg', 'title' => 'Écoute Active', 'desc' => 'Participants en session de travail'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-2.jpg', 'title' => 'Expertise Métier', 'desc' => 'Cadrage & gouvernance du risque'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-3.jpg', 'title' => 'Dossiers Techniques', 'desc' => 'Dispositifs & conformité LCB/FT'],
                    ['image' => 'images/actualites/lcbft-abidjan-session-11.png', 'title' => 'Travaux & Prise de Notes', 'desc' => 'Session opérationnelle d\'audit'],
                ]
            ],
            'ged-archivage-multinational-2026' => [
                'slug' => 'ged-archivage-multinational-2026',
                'title' => 'Pilotage de projet GED & Archivage numérique',
                'subtitle' => 'Gestion Électronique des Documents, Dématérialisation et Transformation Digitale',
                'category' => '📁 Séminaire international',
                'date' => 'Session Multinationale',
                'location' => 'Abidjan & Panafricain',
                'country_badge' => '🌍 🇹🇳 🇨🇮 🇧🇯 🇳🇪 🇸🇳 🇬🇳',
                'theme' => 'Pilotage GED',
                'partner' => null,
                'summary' => 'Séminaire international réunissant des délégations de 6 pays africains pour construire des organisations plus performantes grâce à la GED.',
                'content' => [
                    "Le Comité Africain d’Expertise Internationale (CAEI) a eu le plaisir d’accueillir des participants venus de divers horizons professionnels à l’occasion de son séminaire dédié au pilotage de projet en Gestion Électronique des Documents (GED).",
                    "🌍 La diversité des profils et pays présents (Tunisie · Côte d’Ivoire · Bénin · Niger · Sénégal · Guinée) a enrichi les discussions et renforcé la dynamique collaborative entre les participants.",
                    "🙏 Nous remercions l’ensemble des participants pour leur engagement et la qualité des échanges. Ensemble, continuons à construire des organisations plus performantes grâce à la digitalisation et à une gestion intelligente de l’information. 🚀"
                ],
                'main_image' => 'images/actualites/ged-multinational-1.jpg',
                'main_image_alt' => 'Séminaire international pilotage de projet GED CAEI',
                'gallery_title' => 'Galerie Photos — Session Multinationale GED',
                'gallery' => [
                    ['image' => 'images/actualites/ged-multinational-5.png', 'title' => 'Intervention Expert', 'desc' => 'Méthodologie & Déploiement GED'],
                    ['image' => 'images/actualites/ged-multinational-2.jpg', 'title' => 'Délégations & Écoute Active', 'desc' => 'Sessions d\'apprentissage intensives'],
                    ['image' => 'images/actualites/ged-multinational-3.png', 'title' => 'Cadres & Professionnels', 'desc' => 'Partage d\'expériences métier'],
                    ['image' => 'images/actualites/ged-multinational-4.jpg', 'title' => 'Travaux Pratiques', 'desc' => 'Études de cas & digitalisation'],
                    ['image' => 'images/actualites/ged-multinational-7.jpg', 'title' => 'Session de Travail', 'desc' => 'Analyse documentaire & méthodologie'],
                    ['image' => 'images/actualites/ged-multinational-8.jpg', 'title' => 'Concertation & Écoute', 'desc' => 'Échanges professionnels approfondis'],
                    ['image' => 'images/actualites/ged-multinational-6.jpg', 'title' => 'Coordination CAEI', 'desc' => 'Encadrement & suivi des sessions'],
                ]
            ],
        ];
    }

    /**
     * Page publique des actualités et événements CAEI Company Group (Liste en cartes).
     */
    public function actualites()
    {
        $actualites = \App\Models\Actualite::all()->toArray();
        return view('actualites.index', compact('actualites'));
    }

    /**
     * Page de détail d'une actualité / séminaire spécifique.
     */
    public function actualiteShow($slug)
    {
        $actualiteModel = \App\Models\Actualite::where('slug', $slug)->firstOrFail();
        $actualite = $actualiteModel->toArray();
        $otherActualites = \App\Models\Actualite::where('slug', '!=', $slug)->limit(3)->get()->toArray();

        return view('actualites.show', compact('actualite', 'otherActualites'));
    }

    /**
     * Page de détail publique d'un séminaire.
     */
    public function show(Seminar $seminar)
    {
        // Seuls les séminaires publiés sont accessibles publiquement
        if ($seminar->status !== 'published') {
            abort(404);
        }

        $seminar->loadCount('registrations')->load('trainers');

        return view('seminaires.show', compact('seminar'));
    }
}
