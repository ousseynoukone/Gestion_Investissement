





//faire resortir la boite modal s'il y'a erreur
$(document).ready(function() {
    var hasInvalidField = $('.ajoutModalErrorShow').hasClass('is-invalid') ;


if (hasInvalidField) {
    $('#add').modal('show')
}




});






// ajout du cout dans annonce
function coutDisplay() {
  var idProjet =    $('#projet_id').val();

  $.ajax({
    url: "projets/"+idProjet,
    type: 'GET',
    
    success: function(response) {
        $('#coutAddForm').val(response.cout);


    }

})

    
}

