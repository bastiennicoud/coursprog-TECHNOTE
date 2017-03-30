// scripts js
$(document).ready(function(){

    // declaration d'un objet pour stoquer les donées du formulaire
    var $datas = {
      channel: "",
      instrument: "",
      mic: "",
      fx: "",
      monmix: ""
    };

    // variable utilisee pour stoquer le template html
    var $template = "";

    // quant on clique sur le bouton de submit on lance cette fonction
    $("#submit").on("click", function(){

      // recuperation des differents champs
      $datas.channel = $("[name=channel]").val();
      $datas.instrument = $("[name=instrument]").val();
      $datas.mic = $("[name=mic]").val();
      $datas.fx = $("[name=fx]").val();
      $datas.monmix = $("[name=monmix]").val();

      // requete ajax
      $.ajax({

        method: "POST",
        url: "editpatch",

        // on transmet au serveur via POST les données de l'utilisateur
        data: {
          channel: $datas.channel,
          instrument: $datas.instrument,
          mic: $datas.mic,
          fx: $datas.fx,
          monmix: $datas.monmix
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
        if (datas.success.channel == true) {
          $("[name=channel]").parent().removeClass("has-danger");
          $("[name=channel]").parent().addClass("has-success");
        } else {
          $("[name=channel]").parent().removeClass("has-success");
          $("[name=channel]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.instrument == true) {
          $("[name=instrument]").parent().removeClass("has-danger");
          $("[name=instrument]").parent().addClass("has-success");
        } else {
          $("[name=instrument]").parent().removeClass("has-success");
          $("[name=instrument]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.mic == true) {
          $("[name=mic]").parent().removeClass("has-danger");
          $("[name=mic]").parent().addClass("has-success");
        } else {
          $("[name=mic]").parent().removeClass("has-success");
          $("[name=mic]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.fx == true) {
          $("[name=fx]").parent().removeClass("has-danger");
          $("[name=fx]").parent().addClass("has-success");
        } else {
          $("[name=fx]").parent().removeClass("has-success");
          $("[name=fx]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.monmix == true) {
          $("[name=monmix]").parent().removeClass("has-danger");
          $("[name=monmix]").parent().addClass("has-success");
        } else {
          $("[name=monmix]").parent().removeClass("has-success");
          $("[name=monmix]").parent().addClass("has-danger");
        }

        // si la requete echoue
      }).fail(function(jqXHR, status) {

        console.log("XHR fails ->" + status);

      });

    });

});
