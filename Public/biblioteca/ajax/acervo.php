<?php
include '../../../Config/config.php';
if (isset($_REQUEST['acervo'])):
    $id= $_REQUEST['acervo'];
    $tb_acervo=new \App\Models\Tb_acervo();
    $acervo=$tb_acervo->select()->from()->where('tipo_acervo',$id)->all();
    foreach ($acervo as $value) {
        $acervos[] = array(
            'id'	=> $value->idtb_acervo,
            'titulo' => $value->titulo,
        );
    }
    echo(json_encode($acervos));
endif;