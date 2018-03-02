<?php
 $TaskName = "";
 $TaskDay = "";
 $TaskAction = "";
 $TaskStatus = "";
 $TaskId = 0;
 $buttonDisplay = false;
 $btn = false;
//Add data to my db

if (isset($_POST['add'])) {
    $TaskName = sanitize($connect, $_POST['TaskName']);
    $TaskDay = sanitize($connect, $_POST['TaskDay']);
    $TaskStatus = $_POST['TaskStatus'];
    $TaskAction = sanitize($connect, $_POST['TaskAction']);
    $TaskId = sanitize($connect, $_POST['TaskId']);

    if(!empty($TaskName) && !empty($TaskDay) && !empty($TaskStatus) && !empty($TaskAction)){
    
   $query = "INSERT INTO things_to_do (TaskName, TaskDay, TaskAction, TaskStatus)";
   $query .= "VALUE ('$TaskName', '$TaskDay', '$TaskAction', '$TaskStatus')";
   $runQuery = mysqli_query($connect, $query);


	$_SESSION['msg'] = "Task is added";
	header("location: index-1.php");
	exit();}
	else{
		$_SESSION['msg']= ('All field must be filled');
		header("location: index-1.php");
		exit();
	}
}

$query = "SELECT * FROM things_to_do";
$runQueryDisplay = mysqli_query($connect, $query);


//edit

if (isset($_GET['edit'])) {
	$buttonDisplay = true;
	$TaskId = $_GET['edit'];
	$query = "SELECT * FROM things_to_do WHERE TaskId = $TaskId";
	$runQuery = mysqli_query($connect, $query);
	$getData = mysqli_fetch_assoc($runQuery);
	$TaskId = $getData["TaskId"];
	$TaskName = $getData["TaskName"];
	$TaskDay = $getData["TaskDay"];
	$TaskAction = $getData["TaskAction"];
	$TaskStatus = $getData["TaskStatus"];
	
}

//update

if(isset($_POST["update"])){
		$TaskName = sanitize($connect, $_POST["TaskName"]);
		$TaskDay = sanitize($connect, $_POST["TaskDay"]);
		$TaskAction = sanitize($connect, $_POST["TaskAction"]);
		$TaskStatus = $_POST["TaskStatus"];
		$TaskId = sanitize($connect, $_POST["TaskId"]);
          if(!empty($TaskName) && !empty($TaskDay) && !empty($TaskStatus) && !empty($TaskAction)){

		$query = "UPDATE things_to_do SET TaskName = '$TaskName' ";
		$query .=", TaskDay = '$TaskDay', TaskAction = '$TaskAction', TaskStatus = '$TaskStatus' WHERE TaskId = $TaskId"; 
		$runQuery = mysqli_query($connect, $query);
		if(!$runQuery){
			die("could not connect ".mysqli_error());
		}
		$_SESSION["msg"] = "Task updated";
		header("location: index-1.php");
		exit();}
		else{
			$_SESSION['msg']= ('All field must be filled');
			header("location: index-1.php");
			exit();
		}
	}


	//delete
if(isset($_GET["del"])){
		$TaskId = $_GET["del"];
		$query = "DELETE FROM things_to_do WHERE TaskId = $TaskId";
		mysqli_query($connect, $query);
		$_SESSION["msg"] = "Task Deleted";
		header("location: index-1.php");
		exit();
	}

	//delete

	if (isset($_POST['select-all'])) {
		$btn = true;
	   
		if (isset($_POST['delete'])) {

			// $query = "SELECT * FROM things_to_do";
			// $runQuery = mysqli_query($connect, $query);
			// $getData = mysqli_fetch_assoc($runQuery);
			// $TaskId = $getData["TaskId"];
			// $TaskName = $getData["TaskName"];
			// $TaskDay = $getData["TaskDay"];
			// $TaskAction = $getData["TaskAction"];
			// $TaskStatus = $getData["TaskStatus"];
	      
		     $query = "DELETE FROM things_to_do";
		     mysqli_query($connect, $query);
		     $_SESSION["msg"] = "All Task Deleted";
		     header("location: index-1.php");
		     exit();

	    }
	

	}

