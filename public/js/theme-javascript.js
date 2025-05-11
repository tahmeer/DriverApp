$(document).ready(function(){
    console.log("jQuery is working!");
}); 

$('#deliveryType').on('change',function(e){
    var SelectedValue = $(this).val();
    if(SelectedValue == "Cargo"){
        $('#weight').removeClass('d-none');
    }else{
        $('#weight').addClass('d-none');
    }
});