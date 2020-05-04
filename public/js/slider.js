$(document).ready(function(){
    
var $carrousel = $('.projets'), // on cible le bloc du carrousel
    $img = $('.slide'), // on cible les images contenues dans le carrousel
    indexImg = $img.length, // on définit l'index du dernier élément
    i = 0, // on initialise un compteur
    $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)


$img.css('display', 'none'); // on cache les images
$currentImg.css('display', 'block'); // on affiche seulement l'image courante

$carrousel.append('<br><div class="controls"> <span class="prev"><i class="fas fa-angle-left fa-3x"></i></span> <span class="next"><i class="fas fa-angle-right fa-3x"></i></span> </div>');

$('.next').click(function(){ // image suivante
  
  //  i++; // on incrémente le compteur
    
    if( i < indexImg - 1){
        i++;

    }
    else{
        i = 0;
    }
        $img.css('display', 'none'); // on cache les images
        $currentImg = $img.eq(i); // on définit la nouvelle image
        $currentImg.css('display', 'block'); // puis on l'affiche
       // $(".slide img").fadeOut(3000);
});

$('.prev').click(function(){ // image précédente

    //'transition', 'all 1s linear'

    if( i <= 0 ){

        i = indexImg -1;

    }
    else{
        i --;
    }
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
});



function slideImg(){
    setTimeout(function(){ // on utilise une fonction anonyme
        
        if( i < indexImg - 1){
            i++;
    
        }
        else{
            i = 0;
        }

   
    $img.css('display', 'none');
    $currentImg = $img.eq(i);
    $currentImg.css('display', 'block');
   
    slideImg(); // on oublie pas de relancer la fonction à la fin
 
    }, 7000); // on définit l'intervalle à 7 secondes (7000 MS)
}

slideImg(); // enfin, on lance la fonction une première fois

});


