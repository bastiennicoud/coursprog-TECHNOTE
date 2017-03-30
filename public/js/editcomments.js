// scripts js
$(document).ready(function(){

    // declaration d'un objet pour stoquer les donées du formulaire
    var $datas = {
      title: "",
      head: "",
      comment: ""
    };

    // variable utilisee pour stoquer le template html
    var $template = "";

    // quant on clique sur le bouton de submit on lance cette fonction
    $("#submit").on("click", function(){

      // recuperation des differents champs
      $datas.title = $("[name=title]").val();
      $datas.head = $("[name=head]").val();
      $datas.comment = $("[name=comment]").val();

      // requete ajax
      $.ajax({

        method: "POST",
        url: "editcomments",

        // on transmet au serveur via POST les données de l'utilisateur
        data: {
          title: $datas.title,
          head: $datas.head,
          comment: $datas.comment
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
        if (datas.success.title == true) {
          $("[name=title]").parent().removeClass("has-danger");
          $("[name=title]").parent().addClass("has-success");
        } else {
          $("[name=title]").parent().removeClass("has-success");
          $("[name=title]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.head == true) {
          $("[name=head]").parent().removeClass("has-danger");
          $("[name=head]").parent().addClass("has-success");
        } else {
          $("[name=head]").parent().removeClass("has-success");
          $("[name=head]").parent().addClass("has-danger");
        }

        // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
        if (datas.success.comment == true) {
          $("[name=comment]").parent().removeClass("has-danger");
          $("[name=comment]").parent().addClass("has-success");
        } else {
          $("[name=comment]").parent().removeClass("has-success");
          $("[name=comment]").parent().addClass("has-danger");
        }

        // si la requete echoue
      }).fail(function(jqXHR, status) {

        console.log("XHR fails ->" + status);

      });

    });

});
