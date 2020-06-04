@extends('template')
@section('title') Administration présentation @endsection
@section('content')
<section>
   <div class="administrationbandeau">
      <h1 class="textheaderadmin"> Administration</h1>
   </div>
   <div class="contentadmin">
      @include('sidemenu')
      <div class="zonecentre">
         <section class="wrap">
            <div class="section">
               <form action="{{ url('admin/user') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="wrap">
                  
                  @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
                  @endif

                     <div class="photo">
                        <h2>Votre Photo</h2>
                        <br>
                        <label for="photo">
                        <img src="{{asset('img/'.$user_info['photo_profil'])}}" alt="photo" class="photo photoadmin">
                        <input type="file"  name="photo_profil" id="photo" >
                        </label>
                        <br>
                     </div>
                     <h2>Vos Informations</h2>
                     <div class="presentation">
                        <label for="nom">
                        <input type="text" placeholder="votre nom" id="nom" name="nom" value="{{$user_info['nom']}}">
                        </label>
                        <label for="prenom">
                        <input type="text" placeholder="votre prénom" id="prenom" name="prenom" value="{{$user_info['prenom']}}">
                        </label>
                        <br>
                        <label for="date_de_naissance">
                        <input type="date" name="date_de_naissance"
                           value="{{$user_info['date_de_naissance']->format('Y-m-d')}}" id="date_de_naissance">
                        </label>
                        <br>
                        <label for="job">
                        <input type="text" placeholder="votre emploi" name="emploi" value="{{$user_info['job']}}" id="job">
                        </label>
                        <br>
                        <label for="adresse">
                        <input type="text" placeholder="votre adresse"   name="adresse" value="{{$user_info['adresse']}}" id="address">
                        </label>
                        <br>
                        <label for="code_postal">
                        <input type="text" placeholder="votre Code Postal"  name="code_postal"  value="{{$user_info['code_postal']}}" id="cp">
                        </label>
                        <br>
                        <label for="ville">
                        <input type="text" placeholder="votre ville"  value="{{$user_info['ville']}}" name="ville" id="town">
                        </label>
                        <br>
                        <label for="telephone">
                        <input type="text" placeholder="votre numero de téléphone" name="telephone"  value="{{$user_info['telephone']}}" id="phonenumber">
                        </label>
                        <br>
                        <label for="email">
                        <input type="text" placeholder="votre numero adresse email" name="email" value="{{$user_info['email']}}" id="email">
                        </label>
                        <div class="permis">
                           <br> Permis obtenus
                           <label for="permis">
                           <br>
                           <input type="text" name="permis" id="permis" value="{{$user_info['permis_b']}}">
                           </label>
                        </div>
                        <br>
                        <div class="interests">
                           <h2> Vos centres d’intérêts&nbsp;:</h2>
                           @foreach ($centres_interets_info as $centres_interets)
                           <div class="ci" id="centres_interets{{$centres_interets['id']}}">
                              <br>
                              <div class="ciseul"  >
                                 <input type="hidden"  name="ci_id[]" value="{{$centres_interets['id']}}" >
                                 <img src="{{asset('img/'.$centres_interets['logo_ci'])}}" alt="{{$centres_interets['description_ci']}}" class="logosadmin">
                                 <br>
                                 <label for="logo_ci{{$centres_interets['id']}}">
                                 <input type="file"  name="logo_ci[]" id="logo_ci{{$centres_interets['id']}}">
                                 </label>
                                 <label for="altci{{$centres_interets['id']}}">
                                 <input type="text" name="altci[]" placeholder="Descriptif"
                                    value="{{$centres_interets['description_ci']}}" id="altci{{$centres_interets['id']}}">
                                 </label>
                                 <a href="#" data-id="{{$centres_interets['id']}}" class="delete_ci">
                                 <i class="far fa-trash-alt fa-1x"></i>
                                 </a>
                              </div>
                           </div>
                           @endforeach
                           <div id="ajout_ci"></div>
                           <a href="javascript:;" title="Ajouter un centre d'interet" class="ajout_ci" id='bouton_ajout' rel="info"> Ajouter un centre d'interet</a>
                        </div>
                        <div class="contact">
                           <h2>Vos reseaux sociaux</h2>
                           @foreach ($contact_info as $contact)
                           <div class="rscontent" id="contact{{$contact['id']}}">
                              <input type="hidden"  name="id[]" value="{{$contact['id']}}" >
                              <label for="logo_rs{{$contact['id']}}">
                              <br>
                              <img src="{{asset('img/'.$contact['logo_rs'])}}" alt="{{$contact['description_rs']}}" class="logosadmin">
                              <br>
                              <input type="file"  name="logors[]" id="logo_rs{{$contact['id']}}">
                              </label>
                              <label for="linkrs{{$contact['id']}}">
                              <input type="text" placeholder="lien réseau social" name="linkrs[]"  value="{{$contact['url']}}" id="linkrs{{$contact['id']}}">
                              </label>
                              <label for="altrs{{$contact['id']}}">
                              <input type="text" name="altrs[]" placeholder="Descriptif"  value="{{$contact['description_rs']}}" id="altrs{{$contact['id']}}">
                              </label>
                              <a href="#" class="delete" data-id="{{$contact['id']}}"><i class="far fa-trash-alt fa-1x" ></i></a>
                           </div>
                           @endforeach
                           <div id="ajout_rs"></div>
                           <a href="javascript:;" class="ajout_rs" rel="info"> Ajouter un reseau social</a>
                        </div>
                        <br>
                        <h2>Accroche</h2>
                        <label for="accroche">
                        <input type="text" name="accroche"  placeholder="Descriptif"
                           value="{{$user_info['accroche']}}" id="accroche">
                        </label>
                        <br>
                        <input type="submit" value="Mettre à jour vos informations">
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </div>
   </div>
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script src="{{asset('js/centres_interets.js')}}"></script>
<script src="{{asset('js/reseaux_sociaux.js')}}"></script>
<script>
   $(".delete").click(function(){
      var rs_id = $(this).data("id");
      var token = document.querySelector('input[name=_token]').value
           $.ajax(
           {
               url: "{{ url('/admin/contact/delete/') }}",
               type: 'delete',
               dataType: "JSON",
               data: {
                   "id": rs_id,
                   "_method": 'DELETE',
                   "_token": token,
               },
               success: function ()
               {
                   alert("Suppression réussie");
                   document.location.reload(true);
               }
           });
       });
       
</script>
<script>
   $(".delete_ci").click(function(){
       var id = $(this).data("id");
      var token = document.querySelector('input[name=_token]').value
           $.ajax(
           {
               url: "{{ url('/admin/centres_interets/delete_ci/') }}",
               type: 'delete',
               dataType: "JSON",
               data: {
                   "id": id,
                   "_method": 'DELETE',
                   "_token": token,
               },
               success: function ()
               {
                   alert("Suppression réussie");
                   document.location.reload(true);
               }
           });
       });
       
</script>
@endsection