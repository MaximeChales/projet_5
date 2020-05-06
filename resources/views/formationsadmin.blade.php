@extends('template')

@section('title')

Administration - Formations

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
            <h2>Gestion de vos formations</h2>
            <form action="{{ url('admin/formations') }}" method="POST">
                {{csrf_field()}}
                    @foreach ($formations_info as $formations)
                    <div class='experiences'>

                    <label for="id">
                                       <input type="hidden" id="id" name="id" value="{{$formations['id']}}">
                               </label>

                               <label for="formation">
                                       <input type="text" id="formation" name="formation" placeholder="Formation suivie"
                                        value="{{$formations['titre']}}">
                               </label>
                               <br>
                               <label for="societe">
                                       <input type="text" placeholder="Société" id="societe" value="{{$formations['societe']}}">
                               </label>
                               <br>
                                De
                               <label for="debut">
                                       <input type="date" name="debut" id="debut" value="{{$formations['debut']->format('Y-m-d')}}">
                               </label>
                               à
                               <label for="fin">
                                       <input type="date" name="fin" id="fin" value="{{$formations['fin']->format('Y-m-d')}}">
                               </label>
                               <br>
                               <label for="descriptif">
                                       <textarea class="descriptif" name="descriptif" id="descriptif" cols="30" rows="10" 
                                       placeholder="Décrivez votre formation" >{{$formations['descriptif']}}</textarea>
                               </label>
                               <br>
                     </div>
                    @endforeach
                    <input type="submit" value="Mettre à jour vos formations">
                </form>
            </section>
            </div>
        </div>
</section>
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>


@endsection
