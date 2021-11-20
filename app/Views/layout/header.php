<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <link rel="stylesheet" href="<?= BASE_URL . '/css/style.css' ?>">
    <title>Controle financeiro</title>
</head>

<!-- <script>
    var ambiente = "d";
    if(ambiente == "d") {
        const URL_BASE = "12"
    } else {

    }
</script> -->

<body>
    <header>
        <nav>
            <div class="navbarContent">
                <div class="logoSite">
                    <img src=" <?= BASE_URL.'/img/coin.png' ?>">
                    <span class="tituloSite">Gestor financeiro</span>
                </div>
                <ul>
                    <li>
                        <a href="<?=BASE_URL?>">Inicio</a>
                    </li>
                    <li>
                        <a href="">Sobre</a>
                    </li>
                    <li>
                        <?php if(isset($_SESSION['id_usuario'])): ?>
                            <a href="" class="userName"><i class="bi bi-person-circle"></i> Daniel</a>
                        <?php else: ?>
                         <a href="<?= BASE_URL . '/account/login'?>">Entrar</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>