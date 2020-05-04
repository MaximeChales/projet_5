@extends('template')

@section('title')

Administration - Experiences

@endsection

@section('experiencesadmin')
<section>
    <div class="administrationbandeau">
        <h1 class="textheaderadmin"> Administration</h1>
    </div>

    <div class="contentadmin">
    <div class="mb" id="mb">
            <label id="responsive-nav" for="hamburger">
                <i class="fas fa-bars fa-2x"></i>
            </label>
            <input type="checkbox" id="hamburger" />
            <nav class="navigation" id="nav">
                <a href="profil" ><div class="lien">Gestion de mes Informations</div></a>
                <hr>
                <a href="projets">Gestion de mes Projets </a>
                <hr>
                <a href="experiences"> Gestion des expériences</a>
                <hr>
                <a href="formations"> Gestion des Formations</a>
            </nav>
    </div>
        <div class="zonecentre">
            <section class="wrap">
            <h2>Gestion de vos experiences</h2>
                <form action="experiencesadmin" method="POST">
                    @foreach ($experiences_info as $experiences)
                    <div class='experiences'>

                               <label for="poste">
                                       <input type="text" id="poste" name="poste" placeholder="Poste occupé">
                               </label>
                               <br>
                               <label for="societe">
                                       <input type="text" placeholder="Société" id="societe">
                               </label>
                               <label for="ville">
                                       <input type="text" name="ville" placeholder="Ville" id="ville">
                               </label>
                               <br>
                                De
                               <label for="debut">
                                       <input type="date" name="debut" id="debut">
                               </label>
                               à
                               <label for="fin">
                                       <input type="date" name="fin" id="fin">
                               </label>
                               <br>
                               <label for="descriptif">
                                       <textarea class="descriptif" name="descriptif" id="descriptif" cols="30" rows="10" placeholder="Décrivez votre experience"></textarea>
                               </label>
                               <br>
                     </div>
                    @endforeach
                    <input type="submit" value="Mettre à jour vos experiences">
                </form>
            </section>
            </div>
        </div>
</section>
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../public/js/tiny.js"></script>


@endsection
