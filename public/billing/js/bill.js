$(document).ready(function () {
    $("#product_id").change(function () {
        var product_id = $("#product_id option:selected").val();
            $.ajax({
                type: "get",
                url: '/admin/get_product_data',
                data: { product_id: product_id },
                success: function (data) {
                    console.log(data);
                }
            });
    });
});