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
      @include('sidemenu')
      <div class="zonecentre">
         <section class="wrap">
            <h2>Gestion de vos experiences</h2>
            @if ($errors->any())
            <br>
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
                  @endif

            <form action="{{asset('admin/experiences')}}" method="POST">
            @foreach ($experiences_info as $experiences)

            
            <div class="experiences_individuelle" id="experience{{$experiences['id']}}">
                  {{csrf_field()}}
                  <div class='experiences'>
                     <input type="hidden"  name="id[]" value="{{$experiences['id']}}">
                     <br>
                     <input type="hidden"  name="user_id[]" value="{{$experiences['user_id']}}" >
                     <br>
                     <label for="poste{{$experiences['id']}}">
                     <input type="text"  name="poste[]" placeholder="Poste occupé" value="{{$experiences['titre']}}" id="poste{{$experiences['id']}}">
                     </label>
                     <br>
                     <label for="societe{{$experiences['id']}}">
                     <input type="text" placeholder="Société"  name="societe[]"  value="{{$experiences['societe']}}" id="societe{{$experiences['id']}}">
                     </label>
                     <label for="ville{{$experiences['id']}}">
                     <input type="text" name="ville[]" placeholder="Ville"  value="{{$experiences['ville']}}" id="ville{{$experiences['id']}}">
                     </label>
                     <br>
                     De
                     <label for="debut{{$experiences['id']}}">
                     <input type="date" name="debut[]"  value="{{$experiences['debut']->format('Y-m-d')}}" id="debut{{$experiences['id']}}">
                     </label>
                     à
                     <label for="fin{{$experiences['id']}}">
                     <input type="date" name="fin[]"  value="{{$experiences['fin']->format('Y-m-d')}}" id="fin{{$experiences['id']}}">
                     </label>
                     <br>
                     <label for="descriptif{{$experiences['id']}}">
                     <textarea class="descriptif" name="descriptif[]" id="descriptif{{$experiences['id']}}"  cols="30" rows="10"
                        placeholder="Décrivez votre experience" >{{$experiences['descriptif']}}</textarea>
                     </label>
                     <br>
                     <a href="#" data-id="{{$experiences['id']}}" class="delete">Supprimer l'experience</a>
                  </div>
            </div>
            @endforeach
            <div id="ajout_exp"></div>

            <input type="submit" value="Mettre à jour l'experience">

            </form>
            <br>
            <a href="javascript:;" title="Ajouter une formation" class="ajout" rel="info"> Ajouter une experience</a>
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
               url: "{{ url('/admin/experiences/delete') }}",
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
   var add_url = "{{ url('admin/experiences/') }}";
   var token ='{{csrf_field()}}';
   
   
</script>
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>
<script src="{{asset('js/experiences.js')}}"></script>
@endsection