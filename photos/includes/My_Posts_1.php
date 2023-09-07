<section id="blocks" style="margin-top: 40px;">
    <?php
    $photos = Photo::find_all();
    foreach ($photos as $photo):
    ?>
    <article class="box_shadow <?php if($session->user_id == $photo->author){echo 'user_images';}else{ echo 'others_images';} ?>">
        <div class="pictures_link">
            <a style="color: #1b6d85;" href="delete_photo.php/?id=<?php echo $photo->id; ?>">Delete</a>
            <a style="color: #1b6d85;" href="edit_photo.php/?id=<?php echo $photo->id; ?>">Edit</a>
            <a style="color: #1b6d85;" href="">View</a>
        </div>
        <img width="100%" src="<?php echo $photo->picture_path(); ?>" alt="">
        <div style="display: flex;justify-content: flex-start;">
            <a style="color: #1b6d85;padding: 5px;height: 30px" href="">
                <img width="20px" height="20px" style="border-radius: 10px;border:1px solid #ececec;" src="
                <?php
                    $user=User::find_by_id($photo->author);
                    echo $user->profile;
                ?>
                ">
                <?php
                    $user=User::find_by_id($photo->author);
                    echo $user->username;
                ?>
            </a>
            <a style="transition: all 1s;opacity:1;padding: 5px; padding-left:10px; color: #709586;cursor:pointer; display: flex;flex-direction: row;height: 27px;">
                <img style="width:17px;height: 17;" src="icons/sun.png" alt="" srcset="">
                <p style="font-size: 1.2rem;" id="like_c<?php echo $photo->id; ?>" onclick="photo_like('<?php echo $photo->id; ?>','like_c<?php echo $photo->id; ?>',this)">
                    <?php
                        global $session;
                        $likes1 = Like::find_all();
                        $count1=0;
                        foreach($likes1 as $key=>$value){
                            if ($value->photo_id == $photo->id){
                                if ($value->isliked){
                                    //echo "it is me I liked it : " . $value->liker_id . "<br>";
                                    $count1++;
                                }
                            }
                        }
                        if($count1>1){
                            echo $count1." likes";
                        }else{
                            if($count1==1){
                                echo $count1." like";
                            }else{
                                echo "no like";
                            }
                        }
                    ?>
                </p>
            </a>
        </div>
        <div style="max-width: 300px;display: flex;justify-content: center;">
            <p style="width: 100%;overflow: auto;"><?php echo $photo->caption; ?></p>
        </div>
    </article>
    <?php endforeach; ?>
</section>