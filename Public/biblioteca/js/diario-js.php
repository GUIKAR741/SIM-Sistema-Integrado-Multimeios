<!--<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>-->
<script src="../assets/plugins/fullcalendar/moment.min.js"></script>
<script>
    $(document).ready(function() {
        datepicker=$('.datepicker');
        datepicker.pickadate({
            selectMonths: false, // Creates a dropdown to control month
            selectYears: false, // Creates a dropdown of 15 years to control year
            monthsFull: [ 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro' ],
            monthsShort: [ 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez' ],
            weekdaysFull: [ 'domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado' ],
            weekdaysShort: [ 'dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab' ],
            today: 'hoje',
            clear: 'limpar',
            close: 'fechar',
            format: 'dddd, d !de mmmm !de yyyy',
            formatSubmit: 'yyyy-mm-dd',
            closeOnSelect: true,
            onSet: function() {
                window.location='?p=diario&dia='+ $('input[name=dia_submit]').val();
            }
        });
    });
</script>