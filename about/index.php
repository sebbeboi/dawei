<html> 
<head>

</head>

<body>
<?php

include("../templates/navigation.php");

?>

<style>
.parallax {
    /* The image used */
    background-image: url("03.jpg");

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    
    .parallax2{
    /* The image used */
    background-image: url("eskde.jpg");

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    
    
}
    .parallax3{
    /* The image used */
    background-image: url("lunch1.jpg");

    /* Set a specific height */
    min-height: 500px; 

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    
    
}
    
    p{
        text-align: center;
        font-size: 3em;
        padding: 5px;
        background-color: blueviolet;
    }
    
    
</style>
<p>Våran historia</p>

<div class="parallax"></div>
<div style="height:200px;background-color:blueviolet;font-size:36px">
Eskde

<div class="parallax2"></div>
<div style="height:200px;background-color:blueviolet;font-size:36px">
Eskde
<div class="parallax3"></div>

</div>
</body>
</html>