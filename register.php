<?php
  include("database.php");
  session_start();

  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $name = stripcslashes($name);
    $name = addslashes($name);

    $username = $_POST['username'];
    $username = stripcslashes($username);
    $username = addslashes($username);
   
    $email = $_POST['email'];
    $email = stripcslashes($email);
    $email = addslashes($email);

    $password = $_POST['password'];
    $password = stripcslashes($password);
    $password = addslashes($password);


    $age = $_POST['age'];
    $age = stripcslashes($age);
    $age = addslashes($age);

    $gender = $_POST['gender'];
    
    $college = $_POST['college'];
    $college = stripcslashes($college);
    $college = addslashes($college);

    $branch = $_POST['branch'];

    $language = $_POST['language'];

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt, $allowed)){
    	if($fileError === 0){
    		if($fileSize < 1000000){
    			$fileNameNew = uniqid(''.true).".".$fileActualExt;
    			$fileDestination = 'uploads/'.$fileNameNew;
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


    $str="SELECT email from user WHERE email='$email'";

    $result=mysqli_query($con,$str);

    if((mysqli_num_rows($result))>0)
    {
        echo "<center><h3><script>alert('Sorry... This email is already registered!')</script></h3></center>";
        header("refresh:0;url=login.php");
    }
    else
    {
        $str="insert into user set name='$name',username='$username',email='$email',password='$password',age='$age',gender='$gender',college='$college',branch='$branch',language='$language',resume='$fileNameNew'";

        if((mysqli_query($con,$str)))
        echo "<center><h3><script>alert('Congrats... You have successfully registered!')</script></h3></center>";
        header('location: welcome.php?q=1');
    }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register | Online Quiz System</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;">Online Quiz System</h4></center><br>
							<form name="myForm" method="post" action="register.php" onsubmit="return validateForm()" enctype="multipart/form-data">

                                <div class="form-group">
									<label>Enter Your Name:</label>
									<input type="text" name="name" class="form-control" />
								</div>
                                <div class="form-group">
									<label>Enter Your Username:</label>
									<input type="text" name="username" class="form-control"/>
								</div>
								<div class="form-group">
									<label>Enter Your Email Id:</label>
									<input type="email" name="email" class="form-control"/>
								</div>
								<div class="form-group">
									<label>Enter Your Password:</label>
									<input type="password" name="password" class="form-control" />
                                </div>
                                <div class="form-group">
									<label>Enter Your Age:</label>
									<input type="text" name="age" class="form-control" />
								</div>
								<div class="form-group">
									<label>Gender:</label>
									<br>
									<input type="radio" id="male" name="gender" value="male">
        							<label for="male">Male</label><br>
        							<input type="radio" id="female" name="gender" value="female">
        							<label for="female">Female</label><br>
        							<input type="radio" id="other" name="gender" value="other">
        							<label for="other">Other</label>
								</div>
								<div class="form-group">
									<label>Enter Your College Name:</label>
									<input type="text" name="college" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Branch:</label>
									<label for="cars"><b>Choose a BRANCH:</b></label>
							          <select name="branch" id="branch">
							            <option value="cse">CSE</option>
							            <option value="ece">ECE</option>
							            <option value="eee">EEE</option>
							            <option value="aie">AIE</option>
							          </select>
								</div>
								<div class="form-group">
							        <p><label class="control-label" for="checkboxl"><b>Technical skills</b></label></p>

							        <input type="radio" id="language" name="language" value="c">
							        <label for="C">C</label><br>
							        <input type="radio" id="language" name="language" value="java">
							        <label for="java">JAVA</label><br>
							        <input type="radio" id="language" name="language" value="python">
							        <label for="Python">PYTHON</label><br>
							        <input type="radio" id="language" name="language" value="jsp">
							        <label for="jsp">JSP</label>
							    </div>
							    <div class="form-group">
							    	<label>Upload your resume:</label>
						          	<input type="file" id="file" name="file" accept=".pdf">
						        </div>

                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="js/form-validation.js"></script>
		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>