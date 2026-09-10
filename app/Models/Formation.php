<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'type',
        'domain',
        'duration',
        'start_date',
        'price',
        'description',
        'objectives',
        'target_audience',
        'location',
        'image',
        'status',
        'created_by',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'date',
    ];

    protected $appends = [
        'image_url',
    ];

    /**
     * Obtenir l'URL d'image dynamique et variée pour la formation
     */
    public function getImageUrlAttribute(): string
    {
        if (!empty($this->image)) {
            if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://') || str_starts_with($this->image, 'assets/')) {
                return asset($this->image);
            }
            return asset('storage/' . $this->image);
        }

        $code = strtoupper($this->code ?? '');
        $titleLower = strtolower($this->title ?? '');
        $domainLower = strtolower($this->domain ?? '');

        // Formations de type cycle ou code CP-xxx
        if ($this->type === 'cycle' || str_contains($code, 'CP-')) {
            if (preg_match('/CP-0*(\d+)/i', $code, $matches)) {
                $num = (int)$matches[1];
                $cycleNum = (($num - 1) % 14) + 1;
                return asset("assets/img/cycles/cycle{$cycleNum}.jpg");
            }
            $cycleNum = ((($this->id ?? 1) - 1) % 14) + 1;
            return asset("assets/img/cycles/cycle{$cycleNum}.jpg");
        }

        // Pools d'images thématiques variées avec les visuels ultra-HD dédiés
        $auditImages = [
            'assets/img/new_formations/training_finance.jpg',
            'assets/img/formation_audit.jpg',
            'assets/img/formation_finance.jpg',
            'assets/img/im1.jpg',
        ];

        $techImages = [
            'assets/img/new_formations/training_tech.jpg',
            'assets/img/formation_tech.jpg',
            'assets/img/service_webdesign_1786525611976.jpg',
            'assets/img/company.jpg',
        ];

        $leadershipImages = [
            'assets/img/new_formations/training_leadership.jpg',
            'assets/img/formation_leadership.jpg',
            'assets/img/professionel.jpg',
            'assets/img/callcenter_team_hero.jpg',
        ];

        $projectImages = [
            'assets/img/new_formations/training_project.jpg',
            'assets/img/service_consulting_1786525632369.jpg',
            'assets/img/cta-bg.jpg',
            'assets/img/img2.jpg',
        ];

        $marketingImages = [
            'assets/img/new_formations/training_ai_fintech.jpg',
            'assets/img/service_marketing_1786525623115.jpg',
            'assets/img/img3.jpg',
        ];

        $legalImages = [
            'assets/img/new_formations/training_legal.jpg',
            'assets/img/im1.jpg',
            'assets/img/company.jpg',
        ];

        $generalPool = [
            'assets/img/new_formations/training_finance.jpg',
            'assets/img/new_formations/training_tech.jpg',
            'assets/img/new_formations/training_leadership.jpg',
            'assets/img/new_formations/training_project.jpg',
            'assets/img/new_formations/training_ai_fintech.jpg',
            'assets/img/new_formations/training_legal.jpg',
            'assets/img/cycles/cycle1.jpg',
            'assets/img/cycles/cycle2.jpg',
            'assets/img/cycles/cycle3.jpg',
            'assets/img/cycles/cycle4.jpg',
            'assets/img/cycles/cycle5.jpg',
            'assets/img/cycles/cycle6.jpg',
            'assets/img/cycles/cycle7.jpg',
            'assets/img/cycles/cycle8.jpg',
            'assets/img/cycles/cycle9.jpg',
            'assets/img/cycles/cycle10.jpg',
            'assets/img/cycles/cycle11.jpg',
            'assets/img/cycles/cycle12.jpg',
            'assets/img/cycles/cycle13.jpg',
            'assets/img/cycles/cycle14.jpg',
        ];

        $hashKey = $code . '_' . ($this->id ?? 0) . '_' . $this->title;
        $hash = abs(crc32($hashKey));

        if (str_contains($code, 'MP') || str_contains($code, 'OHADA') || str_contains($code, 'DO') || str_contains($domainLower, 'marchés publics') || str_contains($domainLower, 'droit') || str_contains($titleLower, 'juridique') || str_contains($titleLower, 'appel d\'offres') || str_contains($titleLower, 'marchés') || str_contains($titleLower, 'ohada')) {
            return asset($legalImages[$hash % count($legalImages)]);
        }

        if (str_contains($code, 'ACF') || str_contains($code, 'GC') || str_contains($domainLower, 'audit') || str_contains($domainLower, 'comptab') || str_contains($domainLower, 'finance') || str_contains($domainLower, 'gestion') || str_contains($titleLower, 'comptab') || str_contains($titleLower, 'finance') || str_contains($titleLower, 'trésorerie') || str_contains($titleLower, 'fiscal') || str_contains($titleLower, 'budgétaire')) {
            return asset($auditImages[$hash % count($auditImages)]);
        }

        if (str_contains($code, 'INT') || str_contains($code, 'DAP') || str_contains($domainLower, 'informatique') || str_contains($domainLower, 'ntic') || str_contains($domainLower, 'digitalisation') || str_contains($titleLower, 'cyber') || str_contains($titleLower, 'informatique') || str_contains($titleLower, 'réseau') || str_contains($titleLower, 'digital') || str_contains($titleLower, 'ia') || str_contains($titleLower, 'intelligence')) {
            return asset($techImages[$hash % count($techImages)]);
        }

        if (str_contains($code, 'GMO') || str_contains($domainLower, 'grh') || str_contains($domainLower, 'ressources humaines') || str_contains($titleLower, 'rh') || str_contains($titleLower, 'recrutement') || str_contains($titleLower, 'salari')) {
            $hrImages = [
                'assets/img/new_formations/conflict_management.jpg',
                'assets/img/new_formations/training_leadership.jpg',
                'assets/img/formation_leadership.jpg',
                'assets/img/callcenter_team_hero.jpg',
            ];
            return asset($hrImages[$hash % count($hrImages)]);
        }

        if (str_contains($code, 'SAB') || str_contains($domainLower, 'secrétariat') || str_contains($domainLower, 'archive') || str_contains($titleLower, 'bureau d\'ordre') || str_contains($titleLower, 'courrier') || str_contains($titleLower, 'assistante')) {
            $sabImages = [
                'assets/img/callcenter_hero_agent.jpg',
                'assets/img/company.jpg',
                'assets/img/formation_leadership.jpg',
            ];
            return asset($sabImages[$hash % count($sabImages)]);
        }

        if (str_contains($code, 'QHSE') || str_contains($domainLower, 'qualite') || str_contains($domainLower, 'qualité') || str_contains($domainLower, 'qhse') || str_contains($titleLower, 'iso') || str_contains($titleLower, 'sécurité au travail')) {
            $qhseImages = [
                'assets/img/features-bg.jpg',
                'assets/img/im1.jpg',
                'assets/img/cta-bg.jpg',
            ];
            return asset($qhseImages[$hash % count($qhseImages)]);
        }

        if (str_contains($code, 'DPS') || str_contains($domainLower, 'soft skills') || str_contains($domainLower, 'développement personnel') || str_contains($titleLower, 'leader') || str_contains($titleLower, 'gestion du temps') || str_contains($titleLower, 'communication') || str_contains($titleLower, 'accueil') || str_contains($titleLower, 'téléphonique')) {
            return asset($leadershipImages[$hash % count($leadershipImages)]);
        }

        if (str_contains($code, 'PPD') || str_contains($code, 'PEA') || str_contains($domainLower, 'projets') || str_contains($domainLower, 'développement') || str_contains($domainLower, 'éducatif') || str_contains($titleLower, 'projet') || str_contains($titleLower, 'suivi-évaluation') || str_contains($titleLower, 'programme') || str_contains($titleLower, 'planification')) {
            return asset($projectImages[$hash % count($projectImages)]);
        }

        if (str_contains($code, 'MCD') || str_contains($code, 'EF') || str_contains($domainLower, 'marketing') || str_contains($domainLower, 'e-commerce') || str_contains($titleLower, 'marketing') || str_contains($titleLower, 'fintech') || str_contains($titleLower, 'vente')) {
            return asset($marketingImages[$hash % count($marketingImages)]);
        }

        return asset($generalPool[$hash % count($generalPool)]);
    }

    /**
     * Relation avec l'utilisateur créateur (Admin)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scopes pour le filtrage
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCertifiante($query)
    {
        return $query->where('type', 'certifiante');
    }

    public function scopeDiplomante($query)
    {
        return $query->where('type', 'diplomante');
    }

    public function scopeSurMesure($query)
    {
        return $query->where('type', 'sur_mesure');
    }

    public function scopeElearning($query)
    {
        return $query->where('type', 'elearning');
    }

    public function scopeCycle($query)
    {
        return $query->where('type', 'cycle');
    }

    public function scopeByDomain($query, $domain)
    {
        if (!empty($domain)) {
            return $query->where('domain', $domain);
        }
        return $query;
    }
}
