<?php

session_start();

unset($_SESSION["userid"]);

unset($_SESSION["name"]);
session_destroy();
$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
} else {
    header('Location: index.php'); // default page
}
?>
