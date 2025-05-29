<?php 
include 'connect/connect.php';
ob_start();
ini_set('display_errors', 1);
 include 'stat.php';
?>
<?php include 'connect/login-check.php';?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title></title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/icon.png" />
      <!-- <link /> -->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">

      <!-- payslip -->
      <link rel="stylesheet" href="css/payslip.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Full calendar -->
      <link href='fullcalendar/core/main.css' rel='stylesheet' />
      <link href='fullcalendar/daygrid/main.css' rel='stylesheet' />
      <link href='fullcalendar/timegrid/main.css' rel='stylesheet' />
      <link href='fullcalendar/list/main.css' rel='stylesheet' />
      <link rel="stylesheet" href="css/flatpickr.min.css">
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->

      <!--Datatables -->
      <link rel="stylesheet" href="css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="css/buttons.dataTables.min.css">
      <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />  -->
  <style>



/* * {
	font-family: 'Roboto', sans-serif;
	font-size: 12px;
	color: #444;
} */




     .form-error{
        color: red;
     }
     .form-success{
        color: green;
     }
  </style>
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include 'sidebar.php' ?>
         <!-- TOP Nav Bar -->
         <?php include 'topbar.php' ?>
         <!-- TOP Nav Bar END -->

