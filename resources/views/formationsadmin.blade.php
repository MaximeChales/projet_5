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
               @foreach ($formations_info as $formations)
               <div class="formation_individuelle" id="formation{{$formations['id']}}">
                  <form action="{{ url('admin/formations/') }}" method="POST">
                     {{csrf_field()}}
                     <label for="id" class="id">
                     <input type="text" id="id" name="id" value="{{$formations['id']}}" readonly>
                     </label>
                     <label for="formation">
                     <input type="text" id="formation" name="formation" placeholder="Formation suivie"
                        value="{{$formations['titre']}}">
                     </label>
                     <br>
                     <label for="societe">
                     <input type="text" placeholder="Société" id="societe" name="societe" value="{{$formations['societe']}}">
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
                     <input type="submit" value="Mettre à jour la formation">&nbsp;
                     <a href="#" data-id="{{$formations['id']}}" class="delete">Supprimer la formation</a>
                  </form>
               </div>
               @endforeach
               <div id="ajout"></div>
            </div>
            <div id="ajoutArticle">
               <a href="javascript:;" title="Ajouter une formation" class="ajout" rel="info"> Ajouter une formation</a>
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
                   $('#formation' + {{$formations['id']}}).hide();
               }
   
           });
       });
       
</script>
<script>
   var add_url = "{{ url('admin/formations/') }}";
   var token ='{{csrf_field()}}';
</script>
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>
<script src="{{asset('js/formations.js')}}"></script>
@endsection