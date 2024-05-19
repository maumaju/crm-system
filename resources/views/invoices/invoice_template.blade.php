<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /* Gaya CSS untuk faktur */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-info {
            margin-bottom: 20px;
        }

        .invoice-info h2 {
            margin: 0;
            font-size: 24px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .invoice-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }

        .bg-light {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Invoice</h1>
        </div>
        <!-- <div class="invoice-info">
            <p><strong>Customer ID:</strong> {{ $sale->customer_id }}</p>
            <p><strong>Customer Name:</strong> {{ $sale->customer_name }}</p>
            <p><strong>Amount:</strong> {{ $sale->amount }}</p>
            <p><strong>Date:</strong> {{ $sale->date }}</p>
        </div> -->
        <table class="invoice-table">
            <!-- <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Nme</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead> -->
            <tbody>
                <tr>
                    <td class="bg-light">Customer ID</td>
                    <td>{{ $sale->customer_id }}</td>
                </tr>
                <tr>
                    <td class="bg-light">Customer Name</td>
                    <td>{{ $sale->customer_name }}</td>
                </tr>
                <tr>
                    <td class="bg-light">Amount</td>
                    <td>Rp{{ number_format($sale->amount) }}</td>
                </tr>
                <tr>
                    <td class="bg-light">Date</td>
                    <td>{{ $sale->date }}</td>
                </tr>
                <!-- <tr>
                    <td>{{ $sale->customer_id }}</td>
                    <td>{{ $sale->customer_name }}</td>
                    <td>Rp{{ $sale->amount }}</td>
                    <td>{{ $sale->date }}</td>
                </tr> -->
            </tbody>
        </table>
        <!-- <div class="total">
            <p><strong>Total:</strong> {{ $sale->amount }}</p>
        </div> -->
    </div>
</body>

</html>