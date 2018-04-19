<?php

include("../templates/navigation.php");

$dbc = mysqli_connect("localhost","root","","dawei")

if (isset($_POST['name'])) && (isset ($_POST['date'])) && (isset($_POST['time'])) && (isset($_POST['persons'])){
    
    $antal = $_POST ['persons'];
    
    $query = "SELCET * FROM bord WHERE bord_platser > $antal";
    
    $result = mysqli_query($dbc,$query);
    
    if ($table = mysqli_fetch_array($result)){
         $name = $_POST['name']
        $tid = $_POST['time']
        $datum = $_POST['date']
        $extra = $_POST['extra']
        $table_id = $table['id'];
        
        $query = "INSERT INTO bokning
        (boking_name,bokning_datum,bokning_tid,bokning_bord,bokning_antal,bokning_extra)
        VALUES
        ('$name', '$datum','$tid',$table_id,$antal,'$extra');";
    
    }
        else{
            echo "inga bord lediga"
        }
        
       
    
            
    }
    
}






?>
bokning


<form method="POST" action="">

Namn: <input type="text" name="name">
Datum: <input type="date" name="date">
Tid: <input type="time" name="time">
Antal personer: <input type="number" name="persons">
extra: <input type="text" name="text">
<input type="submit"/>
</form>

</body>
</html>