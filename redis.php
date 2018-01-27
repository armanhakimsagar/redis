<?php 

	require('vendor/autoload.php');


	// database connection

	$redis = new Predis\Client(); 
	$redis->connect('127.0.0.1', 6379); 
    


	// insert query 

	if(isset($_POST['submit'])){

		$id = $_POST['id'];

		$name = $_POST['name'];


	    $insert = $redis->set($id,json_encode(

						array(
							"name" => "$name"
						)
									   
					));

	    if($insert){
	    	echo "inserted";
	    }

	}




   // view

   if(isset($_POST['view'])){

   		$id = $_POST['id'];

   		// bring expected data

   		$response = $redis->get($id);

   		// json decode after bring data

   		$response = json_decode($response);

   		echo $response->name;
 
   }




   // delete

   if(isset($_POST['delete'])){

   		$id = $_POST['id'];

   		// bring expected data

   		$delete = $redis->DEL($id);

   		 if($delete){
	    	echo "delete";
	    }
	 
 
   }
?>

<h1> insert data </h1>
<form method="post">
	id : <input type="text" name="id">
	name : <input type="text" name="name">
	<input type="submit" name="submit" value="submit data"> 
</form>

<br>
<br>
<br>

<h1>Search after insert data </h1>

<form method="post">
	id : <input type="text" name="id">
	<input type="submit" name="view" value="Search Data By ID"> 
</form>

<br>
<br>
<br>

<h1>Delete by id </h1>

<form method="post">
	id : <input type="text" name="id">
	<input type="submit" name="delete" value="Delete Data By ID"> 
</form>



