<script src="../assets/plugins/select2/js/select2.min.js"></script>
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

        $(function () {
            <?php for ($j=0;$j<$i;$j++):?>
            $("#acervoSelect<?= $j?>").select2().prop("disabled", true);
            $('#tipoSelect<?= $j?>').change(function () {
                if ($(this).val()) {
                    $.getJSON('ajax/acervo.php', {acervo: $(this).val(), ajax: 'true'}, function (j) {
                        //$(this).material_select('destroy');
                        //document.getElementById("alunoSelect").disabled = false;
                        var options = '<option value="" selected disabled>Selecione um Livro</option>';
                        for (var i = 0; i < j.length; i++) {
                            options += '<option value="' + j[i].id + '">' + j[i].titulo + '</option>';
                        }
                        $("#acervoSelect<?= $j?>").prop("disabled", false).html(options).show();//.material_select();
                    });
                } else {
                    $('#acervoSelect<?= $j?>').html('<option value="" selected disabled>Selecione um Livro</option>');
                }
            });
            <?php endfor;?>
        });
    });
</script>