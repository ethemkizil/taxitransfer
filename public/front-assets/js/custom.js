$(document).ready(function() {

    $('input[name=return]').change(function () {
        var value = $('input[name=return]:checked').val();
        if(value=="0"){
            $("#return-wrapper").hide();
        }else if(value=="1"){
            $("#return-wrapper").show();
        }
    });

});