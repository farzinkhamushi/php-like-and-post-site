<script src="html/jq3/jquery-3.2.1.js"></script>
<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.min.css"/>
<script src="../bs3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/all2.css">
<link rel="stylesheet" type="text/css" href="style/body1.css">
<link rel="stylesheet" type="text/css" href="style/nav11.css">
<link rel="stylesheet" type="text/css" href="style/post2.css">
<link rel="stylesheet" type="text/css" href="style/upload.css">
<link rel="stylesheet" type="text/css" href="style/explore5.css">
<link rel="stylesheet" href="style/bnav.css">
<script src="jq3/jquery-3.2.1.js"></script>
<script src="js/js.js"></script>
<!-- --------------------------------------------------------- Login ---------------------------------------------- -->
<?php 
global $session;
 if (!$session->is_signed_in()) { 
    redirect("login"); 
}
// if(!isset($_COOKIE['user_id'])){
//     $cooker = new Cooker();
// }else{
//     redirect("login");
// }


?>
<!------------------------------------------------------------- Router ------------------------------------------------>
<?php
$uri = $_SERVER['REQUEST_URI'];
if($uri == '/photos/index.php'){
    redirect('http://localhost/photos/');
    //require('routes/login.php');
}
?>
<!-- ---------------------------------------------------------- Users -------------------------------------------- -->
<?php
//$u1 = new User();
/*
        $u1 = User::find_by_id(7);
$u1->username = "ahmadi88";
$u1->password = "ah88ah88";
$u1->first_name = "mahmood";
$u1->last_name = "ahmadi nejad";
$u1->update();
*/
//$u1->create();
?>
<!-- ---------------------------------------------------------Upload  --------------------------------------------->
<?php
$message="";
if (isset($_POST['submit'])){
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->caption = $_POST['caption'];
    $photo->author = $session->user_id;
    $photo->set_file($_FILES['file_upload']);
    if ($photo->save()){
        $message = "Photo uploaded Successfully";
        unset($_FILES['file_upload']);
        unset($_POST['submit']);
    }else{
        $message = join("<br>",$photo->errors);
    }
    redirect("http://localhost/photos/");
    unset($_POST['submit']);
    //redirect("index.php");
}
?>

<div class="wrapper">
<!-- --------------------------------------------------Navigation --------------------------------------- -->
    <!--
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Store</a></li>
            <li><a href="">Contact</a></li>
        </ul>
        <ul class="social">
            <li><a href="" class="fb">Facebook</a></li>
            <li><a href="" class="tw">twitter</a></li>
        </ul>
    </nav>
    -->    
<!--  ------------------------------------------Theme setter ---------------------------------------- -->
<div class="them" >
        <toptheme class="box_shadow">
            <div style="flex-grow: 1;margin: auto 10px;">
                <!-- <span>Layout: </span> -->
                <a class="stack" style="color:#00b7ff;cursor: pointer;"><img width="17px" src="icons/stack.png" alt="" srcset=""></a>
                <a class="grid" style="color:#00b7ff;cursor: pointer;"><img width="17px" src="icons/grid.png" alt="" srcset=""></a>
            </div>
            <logo style="flex-grow: 1;text-align: center;">Instagram</logo>
            <div style="flex-grow: 1;text-align: end;margin: auto 10px;">
                <a class="black_theme" style="color:#00b7ff;cursor: pointer;"><img width="17px" src="icons/moon.png" alt="" srcset=""></a>
                <a class="light_theme" style="color:#00b7ff;cursor: pointer;"><img width="17px" src="icons/sun.png" alt="" srcset=""></a>
            </div>
        </toptheme>
    </div>
<!-- ----------------------------------------------------Logout ----------------------------------------->
<form action="logout" method="post" style="margin-top: 60px;">
    <input type="submit" name="logout" value="Log Out" style="background-color:#f00;color:#fff;border-style:none;padding: 3px;">
</form>
<!-- ---------------------------------------------------Live Search -->
<?php 
    require("./includes/live_search_1.php");
?>
<!-- -------------------------------------------------Form Upload ---------------------------------->
<?php 
    require('./includes/form_upload_1.php');
?>
<!----------------------------------------------- Profile ----------------------------------------------->
<?php 
    require('./includes/my_profile_1.php');
?>
<!--   ---------------------------------------------Posts  --------------------------------------------->
<?php 
    include("./includes/My_Posts_1.php");
?>
<br><br><br><br><br><br><br>
<!--   --------------------------------------------Buttom Nav--------------------------------------------->
<?php 
    require("./includes/Bottom_Nav_1.php");
?>
</div><!----wrapper ends -->
<!-- ------------------------------------------------JQuery ------------------------------- -->
<script>
    ////////////////////////////////////////Upload///////////////////////////////////////////
    const modal = document.getElementById('modal');
    const openuploadModal = document.getElementById('openuploadModal');
    const closeModal = document.getElementById('closeModal');

    openuploadModal.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
            handelMove(2,40,40);
        }
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        handelMove(2,40,40);
    });
    ////////////////////////////////////////    Profile   /////////////////////////////////////////////
    const _section = document.getElementById("blocks");
    const _profile = document.getElementById("profile");
    const _homeModal = document.getElementById("openhomeModal");
    const _profileModal = document.getElementById("openProfileModal");
    const _userImages = document.querySelectorAll('.user_images');
    const _othersImages = document.querySelectorAll('.others_images');

    _profileModal.addEventListener('click',() => {
        _profile.style.display = 'block';
        for (let i = 0; i < _userImages.length; i++){
            _userImages[i].style.display = 'block';
        }
        for (let j = 0; j < _othersImages.length; j++) {
            _othersImages[j].style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
    //as the document was loaded
    });

    _homeModal.addEventListener('click',() => {
        for (let j = 0; j < _othersImages.length; j++) {
            _othersImages[j].style.display = 'block';
        }
        _profile.style.display = 'none';
    });

    ////////////////////////////////////////////////Explore///////////////
    const live_serach = document.getElementById("live_serach");
    const openexploreModal = document.getElementById("openexploreModal");

    openexploreModal.addEventListener('click',()=>{
        live_serach.style.display = 'block';
    });

    window.addEventListener('click', (event) => {
        if (event.target === live_serach) {
            handelMove(2,40,40);
            live_serach.style.display = 'none';
        }
    });

    _homeModal.addEventListener('click',() => {
        handelMove(2,40,40);
        live_serach.style.display = 'none';
    });

    _profileModal.addEventListener('click',() => {
        live_serach.style.display = 'none';
    });

    openuploadModal.addEventListener('click',() => {
        live_serach.style.display = 'none';
    });
    //////////////////////////////////////////////////theme /////////////////////////////////////
    $("a.stack").on("click",function(){
        $("article").addClass("stack");
    });
    $("a.grid").on("click",function(){
        $("article").removeClass("stack");
    });
    $("a.black_theme").on("click",function(){
        $("body").addClass("black_theme");
        $("body").removeClass("light_theme");
        $("article").addClass("black_theme");
        $("article").removeClass("light_theme");
    });
    $("a.light_theme").on("click",function(){
        $("body").addClass("light_theme");
        $("body").removeClass("black_theme");
        $("article").addClass("light_theme");
        $("article").removeClass("black_theme");
    });
    ///////////////////////////////////////////////////ajax for like attempt ////////////////////////

    function photo_like(_photo_liked_id,clicked_id,_element){
        let el = document.getElementById(clicked_id);
        let post_data = "photo_liked_id="+_photo_liked_id;
        let url = "/photos/index.php";
        let xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function(){
            if(xmlHttp.readyState === 4){
                //alert(xmlHttp.responseURL);
                //alert(xmlHttp.responseText);
                let _text = xmlHttp.responseText;
                HandleResponse(_text,clicked_id,el);
            }
        }
        xmlHttp.open("POST",url,true);
        xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xmlHttp.send(post_data);
    }

    function HandleResponse(_text,clicked_id,el){
        let i = 0;
        let json_char="";
        let char = "";
        let _message = "";
        while(i<_text.length){
            char = _text.charAt(i);
            /*
            let x = "i : "+i+ " char : " +char+ " json-char : "+json_char ;
            alert(x);
            */
            if(char === "{"){
                while(char !== "}"){
                    char = _text.charAt(i);
                    json_char += char;
                    i++;
                }
            }
            i++;
        }
        //alert("this: "+json_char);
        let like_counts = JSON.parse(json_char);
        if(like_counts.message>1){
            _message = like_counts.message + " likes";
        }else{
            if(like_counts.message === 1){
                _message = like_counts.message + " like";
            }
            if(like_counts.message === 0){
                _message = "no like";
            }
        }
        el.innerHTML = _message;
        //el.style.opacity = 1;
        //alert(like_counts.message);
    }

    function handle_live_search(_serached){
        let reach_res_output = document.querySelectorAll('.reach_res_output');
        
            for (let index = 0; index < reach_res_output.length; index++) {
                reach_res_output[index].innerHTML = "";
            }
        
        if(_serached.length > 0){
            let post_data = "explore_word="+_serached;
            let url = "/photos/explore/index.php";
            let xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function(){
                if(xmlHttp.readyState === 4){
                    let _text = xmlHttp.responseText;
                    _jsonparsed = JSON.parse(_text);
                    for (let index = 0; index < _jsonparsed.search.length; index++) {
                        let anchor_tag = 
                        "<a style='display:flex;padding-left:10px;padding-top:10px;text-decoration:none;cursor:pointer;' href='./profiles/"
                        +_jsonparsed.search[index].user+"'>"
                        +"<img style='border:1px solid #e3e3e3;margin-left:2px;margin-top:2px;width:18px;height:18px;border-radius:9px;' src='"
                        +_jsonparsed.search[index].profile
                        +"'/>"
                        +"<div><p>"+_jsonparsed.search[index].user+"</p>"
                        +"<p>"+_jsonparsed.search[index].first+"</p></div>"
                        +"</a>";
                        
                        //alert(_jsonparsed.search[index].first);
                        reach_res_output[index].innerHTML = anchor_tag;
                    }
                }
            }
            xmlHttp.open("POST",url,true);
            xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xmlHttp.send(post_data);
        }
    }

</script>