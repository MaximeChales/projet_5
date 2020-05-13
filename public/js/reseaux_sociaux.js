$('.ajout_rs').on('click', function () {
    html =       
    '<label for="logors">'+
    ' <input type="file" id="logors" name="rs" accept="image/png, image/jpeg" value="">'+
    '</label>'+
    '<label for="linkrs">'+
    '  <input type="text" placeholder="lien réseau social" id="linkrs" value="">'+
    '</label>'+
    '<label for="altrs">'+
    ' <input type="text" name="altalt" placeholder="Descriptif" id="altrs" value="" '+
    '</label>'+
    '<br>'
    $('#ajout_rs').append(html);
});