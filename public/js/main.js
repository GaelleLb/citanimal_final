jQuery(document).ready(function($){

    /* NAVBAR */
    var navheight = 100; // c'est le nombre de pixels à partir duquel on déclenche le tout
    var logo = document.getElementById("logo");
    
    $(function(){
        $(window).scroll(function() { //Au scroll dans la fenetre on déclenche la fonction
            if ($(this).scrollTop() > navheight) { //si on a défile de plus de XXX (variable "hauteur) pixels du haut vers le bas
                $('#navbar').addClass(" bg_chocolate");
                $('#navbar').addClass("boxshadow"); 
                $('.nav-link').addClass("white_link");
                logo.style.height = "60px"; 

                
            } else {
          //sinon on retire la classe 
                $('#navbar').removeClass("bg_chocolate");
                $('#navbar').addClass("boxshadow"); 
                $('.nav-link').removeClass("white_link");
                logo.style.height = "130px"; 

              }
        });
    });

}); // FIN DU READY