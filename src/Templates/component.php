<?php
$show = new Show;

class Show
{
    public function meta()
    {
        return "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\"> 
            <meta name=\"robots\" content=\"index, follow\"/> 
            <link rel=\"icon\" href=\"/public/assets/favicon.ico\" />
            <link type=\"text/css\" rel=\"stylesheet\" href=\"/public/styles/style.css\"> 
            <meta name=\"MobileOptimized\" content=\"width\" />
            <meta name=\"HandheldFriendly\" content=\"true\" />";
    }
    public function scripts()
    {
        return "
        <script type=\"module\" type=\"text/javascript\" src=\"/public/js/dist/main.js\"></script>
        <script type=\"module\" type=\"text/javascript\" src=\"/public/js/dist/auth.js\"></script>
        <script type=\"module\" type=\"text/javascript\" src=\"/public/js/dist/board.js\"></script>";
    }
}
