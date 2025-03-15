<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }

        .logo {
            margin-bottom: 20px;
        }

        .amount {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .payment-option {
            margin: 15px 0;
        }

        button {
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        .cash {
            background-color: #4CAF50;
            color: white;
        }

        .card {
            background-color: #007bff;
            color: white;
        }

        button:hover {
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="payment-container">
        <div class="logo">
            <img src="https://pmc.maharts.com/admin/images/login/login.png" alt="Logo" width="100">
        </div>
        <div class="amount">Total Amount: ₹100</div>

        <div class="payment-option">
            <button class="card" onclick="payWithCard()">Pay with Card</button>
        </div>

    </div>

    <script>
        function payWithCash() {
            alert("You have selected to pay with Cash.");
            // Add your cash payment logic here
        }

        function payWithCard() {
            alert("You have selected to pay with Card.");
            // Add your card payment logic here
        }
    </script>

</body>

</html>
