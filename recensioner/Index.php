<html>

<head>
    
</head>
<body>
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

#review_form {
    border-radius: 5px;
    background-color: lightsalmon;
    padding: 20px;
    width: 500px;
    height: auto;

}
#slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
    margin-top: 10px;
}

#slider:hover {
    opacity: 1;
}

#slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

#slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
</style> 
    
<?php
    include("../templates/navigation.php");
?>


<div id="review_form_container">
<?php

    $dbc = mysqli_connect("localhost","root","","dawei");
    
    if(isset($_POST['author']) && isset($_POST['text']) && isset($_POST['stars'])){
       
        
        $author = $_POST['author'];
        $text = $_POST['text'];
        $stars = $_POST['stars'];
        
        $query = "INSERT INTO reviews (reviews_author,reviews_text,reviews_stars) VALUES ('$author','$text','$stars');";

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

Ditt namn <input type="text" name="author"/><br>
Recension <input type="text" name="text"/><br>
Betyg <input id="slider" type="range" min="1" max="5" step="1" name="stars"/><span id="value">3</span>/5<br>
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
<p id="reviews_headline"> Våra 10 senaste recensioner</p>
<?php

    $query = "SELECT * FROM reviews ORDER BY reviews_id DESC LIMIT 10;";
    
    $result = mysqli_query($dbc,$query);
    
    while($row = mysqli_fetch_array($result)){
        
        echo '<div class="review_content">';
        echo $row['reviews_author'] .  " tycker:<br>";
        echo $row['reviews_text'] . "<br>";
        echo '<div class="stars">';
        $stars = $row['reviews_stars'];	
        for($i = 0 ; $i < $stars ; $i++){
        ?>
            <img width="25px" height="25px" src="../imgs/star.png" />
        
    <?php 
                                        
            } 
    
        echo "</div>";
        echo "</div>";
    }
    
    
    
    
?>

</div>
    
    
    
    </body>
    
    </html>