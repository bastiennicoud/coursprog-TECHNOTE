// script page d'edition

// Attend jquery
$(document).ready(function(){

  // appel ajax pour uploader la premiere image
  $(function () {
      $('#stageplan').on('submit', function (e) {

          // Empeche le comportement de base du formulaire
          e.preventDefault();

          // recuperation des infos du formulaire (le fichier)
          var $form = $(this);
          var formdata = (window.FormData) ? new FormData($form[0]) : null;
          var data = (formdata !== null) ? formdata : $form.serialize();

          // appel ajax pour envoyer le fichier au serveur
          $.ajax({
              url: $form.attr('action'),
              type: $form.attr('method'),
              contentType: false,
              processData: false,
              dataType: 'json',
              data: data
          }).done(function(datas){

            // ici je gere les erreurs, pour afficher a l'utilisateur ce qui fonctionne ou non
            $template = "";
            $.each(datas, function(key , val){
              $template += "<p>" + val + "</p>";
            });

            // affichage
            $("#stageplanerrors").html('<div class="alert alert-info">' + $template + '</div>');

            // si la requete echoue
          }).fail(function(jqXHR, status) {

            console.log("XHR fails ->" + status);

          });

      });

  });

  // appel ajax pour uploader la seconde image
  $(function () {
      $('#bandimage').on('submit', function (e) {

          // Empeche le comportement de base du formulaire
          e.preventDefault();

          // recuperation des infos du formulaire (le fichier)
          var $form = $(this);
          var formdata = (window.FormData) ? new FormData($form[0]) : null;
          var data = (formdata !== null) ? formdata : $form.serialize();

          // appel ajax pour envoyer le fichier au serveur
          $.ajax({
              url: $form.attr('action'),
              type: $form.attr('method'),
              contentType: false, // obligatoire pour de l'upload
              processData: false, // obligatoire pour de l'upload
              dataType: 'json', // selon le retour attendu
              data: data
          }).done(function(datas){

            // ici je gere les erreurs, pour afficher a l'utilisateur ce qui fonctionne ou non
            $template = "";
            $.each(datas, function(key , val){
              $template += "<p>" + val + "</p>";
            });

            // affichage
            $("#bandimageerrors").html('<div class="alert alert-info">' + $template + '</div>');

            // si la requete echoue
          }).fail(function(jqXHR, status) {

            console.log("XHR fails ->" + status);

          });

      });

  });
  
});
