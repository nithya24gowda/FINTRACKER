<?php  
//include 'config.php'; 

?>


<style>
a:link, a:visited {
    background-color: #388222;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: black;
}


h1 {
    text-align: top right;
    text-transform: uppercase;
    color: white;
    background-color: orange;
    padding: 30px;
	width: 200%;
}


body {
    background-image: url("operation.jpg");
    background-repeat:no-repeat; 
    background-position: center;
    margin-right: 200px;
}

</style>

<h1>OPERATIONS</h1>

        <div1 class="breadcrumbs inventory"  >

                <div1 class="page-header float-left" >
                    <div1 class="page-title" >
                        <div class="header-menu" style="margin-left:50px;">

                
          <a href="org_alloc.php" id ="org_alloc" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='org_alloc.php')?'activeSubMenu':'');?>" >&nbsp;org_alloc</a>  
          <a href="dept_alloc.php" id ="dept_alloc" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='dept_alloc.php')?'activeSubMenu':'');?>">&nbsp; dept_alloc</a>
          <a href="project_alloc.php" id ="project_alloc" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='project_alloc.php')?'activeSubMenu':'');?>">&nbsp;project_alloc</a> 
          <a href="project_costing.php" id ="project_costing" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='project_costing.php')?'activeSubMenu':'');?>">&nbsp;project_costing</a> 
          <a href="project_tracker.php" id ="project_tracker" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='project_tracker.php')?'activeSubMenu':'');?>">&nbsp;project_tracker</a> 
           
         
          
                     
                     
                    
                </div></div1>
 
            </div1>

                    
                </div1>
       
            


 
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
</head>
<body>


<h2>DEPT_ALLOC DETAILS</h2>

<?php include('serverdept.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
  $dept_id=$_GET['edit'];
  $edit_state=true;
  $rec = mysqli_query($db,"SELECT * FROM dept_alloc WHERE dept_id=$dept_id");
  $record=mysqli_fetch_array($rec);
  $dept_id=$record['dept_id'];
  $allocation=$record['allocation'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>operation</title>
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



<a href="adddept_alloc.php" id ="dept_alloc" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='dept_alloc.php')?'activeSubMenu':'');?>" >&nbsp;Add New</a>  
<br><br>
<table>
        <thead>
          <tr>
            <th>dept_id</th>
            <th>allocation</th>
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
                <?php echo $row['allocation']; ?>
              </td>
              <td>
                <a class="edit_btn" href="adddept_alloc.php?edit=<?php echo $row['dept_id']; ?>">Edit</a>
              </td>
              <td>
                <a class="del_btn" href="serverdept.php?del=<?php echo $row['dept_id']; ?>">Delete</a>
              </td>
            </tr>
          <?php }?>
        </tbody>
      </table>
</form>
 </body>
</html>