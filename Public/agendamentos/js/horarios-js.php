<script src="../assets/plugins/clockpicker/js/materialize.clockpicker.js"></script>
<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('.timepicker').pickatime({
            autoclose: true,
            twelvehour: false,
            donetext:'Pronto',
            vibrate: true
        });
        <?php foreach($id as $value): ?>
        document.querySelector('.excluir-swal-<?= $value?>').onclick = function(){
            swal({
                title: "Você Realmente quer excluir?",
                text: "Não podera recuperar o registro!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim!",
                cancelButtonText: "Não!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    swal({title:"Deletado!", type:"success",showConfirmButton:false});
                    setTimeout(document.location='?p=horarios&excluir=true&idHorario=<?= $value?>',5000);
                } else {
                    swal({title:"Cancelado", type:"error",showConfirmButton:false});
                    setTimeout(document.location='?p=horarios',5000);
                }
            });
        };
        <?php endforeach;?>
    });
</script>