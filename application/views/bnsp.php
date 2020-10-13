<html>

<head>
    <style>
        .container {
            color: black;
            text-align: center;
            width: 75%;
            margin-left: 13%;
            border: 1px solid black;
            padding: 20px;
        }

        form {
            margin-top: 20px;
            text-align: -webkit-center;
        }


        p {
            display: inline;
        }

        .kotak {
            width: 100%;
            height: 20%;
            border: 1px solid black;
            position: relative;
        }

        .tanggal {
            position: absolute;
            right: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kotak">
            <div class="tanggal">
                <?= $date; ?>&nbsp; &nbsp;
            </div>
        </div>
        <div style="margin:10px;">
            <strong>Input Nilai Mahasiswa Mata Kuliah Aplikasi Komputer</strong>
        </div>
        <form method="post" action="<?= base_url() ?>profile/sorting">
            <table>
                <tr>
                    <td class="kanan">Nama</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="nama" /></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="width:10px;">:</td>
                    <td>
                        <input type="radio" name="kelamin" value="Laki-Laki">Laki-Laki
                        <input type="radio" name="kelamin" value="Perempuan">Perempuan
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="prodi" /></td>
                </tr>
                <tr>
                    <td>UTS Teori</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="uts_teori" /></td>
                </tr>
                <tr>
                    <td>UAS Teori</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="uas_teori" /></td>
                </tr>
                <tr>
                    <td>Quiz</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="quiz" /></td>
                </tr>
                <tr>
                    <td>UTS Praktikum</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="uts_praktikum" /></td>
                </tr>
                <tr>
                    <td>UAS Praktikum</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="uas_praktikum" /></td>
                </tr>
                <tr>
                    <td>Tugas Word</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="tugas_word" /></td>
                </tr>
                <tr>
                    <td>Tugas PPT</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="tugas_ppt" /></td>
                </tr>
                <tr>
                    <td>Muatan Lokal</td>
                    <td style="width:10px;">:</td>
                    <td><input type="text" name="mulok" /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Urutkan data" /></td>
                    <td></td>
                    <td><input type="reset" value="Hapus formulir"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>