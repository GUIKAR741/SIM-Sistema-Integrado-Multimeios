<?php
$tb_acervo=new \App\Models\Tb_acervo();

?>
<main class="mn-inner p-h-xs pad-title">
    <div class="row">
<!--        <div class="col s12 m12 l6">-->
            <!--<div class="col s12 m12 l12 no-p-h">
                <div class="card">
                    <div class="card-content">
                        <div class="row no-m">

                        </div>
                        <table class="responsive-table striped bordered">
                            <thead>
                            <tr>
                                <th class="center">Acervo</th>
                                <th class="center">QTD de Livros/Materiais</th>
                                <th class="center">QTD de Exemplares</th>

                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="center"></td>
                                    <td class="center"></td>
                                    <td class="center"></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="col s12 m12 l12">
            <div class="col s12">
                <div class="col s11">
                    <div class="page-title">Manutenção Biblioteca</div>
                </div>
                <div class="col s1">
                    <a class="waves-effect btn-floating left-align"
                       onclick='swal({
                              title: "Deseja Limpar a Tabela do Biblioteca?",
                              text: "Não sera possivel Recuperar Dados",
                              html:true,
                              type: "input",
                              inputType:"password",
                              showCancelButton: true,
                              closeOnConfirm: false,
                              animation: "slide-from-top",
                              inputPlaceholder: "Digite sua senha"
                            },
                            function(inputValue){
                              if (inputValue === false) return false;

                              if (inputValue === "") {
                                swal.showInputError("Necessario Digitar a Senha!");
                                return false
                              }
                              $.ajax({
                                url:"ajax/limpar-biblioteca.php",
                                type: "POST",
                                 async: true,
                                dataType: "JSON",
                                data:{sim:"true",senha:inputValue},
                               success:function(data) {
                                  swal("Tabela Limpa!", "Todos os Dados Foram Excluidos", "success");
                                },
                                error: function(data){
                                    swal("Ocorreu um erro ao execução a Limpeza!","","error");
                                }
                              });
                            });'
                    ><i class="material-icons">restore</i></a>
                </div>
            </div>
            <div class="col s12 m12 l12 no-p-h">
                <div class="card">
                    <div class="card-content">
                        <table class="responsive-table striped bordered">
                            <thead>
                            <tr>
                                <th class="center">Acervo</th>
                                <th class="center">QTD de Livros/Materiais</th>
                                <th class="center">QTD de Exemplares</th>
                                <th class="center">Gerar Excel</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $tipo=$tb_acervo->select('DISTINCT tipo_acervo')->all();
                            $tb_acervo->exemplares=1;
                            $tb_acervo->update('exemplares','NULL');
                            $tipo=[
                                "livro"=>"Acervo Geral",
                                "circulo"=>"Circulo de Leitura",
                                "cd-dvd"=>"CDs e DVDs",
                                "tves"=>"CDs e DVDs Tv Escola",
                                "materiais"=>"Materiais",
                                "jmf"=>"Arquivos JMF"
                            ];
                            foreach ($tipo as $key=>$value):
                                $count=$tb_acervo->select('count(idtb_acervo) as id')->where('tipo_acervo',$key)->first();
                                $qtd=$tb_acervo->select('exemplares')->where('tipo_acervo',$key)->all();
                                $exemplar=0;
                                foreach ($qtd as $exem):
                                    $exemplar+=intval($exem->exemplares);
                                endforeach;
                                ?>
                                <tr>
                                    <td class="center"><?= $value?></td>
                                    <td class="center"><?= $count->id?></td>
                                    <td class="center"><?= $exemplar?></td>
                                    <td class="center"><a class="btn-floating btn waves-effect waves-light green" href="pages/excel.php?p=<?= $key?>"><i class="material-icons">attach_file</i></a></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<!--        </div>-->
    </div>
</main>