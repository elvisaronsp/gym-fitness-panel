jQuery(document).ready(function($){
    
    Ladda.bind('.ladda-button'); 
    
    $('.popover-el').popover();
    
    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        inline: true
    });
    
    $('.datepicker-input').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('.customer-table').DataTable({
        "ordering": false,
        "aLengthMenu": [[30, 50, 100, -1], [30, 50, 100, "Wszyscy"]]
    });
    
});
