<?
session_start();
include "../lib/dbconn.php";
?>
<div id="logo"><a href="index.php"><img src="./img/logo.png" border="0"></a>
</div>
<div id="moto"><img src="./img/moto.png"></div>
<div id="top_login">

    <?
    if (!$userid) {
        echo "<a href='./admin/admin.php'>관리자페이지</a>";
        echo "<a href='./member/member_form.php'>회원가입</a>";
        echo "<a href='./login/login_form.php'>로그인</a>";

    } else {
        if($userid=="admin"){
            echo "<a href='./admin/admin.php'>관리자페이지</a>";
        }
        echo "<a href='./login/member_form_modify.php'>".$usernick."(level:".$userlevel.")"."</a>";
        echo "<a href='./login/logout.php'>로그아웃</a>";
    }
    ?>
    <style>
        #top_login a {
            margin-right:5px;
        }
    </style>
</div>