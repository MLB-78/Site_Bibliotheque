// script la modal

$("a[data-suppression]").click(function(){
    
    let message = $(this).attr("data-message");
    let lien = $(this).attr("data-suppression");
    $("#btn").attr("href", lien);
    $('.modal-body').text(message);
    
});