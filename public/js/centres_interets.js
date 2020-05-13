$('.ajout_ci').on('click', function () {
    html = '<div class="ci">' +
        ' <br>    ' +
        ' <div class="ciseul">' +
        ' <label for="logoci">    ' +
        '        <input type="file" id="logoci" name="logoci" accept="image/png, image/jpeg" ' +
        '        value="">' +
        ''
            '   </label>' +
            '   <label for="altci">     ' +
            '        <input type="text" name="altci" placeholder="Descriptif" id="altci" value="">' +
            '   </label>       ' +
                '     </div>' +

                '</div>'
    $('#ajout_ci').append(html);
});