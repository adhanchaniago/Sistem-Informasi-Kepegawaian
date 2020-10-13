<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="<?= base_url(); ?>assets/fusioncharts-suite-xt-personal-non-commercial/js/fusioncharts.js">
    </script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/fusioncharts-suite-xt-personal-non-commercial/js/themes/fusioncharts.theme.fint.js">
    </script>
    <script type="text/javascript">
        FusionCharts.ready(function() {
            G1 = new FusionCharts({
                "type": "column2d",
                "renderAt": "lokasinya",
                "width": "500",
                "height": "400",
                "dataFormat": "jsonurl",
                "dataSource": "<?= base_url() ?>profile/grafik/<?= $blom[0] ?>/<?= $blom[1] ?>/<?= $blom[2] ?>/<?= $blom[3] ?>/<?= $blom[4] ?>/<?= $blom[5] ?>/<?= $blom[6] ?>/<?= $blom[7] ?>"
            });
            G1.render();

        });
    </script>

</head>

<body>
    <?php for ($i = 0; $i < $jumlah; $i++) {
        echo $nilai[$i];
        echo "<br>";
    }
    ?>

    <div id="lokasinya" style="display:none;">

    </div>
    <button>
        <a href="<?= base_url() ?>profile/pdfbnsp/<?= $nama ?>/<?= $blom[0] ?>/<?= $blom[1] ?>/<?= $blom[2] ?>/<?= $blom[3] ?>/<?= $blom[4] ?>/<?= $blom[5] ?>/<?= $blom[6] ?>/<?= $blom[7] ?>">Cetak PDF</a>
    </button>
    <button onclick="myFunction()">
        cetak Grafik
    </button>



</body>
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>

<script>
    function myFunction() {
        var x = document.getElementById("lokasinya");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script>

</script>

</html>