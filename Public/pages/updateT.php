<?php
if(!isset($_GET['idT']) || empty($_GET['idT'])):
    //header('Location: home.php?acao=acervo');
    echo "<script> location='home.php?acao=turma'</script>";
    exit;
endif;
$id=$_GET['idT'];
use App\Models\Turma;
$turma=new Turma();
$turmas=$turma->select()->from()->where('id',$id)->first();
$tur=$turmas->turma;
$ano=$turmas->ano;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Atualizar</li>
            <li>Turma</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Atualizar Turma</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php

                    if (isset($_POST['cad'])):
                        $tur=strip_tags($_POST['turma']);
                        $ano=strip_tags($_POST['ano']);
                        $turma->turma=$tur;
                        $turma->ano=$ano;
                        $row=$turma->update('id',$id);
                        if ($row > 0):
                            echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Atualizado com sucesso!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            //header("Refresh:1.5 home.php?acao=acervo");
                            echo "<script> setTimeout('document.location = \'home.php?acao=turma\'',3000);</script>";
                        else:
                            echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Você não fez nenhuma alteração!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                            //header("Refresh:1.5 home.php?acao=update&id={$id}");
                            echo "<script> setTimeout('document.location = \'home.php?acao=updateT&id={$id}\'',3000);</script>";
                        endif;
                    endif;
                    ?>
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="turma">Turma</label>
                                <input type="text" id="turma" name="turma" value="<?= $tur?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ano">Ano</label>
                                <input type="text" id="ano" name="ano" value="<?= $ano?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><button type="submit" name="cad" class="btn btn-primary">Atualizar</button></div>
                        <div class="col-md-5"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>