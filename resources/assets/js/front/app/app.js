$(function() {
    $(".fancybox").fancybox();
    
    $('.get-discount-code').on('click', function(event) {
        event.preventDefault();
        var pwindow = window.open($(this).prop('href'), '_blank');
        
        setTimeout(function() {
              pwindow.close();
            }, 1000);
        
        var dsc = $(this).data('dsc');
        console.log(dsc);
        $.fancybox({
            href: baseUrl+'kod-rabatowy/'+dsc,
            type: 'ajax'
        });
    });
});