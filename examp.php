<?php
include'dbh.php';
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
$channel=$_SESSION['channel_id'];
$auth=$_SESSION['auth_key'];

		$ses=$_SESSION['channel_id'];
        $auth=$_SESSION['auth_key'];
        //echo $ses;
        echo $auth;
        $ch=curl_init();
        $url="https://api.thingspeak.com/channels/".$ses."/fields/1.json?api_key=".$auth."&results=2";
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);
        //echo $data;


?>


<div class="container">
    <!-- Navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
    <!-- // Navbar -->
    
    <div class="content" >
        <!-- Page wrapper -->
        <div class="post-wrapper">
            <!-- full post div -->
            <div class="full-post-div">
            <?php if ($post['published'] == false): ?>
                <h2 class="post-title">Sorry... This post has not been published</h2>
            <?php else: ?>
                <h2 class="post-title"><?php echo $post['title']; ?></h2>
                <div class="post-body-div">
                    <?php echo html_entity_decode($post['body']); ?>
                </div>
            <?php endif ?>
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
                    <?php foreach ($topics as $topic): ?>
                        <a 
                            href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>">
                            <?php echo $topic['name']; ?>
                        </a> 
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- // post sidebar -->
    </div>
</div>
<!-- // content -->
