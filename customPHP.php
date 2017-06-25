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
                                       
    
    $mysqli->close();

