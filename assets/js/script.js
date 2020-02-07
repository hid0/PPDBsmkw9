$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
    });
    $('input[value="khusus"]').click(function() {
        $("#khusus").show();
    });
    $('input[value="umum"], [value="industri"]').click(function() {
        $("#khusus").hide();
    });
    $('textarea').css("resize", "none");
    $('input[type="text"]').attr("autocomplete", "off");
    $('a[type="button"]').click(function() {
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
    $('input#ayah').keyup(function() {
        var cont0 = $(this).val();
        $('input#wali').val(cont0);
    });
    $('input#krj_ayah').keyup(function() {
        var cont1 = $(this).val();
        $('input#krj_wali').val(cont1);
    });
    $("#btnGetCaptcha").prop("disabled", true);
    var iNumber = Math.floor(Math.random() * 10000);
    $("#divGenerateRandomValues").css({ "background-image": 'url(../img/captcha.png)', 'width': '100p%', 'height': '40px' });
    $("#divGenerateRandomValues").html("<input id='txtNewInput'></input>");
    $("#txtNewInput").css({ 'background': 'transparent', 'font-family': 'Serif', 'font-style': 'bold', 'font-size': '35px' });
    $("#txtNewInput").css({ 'width': '100px', 'border': 'none', 'color': 'black', 'text-decoration': 'line-through', 'font-style': 'italic' });
    $("#txtNewInput").val(iNumber);
    $("#txtNewInput").prop('disabled', true);

    // $("#btnGetCaptcha").click(function() {
    //     if ($("#textInput").val() != iNumber) {
    //         alert("Captcha Keliru, Mohon diulangi!!!");
    //     } else {
    //         alert("Captcha bNer... :)");
    //     }
    // });
    var wrongInput = function() {
        if ($("#textInput").val() != iNumber) {
            return true;
        } else {
            return false;
        }
    };
    $("#textInput").bind('input', function() {
        $("#btnGetCaptcha").prop('disabled', wrongInput);
    });
    $("#textInput").addClass('form-control input-lg');
    $("#btnGetCaptcha").addClass('btn btn-success btn-lg btn-block btn-flat');
    $('input[value="industri"]').click(function() {
        $('option[value="KT"]').hide();
        $('option[value="PBS"]').hide();
    });
    $('input[value="umum"], [value="khusus"]').click(function() {
        $('option[value="KT"]').show();
        $('option[value="PBS"]').show();
    })
});