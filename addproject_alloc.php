<?php include('serverproject.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
    $project_id=$_GET['edit'];
    $edit_state=true;
    $rec = mysqli_query($db,"SELECT * FROM project_alloc WHERE project_id=$project_id");
    $record=mysqli_fetch_array($rec);
    $project_id=$record['project_id'];
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
    
          
<form method="post" action="serverproject.php">
<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
<div class="input-group">
<label>project_id</label>
<input type="text" name="project_id" value="<?php echo $project_id; ?>">
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

