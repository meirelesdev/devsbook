<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro - Devsbooks</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        
        <form method="POST" action="<?=$base;?>/signup">
            <?php
            if( !empty($flash) ) { ?>
            <div class="error">
                <p > <?=$flash;?> </p>
                </div>
            <?php } ?>
        <h1>Cadastre-se</h1>
        <p>É rápido e fácil.</p>

            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />
            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />
            <input placeholder="Digite sua senha" class="input" type="password" name="password" />
            <input id="birthdate" placeholder="Data de Nascimento" class="input" type="text" name="birthdate" />

            <input class="button singup" type="submit" value="Criar conta" />

            <a href="<?=$base;?>/login">Já tem conta? Login</a>
        </form>
    </section>

    <script src="https://unpkg.com/imask"></script>
    <script>
        IMask(
            document.getElementById('birthdate'),
            {
                mask:'00/00/0000'
            }
        )
    </script>
</body>
</html>