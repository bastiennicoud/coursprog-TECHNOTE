// scripts js
$(document).ready(function(){

    // declaration d'un objet pour stoquer les donées du formulaire
    var $datas = {
      name: "",
      instrument: ""
    };

    // variable utilisee pour stoquer le template html
    var $template = "";

    // quant on clique sur le bouton de submit on lance cette fonction
    $("#submit").on("click", function(){

      // recuperation des differents champs
      $datas.name = $("[name=name]").val();
      $datas.instrument = $("[name=instrument]").val();

      // requete ajax
      $.ajax({

        method: "POST",
        url: "editzicos",

        // on transmet au serveur via POST les données de l'utilisateur
        data: {
          name: $datas.name,
          instrument: $datas.instrument
        },

        dataType: "json"

        // si la requete réussi
      }).done(function(datas){

        // ici je gere les erreurs, pour afficher a l'utilisateur ce qui fonctionne ou non
        $template = "";
        $.each(datas.errors, function(key , val){
          $template += "<p>" + val + "</p>";
        });

        // affiche les erreurs si il y en a
        if (datas.errors.length == 0) {
          $("#errors").empty();
          $("#errors").html('<div class="alert alert-success">Modifs bien enregistrées.</div>');
        } else {
          $("#errors").empty();
          $("#errors").html('<div class="alert alert-warning">' + $template + '</div>');
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.name == true) {
          $("[name=name]").parent().removeClass("has-danger");
          $("[name=name]").parent().addClass("has-success");
        } else {
          $("[name=name]").parent().removeClass("has-success");
          $("[name=name]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.instrument == true) {
          $("[name=instrument]").parent().removeClass("has-danger");
          $("[name=instrument]").parent().addClass("has-success");
        } else {
          $("[name=instrument]").parent().removeClass("has-success");
          $("[name=instrument]").parent().addClass("has-danger");
        }


        // si la requete echoue
      }).fail(function(jqXHR, status) {

        console.log("XHR fails ->" + status);

      });

    });

});
