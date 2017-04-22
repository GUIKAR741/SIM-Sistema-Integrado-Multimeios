<script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
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
                    setTimeout(document.location='?p=equipamentos&excluir=true&idEquipamento=<?= $value?>',5000);
                } else {
                    swal({title:"Cancelado", type:"error",showConfirmButton:false});
                    setTimeout(document.location='?p=equipamentos',5000);
                }
            });
        };
        <?php endforeach;?>
    });
</script>