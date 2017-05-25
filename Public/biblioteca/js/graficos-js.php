<script src="../assets/plugins/chart.js/chart.min.js"></script>
<script>
    $( document ).ready(function() {
        let suffle=function (a) {
            for (let i = a.length; i; i--) {
                let j = Math.floor(Math.random() * i);
                [a[i - 1], a[j]] = [a[j], a[i - 1]];
            }
        };
        Chart.defaults.global.responsive = true;
        // Velocidade da animação do Apresentação
        Chart.defaults.global.animation.duration = 500;
        let gera = function (grafico,data) {
            let barChart = new Chart(grafico, {
                type: 'bar',
                data:data,
                options: {
                    // Mostrar linhas
                    showLines: false,
                    legend:{
                        display:false,
                        onClick:false,
                        position:'top'
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                // Inverter Gráfico
                                reverse: false,
                                // Iniciar Eixo y do Zero
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        };
        let html=function (title_var,id_var) {
        return '<div class="col s12 m12 l6">'+
            '<div class="card">'+
            '<div class="card-content">'+
            '<span class="card-title">'+title_var+'</span>'+
            '<div>'+
            '<canvas id="'+id_var+'" width="600" height="400"></canvas>'+
            '</div>'+
        '</div>'+
        '</div>'+
        '</div>';
        };
        let div_graf=$('#div-graf');
        $.ajax({
            url:'ajax/graficos.php',
            type: "POST",
            async: true,
            dataType: "JSON",
            data:{turmas:'true'},
            success:function (j) {
                let data;
                let val=[];
                for (let u=0;u<j.length;u++) {
                    for (let k = 0; k < j[u].length; k++) {
                        val=[];
                        for (let i = 0; i < j[u][k]['datasets'].length; i++) {
                            data = j[u][k]['datasets'];
                            val[i] = {
                                label: j[u][k]['datasets'][i].label,
                                backgroundColor: j[u][k]['datasets'][i].backgroundColor,
                                borderColor: j[u][k]['datasets'][i].borderColor,
                                borderWidth: j[u][k]['datasets'][i].borderWidth,
                                data: [j[u][k]['datasets'][i].data]
                            };
                        }
                        div_graf.append(html(j[u][k]['labels'],'id-'+k));
                        suffle(val);
                        let datas= {
                            labels: [''],//[j[u][k]['labels']],
                            datasets:val
                        };
//                        console.log(datas);
                        gera(document.getElementById('id-'+k),datas);
                    }
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });

</script>