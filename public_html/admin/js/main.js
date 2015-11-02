//TINYMCE
tinymce.init({
    selector: ".tinymce",
    forced_root_block: false,
    language: "ru"

});

//DATEPICKER
$(document).ready(function(){
    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy-mm-dd'
    });
});

$(document).on('pjax:success', function() {
     $('.datepicker').pickadate();
});

//CONFIRM
$('.btn-danger, .confirm-msg').on('click', function(e){
    if(confirm('Вы точно хотите удалить?')){
        return true;
    }else{
        return false;
    }
});

$(document).ready(function(){
    $("#clients-phone").mask("+7 (999) 999-99-99");
});
$(document).ready(function(){
    $('.search-option-checkbox').on('change',function(){
        if(this.checked){
            $("#clients-fullname").mask("+7 (999) 999-99-99");
        }else{
            $("#clients-fullname").mask("");
        }
    });
});
/*
$(document).ready(function () {
    $('#clients-fullname').autocomplete({
        'select' : function( event, ui ) {
            window.location = 'index.php?r=orders/new&id=' + ui.item.id;
        }
    });
});

*/