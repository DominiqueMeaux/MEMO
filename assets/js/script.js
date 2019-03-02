$(function () {
    //fonction ouverture fermeture du menu-toggle
    $('.menu-toggle').click(function () {
        $('nav').toggleClass('active');
    });
    //fonction ouverture fermeture du dropdown 
    $('ul li').click(function () {
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    });
    //permet l animation du menu-toggle 
    $('.menu-toggle').click(function () {
        $('.menu-toggle').toggleClass('active');
    });

    //page profil
   
    $("#content").find("[id^='tab']").hide(); // Masquer tout le contenu
    $("#tabs li:first").attr("id","current"); // Activer le premier onglet
    $("#content #tab1").fadeIn(); // Afficher le contenu du premier onglet
    
    $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //détection pour l'onglet en cours
         return;       
        }
        else{             
          $("#content").find("[id^='tab']").hide(); // Masquer tout le contenu
          $("#tabs li").attr("id",""); //Réinitialiser les identifiants
          $(this).parent().attr("id","current"); // Activer cette
          $('#' + $(this).attr('name')).fadeIn(); // Afficher le contenu de l'onglet en cours
        }
    });

    //Ajax
    
    // lorsque l'on perd le focus
    $('#loginCheck').blur(function () {
        $.post('controllers/register_controller.php', {
            loginCheck: $('#loginCheck').val()
        }, function (data) {
            //si le login est correct et qu il n éxiste pas alors
            if (data.success == true) {
                $('#loginCheck').removeClass('bg-light');
                $('#registerSubmit').show();
           //     j'affiche le message : Ce pseudo est disponible
                $('.msgError').empty();//j utilise empty pour vider l élément enfant une fois rechargé
                $('.msgError').append('<div class="alert alert-success" role="alert">' + 
                '<p class="text-success">' + data.msg + '</p>' + 
                '</div>');
              //  sinon je cache le bouton 
            //    le champ reste clair et le message ce pseudo est incorrecte s'affiche
            } else {
                $('#loginCheck').addClass('bg-light');
                $('#registerSubmit').hide();
                $('.msgError').empty();
                $('.msgError').append('<div class="alert alert-danger" role="alert">' + 
                '<p class="text-danger">' + data.msg + '</p>' + 
                '</div>');
            }
        }, 'JSON');
    });
    
    //Affichage de la div modification du profil
   $('#ModifySubmit').click(function(){
      $('#containerUpdateProfile').show(1000) // Affiche la div au click
   });
  
});