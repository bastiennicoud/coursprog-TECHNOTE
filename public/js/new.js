// scripts js
$(document).ready(function(){


  // gére l'evenement d'affichage des popovers
  $(function () {
    $('[data-toggle="name"]').popover()
  })

  $(function () {
    $('[data-toggle="pin"]').popover()
  })

  $(function () {
    $('[data-toggle="bandname"]').popover()
  })




  // declaration d'un objet pour stoquer les donées du formulaire
  var $datas = {
    name: "",
    techdescription: "",
    pin: "",
    bandname: "",
    date: "",
    description: ""
  };

  // variable utilisee pour stoquer le template html
  var $template = "";

  // quant on clique sur le bouton de submit on lance cette fonction
  $("#submit").on("click", function(){

    // recuperation des differents champs
    $datas.name = $("[name=name]").val();
    $datas.techdescription = $("[name=techdescription]").val();
    $datas.pin = $("[name=pin]").val();
    $datas.bandname = $("[name=bandname]").val();
    $datas.date = $("[name=date]").val();
    $datas.banddescription = $("[name=banddescription]").val();

    // requete ajax
    $.ajax({

      method: "POST",
      url: "new",

      // on transmet au serveur via POST les données de l'utilisateur
      data: {
        name: $datas.name,
        techdescription: $datas.techdescription,
        pin: $datas.pin,
        bandname: $datas.bandname,
        date: $datas.date,
        banddescription: $datas.banddescription,
      },

      dataType: "json"

      // si la requete réussi
    }).done(function(datas){

      console.log("AJAX OK");
/*
      // ici je gere les erreurs, pour afficher a l'utilisateur ce qui fonctionne ou non
      $template = "";
      $.each(datas.errors, function(key , val){
        $template += "<p>" + val + "</p>";
      });

      // affiche les erreurs si il y en a
      if (datas.errors.length == 0) {
        $("#errors").empty();
        $("#success").html('<p>Connexion ok</p>');
        document.location.href="dashboard";
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
*/
      // si la requete echoue
    }).fail(function(jqXHR, status) {

      console.log("XHR fails ->" + status);

    });

  });

});
