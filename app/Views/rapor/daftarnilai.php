<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Mat</th>
                    <th scope="col">IPA</th>
                    <th scope="col">BI</th>
                    <th scope="col">Mat</th>
                    <th scope="col">IPA</th>
                    <th scope="col">BI</th>

                </tr>
            </thead>
            <tbody>

                <?php
                //batas
                foreach ($daftarnilai as $siswa) {
                    echo '<tr><th scope="row">1</th>';
                    echo "<td>" . $siswa['nama'] . "</td>";
                    foreach ($siswa as $kelas) {

                        if (is_array($kelas)) {
                            foreach ($kelas as $semester) {
                                foreach ($semester as $idmapel => $mapel) {
                                    foreach ($mapel as $nilai) {
                                        echo "<td>" . $nilai . "</td>";
                                    }
                                }
                            }
                        }
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>

        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>

</body>

</html>