@extends('template')
@section('title')
{{$user_info['prenom']}} {{$user_info['nom']}}
@endsection
@section('content')
<div class="mb" id="mb">
   <label id="responsive-nav" for="hamburger">
   <i class="fas fa-bars fa-2x"></i>
   </label>
   <input type="checkbox" id="hamburger" />
   <nav class="navigation" id="nav">
      <a href="#coordonnees" id="presentation">Présentation</a>
      <a href="#experiences">Expériences professionnelles</a>
      <a href="#formations" id="formation">Formations</a>
   </nav>
</div>
<div class="remonter"><a href="#mb"><img src="../public/img/fleche.png" alt="remonter"></a></div>
<section class="section" id="coordonnees">
   <div class="wrap">
      <div class="entete">
         <div class="photo">
            <img src="{{asset('img/'.$user_info['photo_profil'])}}" alt="photo" class="photo">
         </div>
         <div class="presentation">
            <h1>{{$user_info['nom']}} &nbsp;{{$user_info['prenom']}}
               <br>
               {{$user_info['job']}}
            </h1>
            <br>
            <h2>{{$user_info['adresse']}} </h2>
            <h2>{{$user_info['ville']}}</h2>
            <h2 class="tel">{{$user_info['telephone']}}</h2>
            <br>
            <div class="rs">
               @foreach ($contact_info as $contact)
               <a href="{{$contact['url']}}" target="blank"><img src="{{asset('img/'.$contact['logo_rs'])}}" alt="{{$contact['description_rs']}}"></a>
               @endforeach
            </div>
            <h3><a href="mailto:{{$user_info['email']}}" class="mail">{{$user_info['email']}}</a></h3>
            <br>
            <h3>Né le {{ date('d m Y', strtotime($user_info['date_de_naissance'])) }}</h3>
            <br>
            <h3>{{$user_info['permis_b']}}</h3>
            <br>
            <div class="interests">
               <h3> Mes centres d’intérêts&nbsp;:</h3>
               <div class="ci">
                  @foreach ($centres_interets_info as $centres_interets)
                  <img src="{{asset('img/'.$centres_interets['logo_ci'])}}" alt="{{$centres_interets['description_ci']}}">
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section">
   <div class="bandeauparcours">
      {{$user_info['accroche']}}
   </div>
   <div class="wrap2">
      <br>
      <div class="projets">
         <div class="minibandeaux">
            <h3>Projets réalisés</h3>
         </div>
         <br><br>
         @foreach ($projets_info as $projets)
         <div class="slide">
            <a href="{{$projets['url']}}" target="blank">
               <img src="{{asset('img/'.$projets['image'])}}" alt="{{$projets['titre']}}">
               <br>
               <div class="txtslider">
                  {{$projets['titre']}}
               </div>
            </a>
         </div>
         @endforeach
      </div>
      <div class="experiences" id="experiences">
         <div class="minibandeaux">
            <h2>Expériences professionnelles </h2>
         </div>
         <br>
         @foreach ($experiences_info as $experiences)
         <div class="experience">
            <h3>{{$experiences['titre']}}</h3>
            <h4>{{$experiences['ville']}} - {{$experiences['societe']}}</h4>
            Du {{ date('m Y', strtotime($experiences['debut'])) }} au {{ date('m Y', strtotime($experiences['fin'])) }}
            <div class="li">
               {!!$experiences['descriptif']!!}
            </div>
         </div>
         @endforeach
      </div>
      <div class="formations">
         <div class="minibandeaux">
            <h2 id="formations">Formations</h2>
         </div>
         <br>
         @foreach ($formations_info as $formations)
         <div class="formation">
            <h3>{{$formations['titre']}}&nbsp;-&nbsp;{{$formations['societe']}}</h3>
            Du {{ date('m Y', strtotime($formations['debut'])) }} au {{ date('m Y', strtotime($formations['fin'])) }}
            <div class="li">
               {!!$formations['descriptif']!!}
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="{{asset('js/slider.js')}}"></script>
<script src="{{asset('js/scroll.js')}}"></script>
@endsection