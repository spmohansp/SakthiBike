<script src="{{ url('/billing/js/jquery-3.2.1.min.js') }}"></script>

<script src="{{ url('/billing/js/popper.min.js') }}"></script>
<script src="{{ url('/billing/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/billing/js/main.js') }}"></script>
<script src="{{url('/billing/js/ajax.js') }}"></script>

{{--<script src="{{ url('billing/js/menu.js') }} "></script>--}}

<script src="{{ url('billing/js/plugins/pace.min.js') }}"></script>

<script type="text/javascript" src="{{ url('/billing/js/plugins/chart.js') }}"></script>
<script type="text/javascript" src="{{ url('/billing/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/billing/js/plugins/select2.min.js') }}"></script>

<!-- The javascript plugin to display page loading on top-->
<script src="{{ url('billing/js/plugins/pace.min.js') }}"></script>
<!-- Page specific javascripts-->

<script type="text/javascript" src="{{ url('/billing/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/billing/js/plugins/dataTables.bootstrap.min.js') }}"></script>

<!-- DataTable -->
<script type="text/javascript" src="{{ url('/billing/js/plugins/bootstrap-notify.min.js') }}"></script>

<!-- sweetalert -->
<script type="text/javascript" src="{{ url('/billing/js/plugins/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".calculatevalue").on('keyup change', function (){
            var Selling_Price = $("#Selling_Price").val();
            var CGST = $("#CGST").val();
            var SGST = $("#SGST").val();
            var CESS = $("#CESS").val();
            console.log(CGST);
            $('#Selling_Price_With_Tax').val((parseInt($('#Selling_Price').val()) / 100) * parseFloat($('#CGST').val()) + (parseInt($('#Selling_Price').val()) / 100) * parseFloat($('#SGST').val()) + (parseInt($('#Selling_Price').val()) / 100) * parseFloat($('#CESS').val()) + parseInt($("#Selling_Price").val()));
        });
    });
</script>