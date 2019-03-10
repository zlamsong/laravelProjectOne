function readURL(input){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            jQuery('#target_image').attr('src',e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
jQuery("#change_image").change(function(){
    readURL(this);
});

$(document).ready(function () {
    setTimeout(function () {
        $('.alert').hide('slow');
    },2000);

    jQuery('#privilege-id').select2({
        placeholder:'Select Privilege'
    });
});
