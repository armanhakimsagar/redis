# redis
Repository On : CRUD APPLICATION ON Redis (NO SQL).  Redis Top Rated No Sql in-memory data structure storage system. Best For Use In Real Time Application , Chatting , Notification, Broadcasting , CRUD !!


Step 1 :

**

download redis from :

https://github.com/MicrosoftArchive/redis/releases


Step 2 :

**

Now open C:\Program Files\Redis\redis-cli.exe file


Step 3 :

**

check installation is ok or not ?

127.0.0.1:6379>ping ok



Step 4 :

**

insert database by :

set name arman


Step 5 :

**

view database by :

get name


Step 6 :

**



download redis in project directory :

C:\xampp\project > composer require predis/predis




<?php 

	// link redis files
	
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




<h1>Search after insert data </h1>

<form method="post">
	id : <input type="text" name="id">
	<input type="submit" name="view" value="Search Data By ID"> 
</form>



<h1>Delete by id </h1>

<form method="post">
	id : <input type="text" name="id">
	<input type="submit" name="delete" value="Delete Data By ID"> 
</form>
