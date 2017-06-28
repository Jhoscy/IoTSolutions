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

function selectSensore(){
  require 'db.php';
    $sqlS='SELECT * FROM sensore';
    if(isset($mysqli)){
         $resultS=$mysqli->query($sqlS);
    }
    if($resultS->num_rows>0){
         while($row=$resultS->fetch_assoc()){
           $Sensore[$row['ID']]=array($row['ID'], $row['MARCA'], $row['TIPO'], $row['UNITAMISURA']);
         //echo " Sensori: ".$row['ID'], " MARCA: ".$row['MARCA'], " VALORE: ".$row['TIPO'], " MISURA: ".$row['UNITAMISURA'];
         }
      }
      return $Sensore;
  
}
$Sensori= selectSensore();


    function get_options(){
        require 'db.php';
          
             $sqlA='SELECT * FROM ambiente';
             $resultA=$mysqli->query($sqlA);
    
             if($resultA->num_rows>0){
               while($row=$resultA->fetch_assoc()){
                   $str='<option value=' .$row['Nome']. '>'. $row['NOME'].'</option>';
                    echo $str;
                      }
               }else {
                  echo '0 results';
                   }
                   
    }
    
    function insert_into_monitora($IDsensore, $nomeAmbiente, $a){
        require 'db.php';
        
        $sql="SELECT ID FROM ambiente WHERE NOME='$nomeAmbiente'";
        $result=$mysqli->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $IDambiente=$row['ID'];
                
            }
             $sql1="INSERT INTO monitora (ID, IDambiente, IDsensore) VALUES($a,$IDambiente,$IDsensore)";
             $result=$mysqli->query($sql1);
        }
    }
    
    
       
    
    //echo getLastID();
    
    function getPOSTambienti1 (){
       $ambiente= filter_input(INPUT_POST, 'ambienti1');
       return $ambiente;
}

function getPOSTambienti2(){
    $ambiente=filter_input(INPUT_POST, 'ambienti2');
    return $ambiente;
}

function getPOSTambienti3(){
    $ambiente=filter_input(INPUT_POST, 'ambienti3');
    return $ambiente;
}
function getPOSTambienti4(){
    $ambiente=filter_input(INPUT_POST, 'ambienti4');
    return $ambiente;
}
function getPOSTambienti5(){
    $ambiente=filter_input(INPUT_POST, 'ambienti5');
    return $ambiente;
}
function getPOSTambienti6(){
    $ambiente=filter_input(INPUT_POST, 'ambienti6');
    return $ambiente;
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
                                <h4 class="title">Sensori</h4>
                                <p class="category">Lista dei sensori disponibili</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Nome</th>
                                    	<th>Valore</th>
                                    	<th>Misura</th>
                                    	<th>Add Sensore</th>
                                        
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            
                                                <td><?= $Sensori[UNO][ZERO] ?></td>
                                        	<td><?= $Sensori[UNO][UNO] ?></td>
                                        	<td><?= $Sensori[UNO][DUE] ?></td>
                                        	<td><?= $Sensori[UNO][TRE]?></td>
                                                <td>
                                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti1" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                    </select>
                                                    <?php $nomeAmbiente1= getPOSTambienti1();
                                                    $incr=getLastID();
                                                    echo insert_into_monitora( $Sensori[UNO][ZERO] , $nomeAmbiente1, ++$incr);
                                                     ?>
                                                    </form>
                                                </tr>
                                        <tr>
                                        	<td><?= $Sensori[DUE][ZERO] ?></td>
                                        	<td><?= $Sensori[DUE][UNO] ?></td>
                                        	<td><?= $Sensori[DUE][DUE] ?></td>
                                        	<td><?= $Sensori[DUE][TRE] ?></td>
                                                <td>
                                                     <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti2" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                   </select>
                                                    <?php $nomeAmbiente2= getPOSTambienti2();
                                                    $incr2=getLastID();
                                                    echo insert_into_monitora( $Sensori[DUE][ZERO] , $nomeAmbiente2, ++$incr2);?>
                                                         
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensori[TRE][ZERO] ?></td>
                                        	<td><?= $Sensori[TRE][UNO] ?></td>
                                        	<td><?= $Sensori[TRE][DUE] ?></td>
                                        	<td><?= $Sensori[TRE][TRE] ?></td>
                                                <td>
                                                      <form action="<?php echo htmlspecial($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti3" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                   </select>
                                                    <?php $nomeAmbiente3= getPOSTambienti3();
                                                         $incr3=getLastID();
                                                    echo insert_into_monitora( $Sensori[TRE][ZERO] , $nomeAmbiente3,++$incr3);?>     
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensori[QUATTRO][ZERO] ?></td>
                                        	<td><?= $Sensori[QUATTRO][UNO] ?></td>
                                        	<td><?= $Sensori[QUATTRO][DUE] ?></td>
                                        	<td><?= $Sensori[QUATTRO][TRE] ?></td>
                                                <td>
                                                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti4" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                   </select>
                                                    <?php $nomeAmbiente4= getPOSTambienti4();
                                                         $incr4=getLastID();
                                                    echo insert_into_monitora( $Sensori[QUATTRO][ZERO] , $nomeAmbiente4,++$incr4);?>     
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensori[CINQUE][ZERO] ?></td>
                                        	<td><?= $Sensori[CINQUE][UNO] ?></td>
                                        	<td><?= $Sensori[CINQUE][DUE] ?></td>
                                        	<td><?= $Sensori[CINQUE][TRE] ?></td>
                                                <td>
                                                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti5" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                   </select>
                                                    <?php $nomeAmbiente5= getPOSTambienti5();
                                                         $incr5=getLastID();
                                                    echo insert_into_monitora( $Sensori[CINQUE][ZERO] , $nomeAmbiente5,++$incr5);?>     
                                                    </form>
                                                </td>
                                        </tr>
                                        <tr>
                                        	<td><?= $Sensori[SEI][ZERO] ?></td>
                                        	<td><?= $Sensori[SEI][UNO] ?></td>
                                        	<td><?= $Sensori[SEI][DUE] ?></td>
                                        	<td><?= $Sensori[SEI][TRE] ?></td>
                                                <td>
                                                       <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                                    <select name="ambienti6" onchange="this.form.submit();">
                                                    <?php echo get_options();?>
                                                   </select>
                                                    <?php $nomeAmbiente6= getPOSTambienti6();
                                                         $incr6=getLastID();
                                                    echo insert_into_monitora( $Sensori[SEI][ZERO] , $nomeAmbiente6,++$incr6);?>     
                                                    </form>
                                                </td>
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
