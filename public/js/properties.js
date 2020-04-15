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
  
    $('#propertyImages').change(function(){
        var fileList = $('#selectedImagesList');
        var images ="";
        var files = $(this)[0].files;
        var lg = files.length;
    
        for(var i = 0; i < lg; ++i){
            images += '<li>' + files.item(i).name + '</li>';
        }
        $('#selectedImagesList ul').remove();
        fileList.append('<ul>'+images+'</ul>');
    });



$('#btn_save_property').click(function(e){
    e.preventDefault(e);
    $('.loading').css('display','block');
    $("#btn_save_property").attr("disabled", true);
    $.ajax({
           type:'POST',
           url:$('#actionUrl').val(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
               
              
           },
           success:function(response){
            
           },
           error: function(response){
            
           }
    });
  
  });