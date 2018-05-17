
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


if(isset($_GET['book'])){
    
    $tables = explode("o",$_GET['book']);
    
    for($i = 0 ; $i < count($tables)  ; $i++){
        
        echo $tables[$i];
        
    }
    
}




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




<style>

    .whole-table, .whole-table-occupied,.whole-table-chosen{
        width:300px;
        height:300px;
        float:left;
    }
   
    .whole-table-chosen .chair{
       background-color: yellow
    }
    
    .whole-table-chosen .table{
       background-color: yellow
    }
   
   .whole-table-occupied .chair{
       background-color: red
    }
    
    .whole-table-occupied .table{
       background-color: red
    }
    
    .whole-table .chair{
       background-color: lightgreen
    }
    
    .whole-table .table{
       background-color: lightgreen
    }
    
   .whole-table:hover .chair{
       background-color: yellow
    }
    
    .whole-table:hover .table{
       background-color: yellow
    }
    
    
    .chair{
        width:96px;
        height:96px;
        border:2px solid black;
        border-radius: 100%;
        background-color: inherit;
        float:left;
    }
    
    .table{
        float:left;
        width:96px;
        height:96px;
        background-color: inherit;
        border:2px solid black;
    }
    
    .hidden{
        float:left;
        width:100px;
        height:100px;
        background-color: white;
    }

</style>

<script>

    function choseTable(table){
        
        if(table.className == "whole-table-chosen"){
        table.className = "whole-table";            
        }
        else{
        table.className = "whole-table-chosen";
        }
        
    
    
    }
    
    
    
    function submitForm(){
    
        tables = document.getElementsByClassName("whole-table-chosen");
        tableString = "";
        for(i = 0 ; i < tables.length ; i++){
            table = tables[i];
            tableString += table.id;
            if(i != tables.length-1){
            tableString += "o";
                
            }
                    
        }

        location.replace("?book=" + tableString);
        return false;
    }

</script>

<div class="tables-container">

    <?php
    
    
    $dbc = mysqli_connect("localhost","root","","dawei");
    mysqli_query($dbc,"SET NAMES UTF8");

    $query = "SELECT * FROM bord";
    $result = mysqli_query($dbc,$query);

    while($row = mysqli_fetch_array($result)){
        ?>
    
    
    <div onmousedown="choseTable(this)" id="<?php echo $row['bord_id']; ?>" class="whole-table">
    <div class="hidden">
    </div>
    <div class="chair">
    </div>
    <div class="hidden">
    </div>
    <div class="chair">
    </div>
    <div class="table">
    </div>
    <div class="chair">
    </div>
    <div class="hidden">
    </div>
    <div class="chair">
    </div>
    <div class="hidden">
    </div>
</div>
 <?php
    }
    ?>



</div>

<form method="POST" action="" onsubmit="return submitForm()">
Namn: <input type="text" name="name">
Datum: <input type="date" name="date">
Tid: <input type="time" name="time">
Extra: <input type="text" name="text">
<input type="submit"/>
</form>

</body>
</html>