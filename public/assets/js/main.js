(function ($) {
    "use strict";

    $(document).on("ready", function () {
        /* ==================================================
            # Wow Init
         ===============================================*/
        var wow = new WOW({
            boxClass: "wow", // animated element css class (default is wow)
            animateClass: "animated", // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
        });
        wow.init();

        /* ==================================================
            # Tooltip Init
        ===============================================*/
        $('[data-toggle="tooltip"]').tooltip();

        /* ==================================================
            # Smooth Scroll
         ===============================================*/
        $("body").scrollspy({
            target: ".navbar-collapse",
            offset: 200,
        });
        $("a.smooth-menu").on("click", function (event) {
            var $anchor = $(this);
            var headerH = "75";
            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop:
                            $($anchor.attr("href")).offset().top -
                            headerH +
                            "px",
                    },
                    1500,
                    "easeInOutExpo"
                );
            event.preventDefault();
        });

        /* ==================================================
            # Off Canvas nav
         ===============================================*/

        $(".nav-indicator, .overlay").on("click", function (event) {
            $(".nav-indicator").toggleClass("clicked");
            $(".overlay").toggleClass("show");
            $("nav").toggleClass("show");
            $("body").toggleClass("overflow");
        });

        /* ==================================================
            # Banner Animation
        ===============================================*/
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = "webkitAnimationEnd animationend";
            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data("animation");
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }

        //Variables on page load
        var $immortalCarousel = $(".animate_text"),
            $firstAnimatingElems = $immortalCarousel
                .find(".item:first")
                .find("[data-animation ^= 'animated']");
        //Initialize carousel
        $immortalCarousel.carousel();
        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Other slides to be animated on carousel slide event
        $immortalCarousel.on("slide.bs.carousel", function (e) {
            var $animatingElems = $(e.relatedTarget).find(
                "[data-animation ^= 'animated']"
            );
            doAnimations($animatingElems);
        });

        /* ==================================================
            # Youtube Video Init
         ===============================================*/
        //$('.player').mb_YTPlayer();

        /* ==================================================
            # imagesLoaded active
        ===============================================*/
        // $("#portfolio-grid,.blog-masonry").imagesLoaded(function () {
        //     /* Filter menu */
        //     // $(".mix-item-menu").on("click", "button", function () {
        //     //     var filterValue = $(this).attr("data-filter");
        //     //     $grid.isotope({
        //     //         filter: filterValue,
        //     //     });
        //     // });

        //     /* filter menu active class  */
        //     $(".mix-item-menu button").on("click", function (event) {
        //         $(this).siblings(".active").removeClass("active");
        //         $(this).addClass("active");
        //         event.preventDefault();
        //     });

        //     /* Filter active */
        //     // var $grid = $("#portfolio-grid").isotope({
        //     //     itemSelector: ".pf-item",
        //     //     percentPosition: true,
        //     //     masonry: {
        //     //         columnWidth: ".pf-item",
        //     //     },
        //     // });

        //     /* Filter active */
        //     // $(".blog-masonry").isotope({
        //     //     itemSelector: ".blog-item",
        //     //     percentPosition: true,
        //     //     masonry: {
        //     //         columnWidth: ".blog-item",
        //     //     },
        //     // });
        // });

        /* ==================================================
            # Fun Factor
        ===============================================*/
        (function ($) {
            $.fn.countTo = function (options) {
                options = options || {};

                return $(this).each(function () {
                    // set options for current element
                    var settings = $.extend(
                        {},
                        $.fn.countTo.defaults,
                        {
                            from: $(this).data("from"),
                            to: $(this).data("to"),
                            speed: $(this).data("speed"),
                            refreshInterval: $(this).data("refresh-interval"),
                            decimals: $(this).data("decimals"),
                        },
                        options
                    );

                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(
                            settings.speed / settings.refreshInterval
                        ),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data("countTo") || {};

                    $self.data("countTo", data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(
                        updateTimer,
                        settings.refreshInterval
                    );

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof settings.onUpdate == "function") {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData("countTo");
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof settings.onComplete == "function") {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(
                            self,
                            value,
                            settings
                        );
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null, // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        })(jQuery);

        $(".timer").countTo();

        /* ==================================================
            # Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: "image",
            // other options
        });

        $(".popup-gallery").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
            // other options
        });

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });

        $(".magnific-mix-gallery").each(function () {
            var $container = $(this);
            var $imageLinks = $container.find(".item");

            var items = [];
            $imageLinks.each(function () {
                var $item = $(this);
                var type = "image";
                if ($item.hasClass("magnific-iframe")) {
                    type = "iframe";
                }
                var magItem = {
                    src: $item.attr("href"),
                    type: type,
                };
                magItem.title = $item.data("title");
                items.push(magItem);
            });

            $imageLinks.magnificPopup({
                mainClass: "mfp-fade",
                items: items,
                gallery: {
                    enabled: true,
                    tPrev: $(this).data("prev-text"),
                    tNext: $(this).data("next-text"),
                },
                type: "image",
                callbacks: {
                    beforeOpen: function () {
                        var index = $imageLinks.index(this.st.el);
                        if (-1 !== index) {
                            this.goTo(index);
                        }
                    },
                },
            });
        });

        /* ==================================================
            # Testimonial Carousel
         ===============================================*/
        $(".testimonials-carousel").owlCarousel({
            loop: false,
            margin: 50,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>",
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                800: {
                    items: 2,
                },
            },
        });

        /* ==================================================
            # Team Carousel
         ===============================================*/
        $(".team-carousel").owlCarousel({
            loop: false,
            margin: 50,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>",
            ],
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                800: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1400: {
                    items: 4,
                },
            },
        });

        /* ==================================================
            # Clients Carousel
         ===============================================*/
        $(".clients-carousel").owlCarousel({
            loop: false,
            margin: 80,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>",
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
        });

        /* ==================================================
            # Clients Carousel
         ===============================================*/
        $(".clients-carousel-3-col").owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>",
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 3,
                    margin: 80,
                },
            },
        });

        /* ==================================================
            # Case Carousel
         ===============================================*/
        $(".case-carousel").owlCarousel({
            loop: true,
            center: true,
            margin: 30,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>",
            ],
            dots: false,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                1000: {
                    items: 2,
                },
                1200: {
                    items: 2,
                    stagePadding: 200,
                },
            },
        });

        /* ==================================================
            Preloader Init
         ===============================================*/
        $(window).on("load", function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });

        /* ==================================================
            Nice Select Init
         ===============================================*/
        //$('select').niceSelect();
    }); // end document ready function
})(jQuery); // End jQuery

(function ($) {
    "use strict";

    var bootsnav = {
        initialize: function () {
            this.event();
            this.hoverDropdown();
            this.navbarSticky();
            this.navbarScrollspy();
        },
        event: function () {
            // ------------------------------------------------------------------------------ //
            // Variable
            // ------------------------------------------------------------------------------ //
            var getNav = $("nav.navbar.bootsnav");

            // ------------------------------------------------------------------------------ //
            // Navbar Sticky
            // ------------------------------------------------------------------------------ //
            var navSticky = getNav.hasClass("navbar-sticky");
            if (navSticky) {
                // Wraped navigation
                getNav.wrap("<div class='wrap-sticky'></div>");
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Center
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("brand-center")) {
                var postsArr = new Array(),
                    index = $("nav.brand-center"),
                    $postsList = index.find("ul.navbar-nav");

                index.prepend(
                    "<span class='storage-name' style='display:none;'></span>"
                );

                //Create array of all posts in lists
                index.find("ul.navbar-nav > li").each(function () {
                    if ($(this).hasClass("active")) {
                        var getElement = $("a", this).eq(0).text();
                        $(".storage-name").html(getElement);
                    }
                    postsArr.push($(this).html());
                });

                //Split the array at this point. The original array is altered.
                var firstList = postsArr.splice(
                        0,
                        Math.round(postsArr.length / 2)
                    ),
                    secondList = postsArr,
                    ListHTML = "";

                var createHTML = function (list) {
                    ListHTML = "";
                    for (var i = 0; i < list.length; i++) {
                        ListHTML += "<li>" + list[i] + "</li>";
                    }
                };

                //Generate HTML for first list
                createHTML(firstList);
                $postsList.html(ListHTML);
                index.find("ul.nav").first().addClass("navbar-left");

                //Generate HTML for second list
                createHTML(secondList);
                //Create new list after original one
                $postsList
                    .after('<ul class="nav navbar-nav"></ul>')
                    .next()
                    .html(ListHTML);
                index.find("ul.nav").last().addClass("navbar-right");

                //Wrap navigation menu
                index
                    .find("ul.nav.navbar-left")
                    .wrap("<div class='col-half left'></div>");
                index
                    .find("ul.nav.navbar-right")
                    .wrap("<div class='col-half right'></div>");

                //Selection Class
                index.find("ul.navbar-nav > li").each(function () {
                    var dropDown = $("ul.dropdown-menu", this),
                        megaMenu = $("ul.megamenu-content", this);
                    dropDown.closest("li").addClass("dropdown");
                    megaMenu.closest("li").addClass("megamenu-fw");
                });

                var getName = $(".storage-name").html();
                if (!getName == "") {
                    $(
                        "ul.navbar-nav > li:contains('" + getName + "')"
                    ).addClass("active");
                }
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Sidebar
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("navbar-sidebar")) {
                // Add Class to body
                $("body").addClass("wrap-nav-sidebar");
                getNav.wrapInner("<div class='scroller'></div>");
            } else {
                $(".bootsnav").addClass("on");
            }

            // ------------------------------------------------------------------------------ //
            // Menu Center
            // ------------------------------------------------------------------------------ //
            if (getNav.find("ul.nav").hasClass("navbar-center")) {
                getNav.addClass("menu-center");
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Full
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("navbar-full")) {
                // Add Class to body
                $("nav.navbar.bootsnav")
                    .find("ul.nav")
                    .wrap("<div class='wrap-full-menu'></div>");
                $(".wrap-full-menu").wrap("<div class='nav-full'></div>");
                $("ul.nav.navbar-nav").prepend(
                    "<li class='close-full-menu'><a href='#'><i class='fa fa-times'></i></a></li>"
                );
            } else if (getNav.hasClass("navbar-mobile")) {
                getNav.removeClass("no-full");
            } else {
                getNav.addClass("no-full");
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Mobile
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("navbar-mobile")) {
                // Add Class to body
                $(".navbar-collapse").on("shown.bs.collapse", function () {
                    $("body").addClass("side-right");
                });
                $(".navbar-collapse").on("hide.bs.collapse", function () {
                    $("body").removeClass("side-right");
                });

                $(window).on("resize", function () {
                    $("body").removeClass("side-right");
                });
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Fixed
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("no-background")) {
                $(window).on("scroll", function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > 34) {
                        $(".navbar-fixed").removeClass("no-background");
                    } else {
                        $(".navbar-fixed").addClass("no-background");
                    }
                });
            }

            // ------------------------------------------------------------------------------ //
            // Navbar Fixed
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("navbar-transparent")) {
                $(window).on("scroll", function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > 34) {
                        $(".navbar-fixed").removeClass("navbar-transparent");
                    } else {
                        $(".navbar-fixed").addClass("navbar-transparent");
                    }
                });
            }

            // ------------------------------------------------------------------------------ //
            // Button Cart
            // ------------------------------------------------------------------------------ //
            $(".btn-cart").on("click", function (e) {
                e.stopPropagation();
            });

            // ------------------------------------------------------------------------------ //
            // Toggle Search
            // ------------------------------------------------------------------------------ //
            $("nav.navbar.bootsnav .attr-nav").each(function () {
                $("li.search > a", this).on("click", function (e) {
                    e.preventDefault();
                    $(".top-search").slideToggle();
                });
            });
            $(".input-group-addon.close-search").on("click", function () {
                $(".top-search").slideUp();
            });

            // ------------------------------------------------------------------------------ //
            // Toggle Side Menu
            // ------------------------------------------------------------------------------ //
            $("nav.navbar.bootsnav .attr-nav").each(function () {
                $("li.side-menu > a", this).on("click", function (e) {
                    e.preventDefault();
                    $("nav.navbar.bootsnav > .side").toggleClass("on");
                    $("body").toggleClass("on-side");
                });
            });
            $(".side .close-side").on("click", function (e) {
                e.preventDefault();
                $("nav.navbar.bootsnav > .side").removeClass("on");
                $("body").removeClass("on-side");
            });

            // ------------------------------------------------------------------------------ //
            // Wrapper
            // ------------------------------------------------------------------------------ //
            $("body").wrapInner("<div class='wrapper'></div>");
        },

        // ------------------------------------------------------------------------------ //
        // Change dropdown to hover on dekstop
        // ------------------------------------------------------------------------------ //
        hoverDropdown: function () {
            var getNav = $("nav.navbar.bootsnav"),
                getWindow = $(window).width(),
                getHeight = $(window).height(),
                getIn = getNav.find("ul.nav").data("in"),
                getOut = getNav.find("ul.nav").data("out");

            if (getWindow < 991) {
                // Height of scroll navigation sidebar
                $(".scroller").css("height", "auto");

                // Disable mouseenter event
                $("nav.navbar.bootsnav ul.nav")
                    .find("li.dropdown")
                    .off("mouseenter");
                $("nav.navbar.bootsnav ul.nav")
                    .find("li.dropdown")
                    .off("mouseleave");
                $("nav.navbar.bootsnav ul.nav")
                    .find(".title")
                    .off("mouseenter");
                $("nav.navbar.bootsnav ul.nav").off("mouseleave");

                // Enable click event
                $("nav.navbar.bootsnav ul.nav").each(function () {
                    $(".dropdown-menu", this).removeClass(getOut);

                    // Dropdown Fade Toggle
                    $("a.dropdown-toggle", this).off("click");
                    $("a.dropdown-toggle", this).on("click", function (e) {
                        e.stopPropagation();
                        $(this)
                            .closest("li.dropdown")
                            .find(".dropdown-menu")
                            .first()
                            .stop()
                            .fadeToggle()
                            .toggleClass(getIn);
                        $(this)
                            .closest("li.dropdown")
                            .first()
                            .toggleClass("on");
                        return false;
                    });

                    // Hidden dropdown action
                    $("li.dropdown", this).each(function () {
                        $(this).find(".dropdown-menu").stop().fadeOut();
                        $(this).on("hidden.bs.dropdown", function () {
                            $(this).find(".dropdown-menu").stop().fadeOut();
                        });
                        return false;
                    });

                    // Megamenu style
                    $(".megamenu-fw", this).each(function () {
                        $(".col-menu", this).each(function () {
                            $(".content", this).stop().fadeOut();
                            $(".title", this).off("click");
                            $(".title", this).on("click", function () {
                                $(this)
                                    .closest(".col-menu")
                                    .find(".content")
                                    .stop()
                                    .fadeToggle()
                                    .addClass(getIn);
                                $(this).closest(".col-menu").toggleClass("on");
                                return false;
                            });

                            $(".content", this).on("click", function (e) {
                                e.stopPropagation();
                            });
                        });
                    });
                });

                // Hidden dropdown
                var cleanOpen = function () {
                    $("li.dropdown", this).removeClass("on");
                    $(".dropdown-menu", this).stop().fadeOut();
                    $(".dropdown-menu", this).removeClass(getIn);
                    $(".col-menu", this).removeClass("on");
                    $(".col-menu .content", this).stop().fadeOut();
                    $(".col-menu .content", this).removeClass(getIn);
                };

                // Hidden om mouse leave
                $("nav.navbar.bootsnav").on("mouseleave", function () {
                    cleanOpen();
                });

                // Enable click atribute navigation
                $("nav.navbar.bootsnav .attr-nav").each(function () {
                    $("li.dropdown", this).off("mouseenter");
                    $("li.dropdown", this).off("mouseleave");
                    $("a.dropdown-toggle", this).off("click");
                    $("a.dropdown-toggle", this).on("click", function (e) {
                        e.stopPropagation();
                        $(this)
                            .closest("li.dropdown")
                            .find(".dropdown-menu")
                            .first()
                            .stop()
                            .fadeToggle();
                        $(".navbar-toggle").each(function () {
                            $(".fa", this).removeClass("fa-times");
                            $(".fa", this).addClass("fa-bars");
                            $(".navbar-collapse").removeClass("in");
                            $(".navbar-collapse").removeClass("on");
                        });
                    });

                    $(this).on("mouseleave", function () {
                        $(".dropdown-menu", this).stop().fadeOut();
                        $("li.dropdown", this).removeClass("on");
                        return false;
                    });
                });

                // Toggle Bars
                $(".navbar-toggle").each(function () {
                    $(this).off("click");
                    $(this).on("click", function () {
                        $(".fa", this).toggleClass("fa-bars");
                        $(".fa", this).toggleClass("fa-times");
                        cleanOpen();
                    });
                });
            } else if (getWindow > 991) {
                // Height of scroll navigation sidebar
                $(".scroller").css("height", getHeight + "px");

                // Navbar Sidebar
                if (getNav.hasClass("navbar-sidebar")) {
                    // Hover effect Sidebar Menu
                    $("nav.navbar.bootsnav ul.nav").each(function () {
                        $("a.dropdown-toggle", this).off("click");
                        $("a.dropdown-toggle", this).on("click", function (e) {
                            e.stopPropagation();
                        });

                        $("li.dropdown", this).on("mouseenter", function () {
                            $(".dropdown-menu", this).eq(0).removeClass(getOut);
                            $(".dropdown-menu", this)
                                .eq(0)
                                .stop()
                                .fadeIn()
                                .addClass(getIn);
                            $(this).addClass("on");
                            return false;
                        });

                        $(".col-menu").each(function () {
                            $(".title", this).on("mouseenter", function () {
                                $(this)
                                    .closest(".col-menu")
                                    .find(".content")
                                    .stop()
                                    .fadeIn()
                                    .addClass(getIn);
                                $(this).closest(".col-menu").addClass("on");
                                return false;
                            });
                        });

                        $(this).on("mouseleave", function () {
                            $(".dropdown-menu", this).stop().removeClass(getIn);
                            $(".dropdown-menu", this)
                                .stop()
                                .addClass(getOut)
                                .fadeOut();
                            $(".col-menu", this)
                                .find(".content")
                                .stop()
                                .fadeOut()
                                .removeClass(getIn);
                            $(".col-menu", this).removeClass("on");
                            $("li.dropdown", this).removeClass("on");
                            return false;
                        });
                    });
                } else {
                    // Hover effect Default Menu
                    $("nav.navbar.bootsnav ul.nav").each(function () {
                        $("a.dropdown-toggle", this).off("click");
                        $("a.dropdown-toggle", this).on("click", function (e) {
                            e.stopPropagation();
                        });

                        $(".megamenu-fw", this).each(function () {
                            $(".title", this).off("click");
                            $("a.dropdown-toggle", this).off("click");
                        });

                        $("li.dropdown", this).on("mouseenter", function () {
                            $(".dropdown-menu", this).eq(0).removeClass(getOut);
                            $(".dropdown-menu", this)
                                .eq(0)
                                .stop()
                                .fadeIn()
                                .addClass(getIn);
                            $(this).addClass("on");
                            return false;
                        });

                        $("li.dropdown", this).on("mouseleave", function () {
                            $(".dropdown-menu", this).eq(0).removeClass(getIn);
                            $(".dropdown-menu", this)
                                .eq(0)
                                .stop()
                                .fadeOut()
                                .addClass(getOut);
                            $(this).removeClass("on");
                        });

                        $(this).on("mouseleave", function () {
                            $(".dropdown-menu", this).removeClass(getIn);
                            $(".dropdown-menu", this)
                                .eq(0)
                                .stop()
                                .fadeOut()
                                .addClass(getOut);
                            $("li.dropdown", this).removeClass("on");
                            return false;
                        });
                    });
                }

                // ------------------------------------------------------------------------------ //
                // Hover effect Atribute Navigation
                // ------------------------------------------------------------------------------ //
                $("nav.navbar.bootsnav .attr-nav").each(function () {
                    $("a.dropdown-toggle", this).off("click");
                    $("a.dropdown-toggle", this).on("click", function (e) {
                        e.stopPropagation();
                    });

                    $("li.dropdown", this).on("mouseenter", function () {
                        $(".dropdown-menu", this).eq(0).removeClass(getOut);
                        $(".dropdown-menu", this)
                            .eq(0)
                            .stop()
                            .fadeIn()
                            .addClass(getIn);
                        $(this).addClass("on");
                        return false;
                    });

                    $("li.dropdown", this).on("mouseleave", function () {
                        $(".dropdown-menu", this).eq(0).removeClass(getIn);
                        $(".dropdown-menu", this)
                            .eq(0)
                            .stop()
                            .fadeOut()
                            .addClass(getOut);
                        $(this).removeClass("on");
                    });

                    $(this).on("mouseleave", function () {
                        $(".dropdown-menu", this).removeClass(getIn);
                        $(".dropdown-menu", this)
                            .eq(0)
                            .stop()
                            .fadeOut()
                            .addClass(getOut);
                        $("li.dropdown", this).removeClass("on");
                        return false;
                    });
                });
            }

            // ------------------------------------------------------------------------------ //
            // Menu Fullscreen
            // ------------------------------------------------------------------------------ //
            if (getNav.hasClass("navbar-full")) {
                var windowHeight = $(window).height(),
                    windowWidth = $(window).width();

                $(".nav-full").css("height", windowHeight + "px");
                $(".wrap-full-menu").css("height", windowHeight + "px");
                $(".wrap-full-menu").css("width", windowWidth + "px");

                $(".navbar-toggle").each(function () {
                    var getId = $(this).data("target");
                    $(this).off("click");
                    $(this).on("click", function (e) {
                        e.preventDefault();
                        $(getId).removeClass(getOut);
                        $(getId).addClass("in");
                        $(getId).addClass(getIn);
                        return false;
                    });

                    $("li.close-full-menu").on("click", function (e) {
                        e.preventDefault();
                        $(getId).addClass(getOut);
                        setTimeout(function () {
                            $(getId).removeClass("in");
                            $(getId).removeClass(getIn);
                        }, 500);
                        return false;
                    });
                });
            }
        },

        // ------------------------------------------------------------------------------ //
        // Navbar Sticky
        // ------------------------------------------------------------------------------ //
        navbarSticky: function () {
            var getNav = $("nav.navbar.bootsnav"),
                navSticky = getNav.hasClass("navbar-sticky");

            if (navSticky) {
                // Set Height Navigation
                var getHeight = getNav.height();
                $(".wrap-sticky").height(getHeight);

                // Windown on scroll
                var getOffset = $(".wrap-sticky").offset().top;
                $(window).on("scroll", function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > getOffset) {
                        getNav.addClass("sticked");
                    } else {
                        getNav.removeClass("sticked");
                    }
                });
            }
        },

        // ------------------------------------------------------------------------------ //
        // Navbar Scrollspy
        // ------------------------------------------------------------------------------ //
        navbarScrollspy: function () {
            var navScrollSpy = $(".navbar-scrollspy"),
                $body = $("body"),
                getNav = $("nav.navbar.bootsnav"),
                offset = getNav.outerHeight();

            if (navScrollSpy.length) {
                $body.scrollspy({ target: ".navbar", offset: offset });

                // Animation Scrollspy
                $(".scroll").on("click", function (event) {
                    event.preventDefault();

                    // Active link
                    $(".scroll").removeClass("active");
                    $(this).addClass("active");

                    // Remove navbar collapse
                    $(".navbar-collapse").removeClass("in");

                    // Toggle Bars
                    $(".navbar-toggle").each(function () {
                        $(".fa", this).removeClass("fa-times");
                        $(".fa", this).addClass("fa-bars");
                    });

                    // Scroll
                    var scrollTop = $(window).scrollTop(),
                        $anchor = $(this).find("a"),
                        $section = $($anchor.attr("href")).offset().top,
                        $window = $(window).width(),
                        $minusDesktop = getNav.data("minus-value-desktop"),
                        $minusMobile = getNav.data("minus-value-mobile"),
                        $speed = getNav.data("speed");

                    if ($window > 992) {
                        var $position = $section - $minusDesktop;
                    } else {
                        var $position = $section - $minusMobile;
                    }

                    $("html, body").stop().animate(
                        {
                            scrollTop: $position,
                        },
                        $speed
                    );
                });

                // Activate Navigation
                var fixSpy = function () {
                    var data = $body.data("bs.scrollspy");
                    if (data) {
                        offset = getNav.outerHeight();
                        data.options.offset = offset;
                        $body.data("bs.scrollspy", data);
                        $body.scrollspy("refresh");
                    }
                };

                // Activate Navigation on resize
                var resizeTimer;
                $(window).on("resize", function () {
                    clearTimeout(resizeTimer);
                    var resizeTimer = setTimeout(fixSpy, 200);
                });
            }
        },
    };

    // Initialize
    $(document).ready(function () {
        bootsnav.initialize();
    });

    // Reset on resize
    $(window).on("resize", function () {
        bootsnav.hoverDropdown();
        setTimeout(function () {
            bootsnav.navbarSticky();
        }, 500);

        // Toggle Bars
        $(".navbar-toggle").each(function () {
            $(".fa", this).removeClass("fa-times");
            $(".fa", this).addClass("fa-bars");
            $(this).removeClass("fixed");
        });
        $(".navbar-collapse").removeClass("in");
        $(".navbar-collapse").removeClass("on");
        $(".navbar-collapse").removeClass("bounceIn");
    });
})(jQuery);
