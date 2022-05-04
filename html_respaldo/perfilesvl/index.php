<?php include 'php/contenido.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
     <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Paytone+One">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="style.css">
    <script type="js/scripts.js"></script>

    <title> Perfil personal funcionarios VL </title>
</head>
<body>
  <h1></h1>
    <div class="container" id="wrapper" align="center">

        <?php generar_index(); ?>

    </div>

  <script type="text/javascript" src="js/funciones.js"></script>
  <script>
  $(document).ready(function(){ 
    $('.ref-pag').click(function(e){ 
        $('#wrapper').load($(this).attr('href'));
        e.preventDefault();
    });
});
</script>
</body>
</html>