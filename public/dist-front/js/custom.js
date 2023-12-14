(function ($) {
    "use strict";

    $(".scroll-top").hide();
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
            $(".scroll-top").fadeIn();
        } else {
            $(".scroll-top").fadeOut();
        }
    });
    $(".scroll-top").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            700
        );
    });

    $(document).ready(function () {
        $(".select2").select2({
            theme: "bootstrap",
        });

        $("#checkShipping").on("change", function () {
            $(".shipping-form").toggle();
        });

        $(".paypal").hide();
        $(".stripe").hide();

        $("#paymentMethodChange").on("change", function () {
            if ($("#paymentMethodChange").val() == "PayPal") {
                $(".paypal").show();
                $(".stripe").hide();
            } else if ($("#paymentMethodChange").val() == "Stripe") {
                $(".paypal").hide();
                $(".stripe").show();
            } else if ($("#paymentMethodChange").val() == "") {
                $(".paypal").hide();
                $(".stripe").hide();
            }
        });
    });

    new WOW().init();

    $(".video-button").magnificPopup({
        type: "iframe",
        gallery: {
            enabled: true,
        },
    });

    $(".magnific").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    // $(".slide-carousel").owlCarousel({
    //     loop: true,
    //     autoplay: false,
    //     autoplayHoverPause: true,
    //     margin: 0,
    //     mouseDrag: false,
    //     animateIn: "fadeIn",
    //     animateOut: "fadeOut",
    //     dots: true,
    //     nav: true,
    //     navText: [
    //         "<i class='fa fa-caret-left'></i>",
    //         "<i class='fa fa-caret-right'></i>",
    //     ],
    //     responsive: {
    //         0: {
    //             items: 1,
    //         },
    //         600: {
    //             items: 1,
    //         },
    //         1000: {
    //             items: 1,
    //         },
    //     },
    // });

    var welcomeSlide = $(".slide-carousel");

    welcomeSlide.owlCarousel({
        items: 1,
        margin: 0,
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 10000,
        smartSpeed: 1000,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
    });

    welcomeSlide.on("translate.owl.carousel", function () {
        var slideLayer = $("[data-animation]");
        slideLayer.each(function () {
            var anim_name = $(this).data("animation");
            $(this)
                .removeClass("animated " + anim_name)
                .css("opacity", "0");
        });
    });

    welcomeSlide.on("translated.owl.carousel", function () {
        var slideLayer = welcomeSlide
            .find(".owl-item.active")
            .find("[data-animation]");
        slideLayer.each(function () {
            var anim_name = $(this).data("animation");
            $(this)
                .addClass("animated " + anim_name)
                .css("opacity", "1");
        });
    });

    $("[data-delay]").each(function () {
        var anim_del = $(this).data("delay");
        $(this).css("animation-delay", anim_del);
    });

    $("[data-duration]").each(function () {
        var anim_dur = $(this).data("duration");
        $(this).css("animation-duration", anim_dur);
    });

    // var dot = $(".slide-carousel .owl-dot");
    // dot.each(function () {
    //     var index = $(this).index() + 1;
    //     if (index < 10) {
    //         $(this).html("0").append(index);
    //     } else {
    //         $(this).html(index);
    //     }
    // });

    $(".testimonial-carousel").owlCarousel({
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 1500,
        smartSpeed: 500,
        margin: 30,
        nav: false,
        // animateIn: "fadeIn",
        // animateOut: "fadeOut",
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });

    $(".room-detail-carousel").owlCarousel({
        loop: true,
        autoplay: false,
        autoplayHoverPause: true,
        margin: 0,
        mouseDrag: false,
        animateIn: "fadeIn",
        animateOut: "fadeOut",
        nav: true,
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    jQuery(".mean-menu").meanmenu({
        meanScreenWidth: "991",
    });

    $(".daterange1").daterangepicker({
        autoUpdateInput: false,
        minDate: new Date(),
        showDropdowns: false,
        locale: {
            format: "DD/MM/YYYY",
            cancelLabel: "Clear",
        },
    });

    $(".daterange1").on("apply.daterangepicker", function (ev, picker) {
        $(this).val(
            picker.startDate.format("DD/MM/YYYY") +
                " - " +
                picker.endDate.format("DD/MM/YYYY")
        );
    });

    $(".daterange1").on("cancel.daterangepicker", function (ev, picker) {
        $(this).val("");
    });

    if ($(window).width() > 767) {
        $("#sticky_sidebar").stickit({
            top: 80,
        });
    }
})(jQuery);
