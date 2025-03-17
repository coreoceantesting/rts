<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .amount {
            font-size: 24px;
            font-weight: bold;
            color: #8c68cd;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #8c68cd;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #7a55b0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Confirm Your Payment</h2>
        <p class="amount">Amount: ₹{{ $sbiPayment->amount }}</p>

        <form name="ecom" method="post" action="https://test.sbiepay.sbi/secure/AggregatorHostedListener">
            @csrf
            <input type="hidden" name="EncryptTrans" value="{{ $EncryptTrans }}">
            <input type="hidden" name="merchIdVal" value="{{ $merchantId }}">

            <button type="submit" class="btn">Confirm Payment</button>
        </form>

    </div>
</body>
</html>
