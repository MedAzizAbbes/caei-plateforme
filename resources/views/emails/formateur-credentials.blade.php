<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Vos identifiants CAEI</title>
</head>
<body style="margin:0;background:#f5f6f8;font-family:Arial,sans-serif;color:#06101f;">
    <div style="max-width:640px;margin:0 auto;padding:24px;">

        {{-- En-tête --}}
        <div style="background:#061743;color:#fff;padding:24px;border-radius:8px 8px 0 0;">
            <p style="margin:0;color:#ffbd45;font-size:13px;font-weight:bold;text-transform:uppercase;">CAEI Company Group</p>
            <h1 style="margin:8px 0 0;font-size:24px;">Bienvenue sur la Plateforme CAEI</h1>
        </div>

        {{-- Corps --}}
        <div style="background:#fff;padding:28px;border:1px solid #e2e8f0;border-top:0;border-radius:0 0 8px 8px;">

            <p style="margin-top:0;">Bonjour <strong>{{ $formateur->fullName() }}</strong>,</p>

            <p>
                Un compte <strong>formateur</strong> vient d'être créé pour vous sur la Plateforme CAEI.
                Voici vos identifiants de connexion :
            </p>

            {{-- Bloc identifiants --}}
            <table style="width:100%;margin:20px 0;border-collapse:collapse;border-radius:8px;overflow:hidden;">
                <tr style="background:#f8fafc;">
                    <td style="padding:14px 16px;border-bottom:1px solid #e2e8f0;color:#64748b;width:40%;">Identifiant (e-mail)</td>
                    <td style="padding:14px 16px;border-bottom:1px solid #e2e8f0;font-weight:bold;font-family:monospace;font-size:15px;">
                        {{ $formateur->email }}
                    </td>
                </tr>
                <tr style="background:#fff9ec;">
                    <td style="padding:14px 16px;color:#64748b;">Mot de passe</td>
                    <td style="padding:14px 16px;font-weight:bold;font-family:monospace;font-size:15px;color:#b45309;letter-spacing:1px;">
                        {{ $plainPassword }}
                    </td>
                </tr>
            </table>

            {{-- Bouton connexion --}}
            <p style="text-align:center;margin:28px 0;">
                <a href="{{ $loginUrl }}"
                   style="display:inline-block;background:#ffbd45;color:#061743;text-decoration:none;font-weight:bold;padding:13px 28px;border-radius:6px;font-size:15px;">
                    Se connecter à mon espace
                </a>
            </p>

            <p style="font-size:12px;color:#64748b;word-break:break-all;">
                Lien direct : {{ $loginUrl }}
            </p>

            {{-- Avertissement sécurité --}}
            <div style="margin-top:24px;padding:14px 16px;background:#fef3c7;border-left:4px solid #f59e0b;border-radius:4px;">
                <p style="margin:0;font-size:13px;color:#92400e;">
                    <strong>⚠ Sécurité :</strong> Nous vous recommandons de changer votre mot de passe dès votre première connexion.
                    Ne communiquez jamais vos identifiants à des tiers.
                </p>
            </div>

            <p style="margin-top:24px;font-size:13px;color:#64748b;">
                Cet e-mail a été généré automatiquement par la Plateforme CAEI. Merci de ne pas y répondre directement.
            </p>
        </div>

        {{-- Pied de page --}}
        <p style="text-align:center;font-size:11px;color:#94a3b8;margin-top:16px;">
            &copy; {{ date('Y') }} CAEI Company Group — Tous droits réservés
        </p>
    </div>
</body>
</html>
