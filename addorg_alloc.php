<?php include('serverorg.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
    $org_id=$_GET['edit'];
    $edit_state=true;
    $rec = mysqli_query($db,"SELECT * FROM org_alloc WHERE org_id=$org_id");
    $record=mysqli_fetch_array($rec);
    $org_id=$record['org_id'];
    $allocation=$record['allocation'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Operations</title>
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
    
          
<form method="post" action="serverorg.php">
<input type="hidden" name="org_id" value="<?php echo $org_id; ?>">
<div class="input-group">
<label>org_id</label>
<input type="text" name="org_id" value="<?php echo $org_id; ?>">
</div>
<div class="input-group">
<label>allocation</label>
<input type="text" name="allocation" value="<?php echo $allocation; ?>">
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

