<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alif Learning</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/footer.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>






    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background-color: white">
      <div class="container">
         <img src="<?php echo base_url()?>assets/img/alif.png" alt="Girl in a jacket" width="96" height="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #50E414">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1" style="background-color:#FFEC00 ">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"  href="<?php echo base_url()?>" style="color:white" >Home</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1" style="background-color:#ff0080">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url()?>c_tentang" style="color:white">Tentang</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1" style="background-color:#87CEFA">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url()?>c_event" style="color:white">Event</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1" style="background-color:#FF9002">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url()?>c_galeri" style="color:white">Galeri</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>





<br>
<br>
<br>
<?php echo $isi; ?>

<br /><br/>

    <!-- Footer -->
    <footer class="footer"> 
      <div id="footer" class="container">
        <p class="m-0 text-center  small" style="color: #48BE33"  ><b>Copyright &copy; Your Website 2018</b></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
