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
                {{csrf_field()}}
             @foreach ($projets_info as $projets)
             <div class='projet' id="projets{{$projets['id']}}">

                    <label for="id">
                                  <input type="hidden" id="id" name="id[]" value="{{$projets['id']}}">
                    </label>

                    <label for="slide">
                                       <input type="file" id="slide" name="slide[]" accept="image/png, image/jpeg">
                    </label>
                               <label for="linkprojets">
                                       <input type="text" name ="linkprojets[]" placeholder="Lien du projet" id="linkprojets" value="{{$projets['url']}}">
                               </label>
                               <label for="titreprojet">
                                       <input type="text" name="titreprojet[]" placeholder="Descriptif" id="titreprojet" value="{{$projets['titre']}}">
                               </label>
                               <label for="ordre">
                                       <input type="text" name="ordre[]" placeholder="ordre" id="ordre" value="{{$projets['ordre']}}">
                               </label>

                    <br>
                    <a href="#" data-id="{{$projets['id']}}" class="delete">Supprimer le projet</a>
                </div>
                    @endforeach
                    <div id="ajout_projet"></div>
                    <input type="submit" value="Mettre   à jour vos projets">
                    
                    <br>
                   <a href="javascript:;" title="Ajouter un projets" class="ajout_projet" rel="info"> Ajouter un projet</a>
                </form>
                    </div>
                    
                                     
                    
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
                $('#projets' + {{$projets['id']}}).hide();
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
