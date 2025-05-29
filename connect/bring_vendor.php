<?php
include 'connect.php';

$course_name = $_GET['course_name'];


if (isset($_GET['course_name'])) {
    $course = $_GET['course_name'];
    $sql = dbConnect()->prepare("SELECT * FROM training_course WHERE course_name=?");
    $sql->execute([$course]);
    if ($sql->rowcount()>0) {
       
    }else {
       echo "<script>window.location='../view_training_course.php'</script>";
    }
 }else {
    echo "<script>window.location='../view_training_course.php'</script>";
 }


$selector1 = dbConnect()->prepare("SELECT vendor FROM training_course WHERE course_name=?");
$selector1->execute([$course_name]);
$rex=$selector1->fetch();
$pp = $rex['vendor'];

?>






<label for="Vendor">Vendor:</label>
<input name="vendor" value="<?php echo $pp;?>" type="text" class="form-control" readonly>