$( document ).ready(function() {
    $('#Beschrijving').click(function(){
        $('#beschrijving').removeClass('hide')
        $('#reviews').addClass('hide')
    });

    $('#Reviews').click(function(){
        $('#reviews').removeClass('hide')
        $('#beschrijving').addClass('hide')
    });


});