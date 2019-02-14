$.fn.machineEcrire = function(option) {

  // on prépare le plugin
  function caract (element, text, content) {

    // si le texte a une taille supp à 0, c'est qu'il reste encore des caractères
    if (text.length > 0) {

      var next = text.substr(0,1); // on récupère le caractère
      next = next.replace("\n", '<br />')

      // on enlève le caractère pour garder uniquement le reste
      text = text.substr(1);

      // on ajoute les caractères 1 par 1
      $(element).html(content+next);

      // on répète la fonction après le delai
      setTimeout(function(){
        caract(element, text, content+next);
      }, option['delai']);
    }
  }

  // on configure l'élément par défaut
  option = option || { 'delai': 50 };
  // on exécute pour la 1er fois la fonction
  caract(this, $(this).html(), '');

}
$(".lieu").fadeIn();
$("#ecrire p").machineEcrire({ 'delai' : 20 });
