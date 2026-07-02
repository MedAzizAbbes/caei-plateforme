<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Participants CAEI</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Liste des Participants - CAEI {{ now()->year }}</h1>
    
    <p style="text-align: center; color: #666; margin-bottom: 20px;">
        Généré le {{ now()->format('d/m/Y à H:i') }}
    </p>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Institution</th>
                <th>Séminaire</th>
                <th>Statut</th>
                <th>Inscrit le</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $registration)
                <tr>
                    <td>{{ $registration->user->first_name }} {{ $registration->user->last_name }}</td>
                    <td>{{ $registration->user->email }}</td>
                    <td>{{ $registration->user->phone ?? '-' }}</td>
                    <td>{{ $registration->user->institution ?? '-' }}</td>
                    <td>{{ $registration->seminar->theme }}</td>
                    <td>{{ ucfirst($registration->status) }}</td>
                    <td>{{ $registration->registered_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
