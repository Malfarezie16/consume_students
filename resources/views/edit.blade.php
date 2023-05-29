<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Students || edit</title>
</head>
<body>
<h2>Edit Data siswa Baru</h2>
@if(Session::get('errors'))
    <p style="padding: 5px 10px; background: red; color: white; margin: 10px;">{{ Session::get('errors') }}</p>
    @endif
<form action="{{route('update', $students['id'])}}" method="POST">
    @csrf
    @method('PATCH')
    <div style="display: flex; margin-bottom: 15px">
        <label for="nama">nama</label>
        <input type="text" name="nama" id="nama" placeholder="Nama anda...">
    </div>
    <div style="display: flex; margin-bottom: 15px">
        <label for="nis">NISz</label>
        <input type="number" name="nis" id="nis" placeholder="NIS anda...">
    </div>
 <div style="display: flex; margin-bottom: 15px">
        <label for="rombel">rombel</label>
        <select name="rombel" id="rombel">
            <option value="pplg X" {{$students['rombel'] == 'PPLG X' ? 'selected' : ''}}>PPLG X</option>
            <option value="pplg XI" {{$students['rombel'] == 'PPLG XI' ? 'selected' : ''}}>PPLG XI</option>
            <option value="pplg XII" {{$students['rombel'] == 'PPLG XII' ? 'selected' : ''}}>PPLG XII</option>
        </select>
    </div>
    <div style="display: flex; margin-bottom: 15px">
        <label for="rayon">rayon</label>
        <input type="text" name="rayon" value="{{$students['rayon']}}" id="rayon" placeholder="Contoh: cis 2">
    </div>
    <button type="submit">KIRIM</button>
</body>
</html>
