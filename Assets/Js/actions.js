/**
 * Created by wap29 on 24/02/15.
 */
$(function(){

    $("#inscription").on("click",ToggleInsc);

function ToggleInsc()
{


    $("#wrap").toggleClass("unwrap").toggleClass("wrap");



    if ($("#wrap").hasClass("unwrap"))
    {
        $('#wrap').slideDown(500);
        $('#wrap').removeClass("hide");

    }
    else
    {
        $('#wrap').slideUp(500);
    }
    return false;
};
});
