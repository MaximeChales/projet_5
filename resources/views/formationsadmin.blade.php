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
      @include('sidemenu')
      <div class="zonecentre">
         <section class="wrap">
            <h2>Gestion de vos formations</h2>
            <div class='formations'>
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
               <form action="{{ url('admin/formations/') }}" method="POST">   
               {{csrf_field()}}
               @foreach ($formations_info as $formations)
               <div class="formation_individuelle" >

                     <input type="hidden" name="id[]" value="{{$formations['id']}}">
                     <label for="formation{{$formations['id']}}">
                     <input type="text" name="formation[]" placeholder="Formation suivie"
                        value="{{$formations['titre']}}" id="formation{{$formations['id']}}">
                     </label>
                     <br>
                     <label for="societe{{$formations['id']}}">
                     <input type="text" placeholder="Société" name="societe[]" value="{{$formations['societe']}}" id="societe{{$formations['id']}}">
                     </label>
                     <br>
                     De
                     <label for="debut{{$formations['id']}}">
                     <input type="date" name="debut[]"  value="{{$formations['debut']->format('Y-m-d')}}" id="debut{{$formations['id']}}">
                     </label>
                     à
                     <label for="fin{{$formations['id']}}">
                     <input type="date" name="fin[]" value="{{$formations['fin']->format('Y-m-d')}}" id="fin{{$formations['id']}}">
                     </label>
                     <br>
                     <label for="descriptif{{$formations['id']}}">
                     <textarea class="descriptif" name="descriptif[]" cols="30" rows="10"
                        placeholder="Décrivez votre formation" id="descriptif{{$formations['id']}}">{{$formations['descriptif']}}</textarea>
                     </label>
                     <br>
                     <a href="#" data-id="{{$formations['id']}}" class="delete">Supprimer la formation</a>
                  
               </div>
               @endforeach
               <div id="ajoutArticle">
               <div id="ajout"></div>
               <input type="submit" value="Mettre à jour la formation">
               <br>
               </form>
                
            </div>
               <a href="javascript:;" title="Ajouter une formation" class="ajout" id="ajoutformation" rel="info"> Ajouter une formation</a>
            </div>
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
               url: "{{ url('/admin/formations/delete') }}",
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
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>
<script src="{{asset('js/formations.js')}}"></script>
@endsection
