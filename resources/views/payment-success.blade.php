<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .success-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .success-icon {
            font-size: 50px;
            color: #4caf50;
        }
        .success-message {
            font-size: 1.5rem;
            color: #333333;
            margin-top: 15px;
        }
        .details {
            font-size: 1rem;
            color: #666666;
            margin-top: 10px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #4caf50;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a045;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✔</div>
        <div class="success-message">Payment Successful!</div>
        <div class="details">Thank you for your payment. Your transaction has been successfully processed.</div>
        <a href="{{ url('/') }}" class="btn">Go to Home</a>
    </div>
</body>
</html>
