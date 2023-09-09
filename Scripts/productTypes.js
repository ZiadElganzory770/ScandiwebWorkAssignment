$(document).ready(function(){
    $('#dvd-fields').hide();
    $('#book-fields').hide();
    $('#furniture-fields').hide();
    const $dropdown = $('#productType')
    const $tables = $('.product-table');
    
    $dropdown.change(function(event){
        const selectedOption = $(this).val();

        $tables.each(function() {
            if ($(this).data('product-type') === selectedOption) {
              $(this).show();

              $(this).find('input').prop('required', true);
            } else {
              $(this).hide();

              $(this).find('input').prop('required', false);
            }
          });
    });
});