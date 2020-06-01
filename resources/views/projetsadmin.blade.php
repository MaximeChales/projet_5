@extends('template')
@section('title')
Administration Projets
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<section>
   <div class="administrationbandeau">
      <h1 class="textheaderadmin"> Administration</h1>
   </div>
   <div class="contentadmin">
      @include('sidemenu')
      <div class="zonecentre">
         <section class="wrap">
            <h2>Gestion de vos projets</h2>
            <form action="{{ url('admin/projets') }}" method="POST" enctype="multipart/form-data">
            @if ($errors->any())
                  <div class="alert alert-danger">
                     <br>
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
                  @endif
               {{csrf_field()}}
               
               @foreach ($projets_info as $projets)
               <div class='projet' id="projets{{$projets['id']}}">
                  <input type="hidden"  name="id[]" value="{{$projets['id']}}">
                  <img src="{{asset('img/'.$projets['image'])}}" alt="{{$projets['titre']}}" class="projetsadmin">
                  <br>
                  <label for="slide{{$projets['id']}}">
                  <input type="file" id="slide{{$projets['id']}}" name="slide[]" accept="image/png, image/jpeg">
                  </label>
                  <label for="linkprojets{{$projets['id']}}">
                  <input type="text" id="linkprojets{{$projets['id']}}" name ="linkprojets[]" placeholder="Lien du projet" value="{{$projets['url']}}">
                  </label>
                  <label for="titreprojet{{$projets['id']}}">
                  <input type="text" id="titreprojet{{$projets['id']}}" name="titreprojet[]" placeholder="Descriptif"  value="{{$projets['titre']}}">
                  </label>
                  <label for="ordre{{$projets['id']}}">
                  <input type="text" id="ordre{{$projets['id']}}" name="ordre[]" placeholder="ordre" value="{{$projets['ordre']}}">
                  </label>
                  <br>
                  <a href="#" data-id="{{$projets['id']}}" class="delete">Supprimer le projet</a>
               </div>
               @endforeach
               <div id="ajout_projet"></div>
               <input type="submit" value="Mettre à jour les projets">
               &nbsp;
               <a href="javascript:;" title="Ajouter un projets" class="ajout_projet" rel="info"> Ajouter un projet</a>
            </form>
         </section>
      </div>
   </div>
</section>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script>
   $(".delete").click(function(){
       var id = $(this).data("id");
       var token = document.querySelector('input[name=_token]').value   
           $.ajax(
           {
               url: "{{ url('/admin/projets/delete') }}",
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
<script>
   var add_url = "{{ url('admin/projets') }}";
   var token ='{{csrf_field()}}';
</script>
<script src="{{asset('js/projets.js')}}"></script>
@endsection