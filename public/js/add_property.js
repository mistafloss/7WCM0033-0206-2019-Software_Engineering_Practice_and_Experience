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
    e.preventDefault(e);
    // Create an FormData object 
    var form_data = new FormData(this);
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
           success:function(response){
                $('.loading').css('display','none');
                $("#btn_save_property").attr("disabled", false); 
               // console.log(response);
                $(location).attr('href', $('#propertyListUrl').val());
           },
           error: function(response){
                $('.loading').css('display','none');
                $("#btn_save_property").attr("disabled", false); 
                console.log(response.responseJSON.errors);
                var errors = response.responseJSON.errors;

                var listing_title_msg = response.responseJSON.errors.listing_title;
                if(errors.hasOwnProperty('listing_title')){
                    $('#listingTitle_error').text(listing_title_msg);
                }else{
                    $('#listingTitle_error').text('');  
                }

                var house_number_msg = response.responseJSON.errors.house_number;
                if(errors.hasOwnProperty('house_number')){
                    $('#houseNumber_error').text(house_number_msg);
                }else{
                    $('#houseNumber_error').text('');  
                }

                var street_msg = response.responseJSON.errors.street;
                if(errors.hasOwnProperty('street')){
                    $('#street_error').text(street_msg);
                }else{
                    $('#street_error').text('');  
                }

                var city_msg = response.responseJSON.errors.city;
                if(errors.hasOwnProperty('city')){
                    $('#city_error').text(city_msg);
                }else{
                    $('#city_error').text('');  
                }

                var postcode_msg = response.responseJSON.errors.postcode;
                if(errors.hasOwnProperty('postcode')){
                    $('#postcode_error').text(postcode_msg);
                }else{
                    $('#postcode_error').text('');  
                }

                var property_features_msg = response.responseJSON.errors.property_features;
                if(errors.hasOwnProperty('property_features')){
                    $('#propertyFeatures_error').text(property_features_msg);
                }else{
                    $('#propertyFeatures_error').text('');  
                }

                var property_description_msg = response.responseJSON.errors.property_description;
                if(errors.hasOwnProperty('property_description')){
                    $('#propertyDescription_error').text(property_description_msg);
                }else{
                    $('#propertyDescription_error').text('');  
                }

                var property_category_msg = response.responseJSON.errors.property_category_id;
                if(errors.hasOwnProperty('property_category_id')){
                    $('#propertyType_error').text(property_category_msg);
                }else{
                    $('#propertyType_error').text('');  
                }

                var property_price_msg = response.responseJSON.errors.property_price;
                if(errors.hasOwnProperty('property_price')){
                    $('#propertyPrice_error').text(property_price_msg);
                }else{
                    $('#propertyPrice_error').text('');  
                }

                var property_status_msg = response.responseJSON.errors.property_status;
                if(errors.hasOwnProperty('property_status')){
                    $('#propertyStatus_error').text(property_status_msg);
                }else{
                    $('#propertyStatus_error').text('');  
                }
                
                var no_of_bedrooms_msg = response.responseJSON.errors.no_of_bedrooms;
                if(errors.hasOwnProperty('no_of_bedrooms')){
                    $('#numberOfBedrooms_error').text(no_of_bedrooms_msg);
                }else{
                    $('#numberOfBedrooms_error').text('');  
                }

                var publish_property_msg = response.responseJSON.errors.publish_property;
                if(errors.hasOwnProperty('publish_property')){
                    $('#publishProperty_error').text(publish_property_msg);
                }else{
                    $('#publishProperty_error').text('');  
                }

                var property_images_msg = response.responseJSON.errors.property_images;
                if(errors.hasOwnProperty('property_images')){
                    $('#propertyImages_error').text(property_images_msg);
                }else{
                    $('#propertyImages_error').text('');  
                }
           }
    });
  
  });