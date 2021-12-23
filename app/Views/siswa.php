<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<button onclick="tampilhtml()" class="btn btn-primary">Click me</button>
<button id="hapus" class="btn btn-primary btn_hapus" onclick="hapus()">hapus</button>
<button id="join" class="btn btn-primary btn_join" onclick="join()">join</button>
<input type="text" id="nama" name="nama">
<div id="demo" class="col-3">dfsd</div>

<div id="list">
    <table class="table col-3 table-striped">
<?php foreach ($siswa as $s) : ?>
    <tr>
    <td><?= $s['nama_siswa'] ?></td>
    <td><?= $s['alamat'] ?></td>
    <td><a href="#" data-nomor="<?= $s['id'] ?>" class="btn btn-primary tombol">Hapus</a></td>
<?php endforeach ?>
    </tr>
</table>
</div>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    function ambildata(){
        $.ajax({
                url: '<?php echo base_url(); ?>/home/json',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    var i;
                    var no = 0;
                    var html = "";
                    for(i=0;i < response.length ; i++){
                        no++;
                        html = html + '<tr>'
                                    + '<td>' + no  + '</td>'
                                    + '<td>' + response[i].id + '</td>'
                                    + '<td>' + response[i].nama_siswa  + '</td>'
                                    + '<td>' + response[i].alamat  + '</td>'
                                    + '</tr>';
                    }
                    $("#demo").html(html);
                }
 
            });
    }
 $("#demo").click(function(){
  ambildata();  
});

function tulisnama(){
    $.post("<?=base_url()?>/home/json",
  {
    name: "Donald Duck",
    city: "Duckburg"
  },
  function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
    window.location.reload();
    

  });
}

function hapus(){
    var noinduk = 2;
            var status = confirm('Yakin ingin menghapus?');
            if(status){
                $.ajax({
                    url: '<?php echo base_url(); ?>/home/hapus',
                    type: 'POST',
                    data: {id:noinduk},
                    success: function(response){
                        tampil_data();
                    }
                })
            }
}
function hapusdata(id){
                // const nomor = id.getAttribute("data-nomor");
                const nomor = $(id).data("nomor");
                console.log(nomor);
                
            }

        $(".tombol").on("click", function(){
        var id = $(this).data("nomor");
        var nama = $("#nama").val();
        alert("The data-id of clicked item is: " + id);
        $.ajax({
            url: '<?= base_url()?>/home/update',
            data: {id : id, nama: nama},
            method: 'post',
            // dataType: 'json',
            success: function(data) {
                console.log(data);
                window.location.reload();
            }
        });
    });

    function tampilhtml(){
        $.ajax({
                url: '<?php echo base_url(); ?>/home/tampilhtml',
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    const html = response['data'];
                    let i;
                    let html2 = "";
                    for(i=0;i < html.length ; i++){
                        html2 = html2 + html[i];
                    }
                    let html3 = '<ul class="list-group">' + html2 + '</ul>';
                    $("#demo").html(html3);
                }
 
            });
    }
    
</script>
</body>
</html>