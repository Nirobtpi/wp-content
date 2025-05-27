(function($){
    wp.customize('banner_heading', function(value){
        value.bind(function(newVal){
            $('h1').html(newVal);
        })
    });
    wp.customize('sub_title', function(value){
        value.bind(function(newVal){
            $('h3').html(newVal);
        });
    });
    wp.customize('banner_date', function(value){
        value.bind(function(newVal){
            $('h4').html(newVal);
        });
    })
})(jQuery)