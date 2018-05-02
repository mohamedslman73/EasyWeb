


$(document).ready(function(){

    $( ".dropdown" ).hover(
        function() {
            $( "#name" ).addClass('name-shown');
            /* $( "#name" ).show();*/
        }, function() {
            $( "#name" ).removeClass('name-shown');
            /*$( "#name" ).hide();*/
        }
    );



    $("#small-bars").click(function(){
    $(".cover-bars").slideToggle("slow");
    });


    // $(".second-dropDown").focusin(function(){
    //   $(".block-dropDown").slideToggle("slow");
    // });


    $(".second-dropDown").click(function(){
        $(".block-dropDown").slideToggle("slow");

    });


    // $(document).click(function () {
    //     $(".block-dropDown:visible").hide();
    // });


    //////// change password UserProfile

    $("#chang-pas-but").click(function(){
        $("#cor-change-password").slideToggle("slow");
    });



////// flag change




//////////////////////// schools ////////////////////////////

//filter



    $(".dropdown-non-student").click(function () {
        $(this).parent().find(".dropdown-stydent-type").slideToggle("slow");
    })

    $(".adv-search button").click(function () {
        $(".filter-al-schools").toggle();
    });








    // $("love-to").click(function(){
    //     $(this).find("i").toggleClass(" fa-heart-o");
    // });

    // popup-web


    // love icon schools page
    $('.love-to').click(function () {
        if ($(this).find("i").hasClass('fa-heart-o')) {
            $(this).find("i").removeClass('fa-heart-o').addClass('fa-heart');
        }else{
            $(this).find("i").removeClass('fa-heart').addClass('fa-heart-o');
        }
    });


    // compare icon schools page
/*
    $('.popup-web').click(function () {
        if ($(this).find("i").hasClass('fa-exchange')) {
            $(this).find("i").removeClass('fa-exchange').addClass('fa-times');
        }else{
            $(this).find("i").removeClass('fa-times').addClass('fa-exchange');
        }
    });
*/


    $('.compare').click(function () {
        $(this).parent().find('.compare').hide();
        $(this).parent().find('.exitCompare').show();
    })
    $('.exitCompare').click(function () {
        $(this).parent().find('.compare').show();
        $(this).parent().find('.exitCompare').hide();
    })







    $(document).on("click",".just-replay",function () {
        $(this).parent().parent().find(".bod-repl-al-rep").toggle();
    });





//dATE PICER ADD SCHOOL


   /* $(document).ready(function () {
        $( ".date-picker" ).datepicker();

    })*/


   /* $(document).ready(function () {
        $( ".date-picker" ).datepicker();

    })*/

    $(document).ready(function () {
        $( ".date-picker" ).datepicker();

    })




    $(".close-faver").on('click',function () {
        $(this).parent().parent().parent().parent().parent().remove();
    })
   /// $(".close-faver").click().parent().parent().parent().parent().parent().remove();





});
