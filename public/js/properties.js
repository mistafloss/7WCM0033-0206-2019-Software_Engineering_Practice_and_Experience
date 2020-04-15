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



$('form#createPropertyForm').submit(function(e){
    
    // Create an FormData object 
    var form_data = new FormData(this);

    var totalImages = $('#propertyImages')[0].files;
    var lg = totalImages.length;
    for (var i = 0; i < lg; i++){
        form_data.append("property_images[]", totalImages.item(i));
    }
    e.preventDefault(e);
    $('.loading').css('display','block');
    $("#btn_save_property").attr("disabled", true);
    $.ajax({
           type:'POST',
           dataType: 'json',
           contentType: false,
           processData: false,
           url:$('#actionUrl').val(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data: form_data,
           
        //    data:{
        //     listing_title: $('#listingTitle').val(),
        //     house_number: $('#houseNumber').val(),
        //     street: $('#street').val(),
        //     city: $('#city').val(),
        //     postcode: $('#postcode').val(),
        //     country: $('#country').val(),
        //     property_features: $('#propertyFeatures').val(),
        //     property_description: $('#propertyDescription').val(),
        //     property_category_id: $('#propertyType').val(),
        //     property_price: $('#propertyPrice').val(),
        //     property_status: $('input[name=propertyStatus]:checked').val(),
        //     publish_property: $('input[name=publishProperty]:checked').val(),
        //     property_images: form_data
              
        //    },
           success:function(response){
                $('.loading').css('display','none');
                $("#btn_save_property").attr("disabled", false); 
                console.log(response);
           },
           error: function(response){
                $('.loading').css('display','none');
                $("#btn_save_property").attr("disabled", false); 
                console.log(response.responseJSON.errors);
                var errors = response.responseJSON.errors;
           }
    });
  
  });