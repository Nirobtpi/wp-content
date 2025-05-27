(function($){
    wp.customize('banner_heading', function(value){
        value.bind(function(newVal){
            $('.hero-banner__content h1').html(newVal);
        })
    });
    wp.customize('sub_title', function(value){
        value.bind(function(newVal){
            $('.hero-banner__content h3').html(newVal);
        });
    });
    wp.customize('banner_date', function(value){
        value.bind(function(newVal){
            $('.hero-banner__content h4').html(newVal);
        });
    })
    wp.customize('banner_color', function(value){
        value.bind(function(newVal){
            $('.hero-banner__content h1').css('color',newVal);
        });
    })
    wp.customize('banner_bg', function(value){
        value.bind(function(newVal){
            $('.hero-banner').css('background','url(' + newVal + ')')
        })
    })
})(jQuery)