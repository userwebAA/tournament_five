<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 200px;
            height: auto;
        }
        .info-section {
            margin-bottom: 25px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        .info-title {
            font-weight: bold;
            color: #2c3e50;
            font-size: 1.1em;
            margin-bottom: 10px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }
        .info-list {
            list-style: none;
            padding-left: 0;
        }
        .info-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }
        .info-list li:before {
            content: "•";
            color: #3498db;
            position: absolute;
            left: 0;
        }
        .highlight {
            color: #2c3e50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logoevents.png') }}" alt="Events Five Logo">
        <h2>Nouvelle inscription au tournoi Events Five</h2>
    </div>

    <div class="info-section">
        <p class="info-title">Informations de l'entreprise</p>
        <ul class="info-list">
            <li>Nom de l'entreprise : <span class="highlight">{{ $team->company_name }}</span></li>
            <li>Responsable : <span class="highlight">{{ $team->team_leader }}</span></li>
            <li>Email : <span class="highlight">{{ $team->email }}</span></li>
            <li>Téléphone : <span class="highlight">{{ $team->phone }}</span></li>
            <li>Adresse : <span class="highlight">{{ $team->contact_address }}</span></li>
        </ul>
    </div>

    <div class="info-section">
        <p class="info-title">Tailles des joueurs</p>
        <ul class="info-list">
            @foreach($team->player_sizes as $index => $size)
                <li>Joueur {{ $index + 1 }} : <span class="highlight">{{ $size }}</span></li>
            @endforeach
        </ul>
    </div>

    <div class="info-section">
        <p class="info-title">Informations de paiement</p>
        <ul class="info-list">
            <li>Montant : <span class="highlight">{{ $payment->amount }} €</span></li>
            <li>Date de paiement : <span class="highlight">{{ $payment->created_at->format('d/m/Y H:i') }}</span></li>
            <li>Numéro de facture : <span class="highlight">4{{ $payment->created_at->format('ymd') }}</span></li>
        </ul>
    </div>
</body>
</html>
