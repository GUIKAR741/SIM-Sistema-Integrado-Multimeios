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
        setTimeout(function(){ Materialize.toast('Você tem '+a+' novas notificações!', 3000) }, 6000);

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
        var ctx2 = document.getElementById("chart2").getContext("2d");
        var data2 = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "#9575CD",
                    strokeColor: "transparent",
                    highlightFill: "#9575CD",
                    highlightStroke: "#B3B3B3",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "#33AC71",
                    strokeColor: "transparent",
                    highlightFill: "#33AC71",
                    highlightStroke: "#B3B3B3",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };

        var chart2 = new Chart(ctx2).Bar(data2, {
            scaleBeginAtZero : true,
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.05)",
            scaleGridLineWidth : 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: false,
            barShowStroke : true,
            barStrokeWidth : 2,
            barDatasetSpacing : 1,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true,
            scaleOverride: true,
            scaleSteps: 6,
            scaleStepWidth: 15,
            scaleStartValue: 0,
            barValueSpacing: 20,
            tooltipCornerRadius: 2
        });
        var ctx4 = document.getElementById("chart4").getContext("2d");
        var data4 = [
            {
                value: 300,
                color:"#9575CD",
                highlight: "#9575CD",
                label: "Purple"
            },
            {
                value: 50,
                color: "#33AC71",
                highlight: "#33AC71",
                label: "Green"
            },
            {
                value: 100,
                color: "#53A8FB",
                highlight: "#53A8FB",
                label: "Blue"
            }
        ];
        var myPieChart = new Chart(ctx4).Pie(data4,{
            segmentShowStroke : true,
            segmentStrokeColor : "#fff",
            segmentStrokeWidth : 2,
            animationSteps : 100,
            animationEasing : "easeOutBounce",
            animateRotate : true,
            animateScale : false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
            responsive: true,
            tooltipCornerRadius: 2
        });

    });

</script>