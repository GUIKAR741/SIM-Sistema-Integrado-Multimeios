<?php
include '../../../Config/config.php';
$tb_acervo=new \App\Models\Tb_acervo;
$tipo=$tb_acervo->select('DISTINCT tipo_acervo')->all();
foreach ($tipo as $tipo_acervo):
    if (isset($_GET['p']) && $_GET['p']==$tipo_acervo->tipo_acervo):
        $p=$_GET['p'];
        ?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="utf-8">
        <body>
        <?php
        $tipo=[
            "livro"=>"Acervo Geral",
            "circulo"=>"Circulo de Leitura",
            "cd-dvd"=>"CDs e DVDs",
            "tves"=>"CDs e DVDs Tv Escola",
            "materiais"=>"Materiais",
            "jmf"=>"Arquivos JMF"
        ];
        // Definimos o nome do arquivo que será exportado
        $arquivo = $tipo[$p].'.xls';

        // Criamos uma tabela HTML com o formato da planilha
        //$html = '';
        $html = '<table border="1">';
        //$html .= '<tr>';
        //$html .= '<td colspan="5">Planilha Mensagem de Contatos</tr>';
        //$html .= '</tr>';

        $html .= '<tr>';
        $html .= '<th >N.º do Reg.</th>';
        $html .= '<th >Titulo</th>';
        $html .= '<th >Autor</th>';
        $html .= '<th >Local</th>';
        $html .= '<th >Editora</th>';
        $html .= '<th >Observações</th>';
        $html .= '<th >Data</th>';
        $html .= '<th >Volume</th>';
        $html .= '<th >Exemplares</th>';
        $html .= '<th >Ano de Publicação</th>';
        $html .= '<th >Forma de Aquisição</th>';
        $html .= '<th >Estante</th>';
        $html .= '</tr>';

        //Selecionar todos os itens da tabela

        $acervo= $tb_acervo->where('tipo_acervo',$p)->all();
        //$resultado_msg_contatos = mysqli_query($conn , $result_msg_contatos);
        $i=1;
        foreach($acervo as $value):
            for ($j=1;$j<=intval($value->exemplares);$j++):
//while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
                $html .= '<tr>';
                $html .= '<td style="text-align: center">'.$i++.'</td>';
                $html .= '<td style="text-align: center">'.$value->titulo.'</td>';
                $html .= '<td style="text-align: center">'.$value->autor.'</td>';
                $html .= '<td style="text-align: center">'.$value->local.'</td>';
                $html .= '<td style="text-align: center">'.$value->editora.'</td>';
                $html .= '<td style="text-align: center">'.$value->observacao.'</td>';
                $html .= '<td style="text-align: center">'.date('d/m/Y',strtotime($value->data)).'</td>';
                $html .= '<td style="text-align: center">'.$value->volume.'</td>';
                $html .= '<td style="text-align: center">'.$j.'</td>';
                $html .= '<td style="text-align: center">'.$value->ano_publicacao.'</td>';
                $html .= '<td style="text-align: center">'.$value->forma_de_aquisicao.'</td>';
                $html .= '<td style="text-align: center">'.$value->estante.'</td>';
                $html .= '</tr>';
            endfor;
//    ;
//}
        endforeach;
        // Configurações header para forçar o download
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("DH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
        header ("Content-Description: PHP Generated Data" );
        // Envia o conteúdo do arquivo
        echo $html;
        exit; ?>
        </body>
        </html>
        <?php
    else:
        echo '<script>window.location=indexindex.htmlript>';
    endif;
endforeach;?>