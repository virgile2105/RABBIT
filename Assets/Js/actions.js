/**
 * Created by wap29 on 24/02/15.
 */
$(function(){

    $("#inscription").on("click",ToggleInsc);
    $("a[data-imgName]").on("click",delImage);

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

    function delImage()
    {
        var imgName=this.dataset.imgname;
        var postId=this.dataset.postid;
        console.log(imgName);
        var str=$("#STR").val();
        console.log(str);
        var newName=str.replace(imgName+"," ,"");
        console.log(newName);
        $("#STR").val(newName);


        var config={
            url:"remover.php",
            type:"POST",
            data:{name:newName,id:postId}
        };
        $.ajax(config).done(fait);

        $(this).parent().remove();

        function fait(data)
    {
       console.log(data);
    }


        return newName;
    }

});
