<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            <hr>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                    </div>
                </div>

                <form action="http://localhost/anbk/ajax" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="nis" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="nama_siswa" type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="psadsa">Password</label>
                        <input name="alamat" type="text" class="form-control" id="psadsa">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
            <div class="col-sm-4 ">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">Nomor Soal</p>
                        <hr>
                        <div class="d-flex align-content-end flex-wrap">
                            <!-- <div class="bd-highlight bg-primary"><a class="text-light" href="#">1</a></div> -->
                            <a class="" href="#"><span class="badge badge-secondary m-2 p-2">1</span></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script>
    // $.get("http://localhost/anbk/ajax/", data => {

    //     console.log(data);

    // })
    // $.ajax({
    //     url: "http://localhost/anbk/ajax/3",
    //     type: "delete",
    //     success: (data) => console.log(data)
    // })
    // $.ajax({
    //     type: 'GET',
    //     dataType: "json",
    //     url: 'http://localhost/anbk/ajax/3',
    //     success: function(data) {
    //         console.log(data);
    //     }
    // });

    $.ajax({
        url: "http://localhost/anbk/ajax/",
        type: "post", // kalau PUT, tinggal ganti PUT 
        data: {
            nis: 312,
            nama_siswa: "Zen",
            alamat: "Samarinda"
        },
    })
    </script>
</body>

</html>