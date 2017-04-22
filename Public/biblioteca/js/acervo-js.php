<script>
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
        $(function () {
        <?php foreach($id as $value): ?>
            $('#turmaSelect<?= $value?>').change(function () {
                if ($(this).val()) {
                    $.getJSON('ajax/turma.php', {id: $(this).val(), ajax: 'true'}, function (j) {
                        $('#alunoSelect<?= $value?>').material_select('destroy');
                        document.getElementById("alunoSelect<?= $value?>").disabled = false;
                        var options = '<option value="">Selecione um Aluno</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].aluno + '</option>';
                        }
                        $('#alunoSelect<?= $value?>').html(options).material_select();
                    });
                } else {
                    $('#alunoSelect<?= $value?>').material_select('destroy');
                    $('#alunoSelect<?= $value?>').html('<option value="">Selecione um Aluno</option>');
                    $('#alunoSelect<?= $value?>').material_select();
                }
            });
        <?php endforeach; ?>
        });

    });
</script>