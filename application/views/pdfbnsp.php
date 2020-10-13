<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>

    <p style="text-align:center;"> Nilai Aplikasi Komputer <?= $nama ?></p>
    <table>
        <tr>
            <th>Komponen penilaian</th>
            <th>Nilai</th>
        </tr>
        <tr>
            <td>UTS Teori</td>
            <td><?= $a; ?></td>
        </tr>
        <tr>
            <td>UAS Teori</td>
            <td><?= $b; ?></td>
        </tr>
        <tr>
            <td>Quiz</td>
            <td><?= $c; ?></td>
        </tr>
        <tr>
            <td>UTS Praktikum</td>
            <td><?= $d; ?></td>
        </tr>
        <tr>
            <td>UAS Praktikum</td>
            <td><?= $e; ?></td>
        </tr>
        <tr>
            <td>Tugas word</td>
            <td><?= $f; ?></td>
        </tr>
        <tr>
            <td>TUgas PPT</td>
            <td><?= $g; ?></td>
        </tr>
        <tr>
            <td>Muatan Lokal</td>
            <td><?= $h; ?></td>
        </tr>
    </table>

</body>

</html>