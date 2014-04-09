jQuery(function ($) {

    // smooth scroll
    $('#main .navbar-nav > li').click(function (event) {
        event.preventDefault();
        var target = $(this).find('>a').prop('hash');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 500);
    });

    // scrollspy
    $('[data-spy="scroll"]').each(function () {
        var $spy = $(this).scrollspy('refresh')
    })

    // image animation
    new WOW().init();

    // satellites accordion
    $('.row .moons').on('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $collapse = $this.closest('.collapse-group').find('.collapse');
        if (!$collapse.hasClass('in')) {
            $this.removeClass('fa-angle-down').addClass('fa-angle-up');
        } else {
            $this.removeClass('fa-angle-up').addClass('fa-angle-down');
        }
        $collapse.collapse('toggle');
    });

});