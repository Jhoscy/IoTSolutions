<?php

function refresh(){
     echo "<meta http-equiv='refresh' content='0'>";
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
     $codiceFiscale=filter_input(INPUT_POST, 'codiceFiscale');
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
        $SQL="SELECT id FROM users WHERE email='$email'";
        $result=$mysqli->query($SQL);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $ID=$row['id'];
            }
        }
        $mysqli->close();
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
        $SQL = "UPDATE users SET NAZIENDA='$nomeAzienda', Sede='$sede', Indirizzo='$indirizzo', PIVA='$PIVA', CODFIS='$codiceFiscale', CAP='$cap', telefono='$telefono', "
                . " id=$ID, first_name='$nome', last_name='$cognome' WHERE email='$email'";
        $mysqli->query($SQL);
        $mysqli->close();
       
    }
    
    function getLastID(){
        require 'db.php';
        $sql='SELECT ID FROM monitora WHERE ID=(SELECT MAX(ID) FROM monitora)';
        $result=$mysqli->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
              $lastID=$row['ID'];
            }
        }else{
              $row['ID']=0;
              $lastID=$row['ID'];
            }
               return $lastID;  
        }
        
    function getUserID($email){
        require 'db.php';
        $sql="SELECT ID FROM users WHERE email='$email'";
        $result=$mysqli->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
            $IDutente=$row['ID'];
            }
            return $IDutente;
        }
    }
        
        function getIDambiente($nomeAmbiente){
    require 'db.php';
    $sql="SELECT ID FROM ambiente WHERE nome='$nomeAmbiente'";
    $result=$mysqli->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $IDambiente=$row['ID'];
        }
    }
    $mysqli->close();
    return $IDambiente;
}


function removeSensore1($IDriga, $submit){
     require 'db.php';
     if(isset($_POST[$submit])){
           $SQL="DELETE FROM monitora WHERE ID=$IDriga";
           $mysqli->query($SQL);
              echo refresh();
         }
        
    }
    
function mostraSensore($nomeAmbiente){
     require 'db.php';
      $IDambiente= getIDambiente($nomeAmbiente);
      $sqlA='SELECT m.ID, s.marca, s.tipo, m.valore, m.data, m.ora, s.unitamisura'
                . ' FROM sensore s JOIN monitora m ON s.ID=m.IDsensore'
                . " WHERE IDambiente=$IDambiente";
      
                 if(isset($mysqli)){
                      $result=$mysqli->query($sqlA);
                      
                      }
                                
                  if(!isset($result)){
                     trigger_error('invalid query');
                    }
                  if($result->num_rows>0){
                      $SensoreDato[getLastID()]=0;
                      $i=0;
                        while($row=$result->fetch_assoc()){
                            $SensoreDato[$i]=array($row['marca'], $row['tipo'], $row['unitamisura'], $row['valore'], $row['data'],$row['ora'], $row['ID']);
                            $i++;
                            }
                            if($i<6){
                                for($j=$i; $j<6; $j++){
                                 $SensoreDato[$j]=array(0,0,0,0,0,0);
                                }
                      }
                  }else{
                      for($i=0; $i<6; $i++){
                          $SensoreDato[$i]=array(0,0,0,0,0,0);
                      }
                  }
                    
        $mysqli->close();
        
        return $SensoreDato;
}

    function get_options(){
        require 'db.php';
          
             $sqlA='SELECT * FROM ambiente';
             $resultA=$mysqli->query($sqlA);
    
             if($resultA->num_rows>0){
               while($row=$resultA->fetch_assoc()){
                   $str='<option value="'.$row['NOME'].'">'.$row['NOME'].'</option>';
               echo $str;
                      }
               }else {
                  echo '0 results';
                   }
                   
    }
    
    function insert_into_monitora($IDsensore, $nomeAmbiente, $a, $valore, $data, $ora){
        require 'db.php';
        $sql="SELECT ID FROM ambiente WHERE NOME='$nomeAmbiente'";
        $result=$mysqli->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $IDambiente=$row['ID'];
                
            }
           
             $sql1="INSERT INTO monitora (ID, IDambiente, IDsensore, VALORE, DATA, ORA) VALUES($a,$IDambiente,$IDsensore,'$valore','$data','$ora')";
             $mysqli->query($sql1);
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
   
function selectSensore(){
  require 'db.php';
    $sqlS='SELECT * FROM sensore';
    if(isset($mysqli)){
         $resultS=$mysqli->query($sqlS);
    }
    if($resultS->num_rows>0){
         while($row=$resultS->fetch_assoc()){
           $Sensore[$row['ID']]=array($row['ID'], $row['MARCA'], $row['TIPO'], $row['UNITAMISURA']);
        
         }
      }
      return $Sensore;
  
}

function count_decimals($x){
   return  strlen(substr(strrchr($x+'', '.'), 1));
}

function random($min, $max){
   $decimals = max(count_decimals($min), count_decimals($max));
   $factor = pow(10, $decimals);
   return rand($min*$factor, $max*$factor) / $factor;
}

 function getDati($email){
        require 'db.php';
        $IDutente= getUserID($email);
        $sql='SELECT a.NOME, s.MARCA, s.TIPO, m.VALORE, s.UNITAMISURA, m.DATA, m.ORA '.
                    'FROM MONITORA m JOIN AMBIENTE a ON m.IDambiente=a.ID JOIN SENSORE s ON m.IDsensore=s.ID '.
                    "WHERE IDcliente=$IDutente";
        $result=$mysqli->query($sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                $str='<tr><td>'. $row['NOME'].  ' </td><td>'.  $row['MARCA'].  ' </td><td>'.  $row['TIPO'].  ' </td><td>'.  $row['VALORE'].  ' </td><td>'. $row['UNITAMISURA'].  ' </td><td>'.  $row['DATA'].  ' </td><td>'.  $row['ORA']. ' </td><tr>';
                echo  htmlspecialchars($str);
                
            }
            
        }
        
    }

                                                                
    $mysqli->close();

