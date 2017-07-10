<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    <?php
    if (isset($retorno)) echo $retorno;
    ?>
    $(document).ready(function() {
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
        let select=function (texto) {
            $(function () {
                $('#turmaSelect'+texto).change(function () {
                    if ($(this).val()) {
                        $.getJSON('ajax/turma.php', {id: $(this).val(), ajax: 'true'}, function (j) {
                            $('#alunoSelect'+texto).material_select('destroy');
                            document.getElementById("alunoSelect"+texto).disabled = false;
                            document.getElementById("alunoSelect"+texto).required = true;
                            var options = '<option value="0" selected disabled>Selecione um Aluno</option>';
                            for (var i = 0; i < j.length; i++) {
                                options += '<option value="' + j[i].id + '">' + j[i].aluno + '</option>';
                            }
                            $('#alunoSelect'+texto).html(options).material_select();
                        });
                    } else {
                        $('#alunoSelect'+texto).material_select('destroy');
                        $('#alunoSelect'+texto).html('<option value="0">Selecione um Aluno</option>');
                        $('#alunoSelect'+texto).material_select();
                    }
                });
            });
        };
        let valida=function (texto) {
            $(texto).validate({
                errorPlacement: function (error, element) {
                    element.addClass('invalid');
                    $(element)
                        .closest("form")
                        .find("label[for='"+element.attr("id")+"']")
                        .append(error);
                },
                rules: {
                    titulo:{
                        required:true
                    },
                    autor:{
                        required:true
                    },
                    data:{
                        required:false,
                        date:false,
                        dateISO:false
                    },
                    editora:{
                        required:true
                    },
                    formadeaq:{
                        required:true
                    }
                },
                messages: {
                    titulo:{
                        required: " * Digite o Titulo do Livro!"
                    },
                    autor:{
                        required: " * Digite o Nome do Autor!"
                    },
                    editora:{
                        required: " * Digite o Nome da Editora!"
                    },
                    formadeaq:{
                        required: " * Digite a forma de aquisição!"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }});
        };
        let validaManual=function (id){
            $('#valida-but-'+id).click(function () {
                if ($('#turmaSelect'+id).val() === null) {
                    $('label[for=turmaSelect'+id+']').replaceWith('<label for="turmaSelect'+id+'" class="active">Turmas: <label id="titulo-error" class="error" for="titulo"> * Selecione a Turma!</label></label>');
                } else {
                    $('label[for=turmaSelect'+id+']').replaceWith('<label for="turmaSelect'+id+'" class="active">Turmas:</label>');
                    if ($('#alunoSelect'+id).val() === null){
                        $('label[for=alunoSelect'+id+']').replaceWith('<label for="alunoSelect'+id+'" class="active">Alunos: <label id="titulo-error" class="error" for="titulo"> * Selecione o Aluno!</label></label>');
                    }else {
                        $('label[for=alunoSelect'+id+']').replaceWith('<label for="alunoSelect'+id+'" class="active">Alunos:</label>');
                        document.getElementById('form-2-'+id).submit();
                    }
                }
            });
        };
        <?php if(isset($id)):foreach($id as $value): ?>
        select("<?= $value?>");
        valida("<?= "#form-1-$value"?>");
        validaManual("<?= "$value"?>");
        <?php endforeach;endif?>
        valida("#form-0");
    });
</script>