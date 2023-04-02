<?php

require_once "../config/config.php";

session_start();

if (isset($_SESSION['secret_word'])) {
    $WORD = $_SESSION['secret_word'];
} else {
    $WORD = Dictionnary::generateWord();
    $_SESSION['secret_word'] = $WORD;
}

$game = new SecretWordGame($WORD);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS_PATH?>style.css">
    <script src="<?=JS_PATH?>script.js"></script>
    <title>The Secret Game</title>
</head>

<body>
    <?php include INCLUDES_PATH . "header.php"; ?>

    <div id="main_content" class="flex">
        <script>
            let win = false;
        </script>
        <?php
        $arr = $game->try(null);
        
        if (!isset($_POST) || empty($_POST) || !isset($_POST['letter'])) {
            $game->generateInput($arr);
            $arr = $game->try(null);
        } else {
            $arr = $_POST['letter'];
            $arr = $game->try($arr);

            if ($arr['win']) {
                $game->generateWin();
                session_destroy();
        ?>
                <script>
                    var counter = 3;
                    var intervalId = null;

                    function finish() {
                        clearInterval(intervalId);
                        window.location.href = "index.php";

                    }

                    function bip() {
                        let redirection_elt = document.querySelector("#redirection_msg");
                        counter--;
                        if (counter == 0) finish();
                        else {
                            redirection_elt.innerText = "Vous allez être redirigés dans " + counter + " secondes !";
                        }
                    }

                    function start() {
                        intervalId = setInterval(bip, 1000);
                    }
                    start();
                </script>
        <?php
            } else $game->generateInput($arr);
        }
        ?>

    </div>

    <?php include INCLUDES_PATH . "footer.php"; ?>

</body>

</html>