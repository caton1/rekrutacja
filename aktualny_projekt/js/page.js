$().ready(function () {
    $('.div1').show();
    $('.div2').hide();
    $('.div3').hide();
    $('.div4').hide();
    $('.div5').hide();
    $('.div6').hide();

//krop wprzód

    $('#next1btn').click(function(){
        $('.div1').hide();
        $('.div2').show();
    })

    $('#next2btn').click(function(){
        $('.div2').hide();
        $('.div3').show();
    })

    $('#next3btn').click(function(){
        $('.div3').hide();
        $('.div4').show();
    })

    $('#next4btn').click(function(){
        $('.div4').hide();
        $('.div5').show();
    })

    $('#next5btn').click(function(){
        $('.div5').hide();
        $('.div6').show();
    })
//Krok wstecz

    $('#prev2btn').click(function(){
        $('.div2').hide();
        $('.div1').show();
    })

    $('#prev3btn').click(function(){
        $('.div3').hide();
        $('.div2').show();
    })

    $('#prev4btn').click(function(){
        $('.div4').hide();
        $('.div3').show();
    })

    $('#prev5btn').click(function(){
        $('.div5').hide();
        $('.div4').show();
    })

    $('#prev6btn').click(function(){
        $('.div6').hide();
        $('.div5').show();
    })
})