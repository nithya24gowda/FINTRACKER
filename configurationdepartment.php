<?php  
//include 'config.php'; 

?>


<style>
a:link, a:visited {
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: red;
}


h1 {
    text-align: top right;
    text-transform: uppercase;
    color: Tomato;
    background-color:   #00FFFF;
    padding: 30px;
}


</style>


                     
                     
                    
               


 
    <!-- Right Panel -->



<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

a:link, a:visited {
    background-color: MediumSeaGreen;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
  

</style>
  <h1>CONFIGURATION</h1>

        <div1 class="breadcrumbs inventory"  >

                <div1 class="page-header float-left" >
                    <div1 class="page-title" >
                        <div class="header-menu" style="margin-left:50px;">

                
          <a href="configurationuser.php" id ="configuration-user" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationuser.php')?'activeSubMenu':'');?>" >&nbsp;User</a>  
          <a href="configurationorganisation.php" id ="configuration-organisation" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationorganisation.php')?'activeSubMenu':'');?>">&nbsp; Organisation</a>
          <a href="configurationdepartment.php" id ="configuration-department" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationdepartment.php')?'activeSubMenu':'');?>">&nbsp; Department</a> 
          <a href="configurationproject.php" id ="configuration-project" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationproject.php')?'activeSubMenu':'');?>">&nbsp; Project</a> 
          <a href="configurationrole.php" id ="configuration-role" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationrole.php')?'activeSubMenu':'');?>">&nbsp; Role</a> 
           <a href="configurationcosting.php" id ="configuration-costing" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationcosting.php')?'activeSubMenu':'');?>">&nbsp; Costing</a>  
        
          <a href="header.php" class="btn buttons_color bactive"> <i class="fa fa-tachometer "> </i>&nbsp; <span>HOME</span></a>
                     
          
                     
                     
                    
                </div></div1>
 
            </div1>

                    
                </div1>
</head>
<body>


<h2>DEPARTMENT DETAILS</h2>

<?php include('serverdept.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
  $dept_id=$_GET['edit'];
  $edit_state=true;
  $rec = mysqli_query($db,"SELECT * FROM department WHERE dept_id=$dept_id");
  $record=mysqli_fetch_array($rec);
  $dept_id=$record['dept_id'];
  $dept_name=$record['dept_name'];
  $org_id=$record['org_id'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title> configuration</title>
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
  

</body>
</html>



<a href="adddept.php" id ="configuration-department" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='configurationdepartment.php')?'activeSubMenu':'');?>" >&nbsp;Add New</a>  
<br><br>
<table>
        <thead>
          <tr>
            <th>dept_id</th>
            <th>dept_name</th>
            <th>org_id</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row= mysqli_fetch_array($results)){ ?>
            <tr>
              <td>
                <?php echo $row['dept_id']; ?>
              </td>
              <td>
                <?php echo $row['dept_name']; ?>
              </td>
              <td>
                <?php echo $row['org_id']; ?>
              </td>
              <td>
                <a class="edit_btn" href="adddept.php?edit=<?php echo $row['dept_id']; ?>">Edit</a>
              </td>
              <td>
                <a class="del_btn" href="serverdept.php?del=<?php echo $row['dept_id']; ?>">Delete</a>
              </td>
              <td>
                
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>
</form>
 </body>
</html>
