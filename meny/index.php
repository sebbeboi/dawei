<?php

include("../templates/navigation.php");

$dbc = mysqli_connect("localhost","root","","dawei");
mysqli_query($dbc,"SET NAMES UTF8");

$query = "SELECT * FROM dishes";
$result = mysqli_query($dbc,$query);

$n = 0;
while($row = mysqli_fetch_array($result)){
	$n++;
	?>
	<!-- PHP = bryt float varannan rätt -->
	<div class="dish-container <?php if($n%2==1){echo "break";};?>">

	<div class="dish-name"> <!-- skriv ut n och rättens namn -->
		<p><?php echo $n . ". " .$row['dishes_name'];?> </p>
	</div>
	
	<?php // Skriv ut antal chilis som rätten är "hot"
	$hotness = $row['dishes_hot'];	
	for($i = 0 ; $i < $hotness ; $i++){?>
		<img class="chili" width="25px" src="../imgs/chili.png" />
	<?php } ?>
	
	<div class="dish-desc"> 
		<p><?php echo $row['dishes_description'];?></p>
	</div>
	
	<div class="dish-price"> 
		<p> <?php echo $row['dishes_price'];?>:-</p>
	</div>
	
</div>
<?php	
}	 // avsluta while-loop
?>


</body>
</html>