<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('#enviar-ajax').click(function () {
            let horario=document.getElementsByName('horario[]');
            let recurso=document.getElementsByName('recurso[]');
            let turmas=document.getElementsByName('turmas[]');
            let idAgenda=$("#idAgenda").val();
            let data=$('input[name=data_submit]').val();
            let hora=[], recur=[], turma = [], professor, valida=[], cont_hora=0, cont_recur=0, cont_turm=0, cont_valida=0;
            for (i=0;i<horario.length;i++) {
                if (horario[i].checked === true) {
                    hora[cont_hora++] = horario[i].value;
                }
            }
            for (i=0;i<recurso.length;i++) {
                if (recurso[i].checked === true) {
                    recur[cont_recur++] = recurso[i].value;
                }
            }
            for (i=1;i<turmas[0].length;i++) {
                if (turmas[0][i].selected === true) {
                    turma[cont_turm++] = turmas[0][i].value;
                }
            }
            if (data!==''){
                $('label[for=data]').replaceWith('<label for="data" class="active">Data: </label>');
                valida[0]=true;
            }else{
                $('label[for=data]').replaceWith('<label for="data" class="active">Data: <label id="data-error" class="error" for="data"> * Selecione uma Data!</label></label>');
                valida[0]=false;
            }
            if (cont_hora>0){
                $('label[for=hora]').replaceWith('<label for="hora" class="active">Horarios: </label>');
                valida[1]=true;
            }else{
                $('label[for=hora]').replaceWith('<label for="hora" class="active">Horarios: <label id="hora-error" class="red-text" for="hora"> * Selecione um Horario!</label></label>');
                valida[1]=false;
            }
            if (cont_recur>0){
                $('label[for=recur]').replaceWith('<label for="recur" class="active">Recurso: </label>');
                valida[2]=true;
            }else{
                $('label[for=recur]').replaceWith('<label for="recur" class="active">Recurso: <label id="recur-error" class="red-text" for="recur"> * Selecione um Recurso!</label></label>');
                valida[2]=false;
            }
            if (cont_turm>0){
                $('label[for=tur]').replaceWith('<label for="tur" class="active">Turmas: </label>');
                valida[3]=true;
            }else{
                $('label[for=tur]').replaceWith('<label for="tur" class="active">Turmas: <label id="tur-error" class="error" for="tur"> * Selecione uma turma!</label></label>');
                valida[3]=false;
            }
            for (i=0;i<valida.length;i++){if (valida[i]===true){cont_valida++;}}
//            if (cont_valida===4){alert('abc')}
            if (cont_valida===4){envia(idAgenda,data,hora,recur,turma);}
        });
        let envia=function (id,data,horario,recurso,turmas){$.ajax({
            url:"ajax/atualiza.php",
            type: "POST",
            async: true,
            dataType: "JSON",
            data:{action:"true",id:id,data_submit:data,horario:horario,recurso:recurso,turmas:turmas},
            success:function(data) {
                if (data.log === 'yes'){
                    swal({title:"Agendamento Cadastrado!", text:"", type:"success"},function () {
                        document.location='?p=home'
                    });
                }else if(data.log==='retirado'){
                    let aulaCad='',aulaErro='',recurso='';
                    for(let i=0;i<data.aulaCad.length;i++){
                        aulaCad+='<p>'+data.aulaCad[i]+'</p>';
                    }
                    for(let i=0;i<data.aulaErro.length;i++){
                        aulaErro+='<p>'+data.aulaErro[i]+'</p>';
                    }
                    for(let i=0;i<data.recurso.length;i++){
                        recurso+='<p>'+data.recurso[i]+'</p>';
                    }
                    texto="<div class='row'>" +
//                        "<div class='col s12'></div>" +
                        "<div class='col s4'>" +
                        "<p><b>Equipamentos</b></p>" +
                        recurso+
                        "</div>" +
                        "<div class='col s4'>" +
                        "<p class='green-text'><b>Sucesso</b></p>" +
                        aulaCad+
                        "</div>" +
                        "<div class='col s4'>" +
                        "<p class='red-text'><b>Erro</b></p>" +
                        aulaErro+
                        "</div>" +
                        "</div>";
                    swal({title:"",
                        text:texto, type:"success",html:true,closeOnConfirm:false},function () {
                        document.location='?p=home'
                    });
//                    console.log(aulaCad);
//                    console.log(aulaErro);
//                    console.log(recurso);
                }else if(data.log==='error') {
                    let aula = '', recurso = '';
                    for (let i = 0; i < data.aula.length; i++) {
                        aula += '<p>' + data.aula[i] + '</p>';
                    }
                    for (let i = 0; i < data.recurso.length; i++) {
                        recurso += '<p>' + data.recurso[i] + '</p>';
                    }
                    texto = "<div class='row'>" +
                        "<div class='col s6'>" +
                        "<p><b>Equipamentos</b></p>" +
                        recurso +
                        "</div>" +
                        "<div class='col s6'>" +
                        "<p><b>Horarios</b></p>" +
                        aula +
                        "</div>" +
                        "</div>";
                    swal({
                        title: "Equipamentos já agendados!",
                        text: texto,
                        html: true,
                        type: "error",
                        closeOnConfirm: true
                    }, function () {
                        document.location = '?p=home'
                    });
                }
//                console.log(data);
            },
            error: function(data){
                if (data.error === 'error') {
                    swal("Ocorreu um erro ao Agendar Agendamento!", "", "error");
                }
//                console.log(data);
                document.write(data.responseText);
            }
        })
        };
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