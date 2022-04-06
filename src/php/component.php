<?php

// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);

session_start();
require_once "modelDatabase/database.php";
$show = new Show;


class Show {
    public function meta() {
        return "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\"> 
            <meta name=\"robots\" content=\"index, follow\"/> 
            <link rel=\"icon\" href=\"/starter-webpack/assets/favicon.ico\" />
            <link type=\"text/css\" rel=\"stylesheet\" href=\"/starter-webpack/src/styles/style.css\"> 
            <meta name=\"MobileOptimized\" content=\"width\" />
            <meta name=\"HandheldFriendly\" content=\"true\" />";
    }
    public function scripts() {
        return "<script type=\"module\" class=\"s_script\" type=\"text/javascript\" src=\"/starter-webpack/src/js/main.js\"></script>";

    }
}

?>



