function Product() {

}

function filterProduct(){

        var color = [];
        var price = [];
        var category = jQuery('#category').val();
        var BASE_URL = jQuery('#base_url').val() +'product/';

        $('ul.flex-w').find("input:checkbox:checked").each(function () {
            color.push($(this).attr('name'));
        });

        var price_lower = $('#value-lower').html();
        var price_upper = $('#value-upper').html();

        price.push(price_lower);
        price.push(price_upper);

        color = JSON.stringify(color);
        price = JSON.stringify(price);


       /* $.ajax({
            url : BASE_URL+'category/filter',
            type: 'post',
            data: {'color' : color },
            success: function (response){
                console.log('success');
            },
            error: function (xhr, text, message) {
                console.log(message);
            }
        });*/
        color = btoa(color);
        price = btoa(price);
        console.log(color);
        setTimeout(function () {
            window.location.replace(BASE_URL+category+'/'+price+'/'+color);
        },1000);


    }