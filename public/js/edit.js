// script page d'edition

// Attend jquery
$(document).ready(function(){
/*
  // declaration d'une variable pour stoquer l'image
  var $image;

  // quant on clique sur le bouton de submit on lance cette fonction
  $("#upload1").on("click", function(){

    // recuperation des differents champs
    $image = $("#stageplan").val();

    console.log($image);

    // requete ajax
    $.ajax({

      method: "POST",
      url: "uploadstageplan",
      contentType: false,
      processData: false,

      // on transmet au serveur via POST les données de l'utilisateur
      data: {file: $image},

      dataType: "json"

      // si la requete réussi
    }).done(function(datas){

      console.log("request OK");

      // si la requete echoue
    }).fail(function(jqXHR, status) {

      console.log("XHR fails ->" + status);

    });

  });
*/

  $(function () {
      $('#stageplan').on('submit', function (e) {
          // On empêche le navigateur de soumettre le formulaire
          e.preventDefault();

          var $form = $(this);
          var formdata = (window.FormData) ? new FormData($form[0]) : null;
          var data = (formdata !== null) ? formdata : $form.serialize();

          $.ajax({
              url: $form.attr('action'),
              type: $form.attr('method'),
              contentType: false, // obligatoire pour de l'upload
              processData: false, // obligatoire pour de l'upload
              dataType: 'json', // selon le retour attendu
              data: data
          }).done(function(datas){

            console.log("request OK");

            // si la requete echoue
          }).fail(function(jqXHR, status) {

            console.log("XHR fails ->" + status);

          });

      });

  });

});
