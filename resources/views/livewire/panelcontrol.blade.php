<div>
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$ingreso}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Ingreso del día</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$gasto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Egreso del día</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!--  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$ingreso-$gasto}}<sup style="font-size: 20px">₲</sup></h3>

                    <p>Total en caja del día</p>
                </div>
                <div class="icon">
                    <i class="ion fas fa-chart-bar"></i>
                </div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Movimiento de la semana</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Movimiento del mes</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="movimientomes" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Movimiento del año</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="movimientoanho" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
    @section('js')
        <script>
            var areaChartData = {
                labels  : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                datasets: [
                    {
                    label               : 'Ingresos',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $ingresosemana ?>,
                    },
                    {
                    label               : 'Egresos',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : <?= $egresosemana ?>,
                    },
                ]
            }
            var mesData = {
                labels  : <?= $fechas ?>,
                datasets: [
                    {
                    label               : 'Ingresos',
                    backgroundColor     : '#ffc107',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $ingresomes ?>,
                    },
                    {
                    label               : 'Egresos',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : <?= $egresomes ?>,
                    },
                ]
            }
            var anhoData = {
                labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [
                    {
                    label               : 'Ingresos',
                    backgroundColor     : '#28a745',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : <?= $ingresoanho ?>,
                    },
                    {
                    label               : 'Egresos',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : <?= $egresoanho ?>,
                    },
                ]
            }
            //-------------
            //- Semana -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
            })
            //-------------
            //- Mes -
            //-------------
            var movimientomesCanvas = $('#movimientomes').get(0).getContext('2d')
            var movimientomesData = $.extend(true, {}, mesData)
            var temp0 = mesData.datasets[0]
            var temp1 = mesData.datasets[1]
            movimientomesData.datasets[0] = temp1
            movimientomesData.datasets[1] = temp0

            var movimientomesOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(movimientomesCanvas, {
            type: 'bar',
            data: movimientomesData,
            options: movimientomesOptions
            })
            //-------------
            //- Año -
            //-------------
            var movimientoanhoCanvas = $('#movimientoanho').get(0).getContext('2d')
            var movimientoanhoData = $.extend(true, {}, anhoData)
            var temp0 = anhoData.datasets[0]
            var temp1 = anhoData.datasets[1]
            movimientoanhoData.datasets[0] = temp1
            movimientoanhoData.datasets[1] = temp0

            var movimientoanhoOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            new Chart(movimientoanhoCanvas, {
            type: 'bar',
            data: movimientoanhoData,
            options: movimientoanhoOptions
            })
        </script>
    @stop
</div>
