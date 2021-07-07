<?php

	echo $name = $_POST['name'];
	echo "<br>";
    $name = stripcslashes($name);
    $name = addslashes($name);

    echo $username = $_POST['username'];
    echo "<br>";
    $username = stripcslashes($username);
    $username = addslashes($username);   

    echo $email = $_POST['email'];
    echo "<br>";
    $email = stripcslashes($email);
    $email = addslashes($email);

    echo $password = $_POST['password'];
    echo "<br>";
    $password = stripcslashes($password);
    $username = addslashes($password);

    echo $age = $_POST['age'];
    echo "<br>";
    $age = stripcslashes($age);
    $age = addslashes($age);

    echo $gender = $_POST['gender'];
    echo "<br>";
    
    echo $college = $_POST['college'];
    echo "<br>";
    $college = stripcslashes($college);
    
    $college = addslashes($college);

    echo $branch = $_POST['branch'];
    echo "<br>";
    echo $language = $_POST['language'];
    echo "<br>";

    echo "HERE IS THE FILE UPLOAD PART";
    
    echo $file = $_FILES['file'];
    echo "<br>";
    echo $fileName = $_FILES['file']['name'];
    echo "<br>";
    echo $fileTmpName = $_FILES['file']['tmp_name'];
    echo "<br>";
    echo $fileSize = $_FILES['file']['size'];
    echo "<br>";
    echo $fileError = $_FILES['file']['error'];
    echo "<br>";
    echo $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt, $allowed)){
    	if($fileError === 0){
    		if($fileSize < 1000000){
    			echo $fileNameNew = uniqid(''.true).".".$fileActualExt;
                echo "<br>";
    			echo $fileDestination = 'uploads/'.$fileNameNew;
                echo "<br>";
    			move_uploaded_file($fileTmpName, $fileDestination);
    		}
    		else{
    			echo "Your file size is too big!";
    		}
    	}
    	else{
    		echo "There was an error uploading your file!";
    	}
    }
    else{
    	echo "You cannot upload files of this type!";
    }
    echo "filename to store in db";
    echo $fileNameNew

?>