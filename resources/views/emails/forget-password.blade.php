<!DOCTYPE html>
<html>

<head>
    <title>Redefinição de Senha</title>
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

        p {
            color: #666666;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        button {
            padding: 10px;
            background-color: black;
            color: yellow;
            font-size: 18px;
            border-radius: 8px;
            border: 0;
            width: 250px;
            height: 50px;
            cursor: pointer;
        }

        .footer {
            color: yellow;
        }

        .button {
            display: flex;
            justify-content: center;
            padding: 10px;
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
            <h1>Solicitação de Redefinição de Senha</h1>
            <p>Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.
            </p>

            <p>Para redefinir sua senha, clique no botão a baixo:</p>

            <div class="button">
                <a href="{{ $url }}"><button> Redefinir Senha </button></a>
            </div>

            <div class="div_info">

                <p>Se o botão não funcionar, <a href="{{ $url }}"> <b>Clique aqui.</b> </a> <br></p>

                <p>Se você não solicitou uma redefinição de senha, ignore este e-mail.</p>
            </div>
        </div>

        <div class="footer_info">
            <p>Desenvolvido por <a class="footer" href="http://belmiratech.com.br">Belmira Tech &copy;</a> </p>
        </div>
    </div>


</body>

</html>
