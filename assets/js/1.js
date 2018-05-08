function Product() {

}

function filterProduct(){
        var color = [];
        var price = [];

        $('ul.flex-w').find("input:checkbox:checked").each(function () {
            color.push($(this).attr('name'));
        });

        var price_lower = $('#value-lower').html();
        var price_upper = $('#value-upper').html();

        price.push(price_lower);
        price.push(price_upper);

        var BASE_URL = "<?php echo base_url()?>";
        $.ajax({
            url : BASE_URL + 'auth/delete_user',
            type: 'post',
            data: {'rec_id' : recId },
            success: function (response){
                try{
                    if(response == 'true'){
                        parent.slideUp('slow',function(){$(this).remove();});
                    }
                }catch(e) {
                    alert('Exception while request..');
                }
            },
            error: function (xhr, text, message) {
                console.log(message);
            }
        });
    }