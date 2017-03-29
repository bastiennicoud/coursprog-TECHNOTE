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

});
