@extends('template')

@section('title')

Administration - {{$user_info['prenom']}} {{$user_info['nom']}}

@endsection

@section('content')
<section>
<div class="administrationbandeau"><h1 class="textheaderadmin"> Administration</h1></div>
<div class="contentadmin">
@include('sidemenu')

    <div class="zonecentre">
        <section class="wrap">
            <h2>Préface</h2>
            <br> Bienvenue sur la partie administration de votre site cv ,  {{$user_info['prenom']}} {{$user_info['nom']}}.
            <br> Celle-ci est divisée en 3 parties distinctes afin d'en faciliter un maximum l'utilisation.
            <br> Tout d'abord, vous avez la section "présentation" qui vous permets de mettre à jour vos informations en toute facilité.
            <br>
            <br> Vous avez ensuite la section "Experiences" qui vous permet d'accéder aux experiences déja publiés afin de pouvoir les consulter, les éditer ou les supprimer.
            <br>
            <br> Vous avez pour finir la partie gestion des formations qui vous permet de voir les formations et de les modifier au meme titre que les experiences.
            <br>
            <br> Si vous avez besoin d'assistance dans l'utilisation de votre site, n'hésitez pas à me contacter contacter par mail:  maxime.chales@yahoo.fr

        </section>
    </div>
</div>
</section>
@endsection
