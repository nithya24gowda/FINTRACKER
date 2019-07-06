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
           
          <a href="header.php" class="btn buttons_color bactive"> <i class="fa fa-tachometer "> </i>&nbsp; <span>HOME</span></a>
                     
          
          
                     
                     
                    
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


<h2>PROJECT_TRACKER DETAILS</h2>

<?php include('serverproject_tracker.php');


//fetch the record to be updated
if(isset($_GET['edit'])) {
  
  
  $project_id=$_GET['edit'];
  $edit_state=true;
  $rec = mysqli_query($db,"SELECT * FROM project_tracker WHERE project_id=$project_id");
  $record=mysqli_fetch_array($rec);
  $project_id=$record['project_id'];
  $utilization=$record['utilization'];
  $allocation=$record['allocation'];
  $date=$record['date'];
  $remaining=$record['remaining'];
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



<a href="addproject_tracker.php" id ="project_id" class="btn button_color <?php echo ((basename($_SERVER['PHP_SELF'])=='project_tracker.php')?'activeSubMenu':'');?>" >&nbsp;Add New</a> 
<br><br>
<table>
        <thead>
          <tr>
            <th>project_id</th>
            <th>utilization</th>
            <th>allocation</th>
            <th>date</th>
            <th>remaining</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row= mysqli_fetch_array($results)){ ?>
            <tr>
              <td>
                <?php echo $row['project_id']; ?>
              </td>
              <td>
                <?php echo $row['utilization']; ?>
              </td>
              <td>
                <?php echo $row['allocation']; ?>
              </td>
              <td>
                <?php echo $row['date']; ?>
              </td>
              <td>
                <?php echo $row['remaining']; ?>
              </td>
              <td>
                <a class="edit_btn" href="addproject_tracker.php?edit=<?php echo $row['project_id']; ?>">Edit</a>
              </td>
              <td>
                <a class="del_btn" href="serverproject_tracker.php?del=<?php echo $row['project_id']; ?>">Delete</a>
              </td>
              
            </tr>
          <?php }?>
        </tbody>
      </table>
</form>
 </body>
</html>