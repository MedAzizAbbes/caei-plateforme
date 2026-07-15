<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attestation de Paiement</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            color: #1e293b;
            background: #fff;
            font-size: 13px;
        }
        .page { padding: 40px 50px; }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 3px solid #061743;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .logo-block .logo-mark {
            background: #061743;
            color: #f2a90f;
            font-size: 20px;
            font-weight: 900;
            padding: 8px 14px;
            border-radius: 6px;
            display: inline-block;
        }
        .logo-block .logo-text {
            font-size: 11px;
            color: #64748b;
            margin-top: 4px;
        }
        .doc-info { text-align: right; }
        .doc-info .doc-num {
            font-size: 11px;
            color: #94a3b8;
        }
        .doc-info .doc-date {
            font-size: 12px;
            font-weight: bold;
            color: #061743;
            margin-top: 4px;
        }

        /* Title */
        .title-block {
            text-align: center;
            margin: 30px 0;
        }
        .title-block h1 {
            font-size: 22px;
            font-weight: 900;
            color: #061743;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .title-block .subtitle {
            font-size: 12px;
            color: #f2a90f;
            font-weight: bold;
            margin-top: 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .title-divider {
            width: 80px;
            height: 4px;
            background: #f2a90f;
            margin: 12px auto;
            border-radius: 2px;
        }

        /* Content blocks */
        .certif-text {
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 24px;
            text-align: justify;
        }
        .certif-text strong { color: #061743; }

        .info-box {
            background: #f8fafc;
            border-left: 4px solid #061743;
            border-radius: 6px;
            padding: 16px 20px;
            margin: 20px 0;
        }
        .info-box .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .info-box .info-row:last-child { margin-bottom: 0; }
        .info-box .info-label {
            font-weight: bold;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            width: 160px;
            flex-shrink: 0;
        }
        .info-box .info-val {
            font-weight: bold;
            color: #1e293b;
            font-size: 13px;
        }

        .amount-block {
            background: #061743;
            color: #fff;
            border-radius: 8px;
            padding: 16px 20px;
            margin: 20px 0;
            text-align: center;
        }
        .amount-block .amount-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f2a90f;
        }
        .amount-block .amount-val {
            font-size: 22px;
            font-weight: 900;
            margin-top: 4px;
        }

        /* Arrangement badge */
        .arrangement-badge {
            display: inline-block;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #c2410c;
            border-radius: 4px;
            padding: 2px 10px;
            font-size: 11px;
            font-weight: bold;
        }

        /* Signature */
        .signature-block {
            margin-top: 50px;
            display: flex;
            justify-content: flex-end;
        }
        .signature-box {
            text-align: center;
            width: 220px;
        }
        .signature-box .sig-line {
            border-top: 1px solid #cbd5e1;
            margin-top: 50px;
            padding-top: 8px;
        }
        .signature-box .sig-name {
            font-weight: bold;
            color: #061743;
            font-size: 12px;
        }
        .signature-box .sig-title {
            font-size: 10px;
            color: #94a3b8;
        }

        /* Footer */
        .footer {
            border-top: 1px solid #e2e8f0;
            margin-top: 40px;
            padding-top: 14px;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
        }
        .footer .footer-logo {
            font-weight: 900;
            color: #061743;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            bottom: 120px;
            right: 60px;
            width: 110px;
            height: 110px;
            border: 4px solid #f2a90f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transform: rotate(-15deg);
            opacity: 0.85;
        }
        .stamp-text {
            font-size: 10px;
            font-weight: 900;
            color: #f2a90f;
            text-transform: uppercase;
            line-height: 1.3;
        }
    </style>
</head>
<body>
<div class="page">
    <!-- Header -->
    <div class="header">
        <div class="logo-block">
            <span class="logo-mark">CAEI</span>
            <p class="logo-text">CAEI Company Group<br>Centre Africain d'Expertise et d'Innovation</p>
        </div>
        <div class="doc-info">
            <div class="doc-num">N° ATT-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div class="doc-date">Émise le {{ now()->format('d/m/Y') }}</div>
        </div>
    </div>

    <!-- Title -->
    <div class="title-block">
        <h1>Attestation de Paiement</h1>
        <div class="title-divider"></div>
        <p class="subtitle">Séminaire de formation professionnelle</p>
    </div>

    <!-- Certifying text -->
    <div class="certif-text">
        Nous soussignés, <strong>CAEI Company Group</strong>, certifions que le paiement relatif à l'inscription
        au séminaire ci-dessous a été <strong>dûment réglé</strong> et confirmons la participation de :
    </div>

    <!-- Participant info -->
    <div class="info-box">
        <div class="info-row">
            <span class="info-label">Participant</span>
            <span class="info-val">{{ $payment->user->first_name }} {{ $payment->user->last_name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email</span>
            <span class="info-val">{{ $payment->user->email }}</span>
        </div>
        @if($payment->user->institution)
        <div class="info-row">
            <span class="info-label">Institution</span>
            <span class="info-val">{{ $payment->user->institution }}</span>
        </div>
        @endif
        @if($payment->user->pays)
        <div class="info-row">
            <span class="info-label">Pays</span>
            <span class="info-val">{{ $payment->user->pays }}</span>
        </div>
        @endif
    </div>

    <!-- Seminar info -->
    <div class="info-box" style="border-left-color: #f2a90f; margin-top: 16px;">
        <div class="info-row">
            <span class="info-label">Séminaire</span>
            <span class="info-val">{{ $payment->seminar->theme }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Lieu</span>
            <span class="info-val">{{ $payment->seminar->country }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Période</span>
            <span class="info-val">
                Du {{ $payment->seminar->start_date->format('d/m/Y') }}
                au {{ $payment->seminar->end_date->format('d/m/Y') }}
            </span>
        </div>
        @if($payment->seminar->hours)
        <div class="info-row">
            <span class="info-label">Volume horaire</span>
            <span class="info-val">{{ $payment->seminar->hours }} heures</span>
        </div>
        @endif
    </div>

    <!-- Payment mode -->
    @if($payment->payment_method === 'arrangement')
    <div class="info-box" style="border-left-color: #ea580c; margin-top: 16px;">
        <div class="info-row">
            <span class="info-label">Mode de paiement</span>
            <span class="info-val">
                Arrangement — <span class="arrangement-badge">{{ $payment->arrangementTypeLabel() }}</span>
            </span>
        </div>
        <div class="info-row">
            <span class="info-label">Organisme</span>
            <span class="info-val">{{ $payment->organization_name }}</span>
        </div>
        @if($payment->contact_person)
        <div class="info-row">
            <span class="info-label">Responsable</span>
            <span class="info-val">{{ $payment->contact_person }}</span>
        </div>
        @endif
    </div>
    @else
    <div class="info-box" style="margin-top: 16px;">
        <div class="info-row">
            <span class="info-label">Mode de paiement</span>
            <span class="info-val">{{ $payment->methodLabel() }}</span>
        </div>
    </div>
    @endif

    @if($payment->seminar->price)
    <div class="amount-block">
        <div class="amount-label">Montant réglé</div>
        <div class="amount-val">{{ number_format($payment->seminar->price, 0, ',', ' ') }} FCFA</div>
    </div>
    @endif

    <!-- Signature -->
    <div class="signature-block">
        <div class="signature-box">
            <div class="sig-line">
                <div class="sig-name">Direction CAEI Company Group</div>
                <div class="sig-title">Responsable administratif</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <span class="footer-logo">CAEI Company Group</span> —
        Centre Africain d'Expertise et d'Innovation |
        Document officiel — {{ now()->format('Y') }}
    </div>
</div>
</body>
</html>
