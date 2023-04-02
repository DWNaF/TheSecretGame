<?php 
require_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS_PATH?>style.css">
    <title>The Secret Game</title>
</head>
<body>
    
<?php include INCLUDES_PATH . "header.php"; ?>
    
    <div id="rules_main_content" class="flex">
        <p>You have to discover... <span id="bold_text">The Secret !</span> :)</p>
    </div>

    <?php include INCLUDES_PATH . "footer.php"; ?>
</body>
</html>