function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img1').attr('src', e.target.result);
            var btn = document.createElement("BUTTON");
           
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img2').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img3').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL4(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img4').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL5(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img5').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL6(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img6').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL7(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img7').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL8(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img8').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURL9(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img9').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURLPage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#pageimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function(){
    $("#img1").click(function(){
        $("input[name=foto1]").trigger('click');
    });
    $("#foto1").change(function(value){
       readURL1(this); 
    });

    $("#img2").click(function(){
        $("input[name=foto2]").trigger('click');
    });
    $("#foto2").change(function(value){
       readURL2(this); 
    });

    $("#img3").click(function(){
        $("input[name=foto3]").trigger('click');
    });
    $("#foto3").change(function(value){
       readURL3(this); 
    });

    $("#img4").click(function(){
        $("input[name=foto4]").trigger('click');
    });
    $("#foto4").change(function(value){
       readURL4(this); 
    });

    $("#img5").click(function(){
        $("input[name=foto5]").trigger('click');
    });
    $("#foto5").change(function(value){
       readURL5(this); 
    });

    $("#img6").click(function(){
        $("input[name=foto6]").trigger('click');
    });
    $("#foto6").change(function(value){
       readURL6(this); 
    });

    $("#img7").click(function(){
        $("input[name=foto7]").trigger('click');
    });
    $("#foto7").change(function(value){
       readURL7(this); 
    });

    $("#img8").click(function(){
        $("input[name=foto8]").trigger('click');
    });
    $("#foto8").change(function(value){
       readURL8(this); 
    });

    $("#img9").click(function(){
        $("input[name=foto9]").trigger('click');
    });
    $("#foto9").change(function(value){
       readURL9(this); 
    });



     $("#pageimg").click(function(){
        $("input[name=pagefoto]").trigger('click');
    });
    $("#pagefoto").change(function(value){
       readURLPage(this); 
    });
   
});