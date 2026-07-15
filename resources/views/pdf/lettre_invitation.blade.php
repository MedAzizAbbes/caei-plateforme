<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Lettre d'Invitation Officielle</title>
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
        .doc-info .doc-num { font-size: 11px; color: #94a3b8; }
        .doc-info .doc-date { font-size: 12px; font-weight: bold; color: #061743; margin-top: 4px; }

        /* Title */
        .title-block { text-align: center; margin: 30px 0; }
        .title-block h1 {
            font-size: 20px;
            font-weight: 900;
            color: #061743;
            text-transform: uppercase;
            letter-spacing: 1.5px;
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

        /* Body text */
        .body-text {
            font-size: 13px;
            line-height: 1.9;
            text-align: justify;
            margin-bottom: 20px;
        }
        .body-text strong { color: #061743; }

        /* Info box */
        .info-box {
            background: #f8fafc;
            border-left: 4px solid #061743;
            border-radius: 6px;
            padding: 16px 20px;
            margin: 20px 0;
        }
        .info-box .info-row { display: flex; margin-bottom: 8px; }
        .info-box .info-row:last-child { margin-bottom: 0; }
        .info-box .info-label {
            font-weight: bold;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            width: 160px;
            flex-shrink: 0;
        }
        .info-box .info-val { font-weight: bold; color: #1e293b; font-size: 13px; }

        /* QR section */
        .qr-section {
            margin: 24px 0;
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: #061743;
            border-radius: 8px;
            padding: 20px;
            color: #fff;
        }
        .qr-box { flex-shrink: 0; }
        .qr-box svg { display: block; }
        .qr-info { flex: 1; }
        .qr-info .qr-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #f2a90f;
            font-weight: bold;
            margin-bottom: 6px;
        }
        .qr-info .qr-code {
            font-family: monospace;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            background: rgba(255,255,255,0.1);
            padding: 4px 10px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 8px;
        }
        .qr-info .qr-desc {
            font-size: 11px;
            color: rgba(255,255,255,0.7);
            line-height: 1.5;
        }

        /* Highlight banner */
        .highlight-banner {
            background: #fefce8;
            border: 1px solid #fde68a;
            border-radius: 6px;
            padding: 12px 16px;
            margin: 20px 0;
            font-size: 12px;
            color: #92400e;
            line-height: 1.6;
        }
        .highlight-banner strong { color: #b45309; }

        /* Signature */
        .signature-block { margin-top: 40px; display: flex; justify-content: flex-end; }
        .signature-box { text-align: center; width: 220px; }
        .signature-box .sig-line {
            border-top: 1px solid #cbd5e1;
            margin-top: 50px;
            padding-top: 8px;
        }
        .signature-box .sig-name { font-weight: bold; color: #061743; font-size: 12px; }
        .signature-box .sig-title { font-size: 10px; color: #94a3b8; }

        /* Footer */
        .footer {
            border-top: 1px solid #e2e8f0;
            margin-top: 40px;
            padding-top: 14px;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
        }
        .footer .footer-logo { font-weight: 900; color: #061743; }
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
            <div class="doc-num">N° INV-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div class="doc-date">Émise le {{ now()->format('d/m/Y') }}</div>
        </div>
    </div>

    <!-- Title -->
    <div class="title-block">
        <h1>Lettre d'Invitation Officielle</h1>
        <div class="title-divider"></div>
        <p class="subtitle">Séminaire de formation professionnelle</p>
    </div>

    <!-- Recipient -->
    <div class="body-text">
        <strong>{{ $payment->seminar->country }}, le {{ now()->format('d/m/Y') }}</strong>
    </div>

    <div class="body-text">
        <strong>À l'attention de :</strong><br>
        {{ $payment->user->first_name }} {{ $payment->user->last_name }}<br>
        @if($payment->user->poste){{ $payment->user->poste }}<br>@endif
        @if($payment->user->institution){{ $payment->user->institution }}<br>@endif
        @if($payment->user->pays){{ $payment->user->pays }}@endif
    </div>

    <!-- Body -->
    <div class="body-text">
        Nous avons le grand plaisir de vous convier officiellement à notre séminaire de formation
        professionnelle organisé par <strong>CAEI Company Group</strong>. Votre inscription a été
        confirmée et votre paiement validé. Nous vous prions de bien vouloir prendre note des
        informations ci-dessous relatives à cet événement.
    </div>

    <!-- Seminar details -->
    <div class="info-box">
        <div class="info-row">
            <span class="info-label">Thème</span>
            <span class="info-val">{{ $payment->seminar->theme }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Lieu</span>
            <span class="info-val">{{ $payment->seminar->country }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Date de début</span>
            <span class="info-val">{{ $payment->seminar->start_date->format('d/m/Y') }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Date de fin</span>
            <span class="info-val">{{ $payment->seminar->end_date->format('d/m/Y') }}</span>
        </div>
        @if($payment->seminar->hours)
        <div class="info-row">
            <span class="info-label">Volume horaire</span>
            <span class="info-val">{{ $payment->seminar->hours }} heures</span>
        </div>
        @endif
    </div>

    <!-- QR Code section -->
    @if($registration->qrCode)
    <div class="qr-section">
        <div class="qr-box">
            {!! \App\Support\QrCodeSvg::render($registration->qrCode->portalUrl(), 6) !!}
        </div>
        <div class="qr-info">
            <div class="qr-title">Votre QR Code de présence</div>
            <div class="qr-code">{{ $registration->qrCode->code }}</div>
            <div class="qr-desc">
                Présentez ce QR code à l'accueil du séminaire pour valider votre
                présence. Ce code est unique et personnel.
            </div>
        </div>
    </div>
    @endif

    <!-- Notice -->
    <div class="highlight-banner">
        <strong>Important :</strong> Veuillez vous munir de cette lettre d'invitation et d'une pièce
        d'identité valide le jour de l'événement. En cas de difficultés, contactez l'équipe CAEI à
        l'adresse de contact officielle.
    </div>

    <!-- Closing -->
    <div class="body-text">
        En vous renouvelant notre invitation, nous vous prions d'agréer, Madame/Monsieur,
        l'expression de notre considération distinguée.
    </div>

    <!-- Signature -->
    <div class="signature-block">
        <div class="signature-box">
            <div class="sig-line">
                <div class="sig-name">Direction CAEI Company Group</div>
                <div class="sig-title">Responsable des formations</div>
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
