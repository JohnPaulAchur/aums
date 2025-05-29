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


                $mainImage = $_FILES['qualupload']['name'];
				$source = $_FILES['qualupload']['tmp_name'];
				$error = $_FILES['qualupload']['error'];
				$size = $_FILES['qualupload']['size'];
				$type = $_FILES['qualupload']['type'];

				$fileExt = explode('.',$mainImage);
				$mainExt = strtolower(end($fileExt));

				$allow = array('jpeg','png','jpg','pdf','docx');


				if (in_array($mainExt, $allow)) {
					if ($error === 0) {
						if ($size < 3000000) {
							$newName = uniqid('',true) . "." . $mainExt;

							$destination = '../uploads/qualification' . $newName;

							$upload = move_uploaded_file($source,$destination);
                            if ($upload) {
                                $selectImg = dbConnect()->prepare("SELECT qualupload FROM employee WHERE id=?");
                                $selectImg->execute([$id]);
                                $fetchIt = $selectImg->fetch();
                                $fetchImg = $fetchIt['qualupload'];
                                if ($fetchImg) {
                                    $unlink = '../uploads/qualification/' . $fetchImg;
                                    if (!unlink($unlink)) {
                                        echo "<script>alert('Previous image could not be replaced');window.location='../update_user?id=$id';</script>";
                                    }else {
                                        $insertImg = dbConnect()->prepare("UPDATE employee SET qualupload='$newName' WHERE id=?");
                                        $insertImg->execute([$id]);
                                        if ($insertImg) {
                                            echo "<script>alert('Qualification upload updated successfully')</script>";
                                        }else {
                                            echo "<script>alert('An error occurred while updating qualification file')</script>";
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
			

