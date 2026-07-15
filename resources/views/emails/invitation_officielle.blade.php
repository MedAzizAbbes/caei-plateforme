<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Invitation Officielle — CAEI</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; }
        .wrapper { max-width: 620px; margin: 30px auto; background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .header { background: #061743; padding: 30px 40px; text-align: center; }
        .header .logo { background: #f2a90f; color: #061743; font-size: 22px; font-weight: 900; padding: 8px 18px; border-radius: 6px; display: inline-block; }
        .header h1 { color: #fff; font-size: 20px; margin-top: 16px; }
        .header .subtitle { color: #f2a90f; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-top: 4px; }
        .body { padding: 36px 40px; }
        .greeting { font-size: 16px; color: #1e293b; margin-bottom: 16px; }
        .greeting strong { color: #061743; }
        .body p { color: #475569; font-size: 14px; line-height: 1.7; margin-bottom: 14px; }
        .badge { display: inline-block; background: #dbeafe; color: #1d4ed8; border-radius: 20px; padding: 4px 14px; font-size: 12px; font-weight: bold; margin: 0 0 20px; }
        .info-card { background: #f8fafc; border-radius: 8px; border-left: 4px solid #f2a90f; padding: 18px 22px; margin: 20px 0; }
        .info-card .info-row { display: flex; gap: 12px; margin-bottom: 10px; }
        .info-card .info-row:last-child { margin-bottom: 0; }
        .info-card .lbl { font-size: 11px; text-transform: uppercase; font-weight: bold; color: #94a3b8; min-width: 130px; }
        .info-card .val { font-size: 13px; font-weight: bold; color: #1e293b; }
        .qr-section { background: #061743; border-radius: 10px; padding: 24px; margin: 24px 0; text-align: center; }
        .qr-section .qr-label { color: #f2a90f; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; font-weight: bold; margin-bottom: 14px; }
        .qr-section .qr-svg { display: inline-block; background: #fff; padding: 10px; border-radius: 8px; margin-bottom: 12px; }
        .qr-section .qr-code { font-family: monospace; font-size: 15px; font-weight: bold; color: #fff; background: rgba(255,255,255,0.1); padding: 5px 14px; border-radius: 6px; display: inline-block; }
        .qr-section .qr-hint { color: rgba(255,255,255,0.6); font-size: 11px; margin-top: 10px; }
        .notice { background: #fefce8; border: 1px solid #fde68a; border-radius: 8px; padding: 14px 18px; font-size: 12px; color: #92400e; line-height: 1.6; margin-top: 20px; }
        .footer { background: #f8fafc; text-align: center; padding: 20px 40px; border-top: 1px solid #e2e8f0; }
        .footer p { font-size: 11px; color: #94a3b8; margin: 0; }
        .footer strong { color: #061743; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <span class="logo">CAEI</span>
        <h1>Invitation Officielle</h1>
        <p class="subtitle">CAEI Company Group — Formation Professionnelle</p>
    </div>
    <div class="body">
        <div class="greeting">
            Bonjour, <strong>{{ $payment->user->first_name }} {{ $payment->user->last_name }}</strong>,
        </div>
        <span class="badge">🎓 Participation confirmée</span>
        <p>
            Nous avons le grand plaisir de vous inviter officiellement à notre séminaire de formation
            professionnelle. Votre inscription a été validée et nous nous réjouissons de vous accueillir.
        </p>

        <div class="info-card">
            <div class="info-row">
                <span class="lbl">Thème</span>
                <span class="val">{{ $payment->seminar->theme }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Lieu</span>
                <span class="val">{{ $payment->seminar->country }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Du</span>
                <span class="val">{{ $payment->seminar->start_date->format('d/m/Y') }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Au</span>
                <span class="val">{{ $payment->seminar->end_date->format('d/m/Y') }}</span>
            </div>
            @if($payment->seminar->hours)
            <div class="info-row">
                <span class="lbl">Volume horaire</span>
                <span class="val">{{ $payment->seminar->hours }} heures de formation</span>
            </div>
            @endif
        </div>

        @if($registration->qrCode)
        <div class="qr-section">
            <div class="qr-label">Votre QR Code de présence</div>
            <div class="qr-svg">
                {!! \App\Support\QrCodeSvg::render($registration->qrCode->portalUrl(), 6) !!}
            </div>
            <br>
            <span class="qr-code">{{ $registration->qrCode->code }}</span>
            <p class="qr-hint">
                Présentez ce QR code à l'accueil pour valider votre présence.<br>
                Ce code est personnel et non transférable.
            </p>
        </div>
        @endif

        <p>
            Nous vous prions de bien vouloir préparer votre déplacement en conséquence et de
            vous présenter à l'heure indiquée le jour de l'événement.
        </p>

        <div class="notice">
            📎 <strong>Pièce jointe :</strong> La lettre d'invitation officielle en format PDF est jointe à cet email.
            Vous pouvez également la télécharger depuis votre espace participant.
        </div>
    </div>
    <div class="footer">
        <p><strong>CAEI Company Group</strong> — Centre Africain d'Expertise et d'Innovation</p>
        <p style="margin-top: 6px;">Cet email a été généré automatiquement, merci de ne pas y répondre.</p>
    </div>
</div>
</body>
</html>
