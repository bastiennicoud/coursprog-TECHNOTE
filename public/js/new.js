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

      // ici je gere les erreurs, pour afficher a l'utilisateur ce qui fonctionne ou non
      $template = "";
      $.each(datas.errors, function(key , val){
        $template += "<p>" + val + "</p>";
      });

      // affiche les erreurs si il y en a
      if (datas.errors.length == 0) {
        $("#errors").empty();
        document.location.href="edit";
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
      if (datas.success.techdescription == true) {
        $("[name=techdescription]").parent().removeClass("has-danger");
        $("[name=techdescription]").parent().addClass("has-success");
      } else {
        $("[name=techdescription]").parent().removeClass("has-success");
        $("[name=techdescription]").parent().addClass("has-danger");
      }

      // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
      if (datas.success.pin == true) {
        $("[name=pin]").parent().removeClass("has-danger");
        $("[name=pin]").parent().addClass("has-success");
      } else {
        $("[name=pin]").parent().removeClass("has-success");
        $("[name=pin]").parent().addClass("has-danger");
      }

      // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
      if (datas.success.bandname == true) {
        $("[name=bandname]").parent().removeClass("has-danger");
        $("[name=bandname]").parent().addClass("has-success");
      } else {
        $("[name=bandname]").parent().removeClass("has-success");
        $("[name=bandname]").parent().addClass("has-danger");
      }

      // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
      if (datas.success.date == true) {
        $("[name=date]").parent().removeClass("has-danger");
        $("[name=date]").parent().addClass("has-success");
      } else {
        $("[name=date]").parent().removeClass("has-success");
        $("[name=date]").parent().addClass("has-danger");
      }

      // ici je gere les sccess, pour afficher les chaps justes et le message de validation si l'inscription est réussie
      if (datas.success.banddescription == true) {
        $("[name=banddescription]").parent().removeClass("has-danger");
        $("[name=banddescription]").parent().addClass("has-success");
      } else {
        $("[name=banddescription]").parent().removeClass("has-success");
        $("[name=banddescription]").parent().addClass("has-danger");
      }

      // si la requete echoue
    }).fail(function(jqXHR, status) {

      console.log("XHR fails ->" + status);

    });

  });

});
