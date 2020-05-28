$('.ajout').on('click', function () {
        html = '     <div class="experience_individuelle"> ' +
            ' <form action="'+add_url+'" method="POST">' +
            token +
                ' <label for="id">' +
                ' <input type="hidden" id="id" name="id" value="0">' +
                '   </label>' +
                ' <label for="poste">' +
                ' <input type="text" id="poste" name="poste" placeholder="Poste occupé">' +
                '  </label>' +
                ' <br>' +
                '  <label for="societe">' +
                '          <input type="text" placeholder="Société" id="societe" name="societe">' +
                '  </label>' +
                '  <label for="ville">' +
                '          <input type="text" placeholder="Ville" id="ville" name="ville">' +
                '  </label>' +
                '  <br>' +
                '    De' +
                '   <label for="debut">' +
                '          <input type="date" name="debut" id="debut">' +
                '   </label>' +
                '   à' +
                '   <label for="fin">' +
                '           <input type="date" name="fin" id="fin">' +
                '  </label>' +
                '   <br>' +
                '   <label for="descriptif">' +
                '         <textarea class="descriptif" name="descriptif" cols="30" rows="10" ' +
                '         placeholder="Décrivez votre formation" ></textarea>' +
                '  </label>' +
                '  <br>' +

    
                '  <input type="submit" value="Mettre à jour vos formations">' +
                '  </form>' +
                ' </div>'

        $('#ajout_exp').append(html);
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
    