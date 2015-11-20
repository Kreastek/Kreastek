$( document ).ready(function() {
    $('#Beschrijving').click(function(){
        $('#beschrijving').removeClass('hide')
        $('#reviews').addClass('hide')
    });

    $('#Reviews').click(function(){
        $('#reviews').removeClass('hide')
        $('#beschrijving').addClass('hide')
    });

    $("#search").keypress(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            $("#searchForm").submit();
        }
    });

});