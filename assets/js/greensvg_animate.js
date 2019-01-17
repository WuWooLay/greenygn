$(document).ready( function() {
   
    anime({
        targets: ' #Y_Group polyline, #Y_Group line, #Tree_Group path',
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 400,
        delay: function(el, i) { return i * 70 },
        direction: 'alternate',
    });

    anime({
        targets: '#G_Group, #Border_Line',
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 1000,
        delay: function(el, i) { return i * 100 },
        direction: 'alternate',
    });

    setTimeout(function () {

        anime({
            targets: '#preloading_container',
            easing: 'easeInOutSine',
            opacity: 0,
            duration: 800,
        });

        setTimeout(  function () {
            $('#preloading_container').addClass('d-none');
        },800);
    }, 500);
    
});