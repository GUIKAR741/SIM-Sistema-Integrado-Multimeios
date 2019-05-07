<div class="left-sidebar-hover"></div>
</div>

<!-- Javascripts -->
<script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="../assets/plugins/materialize/js/materialize.min.js"></script>
<script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="../assets/js/alpha.js"></script>
<script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script>
    $("#edit").validate({
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
                    return $("#senha-troca").val()==="yes";
                },
                minlength:8
            },
            re_senha:{
                required:function () {
                    return $("#senha-troca").val()==="yes";
                },
                minlength:8,
                equalTo:"#senha"
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
    });</script>