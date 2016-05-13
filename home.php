<!DOCTYPE html>
<html>
<head>
  <title>Home Page | <?php
    session_start();
    $fn=$_SESSION['fn'];
    $ln=$_SESSION['ln'];
    $email=$_SESSION['email'];
    $phone=$_SESSION['phone'];
    echo " ".$fn." ".$ln;
    ?>  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
</head>
<body style="width: auto; height: auto; background-image: url(images/004.jpg); background-size: cover;  z-index: 0;">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><br>
    <h4 style="color:white;">Welcome <?php echo "| ".$fn." ".$ln;?></h4>
    </div>
    <ul class="nav navbar-nav navbar-right right-padding">
<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    </ul>
  </div>
</nav>
<div class="dis">
<table class="table table-hover">
      <tr>
        <td>First Name</td>
        <td><?php echo $fn;?></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><?php echo $ln;?></td>
      </tr>
      <tr>
        <td>Email Id</td>
        <td><?php echo $email;?></td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td><?php echo $phone;?></td>
      </tr>
  </table>
</div>
</body>
</html>