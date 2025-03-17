<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            background: white;
            width: 90%;
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #8c68cd;
        }

        .amount {
            font-size: 20px;
            margin: 15px 0;
        }

        .message {
            font-size: 16px;
            margin: 15px 0;
            color: #333;
        }

        button {
            background-color: #8c68cd;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: #734fb5;
        }

        .cancel {
            background-color: #e74c3c;
        }

        .cancel:hover {
            background-color: #c0392b;
        }

        /* Success and Failed Page Styling */
        .success h2 {
            color: #2ecc71;
        }

        .failed h2 {
            color: #e74c3c;
        }
    </style>
</head>

<body>
    <div class="container success">
        <h2>Payment Successful 🎉</h2>
        <p class="message">Your payment of <strong>₹{{ '100' }}</strong> has been processed successfully.</p>
        <button onclick="window.location.href='{{ route('my-application') }}'">Go Back</button>
    </div>
</body>

</html>
