<?php include('serveruser.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
    $user_id=$_GET['edit'];
    $edit_state=true;
    $rec = mysqli_query($db,"SELECT * FROM user WHERE user_id=$user_id");
    $record=mysqli_fetch_array($rec);
    $user_id=$record['user_id'];
    $user_name=$record['user_name'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Configuration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php if(isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
        <?php endif ?>
    
          
<form method="post" action="serveruser.php">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<div class="input-group">
<label>user_id</label>
<input type="text" name="user_id" value="<?php echo $user_id; ?>">
</div>
<div class="input-group">
<label>user_name</label>
<input type="text" name="user_name" value="<?php echo $user_name; ?>">
</div>
<div class="input-group">
<?php if($edit_state==false): ?>
<button type="submit" name="save" class="btn">save</buttoon>
<?php else: ?>
<button type="submit" name="update" class="btn">update</buttoon>
<?php endif ?>

</div>
</form>
</body>
</html>

