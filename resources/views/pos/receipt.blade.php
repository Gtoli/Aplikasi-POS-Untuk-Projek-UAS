<!DOCTYPE html>
<html>
<head>
    <title>Struk Belanja</title>
    <style>
        body { font-family: monospace; font-size: 12px; width: 250px; margin: 0; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .line { border-top: 1px dashed #000; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; }
    </style>
</head>
<body>
    <div class="text-center">
        <h3>TOKO SAYA</h3>
        <p>Jl. Toko No. 123</p>
        <div class="line"></div>
        <p>No. Nota: {{ $transaction->invoice_number }}<br>
        Tanggal: {{ $transaction->date }}</p>
    </div>
    <div class="line"></div>
    
    <table>
        @foreach($transaction->transactionDetails as $detail)
        <tr>
            <td>{{ $detail->product->name }}<br>{{ $detail->qty }} x Rp{{ number_format($detail->subtotal / $detail->qty, 0, ',', '.') }}</td>
            <td class="text-right" style="vertical-align: bottom;">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </table>
    
    <div class="line"></div>
    <table>
        <tr style="font-weight: bold;">
            <td>TOTAL:</td>
            <td class="text-right">Rp{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
        </tr>
    </table>
    <div class="line"></div>
    <div class="text-center">
        <p>-- Terima Kasih --</p>
    </div>
</body>
</html>