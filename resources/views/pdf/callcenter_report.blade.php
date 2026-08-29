<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Liste des Rendez-Vous — CAEI</title>
    <style>
        @page {
            margin: 0;
            size: A4 landscape;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 9px;
            color: #1a202c;
            background: #ffffff;
        }

        /* ══ BANDE TOP ══ */
        .top-band {
            width: 100%;
            height: 7px;
            background: #8B1A1A;
        }

        /* ══ EN-TÊTE ══ */
        .header {
            padding: 16px 28px 14px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #d1d5db;
        }

        .logo-block img {
            height: 65px;
            width: auto;
        }

        .title-block {
            text-align: center;
            flex: 1;
            padding: 0 24px;
        }

        .title-block .doc-type {
            font-size: 7.5px;
            font-weight: bold;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #8B1A1A;
            margin-bottom: 4px;
        }

        .title-block h1 {
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .title-block .underline {
            width: 55px;
            height: 3px;
            background: #8B1A1A;
            margin: 5px auto 0 auto;
            border-radius: 2px;
        }

        .meta-block {
            min-width: 160px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 9px 13px;
            font-size: 8px;
            color: #6b7280;
            line-height: 2;
        }

        .meta-block strong {
            color: #111827;
            font-size: 8.5px;
        }

        .ref-badge {
            display: inline-block;
            margin-top: 4px;
            background: #8B1A1A;
            color: #fff;
            font-size: 7.5px;
            font-weight: bold;
            letter-spacing: 0.5px;
            padding: 2px 8px;
            border-radius: 3px;
        }

        /* ══ SÉPARATEUR ══ */
        .divider {
            height: 2px;
            background: linear-gradient(to right, #8B1A1A, #1a202c, #8B1A1A);
            margin: 0 28px;
        }

        /* ══ SOUS-HEADER ══ */
        .sub-header {
            padding: 7px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        .sh-label {
            font-size: 7.5px;
            font-weight: bold;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #6b7280;
        }

        .sh-count {
            font-size: 8px;
            color: #374151;
            background: #fff;
            border: 1px solid #d1d5db;
            padding: 2px 10px;
            border-radius: 20px;
        }

        /* ══ TABLEAU ══ */
        .table-wrap {
            padding: 10px 28px 60px 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8px;
        }

        thead tr {
            background: #1a202c;
        }

        thead th {
            color: #f9fafb;
            padding: 9px 7px;
            text-align: left;
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        thead th:first-child {
            border-left: 4px solid #8B1A1A;
            padding-left: 8px;
        }

        tbody tr {
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        tbody tr:nth-child(odd) {
            background: #ffffff;
        }

        tbody tr:last-child {
            border-bottom: 2px solid #1a202c;
        }

        tbody td {
            padding: 7px 7px;
            vertical-align: middle;
        }

        tbody td:first-child {
            border-left: 4px solid #e5e7eb;
            padding-left: 8px;
        }

        /* Numéro de ligne */
        .num-cell {
            font-size: 8.5px;
            font-weight: bold;
            color: #374151;
        }

        .rdv-id {
            font-size: 7px;
            color: #8B1A1A;
            margin-top: 1px;
        }

        .td-name {
            font-weight: bold;
            color: #111827;
            font-size: 8.5px;
            white-space: nowrap;
        }

        .td-sub {
            font-size: 7px;
            color: #9ca3af;
            margin-top: 1px;
        }

        .td-normal {
            color: #374151;
            white-space: nowrap;
        }

        .td-muted {
            color: #d1d5db;
        }

        .td-bold {
            font-weight: bold;
            color: #111827;
            white-space: nowrap;
        }

        /* ── Badges statut ── */
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 20px;
            font-size: 7px;
            font-weight: bold;
            white-space: nowrap;
            border: 1px solid transparent;
        }

        .b-qualifie    { background: #d1fae5; color: #065f46; border-color: #6ee7b7; }
        .b-en-cours    { background: #e0e7ff; color: #3730a3; border-color: #a5b4fc; }
        .b-non-qualifie{ background: #fee2e2; color: #991b1b; border-color: #fca5a5; }

        /* ══ PIED DE PAGE ══ */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 8px 28px;
            background: #1a202c;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-left {
            font-size: 7.5px;
            color: #9ca3af;
        }

        .footer-left strong { color: #ffffff; }

        .footer-right {
            font-size: 7px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #f87171;
            text-transform: uppercase;
            border: 1px solid #8B1A1A;
            padding: 2px 10px;
            border-radius: 3px;
            background: rgba(139,26,26,0.2);
        }

        .no-data {
            text-align: center;
            padding: 50px;
            color: #9ca3af;
            font-style: italic;
        }
    </style>
</head>
<body>

@php
    $total = $rendezVousList->count();
    $ref   = 'RDV-' . now()->format('Ymd') . '-' . str_pad($total, 3, '0', STR_PAD_LEFT);
@endphp

<div class="top-band"></div>

{{-- En-tête --}}
<div class="header">
    <div class="logo-block">
        <img src="{{ public_path('images/logo-caei-full.png') }}" alt="CAEI Logo"/>
    </div>

    <div class="title-block">
        <div class="doc-type">Document Officiel</div>
        <h1>Liste des Rendez-Vous</h1>
        <div class="underline"></div>
    </div>

    <div class="meta-block">
        <div>Date : <strong>{{ now()->format('d/m/Y') }}</strong></div>
        <div>Heure : <strong>{{ now()->format('H:i') }}</strong></div>
        <div>Total : <strong>{{ $total }} RDV</strong></div>
        <div><span class="ref-badge">{{ $ref }}</span></div>
    </div>
</div>

<div class="divider"></div>

<div class="sub-header">
    <span class="sh-label">Rendez-Vous — Call Center</span>
    <span class="sh-count">{{ $total }} enregistrement(s)</span>
</div>

{{-- Tableau --}}
<div class="table-wrap">
    @if($rendezVousList->isEmpty())
        <div class="no-data">Aucun rendez-vous à afficher.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th style="width:4%">N°</th>
                    <th style="width:9%">Date RDV</th>
                    <th style="width:6%">Heure</th>
                    <th style="width:15%">Prospect</th>
                    <th style="width:9%">Téléphone</th>
                    <th style="width:10%">Société</th>
                    <th style="width:8%">Secteur</th>
                    <th style="width:9%">Agent</th>
                    <th style="width:10%">Partenaire</th>
                    <th style="width:11%">Statut</th>
                    <th style="width:8%">Potentiel</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rendezVousList as $index => $rdv)
                @php
                    if ($rdv->statut === 'qualifie') {
                        $badgeClass = 'b-qualifie';
                        $badgeLabel = 'Qualifié';
                    } elseif (in_array($rdv->statut, ['annule', 'non_effectue'])) {
                        $badgeClass = 'b-non-qualifie';
                        $badgeLabel = 'Non qualifié';
                    } else {
                        $badgeClass = 'b-en-cours';
                        $badgeLabel = 'En cours';
                    }
                @endphp
                <tr>
                    <td class="num-cell">{{ $index + 1 }}</td>
                    <td class="td-normal"><strong>{{ $rdv->date_rendez_vous ? $rdv->date_rendez_vous->format('d/m/Y') : '—' }}</strong></td>
                    <td class="td-normal">{{ $rdv->heure_rendez_vous ?? '—' }}</td>
                    <td>
                        @if($rdv->prospect)
                            <div class="td-name">{{ $rdv->prospect->nomComplet() }}</div>
                            @if($rdv->prospect->email)
                                <div class="td-sub">{{ $rdv->prospect->email }}</div>
                            @endif
                        @else
                            <span class="td-muted">—</span>
                        @endif
                    </td>
                    <td class="td-normal">{{ $rdv->prospect->telephone ?? '—' }}</td>
                    <td class="td-bold">{{ $rdv->prospect->societe ?? '—' }}</td>
                    <td class="td-normal">{{ $rdv->prospect->secteur ?? '—' }}</td>
                    <td class="td-normal" style="white-space:nowrap;">{{ $rdv->agent ? $rdv->agent->fullName() : '—' }}</td>
                    <td class="td-normal" style="white-space:nowrap;">
                        @if($rdv->partenaire)
                            {{ $rdv->partenaire->fullName() }}
                        @else
                            <span class="td-muted">—</span>
                        @endif
                    </td>
                    <td><span class="badge {{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                    <td class="td-normal">
                        @if($rdv->qualification && $rdv->qualification->potentiel)
                            <strong>{{ $rdv->qualification->potentiel }}</strong>
                        @else
                            <span class="td-muted">—</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

{{-- Pied de page --}}
<div class="footer">
    <div class="footer-left">
        <strong>CAEI — Comité Africain d'Expertise Internationale</strong>
        &nbsp;|&nbsp; Réf. {{ $ref }}
        &nbsp;|&nbsp; Généré le {{ now()->format('d/m/Y à H:i') }}
    </div>
    <div class="footer-right">Confidentiel — Usage Interne</div>
</div>

</body>
</html>
