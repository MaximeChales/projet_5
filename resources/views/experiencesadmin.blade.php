@extends('template')

@section('title')

Administration - Experiences

@endsection

@section('content')
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
                <a href="user" >Gestion de mes Informations</a>
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
            @foreach ($experiences_info as $experiences)
            <form action="{{asset('admin/experiences')}}" method="POST">
                {{csrf_field()}}
                    <div class='experiences'>

                               <label for="id">
                                       <input type="hidden" id="id" name="id" placeholder="id" value="{{$experiences['id']}}">
                               </label>
                               <br>
                               <label for="poste">
                                       <input type="text" id="poste" name="poste" placeholder="Poste occupé" value="{{$experiences['titre']}}">
                               </label>
                               <br>
                               <label for="societe">
                                       <input type="text" placeholder="Société"  name="societe" id="societe" value="{{$experiences['societe']}}">
                               </label>
                               <label for="ville">
                                       <input type="text" name="ville" placeholder="Ville" id="ville" value="{{$experiences['ville']}}">
                               </label>
                               <br>
                                De
                               <label for="debut">
                                       <input type="date" name="debut" id="debut" value="{{$experiences['debut']->format('Y-m-d')}}">
                               </label>
                               à
                               <label for="fin">
                                       <input type="date" name="fin" id="fin" value="{{$experiences['fin']->format('Y-m-d')}}">
                               </label>
                               <br>
                               <label for="descriptif">
                                       <textarea class="descriptif" name="descriptif" id="descriptif" cols="30" rows="10" 
                                       placeholder="Décrivez votre experience" >{{$experiences['descriptif']}}</textarea>
                               </label>
                               <br>
                     </div>
                    <input type="submit" value="Mettre à jour vos experiences">
                </form>
             @endforeach   
            </section>
            </div>
        </div>
</section>
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>


@endsection
