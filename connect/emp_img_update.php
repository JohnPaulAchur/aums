<?php include 'connect.php';?>

<?php

if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $sql = dbConnect()->prepare("SELECT * FROM employee WHERE id=?");
   $sql->execute([$id]);
   if ($sql->rowcount()>0) {
      
   }else {
      echo "<script>window.location='user_list'</script>";
   }
}else {
   echo "<script>window.location='user_list'</script>";
}

// echo "<script>alert('$id')</script>";
// echo "<script>alert('clicked')</script>";


                $mainImage = $_FILES['imgupload']['name'];
				$source = $_FILES['imgupload']['tmp_name'];
				$error = $_FILES['imgupload']['error'];
				$size = $_FILES['imgupload']['size'];
				$type = $_FILES['imgupload']['type'];

				$fileExt = explode('.',$mainImage);
				$mainExt = strtolower(end($fileExt));

				$allow = array('jpeg','png','jpg','jpeg','gif','jfif','webp');


				if (in_array($mainExt, $allow)) {
					if ($error === 0) {
						if ($size < 3000000) {
							$newName = uniqid('',true) . "." . $mainExt;

							$destination = '../uploads/employee/' . $newName;

							$upload = move_uploaded_file($source,$destination);
                            if ($upload) {
                                $selectImg = dbConnect()->prepare("SELECT emp_img, profile_code FROM employee WHERE id=?");
                                $selectImg->execute([$id]);
                                $fetchIt = $selectImg->fetch();
                                $fetchImg = $fetchIt['emp_img'];
                                $prof = $fetchIt['profile_code'];
                                if ($fetchImg) {
                                    $unlink = '../uploads/employee/' . $fetchImg;
                                    if (!unlink($unlink)) {
                                        echo "<script>alert('Previous image could not be replaced');window.location='../update_user?id=$id';</script>";
                                    }else {
                                        $insertImg = dbConnect()->prepare("UPDATE employee SET emp_img='$newName' WHERE id=?");
                                        $insertImg->execute([$id]);
                                        if ($insertImg) {
                                            $insertUsers = dbConnect()->prepare("UPDATE users SET image='$newName' WHERE profile_code=?");
                                            $insertUsers->execute([$prof]);
                                            if ($insertUsers) {
                                                echo "<script>alert('Success, Profile image updated successfully');window.location='../update_user?id=$id';</script>";
                                            }else {
                                                echo "<script>alert('There was an error in transmission');window.location='../update_user?id=$id';</script>";
                                            }
                                        }
                                    }
                                }
                            }

							// echo "<script> alert('$destination!!!')</script>";

						}else {
							echo "<script> alert('File size is too big!!!');window.location='../update_user?id=$id';</script>";
						}
					}else {
						echo "<script> alert('An error occurred!!!');window.location='../update_user?id=$id';</script>";
					}
				}else {
					echo "<script> alert('File extension is not supported!!!');window.location='../update_user?id=$id';</script>";
				}
			




                // $selectImg = dbConnect()->prepare("SELECT emp_img FROM employee WHERE id=?");
                // $selectImg->execute([$id]);
                // $fetchImg = $selectImg->fetch()['emp_img'];
                // if ($fetchImg) {
                //     $unlink = '../uploads/employee' . $fetchImg;
                //     if (!unlink($unlink)) {
                        
                //     }
                // }



                // $reg = dbconnect()->prepare("INSERT INTO  products(prd_name, cat_id, unit, price, qty, description, prd_image, created_on, supplier) VALUES(?,?,?,?,?,?,?,?,?)");
				// 			$reg->execute([$prdname,$ctg,$unit,$price,$qty,$desc,$newName,$created,$sup_name]);
				// 			if($reg){
				// 			echo "<script> alert('Success, Product has been added!!!');</script>";
				// 			}
				// 			else{
				// 			echo "<script> alert ('Oops, Operation Failed TRY AGAIN LATER!!!');</script>";
				// 			}
?>

