<?php

include 'connect.php';
$id = $_SESSION['emp_update_id'];
    // echo "<script>alert('$id')</script>";
?>
<?php

$pass = check_input($_POST['pass']);
$conpass = check_input($_POST['conpass']);

if (empty($pass) || empty($conpass)) {
    echo "<span class='form-error'>Both fields are required!!</span>";
    $complete = false;
}elseif ($pass !== $conpass) {
    echo "<span class='form-error'>Passwords do not match, please input again!!</span>";
    $complete = false;
}else {
    
    $sql = dbConnect()->prepare("SELECT profile_code FROM employee WHERE id=?");
    $sql->execute([$id]);
    $fr = $sql->fetch();
    $profile = $fr['profile_code'];

    // error confirm for highlighted inputs
    $complete = false;

    $pasql = dbConnect()->prepare("SELECT password FROM users WHERE profile_code=?");
    $pasql->execute([$profile]);
    $fetpasql = $pasql->fetch()['password'];
    if ($pasql) {
        $password = password_verify($pass, $fetpasql);
        if ($password) {
            echo "<span class='form-error'>You Cannot Use Previous Password!!</span>";
        }else {
            $passtoInsert = password_hash($pass, PASSWORD_DEFAULT);
            $pasInsert = dbConnect()->prepare("UPDATE users SET password='$passtoInsert' WHERE profile_code=?");
            $pasInsert->execute([$profile]);
            if ($pasInsert) {
                echo "<span class='form-success'>Success, Password update successful!!</span>";
                $complete = true;
            }else {
                echo "<span class='form-error'>An error Occurred please, Try again!!</span>";
            }
        }
    }else {
        echo "<span class='form-error'>An error Occurred please, Try again!!</span>";
    }
}


?>

<script>
    var complete = "<?php echo $complete?>";

    if (complete == true) {
        $("#form-security")[0].reset();
    }
    if (complete == false) {
        $("#past", "#conpas").css("box-shadow", "0 0 5px red");
    }
</script>