<script src="../assets/plugins/clockpicker/js/materialize.clockpicker.js"></script>
<script>
    $(document).ready(function() {
        $('.timepicker').pickatime({
            default: 'now',
            autoclose: true,
            twelvehour: true,
            donetext:'Pronto',
            vibrate: true
        });
    });

</script>