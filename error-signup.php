<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/3552f262a9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/error.css">
        <title>Erro de autenticação</title>
    </head>
    <body>
        <div class="error-container">
            <div class="error-content">
            <?php
                session_start();
                echo "<h1>".$_SESSION['error']."</h1>";
            ?>
        <i class="fa fa-circle-exclamation"></i>
        <button onclick="goBack()">Voltar</button>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>