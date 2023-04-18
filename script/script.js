$(document).ready(function(){
    $('.scroll-up-btn').click(function(){
        $('html,body').animate({scrollTop: 0});
        $('html').css("scrollBehavior", "smooth");
    });

    $('.navbar .menu li a').click(function(){
        $('html').css("scrollBehavior", "smooth");
    });
    $('.map').mousemove(function(){
        $('#form').css({
        'display' : 'block'
    }); 
    
    });
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
            $('#form').css({
                'display' : 'block'
            }); 
        }else{
            $('.navbar').removeClass("sticky");
        }
        
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

});
