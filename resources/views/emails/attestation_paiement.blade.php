<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Attestation de Paiement — CAEI</title>
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
        .info-card { background: #f8fafc; border-radius: 8px; border-left: 4px solid #061743; padding: 18px 22px; margin: 20px 0; }
        .info-card .info-row { display: flex; gap: 12px; margin-bottom: 10px; }
        .info-card .info-row:last-child { margin-bottom: 0; }
        .info-card .lbl { font-size: 11px; text-transform: uppercase; font-weight: bold; color: #94a3b8; min-width: 130px; }
        .info-card .val { font-size: 13px; font-weight: bold; color: #1e293b; }
        .badge { display: inline-block; background: #dcfce7; color: #166534; border-radius: 20px; padding: 4px 14px; font-size: 12px; font-weight: bold; margin: 0 0 20px; }
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
        <h1>Attestation de Paiement</h1>
        <p class="subtitle">CAEI Company Group — Formation Professionnelle</p>
    </div>
    <div class="body">
        <div class="greeting">
            Bonjour, <strong>{{ $payment->user->first_name }} {{ $payment->user->last_name }}</strong>,
        </div>
        <span class="badge">✅ Paiement confirmé</span>
        <p>
            Nous avons le plaisir de vous informer que votre paiement pour le séminaire
            <strong>« {{ $payment->seminar->theme }} »</strong> a été validé avec succès.
            Veuillez trouver ci-dessous votre attestation de paiement.
        </p>

        <div class="info-card">
            <div class="info-row">
                <span class="lbl">Participant</span>
                <span class="val">{{ $payment->user->first_name }} {{ $payment->user->last_name }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Séminaire</span>
                <span class="val">{{ $payment->seminar->theme }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Lieu</span>
                <span class="val">{{ $payment->seminar->country }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Période</span>
                <span class="val">
                    Du {{ $payment->seminar->start_date->format('d/m/Y') }}
                    au {{ $payment->seminar->end_date->format('d/m/Y') }}
                </span>
            </div>
            <div class="info-row">
                <span class="lbl">Mode de paiement</span>
                <span class="val">{{ $payment->methodLabel() }}</span>
            </div>
            @if($payment->payment_method === 'arrangement' && $payment->organization_name)
            <div class="info-row">
                <span class="lbl">Organisme</span>
                <span class="val">{{ $payment->organization_name }}</span>
            </div>
            @endif
            @if($payment->seminar->price)
            <div class="info-row">
                <span class="lbl">Montant</span>
                <span class="val">{{ number_format($payment->seminar->price, 0, ',', ' ') }} FCFA</span>
            </div>
            @endif
            <div class="info-row">
                <span class="lbl">Date d'émission</span>
                <span class="val">{{ now()->format('d/m/Y') }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Référence</span>
                <span class="val">ATT-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>

        <div class="notice">
            📎 <strong>Pièce jointe :</strong> L'attestation de paiement en format PDF est jointe à cet email.
            Vous pouvez également la télécharger depuis votre espace participant sur la plateforme CAEI.
        </div>
    </div>
    <div class="footer">
        <p><strong>CAEI Company Group</strong> — Centre Africain d'Expertise et d'Innovation</p>
        <p style="margin-top: 6px;">Cet email a été généré automatiquement, merci de ne pas y répondre.</p>
    </div>
</div>
</body>
</html>
