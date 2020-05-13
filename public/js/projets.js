$('.ajout_projet').on('click', function () {
    html = 
    ' <div class="projet">'+
    ' <form action="'+add_url+'" method="POST">'+
    token +
    ' <label for="id">'+
    '        <input type="hidden" id="id" name="id[]" value="">'+
    '    </label> '+
                   
    '        <label for="slide">'+
    '                      <input type="file" id="slide" name="slide[$i]" accept="image/png, image/jpeg" value="">'+
    '              </label>  '+
                   '             <label for="linkprojets">'+
                   '                      <input type="text" name ="linkprojets[$i]" '+
                   'placeholder="Lien du projet" id="linkprojets" value="">'+
                   '               </label> '+   
                   '       <label for="titreprojet">'+
                   '          <input type="text" name="titreprojet[$i]" placeholder="Descriptif" id="titreprojet" value="">'+
                  ' </label> '+
                      
                  '   <br>'+
                  '  <input type="submit" value="Mettre à jour vos projets">'+
                  '  </form>'+
                  '  </div> '
    $('#ajout_projet').append(html);
});