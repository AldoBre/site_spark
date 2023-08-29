<!DOCTYPE html>

<head>

    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 800px;
            ;
            margin: auto;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container_pad {
            padding: 15px;
            box-sizing: border-box;
        }

        h1 {
            color: #333333;
            display: flex;
            justify-content: center;
        }

        .content {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        p {
            color: #666666;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .footer {
            color: yellow;
        }

        .div_info {
            text-align: center;
        }

        .footer_info {
            max-width: 800px;
            margin: auto;
            margin-top: -10;
            text-align: center;
            background-color: black;
            padding: 0px 20px;
            border-end-start-radius: 10px;
            border-end-end-radius: 10px;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container_pad">
            <h1>Solicitação de Contato</h1>
            <p>Olá, recebemos uma solicitação de contato, retorme para o e-mail ou pelo telefone a baixo, seguem dados
            </p>

            <div class="content">
                @yield('content')
            </div>

            <div class="div_info">
                <p>Lembre-se o prazo para retorno é de ate 48 Horas. </p>
            </div>
        </div>

        <div class="footer_info">
            <p>Desenvolvido por <a class="footer" href="http://belmiratech.com.br">Belmira Tech &copy;</a> </p>
        </div>
    </div>
</body>

</html>
