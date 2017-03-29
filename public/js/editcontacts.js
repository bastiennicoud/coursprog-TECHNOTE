// scripts js
$(document).ready(function(){

    // declaration d'un objet pour stoquer les donées du formulaire
    var $datas = {
      name: "",
      email: "",
      web: "",
      function: "",
      phone: ""
    };

    // variable utilisee pour stoquer le template html
    var $template = "";

    // quant on clique sur le bouton de submit on lance cette fonction
    $("#submit").on("click", function(){

      // recuperation des differents champs
      $datas.name = $("[name=name]").val();
      $datas.email = $("[name=email]").val();
      $datas.web = $("[name=web]").val();
      $datas.function = $("[name=function]").val();
      $datas.phone = $("[name=phone]").val();

      // requete ajax
      $.ajax({

        method: "POST",
        url: "editcontacts",

        // on transmet au serveur via POST les données de l'utilisateur
        data: {
          name: $datas.name,
          email: $datas.email,
          web: $datas.web,
          function: $datas.function,
          phone: $datas.phone
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
        if (datas.success.email == true) {
          $("[name=email]").parent().removeClass("has-danger");
          $("[name=email]").parent().addClass("has-success");
        } else {
          $("[name=email]").parent().removeClass("has-success");
          $("[name=email]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.web == true) {
          $("[name=web]").parent().removeClass("has-danger");
          $("[name=web]").parent().addClass("has-success");
        } else {
          $("[name=web]").parent().removeClass("has-success");
          $("[name=web]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.function == true) {
          $("[name=function]").parent().removeClass("has-danger");
          $("[name=function]").parent().addClass("has-success");
        } else {
          $("[name=function]").parent().removeClass("has-success");
          $("[name=function]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.phone == true) {
          $("[name=phone]").parent().removeClass("has-danger");
          $("[name=phone]").parent().addClass("has-success");
        } else {
          $("[name=phone]").parent().removeClass("has-success");
          $("[name=phone]").parent().addClass("has-danger");
        }

        // si la requete echoue
      }).fail(function(jqXHR, status) {

        console.log("XHR fails ->" + status);

      });

    });

});
