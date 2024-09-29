<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .item-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .item-info img {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            margin-right: 15px;
        }
        .item-info h2 {
            font-size: 20px;
            margin: 0;
            color: #555;
        }
        .item-info p {
            font-size: 16px;
            color: #777;
            margin: 5px 0;
        }
        .iframe-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
        .back-button {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    @if(session('candidate'))
    @if(session('last_order'))
    @if(session('last_vote'))
        <div class="container">
            <h1>Pembayaran</h1>

            <div class="item-info">
                <img src="{{ asset(session('candidate')->image) }}" alt="Kandidat">
                <div>
                    <h2>Vote untuk {{ session('candidate')->nama }}</h2>
                    <p><strong>Harga per Vote:</strong> Rp. {{number_format("2500", 2, ",", ".")}}</p>
                    <p><strong>Jumlah Vote:</strong> {{ session('last_vote')->jml_vote }}</p>
                    <p><strong>Total Tagihan:</strong> Rp. {{number_format(session('last_order')->amount, 2, ",", ".")}}</p>
                </div>
            </div>

            <div class="iframe-container">
                <iframe src="{{ session('last_order')->invoice_url }}" title="Halaman Pembayaran Xendit"></iframe>
            </div>

            <a href="{{ route('candidates.index') }}" class="back-button"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    @endif
    @endif
    @endif

</body>
</html>
