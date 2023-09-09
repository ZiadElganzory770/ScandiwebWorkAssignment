$(document).ready(function(){
    $('#price').on('input',function(){
        const price = Number($(this).val());
        const priceRegex = /^\d+(\.\d{1,2})?$/;
        if (!priceRegex.test(price)){
            $(this).get(0).setCustomValidity('Please, provide the data of indicated type');
        } else {
            $(this).get(0).setCustomValidity('');
        }
    });
});