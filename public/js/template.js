/*jslint browser:true*/
/*jslint this*/
/*jslint white: true*/
/*global document jQuery window Swiper sequence google*/
jQuery(document).ready(function ($) {
    "use strict";
    /*-----------------------------------------------------------------------------------*/
    /* Template Options */
    /*-----------------------------------------------------------------------------------*/
    var TOptions;

    TOptions = {

        // variables
        class_active        : "active",                             // active class
        class_trigger       : "trigger",                            // trigger class
        toggle_btn          : $(".site-nav-toggle"),                // header navigation toggle button for mobile view
        navigation          : $(".site-nav"),                       // navigation selector
        sub_menu            : ".sub-menu",                          // navigation sub menu
        indicator_mobile    : ".indicator-mobile",                  // navigation indicator font awesome icons
        sticky_header       : "#sticky-header",                     // sticky header selector
        sticky_wrapper      : ".sticky-wrapper",                    // sticky header wrapper class
        pre_loader          : $(".site-preloader"),                 // pre loader selector
        windows             : $(window),                            // document window
        selector_slider     : document.getElementById("sequence"),  // header slider javascript selector
        selector_google_map : document.getElementById("site-map"),  // google map javascript selector
        selector_counter    : $(".counter"),                        // counter section for (statistic section)
        selector_tab        : $("#site-tabs-1"),                    // tabs selector for (tabs section)
        tabs_button         : $(".site-tabs-buttons"),              // tabs buttons for (tabs section)
        site_tabs           : $(".site-tabs"),                      // tabs for (tabs section)
        tabs_bg             : $(".site-tab-bg"),                    // tabs background image for (tabs section)
        portfolio           : $(".site-portfolio-tabs-content"),    // portfolio content for (portfolio section)
        portfolio_tabs      : $(".site-portfolio-tabs"),            // portfolio tabs for (portfolio section)
        light_box           : $(".venobox"),                        // light box for (portfolio section)
        selector_team       : $("#team-section-slider"),            // team slider selector for (team section)
        team_thumbs         : $("#team-thumbnails"),                // team thumbnails selector for (team section)
        selector_testimonial: $("#testimonial-slider"),             // testimonial selector for (testimonial section)
        twitter_carousel    : $(".tweet-carousel"),                 // twitter selector for (tweet section)
        twitter_slider      : $("#tweet-slider"),                   // twitter slider for (tweet section)
        contact_form        : $("#contactForm"),                    // contact form selector

        /*-----------------------------------------------------------------------------------*/
        /* Pre-loader: This is used to show the full page pre-loader.
         * As long as the website does not load completely */
        /*-----------------------------------------------------------------------------------*/
        preloader_show: function (self) {

            // this
            self = this;

            // Check if the pre loader div on html is present
            if (self.pre_loader.length === 1) {

                // Hide the pre loader when page loaded
                self.windows.on("load", function () {
                    // fade out animation
                    self.pre_loader.fadeOut(400);
                });
            }
        },


        /*-----------------------------------------------------------------------------------*/
        /* Header navigation for mobile view (speed change option) */
        /*-----------------------------------------------------------------------------------*/
        header_section: function (self, animate_speed) {

            // Changeable options
            animate_speed = 400;    // sub menu animate speed

            // this
            self = this;

            // Mobile view navigation toggle button
            self.toggle_btn.on("click", function (event) {

                // Stop default behaviour
                event.preventDefault();

                // Check if the toggle button not have active class
                if (!$(this).hasClass(self.class_active)) {

                    // Add class active
                    $(this).addClass(self.class_active);

                    // Show the menu
                    self.navigation.stop(true, true).slideDown(animate_speed);

                } else {

                    // Remove class active
                    $(this).removeClass(self.class_active);

                    // Hide the menu
                    self.navigation.stop(true, true).slideUp(animate_speed);
                }
            });

            // Mobile view sub menu show or hide on click event
            self.navigation.find(self.indicator_mobile).on("click", function (subMenu) {

                // sub menu
                subMenu = $(this).parent("li").children(self.sub_menu);

                // check if the sub menu is hidden
                if (subMenu.is(":hidden")) {

                    // if sub menu is hidden then show the sub menu on click
                    subMenu.stop(true, true).slideDown(animate_speed);
                } else {

                    // if sub menu is visible then hide the sub menu on click
                    subMenu.stop(true, true).slideUp(animate_speed);
                }
            });

        },


        /*-----------------------------------------------------------------------------------*/
        /* Sticky header changeable options
         * Source: https://github.com/garand/sticky */
        /*-----------------------------------------------------------------------------------*/
        sticky_header_menu: function () {

            // Sticky header plugin initialize
            $(this.sticky_header).sticky({
                topSpacing: 0,              // Pixels between the page top and the element's top
                zIndex    : 10000           // controls z-index of the sticked element.
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Internal scroll links changeable option */
        /*-----------------------------------------------------------------------------------*/
        internal_scroll_links: function (self, scroll_speed) {

            // Change the scroll speed. Value is in milliseconds
            scroll_speed = 1000;

            // this
            self = this;

            // click function
            self.navigation.find("a[href^='#']").on("click", function (event, target, $target) {

                // Stop default behaviour
                event.preventDefault();

                // Get the target
                target = this.hash;
                $target = $(target);

                // scroll animate
                $("html, body").stop().animate({
                    "scrollTop": $target.offset().top
                }, scroll_speed);
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Main Slider Section Options
         * Source: http://sequencejs.com/documentation/#options */
        /*-----------------------------------------------------------------------------------*/
        main_slider_section: function () {

            // Launch Sequence on the element, and with the options we specified above
            sequence(this.selector_slider, {
                keyNavigation                 : true,   // Keyboard options enable the user to navigate to steps using specific keyboard buttons.
                animateCanvas                 : false,  // Whether Sequence.js should automatically control the canvas animation when a step is navigated to.
                phaseThreshold                : false,  // Whether there should be a delay between the current step animating out and the next step animating in.
                fadeStepWhenSkipped           : true,   // If a step is skipped before it finishes animating, cause it to fade out over a specific period of time
                reverseWhenNavigatingBackwards: true,   // Whether animations should be reversed when a user navigates backwards by clicking a previous button/swiping/pressing the left key.
                autoPlay                      : false,   // Automatically navigate
                swipeNavigation               : true,   // Whether to allow the user to navigate between steps by swiping left and right on touch enabled devices.
                swipeEvents                   : {       // The public Sequence.js method that should occur when the user swipes in a particular direction.
                    left : function (sequence) {

                        // When the user swipes left, the Sequence.js event self.prev() is initiated.
                        sequence.prev();
                    },
                    right: function (sequence) {

                        // When the user swipes right, the Sequence.js event self.next() is initiated.
                        sequence.next();
                    }
                }
            });


            // Video background for slider
            jQuery(".player").mb_YTPlayer();
        },


        /*-----------------------------------------------------------------------------------*/
        /* Statistic Section Options
         * Source: https://github.com/benignware/jquery-countimator */
        /*-----------------------------------------------------------------------------------*/
        statistic_section: function () {

            // Initialize the plugin
            this.selector_counter.countimator({
                // Plugin options add here
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Tab Section Options
         * Source: http://vdw.github.io/Tabslet/ */
        /*-----------------------------------------------------------------------------------*/
        tab_section: function (self) {

            // this
            self = this;

            // Initialize the plugin
            self.selector_tab.tabslet({
                active   : 1,          // Active the first tab. 1 is tab number.
                animation: true        // Animation used on tabs switch. Options (true or false)
            });

            // Change the Images
            self.tabs_button.on("mouseup", "a", function (attribute, background) {
                // get the data-tab-bg attribute
                attribute = $(this).attr("data-tab-bg");
                // find the attribute class
                background = self.site_tabs.find("." + attribute + "");
                // check if the element not has active class
                if (!background.hasClass(self.class_active)) {
                    // remove the active class
                    self.tabs_bg.removeClass(self.class_active);
                    // add the active class
                    background.addClass(self.class_active);
                }
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Portfolio Section Options
         * Source: http://isotope.metafizzy.co/ (portfolio)
         * Source: http://lab.veno.it/venobox/ (light box) */
        /*-----------------------------------------------------------------------------------*/
        portfolio_section: function (self, $grid) {

            // this
            self = this;

            // Initialize the portfolio filter plugin
            $grid = self.portfolio.isotope({
                // options
                itemSelector: ".portfolio-items",   // Portfolio items container class
                layoutMode  : "masonry"             // Portfolio layout mode
            });

            // Light box plugin initialize
            self.light_box.venobox({
                // Add light box plugin options here
            });

            // Portfolio section tabs items click event
            self.portfolio_tabs.on("click", "li", function (class_attr) {

                // Get the current [data-filter] attribute name
                class_attr = $(this).attr("data-filter");

                // Filter the portfolio items using classes
                $grid.isotope({filter: "." + class_attr});

                // Remove the active class from other items
                $(this).siblings("li").removeClass(self.class_active);

                // Add the active class to current item
                $(this).addClass(self.class_active);
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Team Section Options
         * Source: http://idangero.us/swiper/ */
        /*-----------------------------------------------------------------------------------*/
        team_section: function (self, galleryTop, galleryThumbs) {

            // this
            self = this;

            // Team swiper slider plugin initialize with options
            galleryTop = self.selector_team.swiper({   // This is main selector. Which is used to initialize the plugin with options.
                nextButton  : "#team-button-next",     // String with CSS selector or HTML element of the element that will work like "next" button after click on it
                prevButton  : "#team-button-prev",     // String with CSS selector or HTML element of the element that will work like "prev" button after click on it
                spaceBetween: 200,                     // Distance between slides in px.
                initialSlide: 1,                       // Index number of initial slide.
                speed       : 1000                     // Duration of transition between slides (in ms)
            });

            // Team thumbnails initialize with options
            galleryThumbs = self.team_thumbs.swiper({  // This is main selector. Which is used to initialize the plugin with options.
                spaceBetween  : 0,                 // Distance between slides in px.
                centeredSlides: true,              // If true, then active slide will be centered, not always on the left side.
                slidesPerView : "auto",            // Number of slides per view (slides visible at the same time on slider's container).
                touchRatio    : 0.2,               // Touch ratio
                direction     : "vertical",        // Could be 'horizontal' or 'vertical' (for vertical slider).
                initialSlide  : 1,                 // Index number of initial slide.
                speed         : 1000               // Duration of transition between slides (in ms)
            });

            // Slides and thumbnail synchronize
            galleryTop.params.control = galleryThumbs;
            galleryThumbs.params.control = galleryTop;

            // Navigate to current slide when user click on thumbnail
            self.team_thumbs.on("click", ".swiper-slide", function () {
                // Go to slide
                galleryTop.slideTo($(this).index());
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Testimonial Section Options
         * Source: Source: http://idangero.us/swiper/ */
        /*-----------------------------------------------------------------------------------*/
        testimonial_section: function () {

            /* Initialize the plugin with options */
            this.selector_testimonial.swiper({
                nextButton                  : "#testimonial-button-next",   // String with CSS selector or HTML element of the element that will work like "next" button after click on it
                prevButton                  : "#testimonial-button-prev",   // String with CSS selector or HTML element of the element that will work like "prev" button after click on it
                speed                       : 1000,                         // Duration of transition between slides (in ms)
                spaceBetween                : 150,                          // Distance between slides in px.
                slidesPerView               : 1,                            // Number of slides per view (slides visible at the same time on slider's container).
                pagination                  : "#testimonial-pagination",    // String with CSS selector or HTML element of the container with pagination
                paginationClickable         : true,                         // If true then clicking on pagination button will cause transition to appropriate slide. Only for bullets pagination type
                loop                        : true,                         // Set to true to enable continuous loop mode
                autoplay                    : 3000,                         // delay between transitions (in ms). If this parameter is not specified, auto play will be disabled
                autoplayDisableOnInteraction: false,                        // Set to false and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction

                // Responsive breakpoints
                breakpoints: {
                    // when window width is <= 320px
                    "991": {
                        slidesPerView     : 1,          // Number of slides per view (slides visible at the same time on slider's container).
                        spaceBetweenSlides: 10          // Distance between slides in px.
                    }
                }
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Tweets Section Options
         * Source: https://github.com/sonnyt/Tweetie
         * Go to folder (php > twitter > config.php) open this file
         * and add the twitter api key */
        /*-----------------------------------------------------------------------------------*/
        tweets_section: function (self) {

            // this
            self = this;

            /* PLUGIN INITIALIZE */
            self.twitter_carousel.twittie({
                dateFormat : "%b %d, %Y",               // Date format
                template   : "" +                       // Template HTML structure
                "<p>{{tweet}}</p>" +
                "<div class='date'>{{date}}</div>",
                count      : 3,                         // Number of tweets show
                loadingText: "Loading!",                // Text show before tweets load
                apiPath    : "php/twitter/tweet.php"    // Tweet PHP file path used for user information.
            }, function () {

                /* Plugin initialize (Unique ID selector) */
                self.twitter_slider.swiper({

                    // Changeable options
                    loop                        : true,                  // Set to true to enable continuous loop mode.
                    initialSlide                : 1,                     // Index number of initial slide.
                    pagination                  : "#tweet-pagination",   // String with CSS selector or HTML element of the container with pagination
                    nextButton                  : "#tweet-button-next",  // String with CSS selector or HTML element of the element that will work like "next" button after click on it
                    prevButton                  : "#tweet-button-prev",  // String with CSS selector or HTML element of the element that will work like "prev" button after click on it
                    paginationClickable         : true,                  // If true then clicking on pagination button will cause transition to appropriate slide. Only for bullets pagination type
                    slidesPerView               : 1,                     // Number of slides per view (slides visible at the same time on slider's container).
                    spaceBetween                : 20,                    // Distance between slides in px.
                    speed                       : 1000,                  // Duration of transition between slides (in ms)
                    autoplay                    : 3000,                  // Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled
                    autoplayDisableOnInteraction: false                  // Set to false and autoplay will not be disabled after user interactions (swipes), it will be restarted every time after interaction
                });
            });

        },


        /*-----------------------------------------------------------------------------------*/
        /* Google map for contact form
         * Source: https://developers.google.com/maps/documentation/javascript/ */
        /*-----------------------------------------------------------------------------------*/
        google_map: function (map, marker) {

            // Map options
            map = new google.maps.Map(this.selector_google_map, {
                center      : {lat: 44.540, lng: -78.546}, // Center map
                zoom        : 8,                           // Map zoom level
                mapTypeId   : "roadmap",                   // Map type
                zoomControl : true,                        // Map zoom control
                scaleControl: true,                        // Map scale control
                scrollwheel : false,                       // Map mouse wheel zoom
                styles      : [                            // Map custom style
                    {
                        stylers: [
                            {saturation: -1000}
                        ]
                    }
                ]
            });

            // Add map custom marker
            marker = new google.maps.Marker({
                position: {lat: 44.540, lng: -78.546},  // Center map
                map     : map,                          // Map selector
                icon    : "images/map-marker.png"       // Custom marker image
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        },


        /*-----------------------------------------------------------------------------------*/
        /* Ajax Contact form for sending mails without page reload */
        /*-----------------------------------------------------------------------------------*/
        ajax_form_submit: function (formMessages, formIcon) {

            // Get the messages div.
            formMessages = this.contact_form.find("button[type=submit]");
            // Animate icon
            formIcon = formMessages.find("i");

            // Set up an event listener for the contact form.
            this.contact_form.on("submit", function (event, self) {

                // Stop the browser from submitting the form.
                event.preventDefault();

                // this
                self = $(this);

                // show the progress bar
                formIcon.css("display", "inline-block");

                // Submit the form using AJAX.
                $.ajax({
                    type: "POST",               // POST method
                    url : self.attr("action"),  // font action attribute
                    data: self.serialize()      // Serialize the form data
                })
                // Mail send success function
                    .done(function (response) {
                        // Set the message text.
                        $(formMessages).text(response);
                        // Clear the form.
                        self.find("input, textarea").val("");
                        // hide the progress bar
                        formIcon.css("display", "none");
                    })

                    // Mail fail error function
                    .fail(function (data) {
                        // Set the message text.
                        if (data.responseText !== "") {
                            $(formMessages).html("Error");
                        }
                        // hide the progress bar
                        formIcon.css("display", "none");
                    });
            });
        },


        /*-----------------------------------------------------------------------------------*/
        /* Scroll up button Options
         * Source: http://markgoodyear.com/labs/scrollup/ */
        /*-----------------------------------------------------------------------------------*/
        scroll_up: function () {

            /* Plugin initialize */
            $.scrollUp({
                scrollName    : "ThemeScrollUp",    // Element ID
                scrollDistance: 300,                // Distance from top/bottom before showing element (px)
                scrollFrom    : "top",              // 'top' or 'bottom'
                scrollSpeed   : 2000,               // Speed back to top (ms)
                easingType    : "linear",           // Scroll to top easing (see http://easings.net/)
                animation     : "fade",             // Fade, slide, none
                animationSpeed: 800,                // Animation speed (ms)
                scrollText    : "<span class='icon-slider-arrow-top'>", // Text for element, can contain HTML
                zIndex        : 100000              // Z-Index for the overlay
            });
        }

    };


    /*-----------------------------------------------------------------------------------*/
    /* Call functions */
    /*-----------------------------------------------------------------------------------*/
    TOptions.preloader_show();
    TOptions.header_section();
    TOptions.sticky_header_menu();
    TOptions.internal_scroll_links();
    TOptions.main_slider_section();
    TOptions.statistic_section();
    TOptions.tab_section();
    TOptions.portfolio_section();
    TOptions.team_section();
    TOptions.tweets_section();
    TOptions.google_map();
    TOptions.ajax_form_submit();
    TOptions.scroll_up();

    // Load function on window load
    $(window).on("load", function () {
        TOptions.testimonial_section();
    });
});