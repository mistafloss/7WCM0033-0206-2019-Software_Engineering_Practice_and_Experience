
$('#btnCreatePropertyCategory').click(function(e){
    e.preventDefault(e);
    $('.loading').css('display','block');
    $("#btnCreatePropertyCategory").attr("disabled", true);
    $.ajax({
           type:'POST',
           url:$('#actionUrl').val(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
               name: $('#propertyCategoryName').val(),
               description:$('#propertyCategoryDescription').val(),
              
           },
           success:function(response){
              $('.loading').css('display','none');
              $("#btnCreatePropertyCategory").attr("disabled", false); 
              console.log(response);
             $(location).attr('href', $('#propertyCategoriesListUrl').val());
           },
           error: function(response){
            $('.loading').css('display','none');
              $("#btnCreatePropertyCategory").attr("disabled", false); 
              console.log(response.responseJSON.errors);
              var errors = response.responseJSON.errors;
              var name_error_msg = response.responseJSON.errors.name;
              //name
              if(errors.hasOwnProperty('name')){
                  $('#propertyCategoryName_error').text(name_error_msg);
              }else{
                  $('#propertyCategoryName_error').text('');  
              }
           }
    });
  
  });
  
  $('#editPropertyCategoryModal').on('show.bs.modal', function (e) {
    var propertyCategoryId = $(e.relatedTarget).attr('data-id');
    var cat_view_url = $('#cat_view_url_'+propertyCategoryId).val();
    console.log(propertyCategoryId);
    $.ajax({
           type:'GET',
           url:cat_view_url,
           success:function(response){
              console.log(response);
              $('#propertyCategoryId_edit').val(response.data.id);
              $('#propertyCategoryName_edit').val(response.data.name);
              $('#propertyCategoryDescription_edit').val(response.data.description);
           },
    });
  });

  $('#btnEditPropertyCategory').click(function(e){
    e.preventDefault(e);
    $('.loading').css('display','block');
    $("#btnEditPropertyCategory").attr("disabled", true);
    $.ajax({
        type:'POST',
        url:$('#editActionUrl').val(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:{
          id: $('#propertyCategoryId_edit').val(),
          name: $('#propertyCategoryName_edit').val(),
          description:$('#propertyCategoryDescription_edit').val(),
        
      },
      success:function(response){
        $('.loading').css('display','none');
        $("#btnEditPropertyCategory").attr("disabled", false); 
        //console.log(response);
        $(location).attr('href', $('#propertyCategoriesListUrl').val());
      },
      error: function(response){
        $('.loading').css('display','none');
          $("#btnEditPropertyCategory").attr("disabled", false); 
          console.log(response.responseJSON.errors);
          var errors = response.responseJSON.errors;
          var name_error_msg = response.responseJSON.errors.name;
          //name
          if(errors.hasOwnProperty('name')){
              $('#editPropertyCategoryName_error').text(name_error_msg);
          }else{
              $('#editPropertyCategoryName_error').text('');  
          }
       }
    });


  });