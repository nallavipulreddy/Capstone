<?php
session_start();
include('config.php');
// Validating Session
if(strlen($_SESSION['userlogin'])!=0)
{
header('location:login.php');
}
?>
<?php
// Code for fecthing user full name on the bassis of username or email.
$username=$_SESSION['userlogin'];
$query=$dbh->prepare("SELECT  name FROM users WHERE (name=:username)");
    $query->execute(array(':username'=> $username));
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
        $username=$row['name'];
    }
?>
<html>
<title>Main</title>
<head>
<!.......................................................................................................>
    <link rel="stylesheet" href="css/styles.css">
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</head>
<body>

<div class="bgimg-1">
    <div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="#">Knowledge-Center</a>
                </td><td>
                <a href="#">Soil moisture</a>
                </td><td>
                <a href="#">Temperature</a>
                </td><td>
                <a href="#">Water Pump</a>
                </td>
                <td class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Profile</a>
                    <div class="dropdown-content">
                        <a href="#"><?php echo $username;?></a>
                        <a href="#">Help</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </td>
                
            </tr>
        </table>
    </div>
</div>

<div style="position:relative;">
    
</div>    
</body>
</html>