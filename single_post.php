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
<!..............................................................................>
    <div class="container">
      
<title>LifeBlog | Home </title>
</head>
<body>
    <!-- container - wraps whole page -->
    <div class="container">
        <!-- navbar -->
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
    <?php
    $sql = "SELECT * FROM posts WHERE published=true";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <div class="content" >
        <!-- Page wrapper -->
        <div class="post-wrapper">
            <!-- full post div -->
            <div class="full-post-div">
                <h2 class="post-title"><?php echo $posts['title']; ?></h2>
                <div class="post-body-div">
                    <?php echo html_entity_decode($posts['body']); ?>
                </div>
            </div>
            <!-- // full post div -->
            
            <!-- comments section -->
            <!--  coming soon ...  -->
        </div>
        <!-- // Page wrapper -->

        <!-- post sidebar -->
        <div class="post-sidebar">
            <div class="card">
                <div class="card-header">
                    <h2>Topics</h2>
                </div>
                <div class="card-content">
                    <?php foreach ($posts as $post): ?>
                        <a 
                            href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['id'] ?>">
                            <?php echo $post['name']; ?>
                        </a> 
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- // post sidebar -->
    </div>
</div>
<!-- // content -->
    </div>
<!..............................................................................>

</body>
</html>