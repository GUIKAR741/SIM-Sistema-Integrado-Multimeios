<script src="../assets/plugins/fullcalendar/moment.min.js"></script>
<script src="../assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<!--<script src="../assets/js/pages/calendar.js"></script>-->
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
            },buttonText: {
                today:"Hoje",
                month: "Mês",
                week: "Semana",
                day: "Dia",
                list: "Compromissos"
            },
            businessHours: {
                // days of week. an array of zero-based day of week integers (0=Sunday)
                dow: [ 1, 2, 3, 4 ,5] ,// Monday - Thursday
                start: '07:00', // a start time (10am in this example)
                end: '17:00' // an end time (6pm in this example)
            },
            allDaySlot:false,
            displayEventEnd:true,
            allDayText: "dia inteiro",
            monthNames:['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho',
                'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            dayNames:['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira',
                'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
            dayNamesShort:['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            monthNamesShort:['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            hiddenDays:[0,6],
            //defaultDate: '2015-12-12',
            defaultView:'agendaWeek',
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            eventBackgroundColor:'#f00',
            events:  './ajax/calendario.php'
        });
        $('.datepicker').pickadate({
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
            closeOnSelect: true
        });
    });
</script>