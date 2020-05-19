$('.ajout_projet').on('click', function () {
    html = 

    ' <label for="id">'+
    '        <input type="hidden" id="id" name="id[]" value="">'+
    '    </label> '+
                   
    '        <label for="slide">'+
    '                      <input type="file" id="slide" name="slide[$i]" accept="image/png, image/jpeg">'+
    '              </label>  '+
                   '             <label for="linkprojets">'+
                   '                      <input type="text" name ="linkprojets[$i]" '+
                   'placeholder="Lien du projet" id="linkprojets" value="">'+
                   '               </label> '+   
                   '       <label for="titreprojet">'+
                   '          <input type="text" name="titreprojet[$i]" placeholder="Descriptif" id="titreprojet" value="">'+
                  ' </label>'
    $('#ajout_projet').append(html);
});