$(document).ready(function() {

    $('#ad').keydown(function (e){
        if(e.keyCode == 13){
            var ad;
            ad=$("#ad").val();
            gonder(ad);
        }
    });

    $("#axtar").click(function(){
        var ad;
        ad=$("#ad").val();
        gonder(ad);
    });

    function gonder(ad)
    {
        $(".result").html("<img src='loader.gif'>");
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {ad:ad},
            success: function(result){
                $(".result").html(result);
            }
        });
    }
});