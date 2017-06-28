<?php
/* Displays user information and some useful messages */
require 'db.php';
require 'customPHP.php';
session_start();

define('ZERO',0);
define('UNO',1);
define('DUE',2);
define('TRE',3);
define('QUATTRO',4);
define('CINQUE',5);
define('SEI',6);

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
<!doctype html>
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

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    IoT Solutions
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
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
                    <a class="navbar-brand" href="#">Dashboard</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Casa</h4>
                                <?php $nomeAmbiente='casa';
                                      $Sensore=mostraSensore($nomeAmbiente);
                                 ?>
                                <p class="category">Dati del monitoraggio di casa</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Marca</th>
                                    	<th>Tipo</th>
                                    	<th>Misura</th>
                                    	<th>valore</th>
                                    	<th>Data</th>
                                        <th>Ora</th>
                                        <th>Remove Sensore</th>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td><?= $Sensore[ZERO][ZERO] ?></td>
                                        	<td><?= $Sensore[ZERO][UNO] ?></td>
                                        	<td><?= $Sensore[ZERO][DUE] ?></td>
                                        	<td><?= $Sensore[ZERO][TRE] ?></td>
                                                <td><?= $Sensore[ZERO][QUATTRO] ?></td>
                                                <td><?= $Sensore[ZERO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit1"  value="Remove"/>
                                                     <?php if(isset($Sensore[ZERO][SEI])){
                                                            removeSensore1($Sensore[ZERO][SEI], 'submit1');    
                                                     }?>
                                                    </form>
                                                </td>
                                                </tr>
                                        <tr>
                                        	<td><?= $Sensore[UNO][ZERO] ?></td>
                                        	<td><?= $Sensore[UNO][UNO] ?></td>
                                        	<td><?= $Sensore[UNO][DUE] ?></td>
                                        	<td><?= $Sensore[UNO][TRE] ?></td>
                                        	<td><?= $Sensore[UNO][QUATTRO] ?></td>
                                                <td><?= $Sensore[UNO][CINQUE] ?></td>
                                                <td>
                                                    <form method="post">
                                                     <input type="submit" name="submit2" value="Remove"/>
                                                     <?php if(isset($Sensore[UNO][SEI])){
                                                          removeSensore1($Sensore[UNO][SEI], 'submit2');     
                                                     }?>
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore[DUE][ZERO] ?></td>
                                        	<td><?= $Sensore[DUE][UNO] ?></td>
                                        	<td><?= $Sensore[DUE][DUE] ?></td>
                                        	<td><?= $Sensore[DUE][TRE] ?></td>
                                        	<td><?= $Sensore[DUE][QUATTRO] ?></td>
                                                <td><?= $Sensore[DUE][CINQUE] ?></td>
                                                <td>
                                                     <form method="post">
                                                     <input type="submit" name="submit3" value="Remove"/>
                                                     <?php if(isset($Sensore[DUE][SEI])){
                                                          removeSensore1($Sensore[DUE][SEI], 'submit3');
                                                     }?>
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore[TRE][ZERO] ?></td>
                                        	<td><?= $Sensore[TRE][UNO] ?></td>
                                        	<td><?= $Sensore[TRE][DUE] ?></td>
                                        	<td><?= $Sensore[TRE][TRE] ?></td>
                                        	<td><?= $Sensore[TRE][QUATTRO] ?></td>
                                                <td><?= $Sensore[TRE][CINQUE] ?></td>
                                                <td> <form method="post">
                                                     <input type="submit" name="submit4" value="Remove"/>
                                                     <?php if(isset($Sensore[TRE][SEI])){
                                                          removeSensore1($Sensore[TRE][SEI], 'submit4');
                                                     }?>
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                                <td><?= $Sensore[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensore[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensore[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensore[QUATTRO][TRE] ?></td>
                                        	<td><?= $Sensore[QUATTRO][QUATTRO] ?></td>
                                                <td><?= $Sensore[QUATTRO][CINQUE] ?></td>
                                                <td> <form method="post">
                                                     <input type="submit" name="submit5" value="Remove"/>
                                                     <?php if(isset($Sensore[QUATTRO][SEI])){
                                                          removeSensore1($Sensore[QUATTRO][SEI], 'submit5');
                                                     }?>
                                                    </form>
                                                </td>
                                            
                                        </tr>
                                        <tr>
                                                <td><?= $Sensore[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensore[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensore[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensore[CINQUE][TRE] ?></td>
                                        	<td><?= $Sensore[CINQUE][QUATTRO] ?></td>
                                                <td><?= $Sensore[CINQUE][CINQUE] ?></td>
                                                <td> <form method="post">
                                                     <input type="submit" name="submit6" value="Remove"/>
                                                     <?php if(isset($Sensore[CINQUE][SEI])){
                                                          removeSensore1($Sensore[CINQUE][SEI], 'submit6');
                                                     }?>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Ufficio</h4>
                                <?php $nomeAmbiente2='ufficio';
                                      $Sensore1=mostraSensore($nomeAmbiente2);
                                 ?>
                                <p class="category">Dati del monitoraggio dell'Ufficio</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Marca</th>
                                    	<th>Tipo</th>
                                    	<th>Misura</th>
                                    	<th>Valore</th>
                                    	<th>Data</th>
                                        <th>Ora</th>
                                        <th>Remove Sensore</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td><?= $Sensore1[ZERO][ZERO] ?></td>
                                        	<td><?= $Sensore1[ZERO][UNO] ?></td>
                                        	<td><?= $Sensore1[ZERO][DUE] ?></td>
                                        	<td><?= $Sensore1[ZERO][TRE] ?></td>
                                                <td><?= $Sensore1[ZERO][QUATTRO] ?></td>
                                                <td><?= $Sensore1[ZERO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit11"  value="Remove"/>
                                                     <?php if(isset($Sensore1[ZERO][SEI])){
                                                            removeSensore1($Sensore1[ZERO][SEI], 'submit11');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore1[UNO][ZERO] ?></td>
                                        	<td><?= $Sensore1[UNO][UNO] ?></td>
                                        	<td><?= $Sensore1[UNO][DUE] ?></td>
                                        	<td><?= $Sensore1[UNO][TRE] ?></td>
                                                <td><?= $Sensore1[UNO][QUATTRO] ?></td>
                                                <td><?= $Sensore1[UNO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit12"  value="Remove"/>
                                                     <?php if(isset($Sensore1[UNO][SEI])){
                                                            removeSensore1($Sensore1[UNO][SEI], 'submit12');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore1[DUE][ZERO] ?></td>
                                        	<td><?= $Sensore1[DUE][UNO] ?></td>
                                        	<td><?= $Sensore1[DUE][DUE] ?></td>
                                        	<td><?= $Sensore1[DUE][TRE] ?></td>
                                                <td><?= $Sensore1[DUE][QUATTRO] ?></td>
                                                <td><?= $Sensore1[DUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit13"  value="Remove"/>
                                                     <?php if(isset($Sensore1[DUE][SEI])){
                                                            removeSensore1($Sensore1[DUE][SEI], 'submit13');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore1[TRE][ZERO] ?></td>
                                        	<td><?= $Sensore1[TRE][UNO] ?></td>
                                        	<td><?= $Sensore1[TRE][DUE] ?></td>
                                        	<td><?= $Sensore1[TRE][TRE] ?></td>
                                                <td><?= $Sensore1[TRE][QUATTRO] ?></td>
                                                <td><?= $Sensore1[TRE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit14"  value="Remove"/>
                                                     <?php if(isset($Sensore1[TRE][SEI])){
                                                            removeSensore1($Sensore1[TRE][SEI], 'submit14');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore1[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensore1[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensore1[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensore1[QUATTRO][TRE] ?></td>
                                                <td><?= $Sensore1[QUATTRO][QUATTRO] ?></td>
                                                <td><?= $Sensore1[QUATTRO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit15"  value="Remove"/>
                                                     <?php if(isset($Sensore1[QUATTRO][SEI])){
                                                            removeSensore1($Sensore1[QUATTRO][SEI], 'submit15');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore1[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensore1[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensore1[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensore1[CINQUE][TRE] ?></td>
                                                <td><?= $Sensore1[CINQUE][QUATTRO] ?></td>
                                                <td><?= $Sensore1[CINQUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit16"  value="Remove"/>
                                                     <?php if(isset($Sensore1[CINQUE][SEI])){
                                                            removeSensore1($Sensore1[CINQUE][SEI], 'submit16');    
                                                     }?>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    
                    
                    
                     <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Serra</h4>
                                <?php $nomeAmbiente3='serra';
                                      $Sensore2=mostraSensore($nomeAmbiente3);
                                 ?>
                                <p class="category">Dati del monitoraggio della Serra</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Marca</th>
                                    	<th>Tipo</th>
                                    	<th>Misura</th>
                                    	<th>Valore</th>
                                    	<th>Data</th>
                                        <th>Ora</th>
                                        <th>Remove Sensore</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                                <td><?= $Sensore2[ZERO][ZERO] ?></td>
                                        	<td><?= $Sensore2[ZERO][UNO] ?></td>
                                        	<td><?= $Sensore2[ZERO][DUE] ?></td>
                                        	<td><?= $Sensore2[ZERO][TRE] ?></td>
                                                <td><?= $Sensore2[ZERO][QUATTRO] ?></td>
                                                <td><?= $Sensore2[ZERO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit21"  value="Remove"/>
                                                     <?php if(isset($Sensore2[ZERO][SEI])){
                                                            removeSensore1($Sensore2[ZERO][SEI], 'submit21');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore2[UNO][ZERO] ?></td>
                                        	<td><?= $Sensore2[UNO][UNO] ?></td>
                                        	<td><?= $Sensore2[UNO][DUE] ?></td>
                                        	<td><?= $Sensore2[UNO][TRE] ?></td>
                                                <td><?= $Sensore2[UNO][QUATTRO] ?></td>
                                                <td><?= $Sensore2[UNO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit22"  value="Remove"/>
                                                     <?php if(isset($Sensore2[UNO][SEI])){
                                                            removeSensore1($Sensore2[UNO][SEI], 'submit22');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore2[DUE][ZERO] ?></td>
                                        	<td><?= $Sensore2[DUE][UNO] ?></td>
                                        	<td><?= $Sensore2[DUE][DUE] ?></td>
                                        	<td><?= $Sensore2[DUE][TRE] ?></td>
                                                <td><?= $Sensore2[DUE][QUATTRO] ?></td>
                                                <td><?= $Sensore2[DUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit23"  value="Remove"/>
                                                     <?php if(isset($Sensore2[DUE][SEI])){
                                                            removeSensore1($Sensore2[DUE][SEI], 'submit23');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore2[TRE][ZERO] ?></td>
                                        	<td><?= $Sensore2[TRE][UNO] ?></td>
                                        	<td><?= $Sensore2[TRE][DUE] ?></td>
                                        	<td><?= $Sensore2[TRE][TRE] ?></td>
                                                <td><?= $Sensore2[TRE][QUATTRO] ?></td>
                                                <td><?= $Sensore2[TRE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit24"  value="Remove"/>
                                                     <?php if(isset($Sensore2[TRE][SEI])){
                                                            removeSensore1($Sensore2[TRE][SEI], 'submit24');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore2[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensore2[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensore2[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensore2[QUATTRO][TRE] ?></td>
                                                <td><?= $Sensore2[QUATTRO][QUATTRO] ?></td>
                                                <td><?= $Sensore2[QUATTRO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit25"  value="Remove"/>
                                                     <?php if(isset($Sensore2[QUATTRO][SEI])){
                                                            removeSensore1($Sensore2[QUATTRO][SEI], 'submit25');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore2[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensore2[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensore2[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensore2[CINQUE][TRE] ?></td>
                                                <td><?= $Sensore2[CINQUE][QUATTRO] ?></td>
                                                <td><?= $Sensore2[CINQUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit26"  value="Remove"/>
                                                     <?php if(isset($Sensore2[CINQUE][SEI])){
                                                            removeSensore1($Sensore2[CINQUE][SEI], 'submit26');    
                                                     }?>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Parcheggio</h4>
                                <?php $nomeAmbiente4='parcheggio';
                                      $Sensore3=mostraSensore($nomeAmbiente4);
                                 ?>
                                <p class="category">Dati del monitoraggio del Parcheggio</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Marca</th>
                                    	<th>Tipo</th>
                                    	<th>Misura</th>
                                    	<th>Valore</th>
                                    	<th>Data</th>
                                        <th>Ora</th>
                                        <th>Remove Sensore</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td><?= $Sensore3[ZERO][ZERO] ?></td>
                                        	<td><?= $Sensore3[ZERO][UNO] ?></td>
                                        	<td><?= $Sensore3[ZERO][DUE] ?></td>
                                        	<td><?= $Sensore3[ZERO][TRE] ?></td>
                                                <td><?= $Sensore3[ZERO][QUATTRO] ?></td>
                                                <td><?= $Sensore3[ZERO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit31"  value="Remove"/>
                                                     <?php if(isset($Sensore3[ZERO][SEI])){
                                                            removeSensore1($Sensore3[ZERO][SEI], 'submit31');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore3[UNO][ZERO] ?></td>
                                        	<td><?= $Sensore3[UNO][UNO] ?></td>
                                        	<td><?= $Sensore3[UNO][DUE] ?></td>
                                        	<td><?= $Sensore3[UNO][TRE] ?></td>
                                                <td><?= $Sensore3[UNO][QUATTRO] ?></td>
                                                <td><?= $Sensore3[UNO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit32"  value="Remove"/>
                                                     <?php if(isset($Sensore3[UNO][SEI])){
                                                            removeSensore1($Sensore3[UNO][SEI], 'submit32');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore3[DUE][ZERO] ?></td>
                                        	<td><?= $Sensore3[DUE][UNO] ?></td>
                                        	<td><?= $Sensore3[DUE][DUE] ?></td>
                                        	<td><?= $Sensore3[DUE][TRE] ?></td>
                                                <td><?= $Sensore3[DUE][QUATTRO] ?></td>
                                                <td><?= $Sensore3[DUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit33"  value="Remove"/>
                                                     <?php if(isset($Sensore3[DUE][SEI])){
                                                            removeSensore1($Sensore3[DUE][SEI], 'submit33');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore3[TRE][ZERO] ?></td>
                                        	<td><?= $Sensore3[TRE][UNO] ?></td>
                                        	<td><?= $Sensore3[TRE][DUE] ?></td>
                                        	<td><?= $Sensore3[TRE][TRE] ?></td>
                                                <td><?= $Sensore3[TRE][QUATTRO] ?></td>
                                                <td><?= $Sensore3[TRE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit34"  value="Remove"/>
                                                     <?php if(isset($Sensore3[TRE][SEI])){
                                                            removeSensore1($Sensore3[TRE][SEI], 'submit34');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore3[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensore3[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensore3[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensore3[QUATTRO][TRE] ?></td>
                                                <td><?= $Sensore3[QUATTRO][QUATTRO] ?></td>
                                                <td><?= $Sensore3[QUATTRO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit35"  value="Remove"/>
                                                     <?php if(isset($Sensore3[QUATTRO][SEI])){
                                                            removeSensore1($Sensore3[QUATTRO][SEI], 'submit35');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore3[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensore3[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensore3[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensore3[CINQUE][TRE] ?></td>
                                                <td><?= $Sensore3[CINQUE][QUATTRO] ?></td>
                                                <td><?= $Sensore3[CINQUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit36"  value="Remove"/>
                                                     <?php if(isset($Sensore3[CINQUE][SEI])){
                                                            removeSensore1($Sensore3[CINQUE][SEI], 'submit36');    
                                                     }?>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Banca</h4>
                                <?php $nomeAmbiente5='banca';
                                      $Sensore4=mostraSensore($nomeAmbiente5);
                                 ?>
                                <p class="category">Dati del monitoraggio della Banca</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Marca</th>
                                    	<th>Tipo</th>
                                    	<th>Misura</th>
                                    	<th>Valore</th>
                                    	<th>Data</th>
                                        <th>Ora</th>
                                        <th>Remove Sensore</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td><?= $Sensore4[ZERO][ZERO] ?></td>
                                        	<td><?= $Sensore4[ZERO][UNO] ?></td>
                                        	<td><?= $Sensore4[ZERO][DUE] ?></td>
                                        	<td><?= $Sensore4[ZERO][TRE] ?></td>
                                                <td><?= $Sensore4[ZERO][QUATTRO] ?></td>
                                                <td><?= $Sensore4[ZERO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit41"  value="Remove"/>
                                                     <?php if(isset($Sensore4[ZERO][SEI])){
                                                            removeSensore1($Sensore4[ZERO][SEI], 'submit41');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore4[UNO][ZERO] ?></td>
                                        	<td><?= $Sensore4[UNO][UNO] ?></td>
                                        	<td><?= $Sensore4[UNO][DUE] ?></td>
                                        	<td><?= $Sensore4[UNO][TRE] ?></td>
                                                <td><?= $Sensore4[UNO][QUATTRO] ?></td>
                                                <td><?= $Sensore4[UNO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit42"  value="Remove"/>
                                                     <?php if(isset($Sensore4[UNO][SEI])){
                                                            removeSensore1($Sensore4[UNO][SEI], 'submit42');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore4[DUE][ZERO] ?></td>
                                        	<td><?= $Sensore4[DUE][UNO] ?></td>
                                        	<td><?= $Sensore4[DUE][DUE] ?></td>
                                        	<td><?= $Sensore4[DUE][TRE] ?></td>
                                                <td><?= $Sensore4[DUE][QUATTRO] ?></td>
                                                <td><?= $Sensore4[DUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit43"  value="Remove"/>
                                                     <?php if(isset($Sensore4[DUE][SEI])){
                                                            removeSensore1($Sensore4[DUE][SEI], 'submit43');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore4[TRE][ZERO] ?></td>
                                        	<td><?= $Sensore4[TRE][UNO] ?></td>
                                        	<td><?= $Sensore4[TRE][DUE] ?></td>
                                        	<td><?= $Sensore4[TRE][TRE] ?></td>
                                                <td><?= $Sensore4[TRE][QUATTRO] ?></td>
                                                <td><?= $Sensore4[TRE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit44"  value="Remove"/>
                                                     <?php if(isset($Sensore4[TRE][SEI])){
                                                            removeSensore1($Sensore4[TRE][SEI], 'submit44');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore4[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensore4[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensore4[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensore4[QUATTRO][TRE] ?></td>
                                                <td><?= $Sensore4[QUATTRO][QUATTRO] ?></td>
                                                <td><?= $Sensore4[QUATTRO][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit45"  value="Remove"/>
                                                     <?php if(isset($Sensore4[QUATTRO][SEI])){
                                                            removeSensore1($Sensore4[QUATTRO][SEI], 'submit45');    
                                                     }?>
                                                    </form>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensore4[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensore4[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensore4[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensore4[CINQUE][TRE] ?></td>
                                                <td><?= $Sensore4[CINQUE][QUATTRO] ?></td>
                                                <td><?= $Sensore4[CINQUE][CINQUE] ?> </td>
                                                <td><form method="post">
                                                     <input type="submit" name="submit46"  value="Remove"/>
                                                     <?php if(isset($Sensore4[CINQUE][SEI])){
                                                            removeSensore1($Sensore4[CINQUE][SEI], 'submit46');    
                                                     }?>
                                                    </form>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>



        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">IoT Solutions</a>, made with passion
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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>

