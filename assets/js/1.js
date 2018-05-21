function sortProductWithKey(key_word) {
    var category = jQuery('#category').val();
    var BASE_URL = jQuery('#base_url').val() +'product/category/' ;
    setTimeout(function () {
        if(key_word.value=='default-sort'){
            window.location.replace(BASE_URL+category);
        }
        else{
            window.location.replace(BASE_URL+category+'?sort='+key_word.value);
        }

    },500);
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
            window.location.replace(BASE_URL+'filter/'+category+'/'+price+'/'+color);
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


jQuery(document).ready(function () {

    switch(jQuery('input#sort').val()){
            case 'default-sort':
                htmlSort = "Default Sorting";
                $('select#selection-sort option[value="default-sort"]').attr("selected","selected");
                break;
            case 'price-asc':
            htmlSort = 'Price: low to high';
            $('select#selection-sort option[value="price-asc"]').attr("selected","selected");
            break;

            case 'price-desc':
            htmlSort = 'Price: high to low';
                $('select#selection-sort option[value="price-desc"]').attr("selected","selected");
            break;

        }
    setTimeout(function () {
        if(jQuery('input#sort').val()) {
            valueSort = jQuery('input#sort').val();
            $('#select2-selection-sort-container').html(htmlSort);
        }
    },100);

})
    