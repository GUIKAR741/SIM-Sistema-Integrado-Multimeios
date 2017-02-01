<?php
if(!isset($_GET['idT']) || empty($_GET['idT'])):
    //header('Location: home.php?acao=acervo');
    echo "<script> location='home.php?acao=turma'</script>";
    exit;
endif;
$id=$_GET['idT'];
use App\Models\Turma;
use App\Models\Alunos;
$turma=new Turma();
$aluno=new Alunos();

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><a href="home.php?acao=turma">Turmas</a></li>
            <li>Alunos</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alunos</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body table-responsive">
                    <table id="example1" class="table table-striped table-bordered" cellpadding="0" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nome</th>
                            <th>Turma</th>
                            <th>Ano</th>
                            <th>Atualizar</th>
                            <th>Deletar</th>
                        </tr>
                        <tbody>

                        <?php

                        $alunos=$aluno->select()->from()->where('turma',$id)->all();
                        $turmas=$turma->select()->from()->where('id',$id)->first();

                        foreach ($alunos as $valor):
                            ?>
                            <tr>
                                <td><?= $valor->numero?></td>
                                <td><?= $valor->nome?></td>
                                <td><?= $turmas->turma?></td>
                                <td><?= $turmas->ano?></td>
                                <td><a href="home.php?acao=updateTA&idT=<?= $id?>&idA=<?= $valor->id?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                <td><a href="home.php?acao=deleteTA&idT=<?= $id?>&idA=<?= $valor->id?>" onclick="confirm('Deseja realmente apagar este registro?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>