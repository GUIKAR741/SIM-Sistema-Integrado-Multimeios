<?php
$tb_turma = new App\Models\SiscoTbTurma();
$tb_aluno = new App\Models\SiscoTbAluno();
?>
<main class="mn-content">
    <div class="content">
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">
                <div class="row no-m-t no-m-b">
                    <?php
                    $curso = $tb_turma->select()->from('sisco.tb_turma,sisco.tb_cursos')->where('sisco.tb_turma.tb_cursos_idtb_cursos', 'idtb_cursos','=',false)->order('ano','desc')->all();
                    $k=0;
                    for ($i=0;$i<=floor(count($curso)/4);$i++):
                        echo "<div class=\"row no-m-t no-m-b\">";
                        for ($j=$k;$j<=($k+3);$j++):
                            if (isset($curso[$j])):
                                $aluno=$tb_turma->select()->from('sisco.tb_aluno')->where('sisco.tb_aluno.tb_turma_idtb_turma',$curso[$j]->idtb_turma,'=',false)->count();
                                echo "<div class=\"col s12 m12 l3\">
                                        <a href=\"?p=turma&id=".$curso[$j]->idtb_turma."\" >
                                            <div class=\"card stats-card\">
                                                <div class=\"card-content\" style=\"padding: 10px;\">
                                                    <div class=\"col l5\">
                                                        <span class=\"btn-floating btn-large btn-no-shadow cyan\">
                                                            <i class=\"large material-icons\" style=\"font-size: 2.5rem\">supervisor_account</i>
                                                        </span>
                                                        <span class=\"card-title text-center\" style=\"font-size: 20px;line-height: 30px\">
                                                            ".$curso[$j]->serie."º".$curso[$j]->nome_curso."
                                                        </span>
                                                    </div>
                                                    <div class=\"col l4 push-l2\">
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
                <div class="row no-m-t no-m-b">
                    <div class="col s12 m6 l6">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Livros Mais Lidos</span>
                                <div>
                                    <canvas id="chart2" width="400" height="270"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Alunos Mais Leitores</span>
                                <div>
                                    <canvas id="chart4" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>