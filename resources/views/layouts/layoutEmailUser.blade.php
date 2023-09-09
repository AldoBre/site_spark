<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
    
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

        .text_info {
            padding: 10px;
        }

        .container_pad {
            box-sizing: border-box;
        }

        .container_pad h1 {
            padding: 10px;
            text-align: center;
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

        .imgSize {
            color: rgb(119, 49, 141);
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container_pad">
            <h1>Solicitação de Contato Recebida com Sucesso!</h1>

            <div class="content">
                @yield('content')
            </div>
            <p class="text_info"> Recebemos seu contato, em até 2 dias úteis entraremos em contato com você, por e-mail ou telefone.</p>

            <div>
                Nos siga nas redes sociais!
                <div>
                    <a class="imgSize" href="https://www.instagram.com/belmiratech/"><span
                            class="mdi mdi-instagram"></span></a>
                </div>
            </div>

            <div class="footer_info">
                <p>Desenvolvido por <a class="footer" href="http://belmiratech.com.br">Belmira Tech &copy;</a> </p>
            </div>
        </div>
</body>

</html>
