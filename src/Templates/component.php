<?php
$show = new Show;

class Show {
    public function meta() {
        return "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\"> 
            <meta name=\"robots\" content=\"index, follow\"/> 
            <link rel=\"icon\" href=\"/starter-webpack/public/assets/favicon.ico\" />
            <link type=\"text/css\" rel=\"stylesheet\" href=\"/starter-webpack/public/styles/style.css\"> 
            <meta name=\"MobileOptimized\" content=\"width\" />
            <meta name=\"HandheldFriendly\" content=\"true\" />";
    }
    public function scripts() {
        return "<script type=\"module\" type=\"text/javascript\" src=\"/starter-webpack/public/js/main.js\"></script>";

    }
}

?>



