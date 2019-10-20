<?php include 'dbh.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
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
                <a href="javascript:void(0)" class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="#"><?php echo $display;?></a>
                        <a href="#">Help</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </td>
                
            </tr>
        </table>
    </div>
    <div class="caption">
      <span class="border">"Welcome <?php echo $display;?>"</span>
      <br>
      <br>
      <span class="border">"You Are smart to choose smartty-farm"</span>
    </div>
</div>

<div style="position:relative;">
    
</div>    
</body>
</html>