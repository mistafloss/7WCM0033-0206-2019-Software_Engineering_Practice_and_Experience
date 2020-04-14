$(document).ready(function(){
    
    if($('.property-image').length == 1){
        $('.property-image:first').find('.removeImageUpload').addClass('disabled');
    }

    $('#btnAddPropertyImageUpload').click(function(){
        // Create clone of <div class='property-image'>
        var newpropertyImage = $('.property-image:last').clone();
        // Add after last <div class='property-image'>
         $(newpropertyImage).insertAfter(".property-image:last");
         //hide the remove button from the first file input
         $('.property-image:first').find('.input-group-append').hide();
         $('.property-image:last').find('.removeImageUpload').removeClass('disabled');

         if($('.property-image').length == 7){
             $('#btnAddPropertyImageUpload').addClass('disabled');
         }
    });

    $('body').on('click','.removeImageUpload', function() {
        $(this).closest('.property-image').remove();
        if($('.property-image').length == 1){
            $('.property-image:first').find('.input-group-append').show();
        }
    });


});