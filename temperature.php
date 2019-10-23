<?php include 'dbh.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
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
.container-block
{
    border-radius: 100px;
    padding: 10px 40px 20px 40px;
    margin: 50px 350px;
    text-align:center;
    width:550px;
    color:white;
    font-family: ;
    font-size: 15px;
    background-color: black;
    display: inline-block;
    border: 1px white solid;

}
.container-block:hover
{
 background-color: orange;
 color:black;
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

<div>
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
<!.......................................HERE.......................................>
    <?php
        $api_key="b880f57f49e9e443f77daa9e46907cc2";
        $ch=curl_init();
        $url="http://api.openweathermap.org/data/2.5/weather?q=Jalandhar,IN&lang=en&units=metric&appid=".$api_key."";
        $currentTime= time();
        curl_setopt($ch, CURLOPT_HEADER , 0);
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE , 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);


    ?>
    <div style="font-family: Arial;background-color:black;width: 100%;position: absolute;top: 55px;bottom:0;overflow:hidden">
        <div class="container-block">
            <br>
            <h1><?php echo $data->name;?> Weather Status</h1>
            <p><?php echo date("l g",$currentTime)?></p>
            <p><?php echo date("jS F, Y",$currentTime)?></p>
            <p><?php echo ucwords($data->weather[0]->description)?></p>
            <p>Minimum Temperature: <?php echo $data->main->temp_min;?>&deg;C</p>
            <p>Maximum Temperature: <?php echo $data->main->temp_min;?>&deg;C</p>
            <p>Humidity: <?php echo $data->main->humidity;?>%</p>
            <p>Pressure: <?php echo $data->main->pressure;?>%</p>
            <p>Wind Speed: <?php echo $data->wind->speed;?>%</p>
        </div>
    </div>;
</body>
</html>