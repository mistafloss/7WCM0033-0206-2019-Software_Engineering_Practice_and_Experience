$(document).ready(function(){


});

$('#proof_of_identity').change(function(){
    var filePreviewDiv = $('#proof_of_identity_preview');
    var filePreview = '<li>' + $('#proof_of_identity').prop('files')[0].name + '</li>';
    $('#proof_of_identity_preview ul').remove();
    filePreviewDiv.append('<ul>'+filePreview+'</ul>');
});

$('#proof_of_address').change(function(){
    var filePreviewDiv = $('#proof_of_address_preview');
    var filePreview = '<li>' + $('#proof_of_address').prop('files')[0].name + '</li>';
    $('#proof_of_address_preview ul').remove();
    filePreviewDiv.append('<ul>'+filePreview+'</ul>');
});