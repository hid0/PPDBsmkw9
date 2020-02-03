$(document).ready( function () {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
    $('input[value="khusus"]').click(function() {
        $("#khusus").show();
    });
    $('input[value="umum"]').click(function() {
        $("#khusus").hide();
    });
    $('textarea').css("resize", "none");
    $('input[type="text"]').attr("autocomplete", "off");
    $('a[type="button"]').click( function () {
        if ($('#passwd').get(0).type == 'password') {
            $('#passwd').attr('type', 'text');
            $('.fa').removeClass("fa-eye");
            $('.fa').addClass("fa-eye-slash");
        } else {
            $('#passwd').attr('type', 'password');
            $('.fa').removeClass("fa-eye-slash");
            $('.fa').addClass("fa-eye");
        }
    });
    $('input#ayah').keyup( function () {
        var cont0 = $(this).val();
        $('input#wali').val(cont0);
    });
    $('input#krj_ayah').keyup( function () {
        var cont1 = $(this).val();
        $('input#krj_wali').val(cont1);
    });
});
function createCaptcha(){
    for(i=0; i<6 ; i++){
        if(i %2 ==0){
            captcha[i] = String.fromCharCode(Math.floor((Math.random()*26)+65));
        }else{      
            captcha[i] = Math.floor((Math.random()*10)+0);
        }
    }
    var thecaptcha=captcha.join("");
    var elm = document.getElementById('captcha');
    elm.innerHTML="<span class='captcha'> " + thecaptcha+ " </span>" + "&nbsp; <a onclick='createCaptcha()' class='badge badge-warning' href='#'>recaptcha</a>";
}
var captcha= new Array ();
function validateRecaptcha(){
    var recaptcha= document.getElementById("recaptcha").value;;
    var validRecaptcha=0;
    for(var j=0; j<6; j++){
        if(recaptcha.charAt(j)!= captcha[j]){
            validRecaptcha++;
        }
    }
    if (recaptcha == ""){
        document.getElementById('errCaptcha').innerHTML = 'Re-Captcha must be filled';
    } else if (validRecaptcha>0 || recaptcha.length>6){
        document.getElementById('errCaptcha').innerHTML = 'Sorry, Wrong Re-Captcha';
    } else{
        document.getElementById('errCaptcha').innerHTML = 'OK';
    }
}