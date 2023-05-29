<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Students</title>
</head>
<body>
    <form action="" method="get">
        @csrf
        <input type="text" name="search" placeholder="Cari Nama...">
        <button type="submit">Cari</button>
    </form>
    <br>
    <a href="{{ route('add') }}"  style="background: rgb(44, 156, 220); color: white;">Tambah Data Baru</a>
    <a href="{{ route('trash') }}" style="background: orange; color: white;">Lihat Data Terhapus</a>
    @if(Session::get('succes'))
    <p style="padding: 5px 10px; background: green; color: white; margin: 10px;">{{ Session::get('succes') }}</p>
    @endif
    @if(Session::get('errors'))
    <p style="padding: 5px 10px; background: red; color: white; margin: 10px;">{{ Session::get('errors') }}</p>
    @endif
    @foreach ($students as $student)
    <ol>
        <li>NIS : {{ $student['nis'] }}</li>
        <li>Nama : {{ $student['nama'] }}</li>
        <li>Rombel : {{ $student['rombel'] }}</li>
        <li>Rayon : {{ $student['rayon'] }}</li>
        <li>Aksi : <a href="{{ route('edit', $student['id'])}}">edit</a> ||
            <form action="{{route('delete', $student['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    </ol>
    @endforeach
</body>
</html>
