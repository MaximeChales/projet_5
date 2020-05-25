$('.ajout_rs').on('click', function () {
    html =       
    '<input type="hidden"  name="id[]" value="0">'+
    '<label for="logors">'+
    ' <input type="file"  name="logors[]" accept="image/png, image/jpeg" value="">'+
    '</label>'+
    '<label for="linkrs">'+
    '  <input type="text" placeholder="lien réseau social" name="linkrs[]"  value="">'+
    '</label>'+
    '<label for="altrs">'+
    ' <input type="text" name="altrs[]" placeholder="Descriptif"  value="" '+
    '</label>'+
    '<br>'
    $('#ajout_rs').append(html);
});