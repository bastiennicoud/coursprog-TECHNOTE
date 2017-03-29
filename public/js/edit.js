// script page d'edition

// Attend jquery
$(document).ready(function(){

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
