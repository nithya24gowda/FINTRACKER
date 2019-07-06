<?php include('servercosting.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
    $costing_id=$_GET['edit'];
    $edit_state=true;
    $rec = mysqli_query($db,"SELECT * FROM costing WHERE costing_id=$costing_id");
    $record=mysqli_fetch_array($rec);
    $costing_id=$record['costing_id'];
    $costing_name=$record['costing_name'];
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
    
          
<form method="post" action="servercosting.php">
<input type="hidden" name="costing_id" value="<?php echo $costing_id; ?>">
<div class="input-group">
<label>costing_id</label>
<input type="text" name="costing_id" value="<?php echo $costing_id; ?>">
</div>
<div class="input-group">
<label>costing_name</label>
<input type="text" name="costing_name" value="<?php echo $costing_name; ?>">
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
