// fichier js pour la page de login

// Attend jquery
$(document).ready(function(){

  // declaration d'un objet pour stoquer les infos de l'utilisateur
  var $user = {
    username: "",
    password: ""
  };

  // variable utilisee pour stoquer le template html
  var $template = "";

  // quant on clique sur le bouton de submit on lance cette fonction
  $("#submit").on("click", function(){

    // recuperation des differents champs
    $user.username = $("[name=username]").val();
    $user.password = $("[name=password]").val();

    // requete ajax
    $.ajax({

      method: "POST",
      url: "login",

      // on transmet au serveur via POST les données de l'utilisateur
      data: {
        username: $user.username,
        password: $user.password
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
        $("#success").html('<p>Connexion ok</p>');
        //document.location.href="dashboard";
      } else {
        $("#errors").empty();
        $("#errors").html('<div class="alert alert-warning">' + $template + '</div>');
      }

      // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
      if (datas.success.username == true) {
        $("[name=username]").parent().parent().removeClass("has-danger");
        $("[name=username]").parent().parent().addClass("has-success");
      } else {
        $("[name=username]").parent().parent().removeClass("has-success");
        $("[name=username]").parent().parent().addClass("has-danger");
      }

      if (datas.success.password == true) {
        $("[name=password]").parent().parent().removeClass("has-danger");
        $("[name=password]").parent().parent().addClass("has-success");
      } else {
        $("[name=password]").parent().parent().removeClass("has-success");
        $("[name=password]").parent().parent().addClass("has-danger");
      }

      // si la requete echoue
    }).fail(function(jqXHR, status) {

      console.log("XHR fails ->" + status);

    });

  });

});
