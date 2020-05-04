@extends('template') 
@section('title') 
Administration Projets 
@endsection
@section('projetsadmin')
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
            <h2>Gestion de vos projets</h2>
                <form action="projetsadmin" method="POST">
                    @foreach ($projets_info as $projets)
                    <div class='projet'>
                               
                               <label for="slide">
                                       <input type="file" id="slide" name="slide" accept="image/png, image/jpeg">
                               </label>  
                               <label for="linkprojets">
                                       <input type="text" placeholder="Lien du projet" id="linkprojets">
                               </label>    
                               <label for="altprojet">
                                       <input type="text" name="altprojet" placeholder="Descriptif" id="altprojet"> 
                               </label>        
                               <br>
                     </div>          
                    @endforeach
                    <input type="submit" value="Mettre à jour vos projets">
                    </form>
            </section>
            </div>
        </div>
</section>
<script src="public/js/projets.js"></script>

@endsection