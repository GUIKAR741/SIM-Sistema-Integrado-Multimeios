<script src="../assets/plugins/clockpicker/js/materialize.clockpicker.js"></script>
<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    <?php
    if (isset($retorno)) echo $retorno;
    ?>
    $(document).ready(function() {
        $('.timepicker').pickatime({
            autoclose: true,
            twelvehour: false,
            donetext:'Pronto',
            vibrate: true
        });
    });
</script>