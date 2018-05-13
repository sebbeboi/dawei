<html>

<head>
    
</head>
<body>
    
    
<?php
    include("../templates/navigation.php");
?>


<div id="review_form_container">
<?php

    $dbc = mysqli_connect();
    
    if(isset($_POST['author']) && isset($_POST['text']) && isset($_POST['stars'])){
       
        
        $author = $_POST['author'];
        $text = $_POST['text'];
        $stars = $_POST['stars'];
        
        $query = "INSERT INTO reviews (author,text,stars) VALUES ('$author','$text','$stars');";

        if(mysqli_query($dbc,$query)){
            
            ?>
            <p id="thanks">Tack för din recension!</p>
            <?php
            
        }
        else{
            ?>
            <p id="thanks">Ett fel inträffade med din recension!</p>
            <?php
        }
    
    }else{
    
    
?>


<form id="review_form" method="POST">

Ditt namn: <input type="text" name="author"/><br>
Recension: <input type="textfield" name="text"/><br>
Betyg: <input id="slider" type="range" min="1" max="5" step="1" name="stars"/><span id="value">1</span><br>
<input type="submit" value="Skicka"/>
</div>

<script>

var slider = document.getElementById("slider");

slider.oninput = function (){
    document.getElementById("value").innerHTML = slider.value;
    
    
};


</script>
<?php
}
?>


<div id="reviews_container">
<p id="reviews_headline"> Våra 10 senaste recensioner:</p>
<?php

    $query = "SELECT * FROM reviews ORDER BY reviews_id DESC LIMIT 10;";
    
    $result = mysqli_query($dbc,$query);
    
    while($row = mysqli_fetch_array($result)){
        
        echo $row['reviews_text'] . "<br>";
        
    }
    
    
    
    
?>

</div>
    
    
    
    </body>
    
    </html>