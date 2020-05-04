    $(document).ready(function(){
        $(".menu").hide();
        $("#boutton_menu").click(function(){
            $(".menu").slideToggle();
        });
    });
   
    $(document).ready(function(){
      $('#boutton_menu').click(function(){
        $(this).toggleClass('open');
      });
    });