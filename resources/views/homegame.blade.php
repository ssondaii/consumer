<!-- <?php 
    //session_start();
 ?> -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <?php 
            if(isset($_SESSION['playerName'])&&isset($_GET['name'])){
                $ss_name = $_SESSION['playerName'];
                $get_name = $_GET['name'];
                if($ss_name == $get_name){
                    echo '<div id="app">';
                    echo '<home-game></home-game>';
                    echo '</div>';
                }else{
                    echo '<h1>Đường dẫn sai.</h1>';
                }
            }
            else{
                echo '<h1>Bạn chưa đăng nhập.</h1>';
            }
         ?>
        <!-- <div id="app">
            <home-game></home-game>
        </div> -->
        <script src="/js/app.js" type="text/javascript"></script>
    </body>
</html>