<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16" />
  <?php session_start();
  if (isset($_SESSION['e']))
    {
    $control=$_SESSION['e'];
    }
  else 
  {
    $control="3";
  }
  ?>
  <script>
   $(window).load(function(){
        var a="3";
        a=<?php echo $control;?>;
        if(a=="0")
        {
        $('#yesmodal').modal('show');
        document.getElementById("yes").innerHTML="Wrong credentials. Please try again.";
        setTimeout(func00, 2000);
        setTimeout(func01, 2500);
        }
        else if(a=="1"){
        $('#yesmodal').modal('show');
        document.getElementById("yes").innerHTML="Thank you for passing by.<br>Do visit again.";
        setTimeout(func00, 2000);
        }
        else if(a=="2"){func01();}
        else
        {
          $('#signupmodal').modal('show');
        }
        
    });
  function func00(){
    $('#yesmodal').modal('hide');
    document.getElementById("yes").innerHTML="";
  }
  function func01(){
    $('#loginmodal').modal('show');
  }
  function func02(){
    $('#signupmodal').modal('show');
  }
  <?php session_unset();session_destroy();?>
  function func1() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("yes").innerHTML = xmlhttp.responseText;
                setTimeout(func00, 2000);
                var b=xmlhttp.responseText;
                if(b=="Alas! Email-ID already registered.<br>Use a different Email-ID and try again.<br>Or Log In.")
                setTimeout(func02, 2500);
            }
        };
        xmlhttp.open("GET", "adduser.php?fn="+document.getElementById("fn").value+"&ln="+document.getElementById("ln").value+"&email="+document.getElementById("email").value+"&phone="+document.getElementById("phone").value+"&pwd="+document.getElementById("pwd").value, true);
        xmlhttp.send();
        }
  function func2() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("yes").innerHTML = xmlhttp.responseText;
                setTimeout(func00, 2000);
            }
        };
        xmlhttp.open("GET", "sendemail.php?email="+document.getElementById("email1").value, true);
        xmlhttp.send();
        }       
</script>
</head>

<body style="width: auto; height: auto; background-image: url(images/001.jpg); background-size: cover;  z-index: 0;">
<nav class="navbar navbar-inverse"><br>
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-right right-padding">
      <li><button type="button" class="btn active" data-toggle="modal" data-target="#signupmodal"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
</li><li>&nbsp;&nbsp;&nbsp;</li>
      <li><button type="button" class="btn active" data-toggle="modal" data-target="#loginmodal"><span class="glyphicon glyphicon-log-in"></span> Log In</button>
</li>
    </ul>
  </div>
  <br>
</nav>
<div class="modal fade" id="signupmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header mhd">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Sign Up</h4>
        </div>
        <div class="modal-body mhb">
          <form role="form">
          <div class="form-group">
            <input type="text" class="form-control i" id="fn" placeholder="Enter your First Name" spellcheck="false" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control i" id="ln" placeholder="Enter your Last Name" spellcheck="false" required> 
          </div>
          <div class="form-group">
            <input type="email" class="form-control i" id="email" placeholder="Enter your Email Id" spellcheck="false" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control i" id="phone" placeholder="Enter your Phone number" spellcheck="false" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control i" id="pwd" placeholder="Enter your Password" spellcheck="false" required>
          </div>
          <div class="form-group">
          <button type="button" class="btn bgw mhd" onclick="func1()" data-dismiss="modal" data-toggle="modal" data-target="#yesmodal">Submit</button><span>&nbsp</span>
          <button type="button" class="btn bgw mhd" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="resultmodal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header mhd">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Status</h4>
        </div>
        <div class="modal-body mhb">
         <p id="demo"></p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="loginmodal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header mhd">
          <button type="button" class="close" data-dismiss="modal"  style="color:white;">&times;</button>
          <h4 class="modal-title">Login In</h4>
        </div>
        <div class="modal-body mhb"><p id="wrong"></p>
          <form role="form" method="GET" action="process.php">
          <div class="form-group">
            <input type="email" class="form-control i" id="email" name="email" placeholder="Email Id" spellcheck="false" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control i" id="pwd" name="pwd" placeholder="Password" spellcheck="false" required>
          </div>
          <div class="form-group">
          <input type="submit" class="btn bgw mhd" value="Submit"><span>&nbsp</span>
          <button type="button" class="btn bgw mhd" data-dismiss="modal">Close</button>
          </div> 
          <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotmodal">Forgot Your Password</a>
          </form>
        </div>
      </div>
    </div>
  </div>

 <div class="modal fade" id="forgotmodal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header mhd">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Kindly enter your registered Email ID</h4>
        </div>
        <div class="modal-body mhb">
         <form role="form">
          <div class="form-group">
            <input type="email" class="form-control i" id="email1" placeholder="Email Id" spellcheck="false" required>
          </div>
          <div class="form-group">
          <button type="button" class="btn bgw mhd" onclick="func2()" data-dismiss="modal" data-toggle="modal" data-target="#yesmodal">Submit</button>
        </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="yesmodal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header mhd">
          <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
          <h4 class="modal-title">Status</h4>
        </div>
        <div class="modal-body mhb">
         <p id="yes"></p>
        </div>
      </div>
    </div>
  </div>

<footer>
<table class="table navbar-fixed-bottom backblack">
<tr><td ><a href="#">About Us</a><br><a href="#">Contact Us</a></td><td class="moveright"><a href="#">Refund</a><br><a href="#">Support</a></td></tr>
</table>
</footer>
</body>
</html>