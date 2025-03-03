<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture - Events Five</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            font-size: 14px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .company-details, .client-details {
            margin-bottom: 20px;
        }
        .company-details {
            float: left;
            width: 45%;
        }
        .client-details {
            float: right;
            width: 45%;
            text-align: right;
        }
        .clear {
            clear: both;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .total-section {
            margin-top: 20px;
            text-align: right;
        }
        .total-section p {
            margin: 5px 0;
        }
        .footer {
            position: absolute;
            bottom: 40px;
            left: 40px;
            right: 40px;
            text-align: center;
            font-size: 12px;
            color: #666;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <img src="{{ public_path('images/logoevents.png') }}" alt="Events Five Logo">
        <h1 style="margin: 10px 0;">FACTURE</h1>
        <p style="margin: 5px 0;">N° 4{{ $payment->created_at->format('ymd') }}</p>
        <p style="margin: 5px 0;">Date : {{ $payment->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="invoice-details">
        <div class="company-details">
            <h3 style="margin: 0 0 10px 0;">Events Five</h3>
            <p style="margin: 3px 0;">27 Chemin de la saudrune</p>
            <p style="margin: 3px 0;">31100 Toulouse</p>
            <p style="margin: 3px 0;">contact@events-five.com</p>
            <p style="margin: 3px 0;">SIRET : 79185584400019</p>
        </div>

        <div class="client-details">
            <h3 style="margin: 0 0 10px 0;">Facturé à :</h3>
            <p style="margin: 3px 0;"><strong>{{ $team->company_name }}</strong></p>
            <p style="margin: 3px 0;">{{ $team->contact_address }}</p>
            <p style="margin: 3px 0;">{{ $team->email }}</p>
        </div>
    </div>

    <div class="clear"></div>

    <table>
        <thead>
            <tr>
                <th style="width: 60%;">Description</th>
                <th>Quantité</th>
                <th>Prix HT</th>
                <th>TVA (20%)</th>
                <th>Total TTC</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Inscription au tournoi Events Five<br>
                    <span style="font-size: 12px; color: #666; padding-left: 10px;">
                        - Équipe : {{ $team->company_name }}<br>
                        - Date du tournoi : {{ date('d/m/Y') }}<br>
                        - Lieu : Toulouse
                    </span>
                </td>
                <td>1</td>
                <td>{{ number_format($amount_ht, 2) }} €</td>
                <td>{{ number_format($amount - $amount_ht, 2) }} €</td>
                <td>{{ number_format($amount, 2) }} €</td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <p style="margin: 5px 0;"><strong>Total HT : </strong>{{ number_format($amount_ht, 2) }} €</p>
        <p style="margin: 5px 0;"><strong>TVA (20%) : </strong>{{ number_format($amount - $amount_ht, 2) }} €</p>
        <p style="margin: 5px 0; font-size: 16px;"><strong>Total TTC : </strong>{{ number_format($amount, 2) }} €</p>
    </div>

    <div class="footer">
        <p style="margin: 3px 0;">Events Five - TVA Intracommunautaire : FR 79185584400019</p>
        <p style="margin: 3px 0;">Merci de votre confiance !</p>
    </div>
</body>
</html>
