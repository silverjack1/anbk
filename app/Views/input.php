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

  <button>＋</button> 
 <div id="clone-box" class="box">BOX-1</div>

  <div class='input-form'>
 <input type='text' placeholder='Enter name' name='name_1' class='txt' >
 <input type='text' placeholder='Enter email' name='email_1' class='txt' >
</div>
<input type='button' id='but_add' value='Add new'>


    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script>
$(document).ready(function(){
 
 $('#but_add').click(function(){

  // Selecting last id 
  var lastname_id = $('.input-form input[type=text]:nth-child(1)').last().attr('name');
  var split_id = lastname_id.split('_');

  // New index
  var index = Number(split_id[1]) + 1;

  // Create clone
  var newel = $('.input-form:last').clone(true);

  // Set id of new element
  $(newel).find('input[type=text]:nth-child(1)').attr("name","name_"+index);
  $(newel).find('input[type=text]:nth-child(2)').attr("name","email_"+index);
  // Set value
  $(newel).find('input[type=text]:nth-child(1)').val("name_"+index);
  $(newel).find('input[type=text]:nth-child(2)').val("email_"+index);
  
  // Insert element
  $(newel).insertAfter(".input-form:last");
 });

});

var cloneCount = 2;
   $("button").click(function(){
      $('#clone-box')
          .clone()
          .attr('id', 'clone-box-'+ cloneCount++)
          .insertAfter($('[id^=clone-box]:last'))
          .text('BOX- ' + (cloneCount-1));
   }); 
    </script>
  </body>
</html>