<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Produk</title>
    <p style="text-align:right;">
    Tanggal Cetak :
    {{ date('d-m-Y H:i') }}
</p>

    <style>
        body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
}

h2{
    text-align:center;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    border:1px solid #555;
    padding:8px;
    text-align:left;
}

th{
    background:#333;
    color:white;
}

tr:nth-child(even){
    background:#f5f5f5;
}
    </style>
</head>
<body>
    

<h2>Data Produk AppleSeller</h2>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>

    </thead>

    <tbody>

    @foreach($products as $product)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->category->name ?? '-' }}</td>
            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price) }}</td>
            <td>{{ $product->stock }}</td>
        </tr>

    @endforeach

    </tbody>

</table>

</body>
</html>