<?php
// < [ Org Name, DepartName, Allocated, Utilized, Remaining] >



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo 'unsuccessful connection to company database';
    return;
}
// return data;
$orgreport = array();
// db tables;
// Orgainisation; Department, Dept_Alloc, Costing - based on projects, Remaining - computed;
// Get all organisations 
// 	for each org get all departments
// 		for each dept get all projects, allocation to the department;
//			for each project get the utilized amount;
//				
$count  = 0;
$orgquery = "select org_id, org_name from organisation";
$orgresult = $conn->query($orgquery);
while ($orgrecord = $orgresult->fetch_assoc()) {
	$org_id = $orgrecord['org_id'];
	$org_name = $orgrecord['org_name'];

	// get all depts related to the organisation;
	$deptname = "";
	$deptallocation = 0;
	$deptcosting = 0;
	$deptremaining = 0;

	$deptquery = "select dept_id, dept_name from department where org_id = $org_id";
	$dept_result = $conn->query($deptquery);
	while ($dept_record = $dept_result->fetch_assoc()) {
		
		$deptname = "";
		$deptallocation = 0;
		$deptutilization = 0;
		$deptremaining = 0;

		$dept_name = $dept_record['dept_name'];
		$dept_id = $dept_record['dept_id'];
		
		// get dept level allocation;
		$allocquery = "select allocation from dept_alloc where dept_id = $dept_id";
		$allocres = $conn->query($allocquery);
		while ($alloc_record = $allocres->fetch_assoc()) {
			$deptallocation = $alloc_record['allocation'];
		}
	
		// get dept level utilization; [get all project in the dept and costing for all the project;]
		$deptcosting = 0;
		$projectquery = "select * from project where dept_id = $dept_id";
		$project_result = $conn->query($projectquery);


		while ($project_record = $project_result->fetch_assoc()) {
			$project_name = $project_record["project_name"];
			$project_id = $project_record["project_id"];

			$costquery = "select sum(utilization) as utilization from project_tracker where project_id = $project_id";
			$costres = $conn->query($costquery);

			while ($costrecord = $costres->fetch_assoc()) {
				$projectutilization = $costrecord["utilization"];
				$deptutilization = $deptutilization + $projectutilization;
			}
		}  // rtrv total_utilization for all projects in a dept;	
	
		// create a record here;
		$orgutilreportrecord = array();
		$orgutilreportrecord['X-Label'] = $org_name."/".$dept_name;
		$orgutilreportrecord['Allocation'] = (int)$deptallocation;
		$orgutilreportrecord['Utilization'] = $deptutilization;
		$orgutilreportrecord['Remaining'] = $deptallocation - $deptutilization;
		$orgreport[$count] = $orgutilreportrecord;
		$count++;	
	}	// all departments present in an organisation;
}  // all orgs present in the application;

// < [ X-Label, Allocated, Utilized, Remaining], [], >
// < {Allocation, < > }, {Remaining, <> } , {Utilization, <>}, {X-Label, < > }

// conversion of array;
	$report_summary = array();
	$array_keys = array();
	$elemcount = 0;
	$elemcount = count($orgreport);
	
	if ($elemcount != 0) {
		$report_elem_array = $orgreport[0];
		$report_array_keys = array_keys($report_elem_array);
		$keysize = count($report_array_keys);
		for ($keycount = 0; $keycount < $keysize; $keycount++) {
			$reportkey = $report_array_keys[$keycount];
			$keyspecificarray = array();
			$idx = 0;
			for ($i =0; $i < $elemcount; $i++) {
				$orgreportelem = $orgreport[$i];
				$elemval = $orgreportelem[$reportkey];
				$keyspecificarray[$idx] = $elemval;
				$idx++;
			} // got one key val from all arrays;
			if (count($keyspecificarray) > 0) {
				$report_summary[$reportkey] = $keyspecificarray;
			}
		} // iterate for all keys;
	} // end of array conversion;;
	//echo json_encode($orgreport);
	
	//echo "Converted to Format <br> <br>";
	
	
  echo json_encode($report_summary);