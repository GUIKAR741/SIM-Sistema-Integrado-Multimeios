<script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
<script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="../assets/plugins/chart.js/chart.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../assets/plugins/curvedlines/curvedLines.js"></script>
<script src="../assets/plugins/peity/jquery.peity.min.js"></script>
<script>
    $( document ).ready(function() {
        setTimeout(function(){ Materialize.toast('Bem vindo ao SIM!', 3000) }, 3000);
        if ((typeof a)==='number') {
            setTimeout(function(){ Materialize.toast('Você tem '+a+' novas notificações!', 3000) }, 6000);
        }
        // CounterUp Plugin
        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            });
        });

        let suffle=function (a) {
            for (let i = a.length; i; i--) {
                let j = Math.floor(Math.random() * i);
                [a[i - 1], a[j]] = [a[j], a[i - 1]];
            }
        };
        // Deixar Fixo ou Responsivo
        Chart.defaults.global.responsive = true;
        // Velocidade da animação do Apresentação
        Chart.defaults.global.animation.duration = 500;

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
        $.ajax({
            url:'ajax/graficos.php',
            type: "POST",
            async: true,
            dataType: "JSON",
            data:{lidos:"true",leitores:'true'},
            success:function (j) {
                let data;
                let val=[];
                for (let k=0;k<j.length;k++) {
                    val=[];
                    for (let i = 0; i < j[k]['datasets'].length; i++) {
                        val[i]={
                            label: j[k]['datasets'][i].label,
                            backgroundColor: j[k]['datasets'][i].backgroundColor,
                            borderColor: j[k]['datasets'][i].borderColor,
                            borderWidth: j[k]['datasets'][i].borderWidth,
                            data: [j[k]['datasets'][i].data]
                        };
                    }
                    div_graf.append(html(j[k]['labels'],'id-'+k));
//                    console.log(val);
                    suffle(val);
                    let datas= {
                        labels: [''],/*[j['labels']],*/
                        datasets:val
                    };
                    gera(document.getElementById('id-'+k),datas);
                }
            },
            error: function(data){
                console.log(data);
            }
        });
    });

</script>