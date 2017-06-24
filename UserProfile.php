<!doctype html>
<?php
/* Displays user information and some useful messages */
require 'db.php';
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
 function getPOSTazienda (){
       $nazienda= filter_input(INPUT_POST, 'nazienda');
       return $nazienda;
}

function getPOSTtelefono(){
    $telefono=filter_input(INPUT_POST, 'telefono');
    return $telefono;
}

function getPOSTemail(){
    $email=filter_input(INPUT_POST, 'email');
    return $email;
}

function getPOSTnome(){
    $nome=filter_input(INPUT_POST, 'nome');
    return $nome;
}

function getPOSTcognome(){
    $cognome=filter_input(INPUT_POST, 'cognome');
    return $cognome;
}

function getPOSTindirizzo(){
     $indirizzo=filter_input(INPUT_POST, 'indirizzo');
    return $indirizzo;
}

function getPOSTsede(){
     $sede=filter_input(INPUT_POST, 'sede');
    return $sede;
}

function getPOSTcodFisc(){
     $codiceFiscale=filter_input(INPUT_POST, 'codFiscale');
    return $codiceFiscale;
}

function getPOSTpIVA(){
     $PIVA=filter_input(INPUT_POST, 'PIVA');
    return $PIVA;
}

function getPOSTcap(){
     $cap=filter_input(INPUT_POST, 'cap');
    return $cap;
}
 
    function getNomeAzienda($email){
        require 'db.php';
        $SQL = "SELECT NAZIENDA FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $nomeAzienda=$row['NAZIENDA'];
                    }
        }
        $mysqli->close();
        return $nomeAzienda;
        
    } 
    
    function getID($email){
        require 'db.php';
        $SQL="SELECTT id FROM users WHERE email='$email'";
        $result=$mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $ID=$row['id'];
            }
        }
        return $ID;
    }
    
    function getTelefono($email){
        require 'db.php';
        $SQL="SELECT TELEFONO FROM users WHERE email='$email'";
         $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $telefono=$row['TELEFONO'];
                    }
        }
        $mysqli->close();
        return $telefono;
        
    }
    
    function getNome($email){
        require 'db.php';
        $SQL="SELECT first_name FROM users WHERE email='$email'";
         $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $nome=$row['first_name'];
                    }
        }
        $mysqli->close();
        return $nome;
        
    }
    function getCognome($email){
        require 'db.php';
        $SQL="SELECT last_name FROM users WHERE email='$email'";
         $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $cognome=$row['last_name'];
                    }
        }
        $mysqli->close();
        return $cognome;
        
    }
    
    function getIndirizzzo($email){
        require 'db.php';
        $SQL="SELECT Indirizzo FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $Indirizzo=$row['Indirizzo'];
                    }
        }
        $mysqli->close();
        return $Indirizzo;
        
    }
    
    function getSede($email){
        require 'db.php';
        $SQL="SELECT Sede FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $Sede=$row['Sede'];
                    }
        }
        $mysqli->close();
        return $Sede;
        
    }
    
    function getCodFisc($email){
        require 'db.php';
        $SQL="SELECT CODFIS FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $CodFis=$row['CODFIS'];
                    }
        }
        $mysqli->close();
        return $CodFis;
        
    }
    
    function getPIVA($email){
        require 'db.php';
        $SQL="SELECT PIVA FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $PIVA=$row['PIVA'];
                    }
        }
        $mysqli->close();
        return $PIVA;
    }
    
    function getCAP($email){
        require 'db.php';
        $SQL="SELECT CAP FROM users WHERE email='$email'";
        $result = $mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    $CAP=$row['CAP'];
                    }
        }
        $mysqli->close();
        return $CAP;
    }
    
    function modificaDati($nome, $cognome, $indirizzo, $sede, $cap, $PIVA, $telefono, $codiceFiscale, $nomeAzienda, $ID, $email){
         require 'db.php';
        $SQL = "INSERT INTO users (NAZIENDA) VALUES('$nomeAzienda', '$sede','$indirizzo','$PIVA','$codiceFiscale','$cap','$telefono','$ID','$nome','$cognome') WHERE email='$email'";
        $mysqli->query($SQL);     
    }
                                                                
    $mysqli->close();
    
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
                <a href="http://www.creative-tim.com" class="simple-text">
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
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
                                                    <input type="text" name="nazienda"class="form-control" placeholder="Azienda" value="<?php echo getNomeAzienda($email); ?>" >  
                                               <?php $nAzienda= getPOSTazienda();?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefono</label>
                                                <input type="text" name="telefono"class="form-control" placeholder="Telefono" value="<?php echo getTelefono($email)?>">
                                                <?php $telefono= getPOSTtelefono(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="text" name="email"class="form-control" placeholder="Email" value="<?php echo $email?>">
                                                <?php $nEmail= getPOSTemail();?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo getNome($email)?>">
                                                <?php $nome= getPOSTnome()?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cognome</label>
                                                <input type="text" name="cognome" class="form-control" placeholder="Cognome" value="<?php echo getCognome($email)?>">
                                                <?php $cognome= getPOSTcognome()?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Indirizzo</label>
                                                <input type="text" name="indirizzo" class="form-control" placeholder="Home Address" value="<?php echo getIndirizzzo($email)?>">
                                                <?php $indirizzo= getPOSTindirizzo() ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sede</label>
                                                <input type="text" name="sede" class="form-control" placeholder="City" value="<?php echo getSede($email) ?>">
                                                <?php $sede= getPOSTsede() ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codice Fiscale</label>
                                                <input type="text" name="codiceFiscale" class="form-control" placeholder="CodFisc" value="<?php echo getCodFisc($email) ?>">
                                                <?php $codFisc= getPOSTcodFisc() ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Partita IVA</label>
                                                <input type="text" name="PIVA" class="form-control" placeholder="P.IVA" value="<?php echo getPIVA($email) ?>">
                                                <?php $PIVA= getPOSTpIVA() ?>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cap</label>
                                                <input type="number" name="cap" class="form-control" placeholder="CAP" value="<?php echo getCAP($email)?>">
                                                <?php $cap= getPOSTcap() ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <?php
                                    if(isset($_POST['submit'])){
                                        $IDutente= getID($email);
                                        modificaDati($nome, $cognome, $indirizzo, $sede, $cap, $PIVA, $telefono, $codFisc, $nAzienda, $ID, $email);
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

                                    <h4 class="title"><?php echo getNome($email) ?><br />
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
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>