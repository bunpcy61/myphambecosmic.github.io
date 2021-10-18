$(document).on('click', '.btn-delete',function(){
  $(this).closest('tr').remove();
  var check = $('.btn-add-line').attr('disabled');
  if (check) {
    $('.btn-add-line').attr('disabled',false);
  }
});