<?php
require_once(__DIR__ . "/../../util/config.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto em Construção</title>
    <style>
        :root {
            --principal: hsl(150, 46%, 37%);
            --verdao: #04574d;
            --verdinho: #9acfb7;
            --branco: #ebf0f1;
            --branquinho: #ebf0f14b;
            --destaque: #f58c95;
            --rosinha: #f0b6bc;
            --cinza: #586660;
            --cinzinha: #d3dadb;
            width: 100%;
            height: 100%;
            font-family: Poppins-regular, Roboto;
        }
        @font-face {
            font-family: "Poppins";
            src: url("../fontes/Poppins-ExtraBold.ttf");
        }
        @font-face {
            font-family: "Poppins-regular";
            src: url("../fontes/Poppins-Regular.ttf");
        }
        @font-face {
            font-family: "Poppins-medium";
            src: url("../fontes/Poppins-Medium.ttf");
        }
        @font-face {
            font-family: "Poppins-semibold";
            src: url("../fontes/Poppins-SemiBold.ttf");
        }
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: var(--branco);
        }
        img {
            width: 500px;
            height: 500px;
        }
        p {
            font-size: 24px;
            color: var(--cinza);
            margin-top: 20px;
        }
    </style>
    <?php require_once(__DIR__ . "/../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>/views/css/quiz.css">
</head>
<body>
    <img src="/GreenGo/logo/icon.svg">
    <p>Você não pode excluir nesse momento.</p>
    <div class="text-left">
            <a href="javascript:history.back()" class="btn botaoVoltar btn-secondary">Voltar</a>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/registro.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.page-item a').click(function(e) {
                e.preventDefault();
                var targetDivId = $(this).data('target');
                $('#' + targetDivId).show(); // Exibe a div correspondente
                $('.content-div').not('#' + targetDivId).hide(); // Esconde as outras divs

                // Caso você queira rolar a página automaticamente para a div exibida, descomente a linha abaixo
                // $('html, body').animate({scrollTop: $('#' + targetDivId).offset().top}, 800);
            });
        });
    </script>

    <script>
        const ativar = (elemento) => {
            let itens = document.getElementsByClassName("page-item");
            for (i = 0; i < itens.length; i++) {
                itens[i].classList.remove("active");
            }
            elemento.classList.add("active");
        }
    </script>
</body>
</html>