$(document).ready(function () {

    $(".supprimer").hide();

    $(".ajout").click(function (){
        let b = document.body;
        let newP = document.createElement('p');
        
        //Ajoute le paragraphe créé comme premier enfant de l'élément body
        b.prepend(newP);
        
        //Ajoute le texte créé comme dernier enfant de l'élément body
        b.append(newTexte);
        

    });


    $(".supprimer").click(function (){
        var article = $(".formation_individuelle:last");
        article.remove();

        // S'il y a moins de 2 articles (autrement dit un seul) on cache le bouton supprimer.
        if ( $(".formation_individuelle").length < 2 ) { $(".supprimer").fadeOut("fast"); }

    });


});