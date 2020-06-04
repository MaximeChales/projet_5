window.onload = function () {
 
    (function() //On insert le code dans une fonction  anonyme qui de lance au chargement de la page afin de le rendre local
    {
    var speed = 300;
    var moving_frequency = 15;
    var links = document.querySelectorAll("a"); // On recupere les liens
    var href;
    for(var i=0; i<links.length; i++)
    {  
        //On verifie si le lien est un vrai lien ou une ancre en fonction de la longueur de son href
        href = (links[i].attributes.href === undefined) ? null : links[i].attributes.href.nodeValue.toString();
        if(href !== null && href.length > 1 && href.substr(0, 1) == '#')
        {
            //Si c'est une ancre, on appelle (active la fonction)
            links[i].onclick = function()
            {
                //On identifie l'id de l'ancre
                var element;
                var href = this.attributes.href.nodeValue.toString();
                if(element = document.getElementById(href.substr(1)))
                {
                    // On met en place l'animation pour se rendre en haut de la page puis inversement 
                    var hop_count = speed/moving_frequency
                    var getScrollTopDocumentAtBegin = getScrollTopDocument();
                    var gap = (getScrollTopElement(element) - getScrollTopDocumentAtBegin) / hop_count;
                    
                    // On fait une boucle for pour ???
                    for(var j = 1; j <= hop_count; j++)
                    {
                        // On met en place l'animation
                        (function()
                        {
                            var hop_top_position = gap*j;
                            setTimeout(function(){  window.scrollTo(0, hop_top_position + getScrollTopDocumentAtBegin); }, moving_frequency*j);
                        })();
                    }
                }
 
                return false;
            };
        }
    }
 
    var getScrollTopElement =  function (e)
    {
        var top = 0;
 
        while (e.offsetParent != undefined && e.offsetParent != null)
        {
            top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
            e = e.offsetParent;
        }
 
        return top;
    };
 
    var getScrollTopDocument = function()
    {
        return document.documentElement.scrollTop + document.body.scrollTop;
    };
    })();
     
}