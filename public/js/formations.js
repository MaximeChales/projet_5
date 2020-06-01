
// Ajoute un lien au clic sur boutton ADD
$('.ajout').on('click', function () {
    html = '<div class="formation_individuelle"> ' +
            ' <input type="hidden" id="id" name="id[]" value="0">' +
            ' <label for="formationadmin">' +
            ' <input type="text" id="formation" name="formation[]" placeholder="Formation suivie">' +
            '  </label>' +
            ' <br>' +
            '  <label for="societe">' +
            '          <input type="text" placeholder="Société" id="societe" name="societe[]">' +
            '  </label>' +
            '  <br>' +
            '    De' +
            '   <label for="debut">' +
            '          <input type="date" name="debut[]" id="debut">' +
            '   </label>' +
            '   à' +
            '   <label for="fin">' +
            '           <input type="date" name="fin[]" id="fin">' +
            '  </label>' +
            '   <br>' +
            '   <label for="descriptif">' +
            '         <textarea class="descriptif" name="descriptif[]" id="descriptif" cols="30" rows="10" ' +
            '         placeholder="Décrivez votre formation" ></textarea>' +
            '  </label>' +
            '  <br>' +
            ' </div>'
    $('#ajout').append(html);

    tinymce.init({
        selector: '.descriptif',
        add_form_submit_trigger: true,
        height: 300,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
          ' bold italic backcolor | alignleft aligncenter ' +
          ' alignright alignjustify | bullist numlist outdent indent |' +
          ' removeformat | help',
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tiny.cloud/css/codepen.min.css'
        ]
      });
});