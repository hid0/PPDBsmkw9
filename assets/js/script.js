$(document).ready(function() {
    $(".datepicker").datepicker({
        format: "dd/mm/yyyy"
    });
    $('input[value="khusus"]').click(function() {
        $("#khusus").show();
    });
    $('input[value="umum"], [value="industri"]').click(function() {
        $("#khusus").hide();
        $("#pilih").prop("selectedIndex", 0);
        $('input[type="radio"]#ya4').prop("checked", false);
    });
    $("textarea").css("resize", "none");
    $('input[type="text"]').attr("autocomplete", "off");
    $('a[type="button"]').click(function() {
        if ($("#passwd").get(0).type == "password") {
            $("#passwd").attr("type", "text");
            $(".fa").removeClass("fa-eye");
            $(".fa").addClass("fa-eye-slash");
        } else {
            $("#passwd").attr("type", "password");
            $(".fa").removeClass("fa-eye-slash");
            $(".fa").addClass("fa-eye");
        }
    });
    $("input#ayah").keyup(function() {
        var cont0 = $(this).val();
        $("input#wali").val(cont0);
    });
    $("input#krj_ayah").keyup(function() {
        var cont1 = $(this).val();
        $("input#krj_wali").val(cont1);
    });
    $("#btnGetCaptcha").prop("disabled", true);
    var iNumber = Math.floor(Math.random() * 10000);
    $("#divGenerateRandomValues").css({
        "background-image": "url(../img/captcha.png)",
        width: "100p%",
        height: "40px"
    });
    $("#divGenerateRandomValues").html("<input id='txtNewInput'></input>");
    $("#txtNewInput").css({
        background: "transparent",
        "font-family": "Serif",
        "font-style": "bold",
        "font-size": "35px"
    });
    $("#txtNewInput").css({
        width: "100px",
        border: "none",
        color: "black",
        "text-decoration": "line-through",
        "font-style": "italic"
    });
    $("#txtNewInput").val(iNumber);
    $("#txtNewInput").prop("disabled", true);
    var wrongInput = function() {
        if ($("#textInput").val() != iNumber) {
            return true;
        } else {
            return false;
        }
    };
    $("#textInput").bind("input", function() {
        $("#btnGetCaptcha").prop("disabled", wrongInput);
    });
    $("#textInput").addClass("form-control input-lg");
    $("#btnGetCaptcha").addClass("btn btn-success btn-lg btn-block btn-flat");
    $('input[value="Industri"]').click(function() {
        $('option[value="KT"], [value="PBS"]').hide();
    });
    $('input[value="Umum"], [value="Khusus"]').click(function() {
        $('option[value="KT"], [value="PBS"]').show();
    });
    var ListSekolah = [
        "MTs Darul Hikmah",
        "MTs Ittihadul Muslimin",
        "MTs Mabdaul Huda",
        "MTs Mafatihul Huda",
        "MTs Mafatihut Thullab",
        "MTs Miftahul Huda",
        "MTs Miftahul Ulum",
        "MTs Safinatul Huda",
        "MTs Salafiyah",
        "MTs Shofa Marwah",
        "MTs Sultan Fattah",
        "MTs Tasymirusy Syubban",
        "MTs Al Alawiyah",
        "MTs Al Muttaqin",
        "MTs Matholiul Huda",
        "MTs Walisongo",
        "MTs Badrul Ulum",
        "MTs Darul Istiqomah",
        "MTs Hasyim Asyari",
        "MTs Nurul Ulum",
        "MTs Kedungombo",
        "MTs Nurul Athfal",
        "MTs Nurul Huda",
        "MTs Al Khidmah",
        "MTs Nurul Islam",
        "MTs Darul Ulum",
        "MTs Al Falah",
        "MTs Safinatul Huda 2",
        "MTs Al Islam",
        "MTs Zumrotul Wildan",
        "MTs Tsamrotul Huda",
        "MTs Urwatil Wutsqo",
        "MTs An Nur",
        "MTs Ismailiyyah",
        "MTs Muhammadiyah",
        "MTs PB Roudlotul Mubtadiin",
        "MTs Al Isro",
        "MTs Amal Muslimin",
        "MTs Miftahul Huda",
        "MTs Nurul Muslim",
        "Mts Salafiyah Al Ikhlas",
        "MTs Al–Hidayah",
        "MTs Mafatihul Akhlaq",
        "MTs Masalikil Huda",
        "MTs Sultan Hadlirin",
        "MTs Nahdlatul Fata",
        "SMP Muhammadiyah 5",
        "SMP Islam Sultan Agung 3",
        "SMP Takhassus Al Qur An Sadamiyyah",
        "SMP Muhammadiyah",
        "SMP Ma'arif",
        "SMP Islam Unggulan Darul Musyawaroh",
        "SMP Islam Darul Ulum",
        "SMP Az Zahra",
        "SMP Masehi",
        "SMP IT Amal Insani",
        "SMP Islam Ar-Rais ",
        "SMP Al Ma'arif",
        "SMP Taq Al Hamidiyah",
        "SMP Nurul Islam",
        "SMP Islam Sunan Kalijaga",
        "SMP Islam Hidayatul Mubtadiin",
        "SMP Islam Asy-Syafi'iyah",
        "SMP NU Assalam",
        "SMP IT Terpadu Al Haromain",
        "SMP Al Ishom",
        "SMP Islam Al-Hikmah 2",
        "SMP Walisongo",
        "SMP Islam",
        "SMP Islam Mafatihul Huda",
        "SMP Islam Al Madina",
        "SMP Sunan Muria",
        "SMP Negeri 3",
        "SMP Negeri 2",
        "SMP Negeri 1",
        "SMP Islam",
        "SMP Islam Darurrohman",
        "SMP Al Azhar"
    ];
    var kec = [
        "Pecangaan",
        "Kedung",
        "Welahan",
        "Mayong",
        "Nalumsari",
        "Batealit",
        "Tahunan",
        "Jepara",
        "Kalinyamatan",
        "Pakis Aji",
        "Karimun Jawa",
        "Bangsri"
    ];
    var des = [
        "Kerso",
        "Menganti",
        "Bugel",
        "Sukosono",
        "Karangrandu",
        "Sowan Lor",
        "Kalipucang Wetan",
        "Kalipucang Kulon",
        "Buaran",
        "Rengging",
        "Karangaji",
        "Rau",
        "Sidigede",
        "Troso",
        "Gemiring Lor",
        "Mindahan",
        "Bantrung",
        "Sowan Kidul",
        "Pendosawalan",
        "Ngabul",
        "Ngasem",
        "Margoyoso",
        "Purwogondo",
        "Dongos",
        "Tedunan",
        "Rajekwesi",
        "Raguklampitan",
        "Kecapi",
        "Pelang Kidul",
        "Pelang",
        "Pancur",
        "Ngroto",
        "Petekeyan",
        "Jebol",
        "Saripan",
        "Tahunan",
        "Senenan",
        "Karimunjawa",
        "Kemujan",
        "Daren",
        "Plajan",
        "Jondang",
        "Kedungmalang",
        "Kaliombo",
        "Pecangaan Wetan",
        "Pecangaan Kulon",
        "Gedangan",
        "Mayong Lor",
        "Karangnongko",
        "Batealit",
        "Tegalsambi",
        "Geneng",
        "Bawu",
        "Krapyak",
        "Kecapi",
        "Sekuro",
        "Sinanggul",
        "Kriyan",
        "Bandungrejo",
        "Damarjati",
        "Jebol"
    ];
    var bd = [
        "Jepara",
        "Kudus",
        "Demak",
        "Pati",
        "Semarang",
        "Rembang"
    ];
    $("#lahir").autocomplete({
        source: bd
    });
    $("#sek_asal").autocomplete({
        source: ListSekolah
    });
    $("#al_sek").autocomplete({
        source: des
    });
    $("#al_sek1").autocomplete({
        source: kec
    });
    $("#pilih").change(function() {
        if ($('option[value="yatim"]').attr("selected", "selected")) {
            $('input[type="radio"]#ya4').attr("checked", "checked");
        } else {
            console.log("gagal");
            $('input[type="radio"]#ya4').prop("checked", false);
            // $('option[value="yatim"]').removeAttr("selected");
        }
    });
    // ? $('option[value="yatim"]').click(function() {});
});