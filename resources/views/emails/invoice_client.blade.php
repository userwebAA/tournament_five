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
        .content {
            margin: 20px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('images/logoevents.png') }}" alt="Events Five Logo">
    </div>

    <div class="content">
        <p>Cher(e) {{ $team->team_leader }},</p>

        <p>Nous vous remercions pour votre inscription au tournoi Events Five. Votre paiement a été confirmé avec succès.</p>

        <p>Vous trouverez ci-joint votre facture pour le montant de {{ number_format($payment->amount, 2) }} €.</p>

        <p>Récapitulatif :</p>
        <ul>
            <li>Entreprise : {{ $team->company_name }}</li>
            <li>Numéro de facture : 4{{ $payment->created_at->format('ymd') }}</li>
            <li>Date de paiement : {{ $payment->created_at->format('d/m/Y') }}</li>
        </ul>

        <p>Nous avons hâte de vous accueillir à notre tournoi !</p>
    </div>

    <div class="footer">
        <p>Pour toute question, n'hésitez pas à nous contacter à contact@events-five.com</p>
        <p>Events Five - 27 Chemin de la saudrune, 31100 Toulouse</p>
    </div>
</body>
</html>
