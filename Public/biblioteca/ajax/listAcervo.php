<?php
include '../../../Config/config.php';
$tb_acervo=new \App\Models\Tb_acervo();
$acervo=$tb_acervo->select()->from()->where('tipo_acervo','circulo')->all();
//$vetor[] = array_map('utf8_encode', $resultado);
/*while($resultado=$acervo){
    while ($res=$resultado){
    }
}*/
//dump($acervo);

//Passando vetor em forma de json
echo json_encode($acervo);