<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume Rest API || Trash</title>
</head>
<body>
@if(Session::get('succes'))
    <p style="padding: 5px 10px; background: green; color: white; margin: 10px;">{{ Session::get('succes') }}</p>
    @endif
    @if(Session::get('errors'))
    <p style="padding: 5px 10px; background: red; color: white; margin: 10px;">{{ Session::get('errors') }}</p>
    @endif
    <a href="/">kembali</a>
    @foreach($StudentsTrash as $students)
    <ol>
        <li>NIS : {{ $students['nis'] }}</li>
        <li>Nama : {{ $students['nama'] }}</li>
        <li>Rombel : {{ $students['rombel'] }}</li>
        <li>Rayon : {{ $students['rayon'] }}</li>
        <li>Di hapus tanggal :{{ \Carbon\Carbon::parse($students
        ['deleted_at'])->format('J F, Y')}}</li>
        <li>
            <a href="{{ route('restore', $students['id'])}}">Kembalikan Data</a> ||
            <a href="{{ route('permanent', $students['id'])}}" style="background: orange; color: white;">hapus permanent</a>
        </li>
    </ol>
    @endforeach

</body>
</html>
