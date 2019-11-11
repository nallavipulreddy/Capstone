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
    <link rel="stylesheet" href="css/kcstyles.css">
    <meta http-equiv="refresh" content="900;url=logout.php" />
<style>
    .tabcontent {
  color: black;
  display: none;
  background-color: beige;
  padding: 100px 20px;
  height: 409px;
}
    body{
        color: #fff;
        background-image: url("images/6.jpg");
        position: relative;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100%;
        
        font-family: 'Roboto', sans-serif;
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

<div >
    <div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="kc.php">Knowledge-Center</a>
                </td><td>
                <a href="soilmoisture.php">Soil moisture</a>
                </td><td>
                <a href="temperature.php">Temperature</a>
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

<!..............................................................................>
    <div class="container">
      
<title>LifeBlog | Home </title>
</head>
<body>
    <!-- container - wraps whole page -->
    <div class="container">
        <!-- navbar -->
        <!-- Page content -->
        <div class="content">
            <h2 class="content-title">Recent Articles</h2>
            <!-- more content still to come here ... -->
<?php
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
   <?php foreach ($posts as $post): ?>
    <div class="post" style="margin-left: 0px;">
        <img src="<?php echo $post['image'];?>" class="post_image" alt="Image not loaded">
        <a href="<?php echo $post['link'];?>" target="_blank">
            <div class="post_info">
                <p><?php echo $post['title'] ?></p>
                <div class="info">
                    <span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
                    <span class="read_more">Read more...</span>
                </div>
            </div>
        </a>
    </div>
<?php endforeach ?>
        </div>
        <!-- // Page content -->

        <!-- footer -->

    </div>

<!..............................................................................>

</body>
</html>