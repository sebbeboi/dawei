<html>

<head>
    
</head>
<body>
    
    
<?php
    include("../templates/navigation.php");
?>


<div id="review_form_container">

<form id="review_form">

Ditt namn: <input type="text" name="author"/><br>
Recension: <input type="textfield" name="text"/><br>
Betyg: <input id="slider" type="range" min="1" max="5" step="1" name="stars"/><span id="value">1</span><br>
<input type="submit" />
</div>

<script>

var slider = document.getElementById("slider");

slider.oninput = function (){
    document.getElementById("value").innerHTML = slider.value;
    
    
};


</script>



<div id="reviews_container">


</div>
    
    
    
    </body>
    
    </html>