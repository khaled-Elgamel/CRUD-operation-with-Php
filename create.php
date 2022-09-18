
<form method="post" action="create.php">
		Name:<br>
		<input type="text" name="Name">
		<br>
		Email:<br>
		<input type="email" name="Email">
		<br>
		Password:<br>
		<input type="password" name="Password">
		<br>
		Image:<br>
		<input type="text" name="Image">
		<br><br>
		<input type="submit" name="save" value="submit">
	</form>

    <?php

    
if(isset($_POST['save']))
{	 
	 $Name = $_POST['Name'];
	 $Email = $_POST['Email'];
	 $Password = $_POST['Password'];
	 $Image = $_POST['Image'];



     $db="mysql:host=localhost;dbname=iti2022";
     $con = new PDO($db,'root','');
     $query ="INSERT INTO `users` (`name`, `email`, `password`, `image`)
	 VALUES ('$Name','$Email','$Password','$Image')";
     $sql = $con->prepare($query);
     $result = $sql->execute();
     $user = $sql->fetch(PDO::FETCH_ASSOC);

    

?>

<script> alert('User has been successfully added'); 
window.location.replace("index.php");
</script>


<?php  } ?>





























