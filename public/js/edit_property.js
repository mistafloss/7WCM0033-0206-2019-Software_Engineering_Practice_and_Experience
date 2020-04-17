$(document).ready(function(){


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

$('#deleteImageModal').on('show.bs.modal', function(e){

    var modalLaunchLink = $(e.relatedTarget);
    var image_id = modalLaunchLink.data('imageid');

    var modal = $(this);
    modal.find('.modal-body #image_id').val(image_id);

});
