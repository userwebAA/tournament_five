<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture - Event Five</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 200px;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-details th,
        .invoice-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-details th {
            background-color: #f8f8f8;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logoevents.png') }}" alt="Event Five Logo">
            <h1>Facture</h1>
            <p>Référence : {{ $payment->reference_number }}</p>
        </div>

        <div class="invoice-details">
            <h2>Détails de l'équipe</h2>
            <table>
                <tr>
                    <th>Entreprise</th>
                    <td>{{ $payment->team->company_name }}</td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <td>{{ $payment->team->team_leader }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $payment->team->email }}</td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $payment->team->phone }}</td>
                </tr>
                <tr>
                    <th>Nombre de joueurs</th>
                    <td>{{ $payment->team->player_count }}</td>
                </tr>
            </table>

            <h2>Détails du paiement</h2>
            <table>
                <tr>
                    <th>Montant HT</th>
                    <td>{{ number_format($payment->amount / 1.2, 2) }} €</td>
                </tr>
                <tr>
                    <th>TVA (20%)</th>
                    <td>{{ number_format($payment->amount - ($payment->amount / 1.2), 2) }} €</td>
                </tr>
                <tr>
                    <th>Montant total TTC</th>
                    <td>{{ number_format($payment->amount, 2) }} €</td>
                </tr>
                <tr>
                    <th>Date de paiement</th>
                    <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Statut</th>
                    <td>{{ ucfirst($payment->status) }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Event Five - Tournoi de Football Inter-Entreprises 2025</p>
            <p>Mardi 29 avril 2025 - 9h à 18h</p>
            <p>Pour toute question, contactez-nous à contact@eventfive.fr</p>
        </div>
    </div>
</body>
</html>
