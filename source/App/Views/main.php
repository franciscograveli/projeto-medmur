 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styleAll.css">
    <link rel="stylesheet" href="public/css/card.css">
    <script src="public/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="public/img/favicon_io/favicon.ico" type="image/x-icon">
    <title>Pàgina Principal</title>
</head>
<body>
    <div class="container">
        <div class="c-loader-container" id="loader">
            <div class="c-loader"></div>
        </div>
        <div class="card">
            <div class="card-text">
                <div class="portada" id="avatar"></div>
                <div class="title-total d-flex">
                    <h2 id="name"></h2>

                    <div class="desc" id="desc"></div>
                    <div class="actions" id="actions">
                        <button type="button" id="email"><i class="far fa-envelope"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex w-100">
        <form action="./logout" method="POST">
            <input type="hidden" name="provider" value="logout">
            <button type="button"  title="Logout" id="logoutButton">Sair <i class="material-icons">&#xe879;</i></button>
        </form>
           
        </div>

    </div>
</body>
</html> 
