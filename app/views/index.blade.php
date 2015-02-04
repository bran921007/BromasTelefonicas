
<!DOCTYPE html>
<html lang="en" ng-app>
<head>
  <meta charset="utf-8">
  <title>Bromas Telefonicas</title>
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://aozora.github.io/bootplus/assets/css/font-awesome.min.css">
  <link href="http://aozora.github.io/bootplus/assets/css/bootplus.css" rel="stylesheet">
  <link href="http://aozora.github.io/bootplus/assets/css/bootplus-responsive.css" rel="stylesheet">

  <link href="http://aozora.github.io/bootplus/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->

  <!-- LOAD Angular -->
  <script charset="utf-8" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.3/angular.min.js"></script>

  <style>
  body {
    background-color: #e5e5e5 !important;
    padding-top: 20px;
    padding-bottom: 60px;
    background-color: #FFF;
  }

  /* Custom container */
  .container {
    margin: 0 auto;
    max-width: 1000px;
  }
  .container > hr {
    margin: 60px 0;
  }

  /* Main marketing message and sign up button */
  .jumbotron {
    margin: 204px 0;
    text-align: center;
  }
  .jumbotron h1 {
    font-size: 100px;
    line-height: 1;
  }
  .jumbotron .lead {
    font-size: 24px;
    line-height: 1.25;
  }
  .jumbotron .btn {
    font-size: 21px;
    padding: 14px 24px;
  }

  select {
    /*font-size: 21px;*/
    margin-top: 12px;
    border-radius: 2px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    height: 42px;
  }

</style>
<link href="http://aozora.github.io/bootplus/assets/css/bootplus-responsive.css" rel="stylesheet">
<link href="http://aozora.github.io/bootplus/assets/css/font-awesome-ie7.min.css" rel="stylesheet">


</head>

<body ng-controller="myController">

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#">Bromas Project</a>
        <div class="nav-collapse collapse">
          <!-- <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul> -->
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="jumbotron " align="center"  ng-show="formulario == false">
  <h2>Servicio de bromas telefonicas</h2>
  <h2>Haz llamadas de bromas personalizables</h2>
  <a class="btn btn-large btn-success" href="#" ng-click="comienza()">Comienza</a>
</div>

<div class="jumbotron " ng-show="formulario == true" >
  <div class="" style="margin: 0 auto;
  max-width: 35%;">
  <div class="card">
    <h3 class="card-heading simple">Personaliza tu broma</h3>
    <div class="card-body">
      <div class="input-prepend">
        <span class="add-on">1</span>
        <input class="span2" id="telefono" type="text" placeholder="809+715+3217" required>
      </div>

      <div>
        <textarea id="mensaje" rows="3" placeholder="Mensaje de voz" required></textarea>
      </div>

    </div>
    <div class="card-comments">
      <a href="#" id='call' class="btn btn-large btn-primary ">Realizar Llamada!</a>

    </div>
  </div>
</div>
</div>



<!-- Le javascript
================================================== -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="http://aozora.github.io/bootplus/assets/js/bootstrap-button.js"></script>
<script >
function myController($scope){
  $scope.formulario = false;
  $scope.comienza = function(){
    $scope.formulario = true;
  }
}

$(document).ready(function(){

  
  

  $("#call").click(function(){
    
    var telefono = $("#telefono").val();
    var mensaje = $("#mensaje").val();
    console.log(mensaje);
    console.log(telefono);
  
    
    $.ajax({
          type:'POST',
          url:'/call',
          data:{
            telefono:telefono,
            mensaje :mensaje 
          }
  }).done(function(data){
    if(data.success == false)
      {
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
  });

});

</script>

</body>
</html>
