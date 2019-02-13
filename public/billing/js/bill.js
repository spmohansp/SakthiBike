
    $(document).ready(function () {
        $("#addbillproduct").click(function () {
            var product_id = $("#product_id").val();
            var qty = $("#qty").val();
            $.ajax({
                type: 'get',
                url: '/admin/product/getProduct',
                data: {product_id: product_id},
                success: function (data) {

                    console.log(data);
                }
            });
        });
    });
