<?php
use Carbon\Carbon;
$tb_locacao=new \App\Models\Tb_locacao();
$data=date('Y-m-d');
if (isset($_GET['mes'])):
    $mes=$_GET['mes'];
    $dataMes=Carbon::parse(date('Y').$mes.'01');
    $hoje=$tb_locacao->between('data_locacao',$dataMes->toDateString(),$dataMes->endOfMonth()->toDateString())->all();
elseif (isset($_GET['dia'])):
    $dia=$_GET['dia'];
    $hoje=$tb_locacao->where('data_locacao',$dia)->all();
else:
    $hoje=$tb_locacao->where('data_locacao',$data)->all();
endif;
?>
<main class="mn-inner p-h-xxs pad-title" xmlns:swal>
    <div class="row">
        <div class="col s12">
            <div class="page-title">Historico Geral de Locações</div>
            <div class="col s12 m12 l12 no-p-h">
                <div class="card">
                    <div class="card-content">
                        <div class="row no-m">
                            <form method="post">
                                <div class="input-field col s12 m2">
                                    <select name="meses" id="meses" onchange="window.location='?p=diario&mes='+ $('#meses').val()">
                                        <option selected disabled>Mês</option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                    <label for="meses">Meses</label>
                                </div>
                                <div class="input-field col s9 m4 offset-m6">
                                    <label for="data" class="active">Data</label>
                                    <input id="data" name="dia" type="date" data-value="<?php
                                    if (isset($_GET['dia'])):
                                        echo $_GET['dia'];
                                    else:
                                        echo date('Y-m-d');
                                    endif;
                                    ?>" class="datepicker">
                                </div>
                            </form>
                        </div>
                        <table class="responsive-table striped" style="">
                            <thead>
                            <tr>
                                <th class="center">Aluno</th>
                                <th class="center">Titulo</th>
                                <th class="center">Data Locação</th>
                                <th class="center">Data Devolução</th>
                                <th class="center">Historico</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($hoje)>0):
                            foreach ($hoje as $value):
                                $aluno=$tb_locacao->from('sisco.tb_aluno')->where('idtb_aluno',$value->tb_aluno_idtb_aluno)->first();
                                $livro=$tb_locacao->from('tb_acervo')->where('idtb_acervo',$value->tb_acervo_idtb_acervo)->first();
                                ?>
                                <tr>
                                    <td class="center"><?= $aluno->nome_aluno?></td>
                                    <td class="center"><?= $livro->titulo?></td>
                                    <td class="center"><?= date('d/m/Y',strtotime($value->data_locacao))?></td>
                                    <td class="center"><?= date('d/m/Y',strtotime($value->data_devolucao))?></td>
                                    <td class="center"><a href="?p=historico&idAluno=<?= $aluno->idtb_aluno?>" class="btn-floating btn waves-effect waves-light cyan"><i class="material-icons">assignment</i></a></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        <?php
                        else:
                            ?>
                            </tbody>
                            </table>
                            <div class="row">
                            <div class="center">
                                <i class="no-p no-m material-icons" style="font-size:125px !important;color: #ffe64c">warning</i>
                                <h4><b>Não há Registros para Mostar</b></h4>
                            </div>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>