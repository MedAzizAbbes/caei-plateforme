<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Votre QR Code CAEI</title>
</head>
<body style="margin:0;background:#f5f6f8;font-family:Arial,sans-serif;color:#06101f;">
    <div style="max-width:640px;margin:0 auto;padding:24px;">
        <div style="background:#061743;color:#fff;padding:24px;border-radius:8px 8px 0 0;">
            <p style="margin:0;color:#ffbd45;font-size:13px;font-weight:bold;text-transform:uppercase;">CAEI Company Group</p>
            <h1 style="margin:8px 0 0;font-size:24px;">Votre inscription est confirmee</h1>
        </div>

        <div style="background:#fff;padding:24px;border:1px solid #e2e8f0;border-top:0;border-radius:0 0 8px 8px;">
            <p>Bonjour {{ $registration->user?->fullName() }},</p>

            <p>
                Votre inscription au seminaire
                <strong>{{ $registration->seminar?->theme }}</strong>
                a bien ete enregistree.
            </p>

            <table style="width:100%;margin:20px 0;border-collapse:collapse;">
                <tr>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;color:#64748b;">Code participant</td>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;font-weight:bold;">{{ $registration->qrCode?->code }}</td>
                </tr>
                <tr>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;color:#64748b;">Institution</td>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;">{{ $registration->user?->institution ?? 'Non renseignee' }}</td>
                </tr>
                <tr>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;color:#64748b;">Statut</td>
                    <td style="padding:8px;border-bottom:1px solid #e2e8f0;">{{ $registration->status }}</td>
                </tr>
            </table>

            @if($qrDataUri)
                <div style="text-align:center;margin:24px 0;">
                    <img src="{{ $qrDataUri }}" alt="QR Code CAEI" width="260" height="260" style="display:inline-block;border:1px solid #e2e8f0;border-radius:8px;padding:12px;background:#fff;">
                    <p style="font-size:13px;color:#64748b;">Presentez ce QR Code le jour du seminaire pour valider votre presence.</p>
                </div>
            @endif

            @if($portalUrl)
                <p style="text-align:center;margin:24px 0;">
                    <a href="{{ $portalUrl }}" style="display:inline-block;background:#ffbd45;color:#061743;text-decoration:none;font-weight:bold;padding:12px 18px;border-radius:6px;">
                        Acceder a mon espace
                    </a>
                </p>

                <p style="font-size:12px;color:#64748b;word-break:break-all;">
                    Lien securise : {{ $portalUrl }}
                </p>
            @endif

            <p style="font-size:13px;color:#64748b;">
                Aucun mot de passe n'est necessaire : ce lien securise ouvre directement votre espace participant.
            </p>
        </div>
    </div>
</body>
</html>
