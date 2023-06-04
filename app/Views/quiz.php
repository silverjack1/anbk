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

        <div class="row my-2">
            <div class="col-sm-4 order-sm-1">
                <div class="card">
                    <form action="http://localhost/anbk/quiz/simpanjawaban" id="tambahkan" method="POST">
                        <div id="name-group" class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" />
                        </div>

                        <div id="email-group" class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="email@example.com" />
                        </div>

                        <div id="superhero-group" class="form-group">
                            <label for="superheroAlias">Superhero Alias</label>
                            <input type="text" class="form-control" id="superheroAlias" name="superheroAlias"
                                placeholder="Ant Man, Wonder Woman, Black Panther, Superman, Black Widow" />
                        </div>

                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </form>
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
            <div class="col-sm-8 order-sm-0">
                <div class=" card">
                    <div class="card-body">
                        <p class="card-text"><?php if(!empty($tes_soal)){ echo $tes_soal; } ?>
                        </p>
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
                    <form id="form-kerjakan" method="post">
                        <input type="text" name="tes-id" id="tes-id"
                            value="<?php if(!empty($tes_id)){ echo $tes_id; } ?>">
                        <input type="text" name="tes-user-id" id="tes-user-id"
                            value="<?php if(!empty($tes_user_id)){ echo $tes_user_id; } ?>">
                        <input type="text" name="tes-soal-id" id="tes-soal-id"
                            value="<?php if(!empty($tes_soal_id)){ echo $tes_soal_id; } ?>">
                        <input type="text" name="tes-soal-nomor" id="tes-soal-nomor"
                            value="<?php if(!empty($tes_soal_nomor)){ echo $tes_soal_nomor; } ?>">
                        <input type="text" name="tes-soal-jml" id="tes-soal-jml"
                            value="<?php if(!empty($tes_soal_jml)){ echo $tes_soal_jml; } ?>">
                        <input type="text" name="tes-soal-ragu" id="tes-soal-ragu"
                            value="<?php if(!empty($tes_ragu)){ echo $tes_ragu; } ?>">

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
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

    $(document).ready(function() {
        $("#tambahkan").submit(function(event) {
            var formData = {
                name: $("#name").val(),
                email: $("#email").val(),
                superheroAlias: $("#superheroAlias").val(),
            };

            $.ajax({
                type: "POST",
                url: "http://localhost/anbk/quiz/simpanjawaban",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function(data) {
                console.log(data);
                if (!data.success) {
                    if (data.errors.name) {
                        $("#name-group").addClass("has-error");
                        $("#name-group").append(
                            '<div class="help-block">' + data.errors.name + "</div>"
                        );
                    }

                    if (data.errors.email) {
                        $("#email-group").addClass("has-error");
                        $("#email-group").append(
                            '<div class="help-block">' + data.errors.email + "</div>"
                        );
                    }

                    if (data.errors.superheroAlias) {
                        $("#superhero-group").addClass("has-error");
                        $("#superhero-group").append(
                            '<div class="help-block">' + data.errors.superheroAlias +
                            "</div>"
                        );
                    }
                } else {
                    $("form").html(
                        '<div class="alert alert-success">' + data.message + "</div>"
                    );
                }
            });

            event.preventDefault();
        });
    });
    </script>
</body>

</html>