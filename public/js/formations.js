

    $(".supprimer").hide();
          
         // Ajoute un lien au clic sur boutton ADD
        $('.ajout').on('click', function(){
        $( ".formation_individuelle:last" ).clone().appendTo( ".formations" );


        });
         


    $(".supprimer").click(function (){
        var article = $(".formation_individuelle:last");
        article.remove();

        // S'il y a moins de 2 articles (autrement dit un seul) on cache le bouton supprimer.
        if ( $(".formation_individuelle").length < 2 ) { $(".supprimer").fadeOut("fast"); }

    });