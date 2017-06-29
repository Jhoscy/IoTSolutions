<!doctype html>
<?php
/* Displays user information and some useful messages */
require 'db.php';
require 'customPHP.php';
session_start();


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = 'You must log in before viewing your profile page!';
  header('location: error.php');    
}
else {
    
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
} 

    
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>IoT Solutions</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    IoT Solutions
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="UserProfile.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="Ambienti.php">
                        <i class="pe-7s-note2"></i>
                        <p>Ambienti</p>
                    </a>
                </li>
                <li>
                    <a href="Sensori.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Sensori</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Transfer To/Me
                                    <b class="caret"></b>
				</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Scarica Dati</a></li>
                                <li><a href="#">Email</a></li>
                                <li><a href="#">Applicazione</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Modifica Profilo</h4>
                            </div>
                            <div class="content">
                                <form name="datiPersonali" method="POST">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nome Azienda</label>
                                                    <input type="text" name="nazienda"class="form-control" placeholder="Azienda" value="<?php 
                                                    if(isset($email)){
                                                          echo  htmlspecialchars(getNomeAzienda($email)); 
                                                    } 
                                                     ?>">  
                                               <?php $nAzienda= getPOSTazienda();?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" name="telefono"class="form-control" placeholder="Telefono" value="<?php 
                                                if(isset($email)){
                                                    echo  htmlspecialchars(getTelefono($email));
                                                }
                                               ?>">
                                                <?php $telefono= getPOSTtelefono(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="text" name="email"class="form-control" disabled placeholder="Email" value="<?php 
                                                    if (isset($email)){
                                                        echo htmlspecialchars($email);
                                                    }
                                                        ?>">
                                                <?php $nEmail= getPOSTemail();?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getNome($email));
                                                }
                                                
                                                ?>">
                                                <?php $nome= getPOSTnome();?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cognome</label>
                                                <input type="text" name="cognome" class="form-control" placeholder="Cognome" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getCognome($email));
                                                }
                                                
                                                ?>">
                                                <?php $cognome= getPOSTcognome();?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Indirizzo</label>
                                                <input type="text" name="indirizzo" class="form-control" placeholder="Home Address" value="<?php 
                                                if(isset($email)){
                                                      echo htmlspecialchars(getIndirizzzo($email));
                                                }
                                                
                                                ?>">
                                                <?php $indirizzo= getPOSTindirizzo(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sede</label>
                                                <input type="text" name="sede" class="form-control" placeholder="City" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getSede($email)) ;
                                                }
                                                ?>">
                                                <?php $sede= getPOSTsede(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codice Fiscale</label>
                                                <input type="text" name="codiceFiscale" class="form-control" placeholder="CodFisc" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getCodFisc($email));
                                                }
                                                ?>">
                                                <?php $codFisc= getPOSTcodFisc(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Partita IVA</label>
                                                <input type="text" name="PIVA" class="form-control" placeholder="P.IVA" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getPIVA($email));
                                                }
                                                
                                                ?>">
                                                <?php $PIVA= getPOSTpIVA(); ?>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cap</label>
                                                <input type="number" name="cap" class="form-control" placeholder="CAP" value="<?php 
                                                if(isset($email)){
                                                    echo htmlspecialchars(getCAP($email));
                                                }
                                                ?>">
                                                <?php $cap= getPOSTcap();?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name='submit' class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <?php
                                    require 'db.php';
                                  //  require 'customPHP.php';
                                    if(isset($_POST['submit'])){
                                        $ID= getID($email);
                                        modificaDati($nome, $cognome, $indirizzo, $sede, $cap, $PIVA, $telefono, $codFisc, $nAzienda, $ID, $email);  
                                        echo refresh();
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                    <h4 class="title"><?php 
                                    if(isset($email)){
                                         echo htmlspecialchars(getNome($email));
                                    }
                                   ?><br />
                                         <small></small>
                                      </h4>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">IoT</a>, made with passion
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

   <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

</html>