$('.ajout_ci').on('click', function () {
    html =
        ' <br> ' +
        ' <div class="ciseul">' +
        '<input type="hidden"  name="ci_id[]" value="0">'+
        ' <label for="logoci">    ' +
        '        <input type="file"  name="logo_ci[]" accept="image/png, image/jpeg" ' +
        '        value="">' +
            '   </label>' +
            '   <label for="altci">     ' +
            '        <input type="text" name="altci[]" placeholder="Descriptif" value="">' +
            '   </label>       ' +
                '     </div>' 
    $('#ajout_ci').append(html);
});