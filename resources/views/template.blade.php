<!DOCTYPE html>
<html lang="fr">

    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link
              href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
              rel="stylesheet">
        <meta charset="utf-8">
        <meta name="keywords" content="Mon site, maxime-chales, Développeur web,Maxime CHALES">
        <meta name="author" content="Maxime CHALES" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
              integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <body>
    @yield('content')
    </body>
    <footer class="blockfooter">
    <!--footer avec differents liens du site et les résaux sociaux de Jean Forteroche. -->
    <div class="wrap">
        <div class="copyright"> Création du site par <a href="https://mchales.alwaysdata.net/" target="blank">©Maxime CHALES </a> - 2020. Tous droits réservés</div>
        <div class="seclign">
            <div class="plandusite">
                <h2>Plan du site</h2>
                <a href="{{asset('/admin')}}">Administration</a>
                <a href="{{asset('/')}}">CV</a>
                <a href="{{asset('/logout')}}">Deconnexion</a>

                            </div>
            <div class="sn">
                <h2>Réseaux sociaux:</h2>
                <div class="logosrs">


                </div>
            </div>
        </div>
    </div>
</footer>

</html>
