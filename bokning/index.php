
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
</style> 


<?php

include("../templates/navigation.php"); // hämtar NAVen från sökvägen dawei

$dbc = mysqli_connect("localhost","root","","dawei");

if (isset($_POST['name']) && (isset ($_POST['date'])) && (isset($_POST['time'])) && isset($_POST['persons'])){ // om något i form så kommer den skicka vidare det till databasen 
    
    $antal = $_POST['persons'];
    
    $query = "SELECT * FROM bord WHERE bord_platser > $antal";

    $result = mysqli_query($dbc,$query);
    
    if ($table = mysqli_fetch_array($result)){ // detta ser till att allt ska vara det det ska vara smil eskde 
        $namn = $_POST['name'];
        $tid = $_POST['time'];
        $datum = $_POST['date'];
        $extra = $_POST['text'];
        $table_id = $table['bord_id'];
        
        $query = "INSERT INTO bokning
        (bokning_namn,bokning_datum,bokning_tid,bokning_bord,bokning_antal,bokning_extra)
        VALUES
        ('$namn', '$datum','$tid',$table_id,$antal,'$extra');";
        $result = mysqli_query($dbc,$query);
       
    }
        else{
            echo "inga bord lediga"; // I fall inga bord finns lediga i batabasen
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