<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="../assets/plugins/fullcalendar/moment.min.js"></script>
<script src="../assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>
    <?php
    if (isset($retorno)) echo $retorno;
    ?>
    $(document).ready(function() {
        $('#abc').click(function () {
            let horario=document.getElementsByName('horario[]');
            let recurso=document.getElementsByName('recurso[]');
            let turmas=document.getElementsByName('turmas[]');
            let prof=document.getElementsByName('professor');
            let data=$('input[name=data_submit]').val();
            let hora=[];
            let recur=[];
            let turma = [], professor;
//            let professor=[];
            j=0;
            for (i=0;i<horario.length;i++) {
                if (horario[i].checked === true) {
                    hora[j++] = horario[i].value;
                }
            }
            j=0;
            for (i=0;i<recurso.length;i++) {
                if (recurso[i].checked === true) {
                    recur[j++] = recurso[i].value;
                }
            }
            j=0;
            for (i=1;i<turmas[0].length;i++) {
                if (turmas[0][i].selected === true) {
                    turma[j++] = turmas[0][i].value;
                }
            }
            j=0;
            for (i=1;i<prof[0].length;i++) {
                if (prof[0][i].selected === true) {
                    professor = prof[0][i].value;
                }
            }
//            console.log(hora);
//            console.log(recur);
//            console.log(turma);
//            console.log(professor);
//            console.log(data);
//            console.log(data+'\n'+hora+'\n'+recur+'\n'+turma+'\n'+professor);
            envia(data,hora,recur,turma,professor);
        });
        let envia=function (data,horario,recurso,turmas,professor){$.ajax({
            url:"ajax/cadastro.php",
            type: "POST",
            async: true,
            dataType: "JSON",
            data:{action:"true",data_submit:data,horario:horario,recurso:recurso,turmas:turmas,professor:professor},
            success:function(data) {
                if (data.yes === 'yes'){
                    swal("Tabela Limpa!", "Todos os Dados Foram Excluidos", "success");
                }
                console.log(data);
            },
            error: function(data){
                if (data.error === 'error') {
                    swal("Ocorreu um erro ao execução a Limpeza!", "", "error");
                }
                console.log(data);
            }
        })
        };
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
        $('#data').pickadate({
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