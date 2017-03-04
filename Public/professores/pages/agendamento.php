<main class="mn-inner no-p no-m" style="padding-top: 10px;padding-bottom: -10px">
    <div class="row no-m-b">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card">
                <div class="card-content">
                    <div><form action="">
                        <h4 class="card-title no-m-b">Atualizar Reserva</h4>

                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>Selecione uma Turma</option>
                                    <option value="1">Turma1</option>
                                    <option value="2">Turma2</option>
                                    <option value="3">Turma3</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label class="active" for="data">Data</label>
                                <input id="data" placeholder="Escolha a Data Desejada" type="date" class="datepicker">
                            </div>
                            <div class="row no-m-b">
                                <div class="col m12 l6">
                                    <label class="active" for="">Horarios</label>
                                    <?php for ($i=1;$i<=10;$i++): ?>
                                        <p>
                                            <input type="checkbox" class="filled-in" id="<?= $i?>Aula"/>
                                            <label for="<?= $i?>Aula"><?= $i?>ª Aula</label>
                                        </p>
                                    <?php endfor ?>
                                </div>
                                <div class="col m12 l6">
                                    <label class="active" for="">Recursos</label>
                                    <p>
                                        <input type="checkbox" class="filled-in" id="Notebook" />
                                        <label for="Notebook">Notebook</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filled-in" id="DataShow" />
                                        <label for="DataShow">Data Show</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" class="filled-in" id="TV" />
                                        <label for="TV">TV</label>
                                    </p>
                                </div>
                            </div>
                            <div class="input-field" style="padding-bottom: 25px">

                                <a class="col s3 offset-s9 btn waves-effect blue waves-light" type="submit" name="action">Atualizar
                                </a>
                            </div>

                    </div>
                    </form></div>
                </div>
            </div>
        </div>

</main>