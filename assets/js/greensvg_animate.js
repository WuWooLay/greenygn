$(document).ready( function() {
   
    anime({
        targets: ' #Y_Group polyline, #Y_Group line, #Tree_Group path',
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 200,
        delay: function(el, i) { return i * 70 },
        direction: 'alternate',
    });

    anime({
        targets: '#G_Group, #Border_Line',
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 800,
        delay: function(el, i) { return i * 100 },
        direction: 'alternate',
    });

    setTimeout(function () {

        anime({
            targets: '#preloading_container',
            easing: 'easeInOutSine',
            opacity: 0,
            duration: 500,
        });

        setTimeout(  function () {
            $('#preloading_container').addClass('d-none');
        },500);

    }, 500);
    
    window.addEventListener('scroll', function () {

        var y = ((window.scrollY || window.pageYOffset) + window.innerHeight ) / 1.3  ;
        var innerHeight = (window.innerHeight); 

        // console.log(y);
        // console.log(innerHeight);
        
        if( y >= innerHeight ) {
            $('#scroll_top_container').removeClass('d-none');
        } else {
            $('#scroll_top_container').addClass('d-none');
        }

    });

    $("#scroll_top_container").click( function () {
        $('html, body').animate({
            scrollTop: 0
        }, 'fast');
    });

});