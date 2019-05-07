<script src="../assets/plugins/clockpicker/js/materialize.clockpicker.js"></script>
<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    <?php
    if (isset($retorno)) echo $retorno;
    ?>
    $(document).ready(function() {

        let valida=function(texto){
            $(texto).validate({
                errorPlacement: function (error, element) {
                    element.addClass('invalid');
                    $(element)
                        .closest("form")
                        .find("label[for='"+element.attr("id")+"']")
                        .append(error);
                },
                rules: {
                    nome_horario:{
                        required:true
                    },
                    inicio_horario:{
                        required:true
                    },
                    fim_horario:{
                        required:true
                    }
                },
                messages: {
                    nome_horario:{
                        required: " * Digite o Nome do Horario!"
                    },
                    inicio_horario:{
                        required: " * Selecione o Inicio do Horario!"
                    },
                    fim_horario:{
                        required: " * Selecione o Fim do Horario!"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        };
        valida('#horario');
        <?php
        foreach ($idHora as $id):
        ?>
        valida('#hora<?= $id?>');
        <?php
        endforeach;
        ?>
        $('.timepicker').pickatime({
            autoclose: true,
            twelvehour: false,
            donetext:'Pronto',
            vibrate: true
        });
    })
</script>