<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Execute | Invoice</title>
    <style>
        .page-break {
            page-break-after: always;
        }

        #watermark {
            position: fixed;
            bottom: 400px;
            right: 60px;
            z-index: -1;
            font-size: 100px;
            font-weight: bolder;
            color: #dedede;
            opacity: 0.2;
            transform: rotate(-30deg);
            justify-content: center;
            align-content: center;
            border: 14px solid;
            border-radius: 14px;
            padding: auto 80px;
        }

        td,th,p {
            color: #334
        }

    </style>
</head>

<body style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 12px;">

    <div id="watermark">
        LUNAS
    </div>

    <table width="100%" style="border-collapse: collapse; padding-bottom: 10px;">
        <tr style="">
            <td width="50%">
                <img src="{{ public_path('execute/images/logo.png') }}" style="width: 160px">
            </td>
            <td align="right">
                <span style="font-size: 16px; letter-spacing: 3px">INVOICE</span> <br>
                <span
                    style="opacity: 0.6;">{{ $order->invoice_number }}/00{{ $order->id }}/00{{ $order->user_id }}/{{ $order->order_number }}</span>
            </td>
        </tr>
    </table>
    <table width="100%" style="border-bottom: 1px solid #dedede"></table>
    <br><br>
    <table width="100%">
        <tr style="font-size: 14px;">
            <td width="50%">
                <strong>DITERBITKAN ATAS NAMA</strong>
            </td>
            <td>
                <strong>UNTUK</strong>
            </td>
        </tr>
    </table>

    <table width="100%" style="line-height: 1.2;">
        <tr style="font-size: 13px">
            <td width="10%">Penjual</td>
            <td width="40%">: <strong>EXECUTE</strong> | execute@mail.com</td>
            <td width="17%">Pembeli</td>
            <td>: <strong>{{ $order->name }}</strong> | {{ $order->email }}</td>
        </tr>
        <tr style="font-size: 13px">
            <td>Kurir</td>
            <td>: <strong style="text-transform: uppercase">{{ $order->kurir }} - {{ $order->service }}</strong>
            </td>
            <td>Tanggal Pembelian</td>
            <td>: <strong>{{ $order->order_date }}</strong></td>
        </tr>
        <tr style="font-size: 13px">
            <td></td>
            <td></td>
            <td>Alamat Pengiriman</td>
            <td>: <strong>{{ $order->name }}</strong> ({{ $order->phone }})</td>
        </tr>
        <tr style="font-size: 13px">
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $order->address }}, {{ $order->nama_kota }}, {{ $order->nama_provinsi }},
                {{ $order->postcode }}</td>
        </tr>
    </table>
    <br><br><br>
    <table width="100%" style="padding: 10px 0 10px 0; line-height: 1.2;">
        <thead style="border-bottom: 1px solid #334; padding-bottom: 5px;">
            <tr style="font-size: 14px;">
                <th width="15%"></th>
                <th width="35%" align="left">INFO PRODUK</th>
                <th width="12%" align="left">
                    JUMLAH
                </th>
                <th align="right" width="18%">
                    HARGA SATUAN
                </th>
                <th align="right">
                    TOTAL HARGA
                </th>
            </tr>
        </thead>
        <br>
        <tbody>
            @foreach ($orderItem as $item)
                <tr style="font-size: 14px;">
                    <td>
                        <img src="{{ public_path($item->product->product_thumbnail) }}" style="width: 85px">
                    </td>
                    <td><span style="font-size: 15px; font-weight: bold; color: rgb(39, 39, 39)">{{ $item->product->product_name }}</span> <br>
                        {{ $item->size }} - {{ $item->color }} <br><br>
                        <span style="font-size: 13px; color:gray;">Berat:</span> {{ $item->product->product_weight }}
                        gr</td>
                    <td align="left">{{ $item->qty }} pcs <br><br><br><br></td>
                    <td align="right">Rp{{ number_format($item->price, 0, '', '.') }} <br><br><br><br></td>
                    @php
                        $total = $item->qty * $item->price;
                    @endphp
                    <td align="right">Rp{{ number_format($total, 0, '', '.') }} <br><br><br><br></td>
                </tr>
            @endforeach
            <br>
            <tr style="font-size: 14px;">
                <td></td>
                <td></td>
                <td colspan="2">
                    <strong>TOTAL HARGA ({{ $order->totalqty }} produk)</strong>
                </td>
                <td align="right"><strong style="font-size: 15px">Rp{{ number_format($order->totalbelanja, 0, ',', '.') }}</strong></td>
            </tr>
            <tr style="font-size: 13px;">
                <td></td>
                <td></td>
                <td colspan="2">
                    Total Ongkos Kirim ({{ number_format($order->totalberat, 0, ',', '.') }} gr)
                </td>
                <td align="right">Rp{{ number_format($order->totalongkir, 0, ',', '.') }}</td>
            </tr>
            <br>
            <tr style="font-size: 14px;">
                <td></td>
                <td></td>
                <td colspan="2">
                    <strong>TOTAL BELANJA</strong>
                </td>
                <td align="right"><strong style="font-size: 15px">Rp{{ number_format($order->totalbayar, 2, ',', '.') }}</strong></td>
            </tr>
            <tr style="font-size: 13px;">
                <td></td>
                <td></td>
                <td colspan="2">
                    Metode Pembayaran
                </td>
                <td align="right">{{ $order->payment_method }}</td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <table width="100%" style="border-bottom: 1px solid #dedede"></table>
    <p>Invoice ini sah dan diproses oleh komputer.</p>
    <p style="line-height: 5px">
        Silakan hubungi <strong>Execute Care</strong> apabila kamu membutuhkan bantuan.
        <span style="float: right; font-style: italic">Terakhir diupdate: {{ $order->updated_at }} WIB</span>
    </p>

</body>

</html>
