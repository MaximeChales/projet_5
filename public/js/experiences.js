$(document).ready(function(){
    $('.ajout').on('click', function(){
            $('.experiences:last').clone().appendTo($('.sectionexperiences'));
    })
   });