function Product() {

}

function filterProduct(){
        var color = [];
        var price = array();

        $('ul.flex-w').find("input:checkbox:checked").each(function () {
            color.push($(this).attr('name'));
        });

        var price_lower = $('#value-lower').html();
        var price_upper = $('#value-upper').html();

        price.push(price_lower);
        price.push(price_upper);


    }