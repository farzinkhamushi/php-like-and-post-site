<profile id="profile" style="transition: all 0.5s; display: none;margin-top: 60px;">
    <?php 
        //global $session; 
        $prof = User::find_by_id($session->user_id);
    ?>
    <img src="<?php echo $prof->profile; ?>" alt="" srcset="" 
    width="100px" height="100px" style="border-radius: 50px;border:1px solid #ececec;">
    <h1><?php echo $prof->username; ?></h1>
    <p><?php echo $prof->first_name; ?></p> <p> 
    <?php echo $prof->last_name; ?></p>
    <?php echo $prof->bio; ?></p>
</profile>
