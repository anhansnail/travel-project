<!doctype html>
<html>
<head>
    <title>BotMan Widget</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
</head>
<style>

    html, body {
        background-color: #f9f9f9;
        background-image: url("<?php echo getUrl('/'); ?>/client/chatbot/image/lo.jpg");
    @import url('https://fonts.googleapis.com/css?family=Ubuntu');
        font-family: 'Ubuntu', "Helvetica Neue", Arial, sans-serif;
        font-size: 14px;
        margin: 0;
        padding: 0;


    }

    a.banner {
        display: none;
    }
</style>
<body>
<div>
    {{--    <h1>Check cái này</h1>--}}
</div>
<script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script>
</body>
</html>