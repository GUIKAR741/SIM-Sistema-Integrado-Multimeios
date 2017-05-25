<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    <?php
    if (isset($retorno)) echo $retorno;
    ?>
    $("#equipa").validate({
        errorPlacement: function (error, element) {
            element.addClass('invalid');
            $(element)
                .closest("form")
                .find("label[for='"+element.attr("id")+"']")
                .append(error);
        },
        rules: {
            equipamento:{
                required:true
            }
        },
        messages: {
            equipamento:{
                required: " * Digite o Nome do Equipamento!"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
</script>