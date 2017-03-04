<main class="mn-content">
    <div class="content">
        <div class="row no-m-t no-m-b">
            <div class="col l12">
                <div class="row no-m-t no-m-b">
                    <?php for ($i=1;$i<=10;$i++): ?>
                        <div class="col s12 m12 l3">
                            <a href="?p=turma&id=<?= $i?>" ><div class="card stats-card">
                                <div class="card-content" style="padding: 10px;">
                                    <div class="col l5">
                                    <span class="btn-floating btn-large btn-no-shadow cyan">
                                    <i class="large material-icons" style="font-size: 2.5rem">supervisor_account</i>
                                </span>
                                        <span class="card-title text-center">
                                    Turma
                                </span>
                                    </div>
                                    <div class="col l4 push-l2">
                                        <p class="counter" style="font-size: 1.64rem;text-align: center;margin-top: 10px">
                                            45
                                        </p>
                                        <div style="text-align: center">
                                            Total de Alunos
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    <?php endfor; ?>
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

            <!--<div class="col s12 m12 l12">
                <div class="card invoices-card">
                    <div class="card-content">
                        <div class="card-options">
                            <input type="text" class="expand-search" placeholder="Search" autocomplete="off">
                        </div>
                        <span class="card-title">Invoices</span>
                        <table class="responsive-table bordered">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="number">Payment Type</th>
                                <th data-field="company">Company</th>
                                <th data-field="date">Date</th>
                                <th data-field="progress">Progress</th>
                                <th data-field="total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>#203</td>
                                <td>PayPal</td>
                                <td>Curabitur Libero Corp</td>
                                <td>Dec 16, 18:12</td>
                                <td><span class="pie">3/8</span></td>
                                <td>$5430</td>
                            </tr>
                            <tr>
                                <td>#202</td>
                                <td>American Express</td>
                                <td>Integer Mattis Ltd</td>
                                <td>Nov 29, 13:56</td>
                                <td><span class="pie">5/8</span></td>
                                <td>$1400</td>
                            </tr>
                            <tr>
                                <td>#200</td>
                                <td>Discover</td>
                                <td>Pellentesque Inc</td>
                                <td>Nov 17, 19:14</td>
                                <td><span class="pie">3/8</span></td>
                                <td>$1250</td>
                            </tr>
                            <tr>
                                <td>#199</td>
                                <td>MasterCard</td>
                                <td>Curabitur Libero Corp</td>
                                <td>Oct 21, 12:16</td>
                                <td><span class="pie">5/8</span></td>
                                <td>$1349</td>
                            </tr>
                            <tr>
                                <td>#198</td>
                                <td>Amex</td>
                                <td>Integer Mattis Ltd</td>
                                <td>Oct 14, 22:43</td>
                                <td><span class="pie">3/8</span></td>
                                <td>$980</td>
                            </tr>
                            <tr>
                                <td>#197</td>
                                <td>PayPal</td>
                                <td>Pellentesque Inc</td>
                                <td>Sept 29, 10:33</td>
                                <td><span class="pie">5/8</span></td>
                                <td>$679</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="col m12 l2">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title red white-text center">Feed de Reservas</span>
                        </div>
                    </div>

            </div>-->
        </div>
    </div>
</main>