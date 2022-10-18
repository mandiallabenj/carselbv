/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import './styles/owl.theme.default.css';
import './styles/owl.carousel.css';

// start the Stimulus application
import './bootstrap';

// bootstrap 5.2.2
import 'bootstrap';

import './owl.carousel';


import $ from 'jquery';
window.$ = $;

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay: true,
    autoplaySpeed: 5000,
    autoplayTimeout: 5000,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
});
