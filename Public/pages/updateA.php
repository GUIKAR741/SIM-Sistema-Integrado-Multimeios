<?php
if(!isset($_GET['id']) || empty($_GET['id'])):
    //header('Location: home.php?acao=acervo');
    echo "<script> location='home.php?acao=acervo'</script>";
    exit;
endif;
use App\Models\Acervo;
$id=$_GET['id'];
$acervo=new Acervo();
$livros=$acervo->select()->from()->where('id',$id)->first();
$titulo=$livros->TITULO;
$autor=$livros->AUTOR;
$data=$livros->DATA;
$vol=$livros->VOL;
$ex=$livros->EX;
$local=$livros->LOCAL;
$editora=$livros->EDITORA;
$ano=$livros->ANO_PUB;
$aquisicao=$livros->FORMA_DE_AQ;
$obs=$livros->OBS;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><a href="home.php?acao=acervo">Acervo</a></li>
            <li>Atualizar</li>
            <li>Livros</li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Atualizar Livros</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <?php

            if (isset($_POST['up'])):
                $titulo=strip_tags($_POST['titulo']);
                $autor=strip_tags($_POST['autor']);
                $data=explode('/',strip_tags($_POST['data']));
                $vol=strip_tags($_POST['vol']);
                $ex=strip_tags($_POST['ex']);
                $local=strip_tags($_POST['local']);
                $editora=strip_tags($_POST['editora']);
                $ano=strip_tags($_POST['ano']);
                $aquisicao=strip_tags($_POST['aquisicao']);
                $obs=strip_tags($_POST['obs']);

                $data=$data[2].'-'.$data[1].'-'.$data[0];

                $acervo->TITULO=$titulo;
                $acervo->AUTOR=$autor;
                $acervo->DATA=$data;
                $acervo->VOL=$vol;
                $acervo->EX=$ex;
                $acervo->LOCAL=$local;
                $acervo->EDITORA=$editora;
                $acervo->ANO_PUB=$ano;
                $acervo->FORMA_DE_AQ=$aquisicao;
                $acervo->OBS=$obs;
                $row=$acervo->update('id',$id);
                if ($row > 0):
                    echo '<div class="alert bg-success" role="alert">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Atualizado com sucesso!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                //header("Refresh:1.5 home.php?acao=acervo");
                    echo "<script> setTimeout('document.location = \'home.php?acao=acervo\'',3000);</script>";
                else:
                    echo '<div class="alert bg-danger" role="alert">
                    <svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Você não fez nenhuma alteração!</strong><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                </div>';
                    //header("Refresh:1.5 home.php?acao=update&id={$id}");
                    echo "<script> setTimeout('document.location = \'home.php?acao=update&id={$id}\'',3000);</script>";
                endif;
            endif;
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" id="titulo" name="titulo" value="<?= $titulo?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input type="text" id="autor" name="autor" value="<?= $autor?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="text" id="data" name="data" value="<?= date('d/m/Y',strtotime($data))?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="vol">Vol</label>
                                <input type="text" id="vol" name="vol" value="<?= $vol?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ex">EX</label>
                                <input type="text"id="ex" name="ex" value="<?= $ex?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="local">Local</label>
                                <input type="text" id="local" name="local" value="<?= $local?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="editora">Editora</label>
                                <input type="text" id="editora" name="editora" value="<?= $editora?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ano">Ano</label>
                                <input type="text" id="ano" name="ano" value="<?= $ano?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="aquisicao">Forma de Aquisição</label>
                                <input type="text" id="aquisicao" name="aquisicao" value="<?= $aquisicao?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="obs">Obs</label>
                                <input type="text" id="obs" name="obs" class="form-control" value="<?= $obs?>">
                            </div>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2"><button type="submit" name="up" class="btn btn-primary">Atualizar</button></div>
                        <div class="col-md-5"></div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->