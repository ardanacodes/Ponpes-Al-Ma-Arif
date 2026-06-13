<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>
table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid black;
    padding:8px;
}
</style>

</head>
<body>

<h2>Rekap Absensi Siswa</h2>

<table>

<thead>
<tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
</tr>
</thead>

<tbody>

@foreach($students as $student)

<tr>
    <td>{{ $student->nis }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->schoolClass->name ?? '-' }}</td>
</tr>

@endforeach

</tbody>

</table>

</body>
</html>