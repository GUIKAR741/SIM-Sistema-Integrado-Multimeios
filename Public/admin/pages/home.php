<?php
$tb_usuario = new App\Models\Tb_usuario();
$tb_professores = new App\Models\SiscoTbUsuario();
$tb_usuario = new App\Models\Tb_usuario();
$tb_turma = new App\Models\SiscoTbTurma();
$tb_aluno = new App\Models\SiscoTbAluno();
$contAlun = $tb_aluno->count();
?>
<main class="mn-content">
    <div class="content">
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">
                <div class="row no-m-t no-m-b englobaTudo">
                    <?php
                    $usuarioSim = $tb_usuario->select('DISTINCT tipo_usuario')->order('tipo_usuario')->all();
                    $professores = $tb_professores->select('DISTINCT tipo_usuario')->where('tipo_usuario', "Professor")->first();
                        echo "<div class=\"row no-m-t no-m-b cadaLinha\">";
                        foreach ($usuarioSim as $usuario) {
                            echo "<div class=\"col s12 m12 l3\">
                                        <a href=\"?p=usuarios-" . $usuario->tipo_usuario . " \">
                                            <div class=\"card stats-card\">
                                                <div class=\"card-content\" style=\"padding: 10px;\">
                                                    <div class=\"col s12 center l5\">
                                                        <span class=\"btn-floating btn-large btn-no-shadow cyan\">
                                                            <i class=\"large material-icons\" style=\"font-size: 2.5rem\">supervisor_account</i>
                                                        </span>
                                                        <span class=\"card-title text-center\" style=\"font-size: 20px;line-height: 30px\">
                                                            " . $usuario->tipo_usuario . "
                                                        </span>
                                                    </div>
                                                    <div class=\"col s12 center l4 push-l2\">
                                                        <p class=\"counter\" style=\"font-size: 1.64rem;text-align: center;margin-top: 10px\">".
                                                            $tb_usuario->select()->where('tipo_usuario', $usuario->tipo_usuario)->count()
                                                        ."</p>
                                                        <div style=\"text-align: center\">
                                                            Usuarios
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>";
                        }
                    foreach ($professores as $value) {
                            echo "<div class=\"col s12 m12 l3\">
                                        <a href=\"?p=usuarios-" . $value . " \">
                                            <div class=\"card stats-card\">
                                                <div class=\"card-content\" style=\"padding: 10px;\">
                                                    <div class=\"col s12 center l5\">
                                                        <span class=\"btn-floating btn-large btn-no-shadow cyan\">
                                                            <i class=\"large material-icons\" style=\"font-size: 2.5rem\">supervisor_account</i>
                                                        </span>
                                                        <span class=\"card-title text-center\" style=\"font-size: 20px;line-height: 30px\">
                                                            " . $value . "
                                                        </span>
                                                    </div>
                                                    <div class=\"col s12 center l4 push-l2\">
                                                        <p class=\"counter\" style=\"font-size: 1.64rem;text-align: center;margin-top: 10px\">".
                                $tb_professores->select()->where('tipo_usuario', $value)->count()
                                ."</p>
                                                        <div style=\"text-align: center\">
                                                            Usuarios
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>";
                    }echo "</div>";
                    ?>
                </div>
                <div class="row no-m-t no-m-b englobaTudo">
                    <?php
                    $curso = $tb_turma->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos', 'idtb_cursos','=',false)->order('ano','desc')->all();
//                    dump($curso);
                    $k=0;
                    for ($i=0;$i<=floor(count($curso)/4);$i++):
                        echo "<div class=\"row no-m-t no-m-b cadaLinha\">";
                        for ($j=$k;$j<=($k+3);$j++):
                            if (isset($curso[$j])):
                                $aluno=$tb_turma->select()->from('sisco.tb_aluno')->where('sisco.tb_aluno.tb_turma_idtb_turma',$curso[$j]->idtb_turma,'=',false)->count();
                                echo "<div class=\"col s12 m12 l3\">
                                        <a> <!--href=\"?p=turma&id=".$curso[$j]->idtb_turma."\"-->
                                            <div class=\"card stats-card\">
                                                <div class=\"card-content\" style=\"padding: 10px;\">
                                                    <div class=\"col s12 center l5\">
                                                        <span class=\"btn-floating btn-large btn-no-shadow cyan\">
                                                            <i class=\"large material-icons\" style=\"font-size: 2.5rem\">supervisor_account</i>
                                                        </span>
                                                        <span class=\"card-title text-center\" style=\"font-size: 20px;line-height: 30px\">
                                                            ".$curso[$j]->serie."º".$curso[$j]->nome_curso."
                                                        </span>
                                                    </div>
                                                    <div class=\"col s12 center l4 push-l2\">
                                                        <p class=\"counter\" style=\"font-size: 1.64rem;text-align: center;margin-top: 10px\">
                                                            $aluno
                                                        </p>
                                                        <div style=\"text-align: center\">
                                                            Total de Alunos
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>";
                            endif;
                        endfor;
                        echo "</div>";
                        $k+=4;
                    endfor;
                    ?>
                </div>






            </div>
        </div>
    </div>
</main>