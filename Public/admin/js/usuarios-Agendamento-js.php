<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script><?php if (isset($retorno)) echo $retorno;?>
    $().ready(function() {
        $("#cadastro-form").validate({
            errorPlacement: function (error, element) {
                element.addClass('invalid');
                $(element)
                    .closest("form")
                    .find("label[for='"+element.attr("id")+"']")
                    .append(error);
            },
            rules: {
                nome_usuario:{
                    required:true
                },
                email:{
                    required:true,
                    email:true
                },
                senha:{
                    required:true,
                    minlength:8
                },
                re_senha:{
                    required:true,
                    minlength:8,
                    equalTo:"#senha"
                }
                /*confirm: {
                 equalTo: "#password"
                 }*/
            },
            messages: {
                nome_usuario:{
                    required: " * Digite o seu Nome!"
                },
                email:{
                    required: " * Digite o seu Email!",
                    email: " * Digite um E-mail válido!"
                },
                senha:{
                    required: " * Digite sua Senha!",
                    minlength:" * Deve Ter no Minimo 8 Caracteres!"
                },
                re_senha:{
                    required: " * Confirme sua Senha!",
                    minlength:" * Deve Ter no Minimo 8 Caracteres!",
                    equalTo:" * Senha não Coincidem!"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }});

        var valida=function (texto){
            $("#edit"+texto).validate({
                errorPlacement: function (error, element) {
//                element.after(error);
                    element.addClass('invalid');
                    $(element)
                        .closest("form")
                        .find("label[for='"+element.attr("id")+"']")
                        .append(error);
                },
                rules: {
                    nome_usuario:{
                        required:true
                    },
                    email:{
                        required:true,
                        email:true
                    },
                    senha:{
                        required:function () {
                            return $("#senha-troca"+texto).val()==="yes";
                        },
                        minlength:8
                    },
                    re_senha:{
                        required:function () {
                            return $("#senha-troca"+texto).val()==="yes";
                        },
                        minlength:8,
                        equalTo:"#senha"+texto
                    }
                },
                messages: {
                    nome_usuario:{
                        required: " * Digite o seu Nome!"
                    },
                    email:{
                        required: " * Digite o seu Email!",
                        email: " * Digite um E-mail válido!"
                    },
                    senha:{
                        required: " * Digite sua Senha!",
                        minlength:" * Deve Ter no Minimo 8 Caracteres!"
                    },
                    re_senha:{
                        required: " * Confirme sua Senha!",
                        minlength:" * Deve Ter no Minimo 8 Caracteres!",
                        equalTo:" * Senha não Coincidem!"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        };
        <?php foreach ($ids as $value):?>
        valida(<?= $value?>);
        <?php endforeach;?>
    });
</script>