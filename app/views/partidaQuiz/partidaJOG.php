<?php

require_once(__DIR__ . "/../../util/config.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

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
</head>

<body>
    <img src="/GreenGo/logo/icon.svg">
    <p>Ainda estamos construindo o projeto...</p>
</body>

</html>