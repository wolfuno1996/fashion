function Product() {

}

function filterProduct(){

        var color = [];
        var price = [];
        var category = jQuery('#category').val();
        var BASE_URL = jQuery('#base_url').val() +'product/' ;

        $('ul.flex-w').find("input:checkbox:checked").each(function () {
            color.push($(this).attr('name'));
        });

        var price_lower = $('#value-lower').html();
        var price_upper = $('#value-upper').html();

        price.push(price_lower);
        price.push(price_upper);

        color = JSON.stringify(color);
        price = JSON.stringify(price);
        console.log(color);
        console.log(price);


        if(color.length ==0){
            color = null;
        }
        else{
            color = btoa(color);
        }

        price = btoa(price);

        setTimeout(function () {
            window.location.replace(BASE_URL+category+'/'+price+'/'+color);
        },1000);
        
}

function searchProduct() {
    var key_word = jQuery('#search-product').val();
    var category = jQuery('#category').val();
    var BASE_URL = jQuery('#base_url').val() +'product/category/' ;

    setTimeout(function () {
        window.location.replace(BASE_URL+category+'/search-'+key_word);
    },1000);
}
    
    