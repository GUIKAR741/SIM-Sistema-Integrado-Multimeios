<?php
use App\Models\Alunos;
use App\Models\Turma;
$alunos=new Alunos();
$turmaOBJ=new Turma();
$turma=$turmaOBJ->select()->from()->all();
//for ($i=1;$i<=45;$i++):
//    $alunos->numero=$i;
//    $alunos->nome="ALUNO";
//    $alunos->turma=10;
//    $alunos->save();
//endfor;
if (isset($_POST['cad'])):
    //dump($_POST);
    if ($_POST["turma"]!="" && $_POST["ano"]!=""):
        $turmaCad=strip_tags($_POST["turma"]);
        $anoCad=strip_tags($_POST["ano"]);
        $turmaOBJ->turma=$turmaCad;
        $turmaOBJ->ano=$anoCad;
        $turmaOBJ->save();

    endif;
    //header("Location:home.php?acao=aluno");
    echo "<script>document.location = 'home.php?acao=aluno';</script>";
endif;?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li>Alunos</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Alunos</h1>
        </div>
    </div><!--/.row-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cadastrar Turmas</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-inline">
                            <div class="form-group">
                                <label for="turma">Turma</label>
                                <input type="text" name="turma" id="turma" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ano">Ano</label>
                                <input type="text" name="ano" id="ano" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="cad" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal">
                    <?php
                    if (isset($_POST['env'])):
                        $alunoCad=strip_tags($_POST["nome"]);
                        $numCad=strip_tags($_POST["n"]);
                        $turmaCad=strip_tags($_POST["turma"]);
                        $alunos->numero=$numCad;
                        $alunos->nome=$alunoCad;
                        $alunos->turma=$turmaCad;
                        $row=$alunos->save();
                        if ($row > 0):
                            echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Cadastrado com sucesso!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            //header("Refresh:1.5 home.php?acao=acervo");
                            echo "<script> setTimeout('document.location = \'home.php?acao=visualizarT&idT={$turmaCad}\'',2000);</script>";
                        else:
                            echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Erro ao Cadastrar!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            echo "<script> setTimeout('document.location = \'home.php?acao=aluno\'',2000);</script>";
                            //header("Refresh:1.5 home.php?acao=update&id={$id}");
                        endif;
                    endif;
                    ?>
                    <form action="" method="post">
                        <div class="form-group text-right">
                            <div class="col-sm-1" style="margin-top: 7px;">
                                <label for="titulo">Nome:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" id="titulo" name="nome" class="form-control">
                            </div>
                            <div class="col-sm-1" style="margin-top: 7px;">
                                <label for="autor">Nº</label>
                            </div>
                            <div class="col-sm-1">
                                <input type="number" maxlength="2" max="45" min="1" value="1" id="autor" name="n" class="form-control">
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="vol">Vol</label>
                            <input type="text" id="vol" name="vol" class="form-control">
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-1 text-right" style="margin-top: 7px;">
                                <label for="turma">Turma:</label>
                            </div>
                            <div class="col-sm-10">
                                <select name="turma" id="turma" class="form-control">
                                    <option selected disabled>Selecione Uma Turma</option>
                                    <?php
                                    foreach ($turma as $item):
                                        ?>
                                        <option value="<?= $item->id?>"><?= $item->turma?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="col-md-5"></div>
                        <div class="col-md-2"><button type="submit" name="env" class="btn btn-primary">Atualizar</button></div>
                        <div class="col-md-5"></div>
                    </form>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->