<?php
$id = $_REQUEST['id'];
$db="mysql:host=localhost;dbname=iti2022";
$con = new PDO($db,'root','');
$query = "SELECT * from users where id = $id";
$sql = $con->prepare($query);
$result = $sql->execute();
$user = $sql->fetch(PDO::FETCH_ASSOC);
?>
<form method="post" action="index.php">
Name:<br>
    <input type="text" name="name" value="<?php echo $user['name']?>"><br>
Email:<br>
    <input type="email" name="email" value="<?php echo $user['email']?>"><br>
Image:<br>
    <input type="text" name="image" value="<?php echo $user['image']?>">
    <input type="hidden" name="id" value="<?php echo $id?>"><br>
    <input type="submit" name="save" value="submit">
</form>


<?php
if(isset($_POST['save']))
{	 
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Image = $_POST['image'];
    $id = $_REQUEST['id'];
     $update= "UPDATE `users` SET `name` = '$Name',`email`='$Email',`image`='$Image' WHERE `users`.`id` = $id"; 
     $sql = $con->prepare($update);
     $result = $sql->execute();
     $user = $sql->fetch(PDO::FETCH_ASSOC);

?>

<script> alert('User has been successfully updated'); 
window.location.replace("index.php");
</script>


<?php  } ?>

