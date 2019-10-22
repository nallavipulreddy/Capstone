<?php include 'dbh.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
$channel=$_SESSION['channel_id'];
$auth=$_SESSION['auth_key'];
?>

<html>
<title><?php echo $display;?></title>
<head>
<!.......................................................................................................>
    <link rel="stylesheet" href="css/styles.css">
    <meta http-equiv="refresh" content="900;url=logout.php" />
<style>
    .tabcontent {
  color: black;
  display: none;
  background-color: beige;
  padding: 100px 20px;
  height: 409px;
}
</style>
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

<div style="background-color: black">
    <div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="kc.php">Knowledge-Center</a>
                </td><td>
                <a href="soilmoisture.php">Soil moisture</a>
                </td><td>
                <a href="temperature.php">Temperature</a>
                </td><td>
                <a href="pump.php">Water Pump</a>
                </td>
                <td class="dropdown">
                <a class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="main.php"><?php echo $display;?></a>
                        <a href="#">Help</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </td>
                
            </tr>
        </table>
    </div>
</div>
    <div>


        <iframe width="450" height="260" style="border: 1px solid #cccccc;margin-left: 150px;margin-top: 150px;" src="https://thingspeak.com/channels/890855/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&api_key='.$auth_key.'&results=60&type=line&update=15"></iframe>

        <iframe width="450" height="260" style="border: 1px solid #cccccc;margin-left: 100px;margin-top: 150px;" src="https://thingspeak.com/channels/890855/widgets/111517"></iframe>


    </div>



</body>
</html>