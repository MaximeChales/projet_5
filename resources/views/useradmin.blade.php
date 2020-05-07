@extends('template') 

@section('title') Administration présentation @endsection 

@section('content')

<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<section>
    <div class="administrationbandeau">
        <h1 class="textheaderadmin"> Administration</h1></div>
        
    <div class="contentadmin">
    <div class="mb" id="mb">
            <label id="responsive-nav" for="hamburger">
                <i class="fas fa-bars fa-2x"></i>
            </label>
            <input type="checkbox" id="hamburger" />
            <nav class="navigation" id="nav">
                <a href="user" ><div class="lien">Gestion de mes Informations</div></a>
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

                <div class="section">
                    <form action="{{ url('admin/user') }}" method="POST">
                        {{csrf_field()}}
                    <div class="wrap">
                        <div class="photo">
                            <h2>Votre Photo</h2>
                            <br>
                            <label for="photo">
                                <input type="file" id="photo" name="photo" accept="image/png, image/jpeg" value="{{$user_info['photo_profil']}}" >
                            </label>
                        </div>
                        <h2>Vos Informations</h2>
                        <div class="presentation">
                            <label for="nom">
                                <input type="text" placeholder="votre nom" name="nom" value="{{$user_info['nom']}}">
                            </label>

                            <input type="hidden" name="user_id" value="{{$user_info['id']}}">

                            <label for="prenom">
                                <input type="text" placeholder="votre prénom" name="prenom" value="{{$user_info['prenom']}}">
                            </label>
                            <br>
                            <label for="date_de_naissance">
                                <input type="date" placeholder="votre date de naissance" name="date_de_naissance"
                                 value="{{$user_info['date_de_naissance']->format('Y-m-d')}}">
                            </label>
                            <br>
                            <label for="job">
                                <input type="text" placeholder="votre emploi" name="job"value="{{$user_info['job']}}">
                            </label>
                           
                            <br>

                            <label for="address">
                                <input type="text" placeholder="votre adresse"  id="address" name="address" value="{{$user_info['adresse']}}">
                            </label>
                            <br>
                            <label for="cp">
                                <input type="text" placeholder="votre Code Postal" id="cp"value="{{$user_info['code_postal']}}">
                            </label>
                            <br>
                            <label for="town">
                                <input type="text" placeholder="votre ville" id="town" value="{{$user_info['ville']}}">
                            </label>
                            <br>
                            <label for="phonenumber">
                                <input type="text" placeholder="votre numero de téléphone" id="phonenumber" value="{{$user_info['telephone']}}">
                            </label>
                            <br>

                            <label for="email">
                                <input type="text" placeholder="votre numero adresse email" id="email" name="email" value="{{$user_info['email']}}">
                            </label>

                            <label for="password">
                                <input type="text" placeholder="votre mot de passe" name="password" id="password" value="{{$user_info['password']}}">
                            </label>
                            <br>

                                <div class="permis">
                                    <br> Si vous possédez le permis B, cochez la case
                                    <label for="permis">
                                        <input type="checkbox" name="permis" id="permis">
                                    </label>
                                </div>
                                <br>
                                <div class="interests">
                                    <h2> Vos centres d’intérêts&nbsp;:</h2>

                                    @foreach ($centres_interets_info as $centres_interets)
                                    <div class="ci">
                                        <br>
                                        
                                            <div class="ciseul">
                                        <label for="logoci">        
                                                <input type="file" id="logoci" name="logoci" accept="image/png, image/jpeg" 
                                                value="{{$user_info['logo']}}">
                                        </label>
                                        <label for="altci">        
                                                <input type="text" name="altci" placeholder="Descriptif" id="altci" 
                                                value="{{$user_info['name']}}">
                                         </label>       
                                            </div>
                                        
                                    </div>
                                    @endforeach
                                </div>

                               <div class="contact">
                                <h2>Vos reseaux sociaux</h2>
                                @foreach ($contact_info as $contact)
                                <label for="logors">
                                        <input type="file" id="logors" name="rs" accept="image/png, image/jpeg" value="{{$user_info['logo']}}">
                                </label>  
                                <label for="linkrs">
                                        <input type="text" placeholder="lien réseau social" id="linkrs" value="{{$user_info['url']}}">
                                </label>    
                                <label for="altrs">
                                        <input type="text" name="altalt" placeholder="Descriptif" id="altrs" value="{{$user_info['name']}}"> 
                                </label>        
                                <br>
                                @endforeach
                            </div>     
                            
                            <input type="submit" value="Mettre à jour votre profil">
                        </div>
                    </div>
                    </form>
                </div>
            </section>
            </div>
        </div>
</section>
<script src="public/js/user.js"></script>

@endsection