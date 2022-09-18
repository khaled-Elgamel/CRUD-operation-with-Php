<?php
$id = $_REQUEST['id'];
$db="mysql:host=localhost;dbname=iti2022";
$con = new PDO($db,'root','');
$de = "delete from users where id=$id";
$sql = $con->prepare($de);
$result = $sql->execute();
//$user = $sql->fetch(PDO::FETCH_ASSOC);
$users = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<script> alert('User has been successfully deleted'); 
window.location.replace("index.php");

</script>