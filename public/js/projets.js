$('.ajout_projet').on('click', function () {
    html = 

    ' <label for="id">'+
    '        <input type="hidden" id="id" name="id[]" value="">'+
    ' </label> '+
                   
    ' <label for="slide">'+
    '     <input type="file" id="slide" name="slide[]" accept="image/png, image/jpeg">'+
    ' </label>  '+

    '  <label for="linkprojets">'+
         '<input type="text" name ="linkprojets[]" placeholder="Lien du projet" id="linkprojets" value="">'+
   '   </label> '+   

    '<label for="titreprojet">'+
     ' <input type="text" name="titreprojet[]" placeholder="Descriptif" id="titreprojet" value="">'+
    '</label>'+ 
    '<label for="ordre">'+
     ' <input type="text" name="ordre[]" placeholder="ordre" id="ordre" value="">'+
    '</label>'+ 

    '<br>'
    $('#ajout_projet').append(html);
  
});