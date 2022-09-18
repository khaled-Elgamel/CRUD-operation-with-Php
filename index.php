<?php
$db="mysql:host=localhost;dbname=iti2022";
$con = new PDO($db,'root','');
$query = "SELECT * from users";
$sql = $con->prepare($query);
$result = $sql->execute();
$users = $sql->fetchAll(PDO::FETCH_ASSOC);



?>
<link rel="stylesheet" href="main.css">
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user):?>
            <tr>
                <td><?php echo $user['name']?></td>
                <td><?php echo $user['email']?></td>
                <td><?php echo $user['image']?></td>
                <td><?php echo $user['created_at']?></td>
                <td>
                    <form action="update.php">
                        <input type="hidden" name="id" value="<?php echo $user['id']?>">
                        <button type=submit>Update</button>
                    </form>
                    <form action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id']?>">
                        <button type=submit>Delete</button>
                    </form>

                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<form action="create.php">
<button type=submit style="margin-left: 650px;">Create a new user</button>
</form>
