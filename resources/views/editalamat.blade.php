<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alamat</title>
</head>
<body>
    <h1>Edit Alamat</h1>

    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <form action="{{ route('alamatupdate', $alamat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama_penerima">Nama Penerima:</label><br>
        <input type="text" id="nama_penerima" name="nama_penerima"><br>
        
        <label for="nama_alamat">Nama Alamat:</label><br>
        <input type="text" id="nama_alamat" name="nama_alamat"><br>

        <label for="city">Kota:</label><br>
        <input type="text" id="city" name="city"><br>

        <label for="state">Provinsi:</label><br>
        <input type="text" id="state" name="state"><br>

        <label for="zip_code">Kode Pos:</label><br>
        <input type="text" id="zip_code" name="zip_code"><br>

        <label for="description">Deskripsi:</label><br>
        <textarea id="description" name="description"></textarea><br>

        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>