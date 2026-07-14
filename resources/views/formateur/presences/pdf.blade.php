<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fiche de présence - {{ $seminar->theme }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 18px;
            margin: 5px 0;
            color: #061743;
        }
        .header p {
            margin: 2px 0;
        }
        .info-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #061743;
            color: #fff;
        }
        .text-center {
            text-align: center;
        }
        .signature-box {
            margin-top: 30px;
            text-align: right;
            padding-right: 50px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>CAEI Company Group</h1>
        <h2>Fiche de Présence</h2>
    </div>

    <div class="info-box">
        <p><strong>Séminaire :</strong> {{ $seminar->theme }}</p>
        <p><strong>Dates :</strong> {{ $seminar->start_date ? $seminar->start_date->format('d/m/Y') : '-' }} au {{ $seminar->end_date ? $seminar->end_date->format('d/m/Y') : '-' }}</p>
        <p><strong>Formateur(s) :</strong> 
            {{ $seminar->trainers->pluck('first_name')->implode(', ') }} 
            {{ $seminar->trainers->pluck('last_name')->implode(', ') }}
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Participant</th>
                <th>Institution</th>
                @for($i = 1; $i <= $totalDays; $i++)
                    <th class="text-center">Jour {{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach($seminar->registrations as $registration)
                <tr>
                    <td>{{ $registration->user->first_name }} {{ $registration->user->last_name }}</td>
                    <td>{{ $registration->user->institution ?? '-' }}</td>
                    @for($i = 1; $i <= $totalDays; $i++)
                        @php
                            $isPresent = $seminar->attendances->where('registration_id', $registration->id)->where('day_number', $i)->isNotEmpty();
                        @endphp
                        <td class="text-center">
                            {{ $isPresent ? 'X' : '' }}
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature-box">
        <p><strong>Signature du (ou des) formateur(s) :</strong></p>
        <br><br><br><br>
        <p>___________________________</p>
    </div>

</body>
</html>
