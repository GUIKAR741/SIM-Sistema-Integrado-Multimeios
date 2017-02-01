<?php
use App\Models\Turma;
use App\Models\Alunos;
$turma=new Turma();
$alunos=new Alunos();
$sala=$turma->select()->from()->all();
foreach ($sala as $item):
    $QTD[]=$alunos->select("count(id) as id")->from()->where('turma',$item->id)->first();
endforeach;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Turmas</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Turmas</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body table-responsive">
                    <table id="example1" class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>QTD. Alunos</th>
                            <th>Turma</th>
                            <th>Ano</th>
                            <th>Visualizar</th>
                            <th>Atualizar</th>
                            <th>Deletar</th>
                        </tr>
                        <tbody>

                        <?php
                        $turmas=$turma->select()->from()->all();

                        $cont=1;
                        foreach ($turmas as $key=>$valor):
                            ?>
                            <tr>
                                <td><?= $cont++?></td>
                                <td><?= $QTD[$key]->id?></td>
                                <td><?= $valor->turma?></td>
                                <td><?= $valor->ano?></td>
                                <td><a href="home.php?acao=visualizarT&idT=<?= $valor->id?>" class="btn btn-warning" title="Visualizar"><i class="glyphicon glyphicon-eye-open"></i></a></td>
                                <td><a href="home.php?acao=updateT&idT=<?= $valor->id?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="home.php?acao=deleteT&idT=<?= $valor->id?>" onclick="confirm('Deseja realmente apagar este registro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>