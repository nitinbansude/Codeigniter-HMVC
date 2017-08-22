<?php 
$servername = "localhost";
$username = "root";
$password = "";
// $dbname = "nitin";
$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$action = @$_GET['action'];
// $data = $_GET['get_tables'];
if($action == 'get_table'){
	$result = mysqli_query($conn, "SHOW DATABASES");        
	while ($row = mysqli_fetch_array($result))
	{   
		$result1 = mysqli_query($conn, "show tables from ".$row[0]);
			while($row1 = mysqli_fetch_array($result1))
			{
				$res[$row[0]][] = $row1[0];
			}
	}
	echo '<pre>';
	print_r($res);
}else if($action == 'get_table_data')
{
	$name = $_GET['name'];
	$db_name = $_GET['db_name'];
		mysqli_select_db($conn,$db_name);
		$sql = "Select * FROM ".$name;
		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$res[] = $row;
		}
		
	echo '<pre>';
	print_r($res);
}else if($action == 'delete_table_data')
{
		$name = $_GET['name'];
		$db_name = $_GET['db_name'];
		mysqli_select_db($conn,$db_name);
		
		$sql = "DELETE FROM ".$name;
		if(mysqli_query($conn, $sql))
		{
			echo 'deleted';
		}else{
			echo 'not deleted';
		}
}else if($action == 'drop_table')
{
	
		$name = $_GET['name'];
		$db_name = $_GET['db_name'];
		mysqli_select_db($conn,$db_name);
		
		$sql = "DROP TABLE ".$name;
		if(mysqli_query($conn, $sql))
		{
			echo 'Dropped';
		}else{
			echo 'Not Dropped';
		}
}
else if($action == 'drop_database')
{
		$name = $_GET['name'];
		$sql = "DROP DATABASE ".$name;
		if(mysqli_query($conn, $sql))
		{
			echo 'Dropped';
		}else{
			echo 'Not Dropped';
		}
}
?>