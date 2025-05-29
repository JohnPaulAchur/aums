<?php
include_once 'connect.php';
if(isset($_POST['submit'])){

    $em=$_POST['email'];
    if(empty($_POST['email'])){
        echo  " <script>alert('Please fill in your email!'); location.href='../index'</script>";
	 //header("Location:../index?err=" . urlencode("Please fill in your email!")); 
    }
    
    elseif ((!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $em))){
        echo  " <script>alert('You have entered invalid email!'); location.href='../index'</script>";
        //header("Location:../index?err=" . urlencode("You have entered invalid email!"));  
       }
 
    $pwd = check_input($_POST["password"]);
    if(empty($_POST['password'])){
        echo  " <script>alert('Password is required!'); location.href='../index'</script>";
	//header("Location:../index?err=" . urlencode("Password is required!"));  
	}
    else{
        $email = check_input($_POST["email"]);
        $pwd = check_input($_POST["password"]);

        $que= dbConnect()->prepare("SELECT * FROM users WHERE email=:email");
        $que->bindParam(':email', $email);
        $que->execute();
        if($row=$que->fetch()){
                
             
            $role = $row['role'];
            $phash=$row['password'];
            $password = password_verify($pwd, $phash);
            
            if($password){
                $_SESSION["uemail"]      = $row['email']; // setting session
                $_SESSION["uid"]         = $row['id'];
                $_SESSION['urole']      = $row['role'];
                $_SESSION['ufirstname']      = $row['fname'];
                $_SESSION['ulastname']      = $row['lname'];

                if($role == "Admin")
                {
                    echo  " <script>location.href='../dashboard'</script>";
                }else{
                    echo  " <script>location.href='../home'</script>";
                }
                

            }else{  
                $e="Incorrect password"; 
                echo  " <script>alert('$e'); window.location='../index'</script> ";
              }
        }
        else{
            echo  " <script>alert('This email does not exists!'); window.location='../index'</script> ";
            //header("Location:../index?err=" . urlencode("This email does not exists!"));
        }
    }

    
}
?>
