<html>

<?php  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Get Database
$sql = "SELECT id, name, password, activated FROM members";

$result = $conn->query($sql);

$conn->close();

include 'assets/php/include.php';
?>

<body>
	
<div class="navigation">
    <ul>
      <a href="#"><li class="logo hvr-pulse-grow">Husky</li></a>
      <div>
      <a href="#"><li class="hvr-underline-from-center">Home</li></a>
      <a href="#"><li class="hvr-underline-from-center">Forums</li></a>
      <a href="#"><li class="hvr-underline-from-center">Store</li></a>
      </div>
    </ul>
  </div>


 <div align="center">
    <div class="splash">
      Put something important!
      <small><?php 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " Password: " . $row["password"]. " Activated: " .  $row["activated"]. "<br>";
    }
} else {
    echo "0 results";
} 

	if ($row["activated"] == 0) {
		echo "THE ACCOUNT " . $row["name"]. " IS NOT ACTIVATED!";
		echo "Name: " . $row["name"]. " Password: " . $row["password"]. " Activated: " .  $row["activated"]. "<br>";
	} ?></small>
		</div>

</body>

</html>

<script type="text/javascript">
	$(function(){
  $(window).scroll(function(){
    if($(this).scrollTop() >= 1){
      $('.navigation').addClass('solid');
    } else {
      $('.navigation').removeClass('solid');
    }
  });
});
</script>