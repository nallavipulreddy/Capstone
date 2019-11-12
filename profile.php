<?php
error_reporting(0);
include('dbh.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } 
  else{
if(isset($_POST['update']))
  {
    $sid=$_SESSION['id'];
    $uname=$_POST['username'];
    $query=mysqli_query($conn, "update users set username='$username' where ID='$sid'");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
<title>Profile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
  body{
    color: #fff;
    background-image: url("images/3.jpg");
    position: relative;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
    background-size: cover;
    min-height: 100%;
    
    font-family: 'Roboto', sans-serif;
  }
    .form-control{
    height: 40px;
    box-shadow: none;
    color: #969fa4;
  }
  .form-control:focus{
    border-color: #5cb85c;
  }
    .form-control, .btn{        
        border-radius: 3px;
    }
  .profile-form{
    width: 400px;
    margin: 0 auto;
    padding: 30px 0;
  }
  .profile-form h2{
    color: #636363;
        margin: 0 0 15px;
    position: relative;
    text-align: center;
    }
  .profile-form h2:before, .profile-form h2:after{
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
  } 
  .profile-form h2:before{
    left: 0;
  }
  .profile-form h2:after{
    right: 0;
  }
    .profile-form .hint-text{
    color: #999;
    margin-bottom: 30px;
    text-align: center;
  }
    .profile-form form{
    color: #999;
    border-radius: 3px;
      margin-bottom: 15px;
        background: beige;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
  .profile-form .form-group{
    margin-bottom: 20px;
  }
  .profile-form input[type="checkbox"]{
    margin-top: 3px;
  }
  .profile-form .btn{        
        font-size: 16px;
        font-weight: bold;    
    min-width: 140px;
        outline: none !important;
    }
  .profile-form .row div:first-child{
    padding-right: 10px;
  }
  .profile-form .row div:last-child{
    padding-left: 10px;
  }     
    .profile-form a{
    color: #fff;
    text-decoration: underline;
  }
    .profile-form a:hover{
    text-decoration: none;
  }
  .profile-form form a{
    color: #5cb85c;
    text-decoration: none;
  } 
  .profile-form form a:hover{
    text-decoration: underline;
  }  
</style>
</head>
<body>

<div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="main.php"style="text-decoration: none">Home</a>
                </td>
                
            </tr>
        </table>
    </div>
<div class="profile-form">
    <form action="" method="post">
    <h2>Profile</h2>

<?php if($msg){
    echo $msg;
  }  ?> </p>
<form action="" name="update" method="post">
<?php
$pid=$_SESSION['id'];
$ret=mysqli_query($conn,"select * from users where ID='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>   
        <div class="form-group">
          <label>Username</label>
      <input type="text" class="form-control" name="username" placeholder="UserName" required="required" value="<?php  echo $row['username'];?>">        
        </div>
        <div class="form-group">
          <label>Email-Id</label>
          <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="<?php  echo $row['email'];?>" readonly='true'>
        </div>
      <div class="form-group">
        <label>Old Password</label>
      <input type="text" class="form-control" name="auth_key" placeholder="auth_key" required="required" value="<?php  echo $row['auth_key'];?>" readonly='true' >        
        </div>
        <div class="form-group">
          <label>New password</label>
          <input type="text" class="form-control" name="Date" placeholder="Date" required="required" value="<?php  echo $row['Date'];?>" readonly='true'>
        </div>
        <?php  } ?>
    <div class="form-group">
            <button type="submit" name="update" class="btn btn-success btn-lg btn-block">Update</button>
        </div>
  </form>
</div>

</body>
</html>
 <?php  } ?>                        