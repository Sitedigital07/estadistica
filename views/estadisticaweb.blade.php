

 @extends ('adminsite.layout')

 @section('cabecera')
    <script src="/estadistica/chartkick.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
    <!-- <script src="Chart.bundle.js"></script> -->
    <script type="text/javascript" src="//www.google.com/jsapi"></script>
     <script>
      // Chartkick.configure({language: "de"});
      // Chartkick.configure({mapsApiKey: "test123"})
      // Chartkick.options = {colors: ["#b00", "#666"]};
      // Chartkick.options = {legend: "right"};
      // Chartkick.options = {title: "Bingo"};

      var CustomAdapter = new function () {
        this.name = "custom";

        // this.renderLineChart = function (chart) {
        //   chart.getElement().innerHTML = "Hi";
        // };

        this.renderCustomChart = function (chart) {
          chart.getElement().innerHTML = "Custom Chart";
        };
      };

      Chartkick.CustomChart = function (element, dataSource, options) {
        Chartkick.createChart("CustomChart", this, element, dataSource, options);
      };

      Chartkick.adapters.unshift(CustomAdapter);
    </script>

    <style>

      Rect {
   stroke: black;
   fill: #d8d8d8;
 }
      h1 {
        text-align: center;
      }


.table-striped tr {display: block; }
.table-striped th, td { width: 400px; }
.table-striped tbody { display: block; height: 230px; overflow: auto;} 
    </style>


 @parent
 
 @stop


 @section('ContenidoSite-01')




   <div class="content-header">
     <ul class="nav-horizontal text-center">
        <li class="active">
       <a href="/gestion/estadistica"><i class="gi gi-signal"></i>Estadísticas</a>
      </li>
      <li>
       <a href="/gestion/estadistica/bloqueo"><i class="gi gi-eye_close"></i>IPs Bloqueadas</a>
      </li>
      
     </ul>
    </div>


<div class="container">
  <div class="col-md-12">
   <div class="block">
                  
    <div class="block-title">
     <h2><strong>Filtrar</strong> Estadísticas Por Fecha</h2>
    </div>
    
    <div class="table-responsive">
     <form action="{{URL::current()}}">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
     <div class="form-group">
      <div class='input-group date' id='datetimepicker7'>
       {{Form::text('min_price',Input::get('min_price'), array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha inicio'))}}
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
      </div>
     </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
     <div class="form-group">
      <div class='input-group date' id='datetimepicker9'>
       {{Form::text('max_price',Input::get('max_price'), array('class' => 'form-control','readonly' => 'readonly','placeholder'=>'Ingrese fecha finalización'))}}
       <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
      </div>
     </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
     <div class="form-group">
      <br>
       <div class='input-group pull-right' style="margin-top:-15px;margin-bottom:15px">
        <button class="btn btn-primary">Filtrar</button>
       </div>
     </div>
    </div>

   </form>
    </div>
     </div>                      
      </div>
       </div>

<div class="container">

<div class="col-md-12">
                                <!-- Widget -->
                                <div class="widget">
                                    <div class="widget-extra text-center themed-background-dark">
                                        <h3 class="widget-content-light"><i class="fa fa-arrow-up animation-floating"></i> Estadisticas <strong>Web</strong></h3>
                                    </div>
                                    <div class="widget-simple">
                                        <div class="row text-center">
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" class="widget-icon themed-background">
                                                    <i class="gi gi-coins"></i>
                                                </a>
                                                <h3 class="remove-margin-bottom"><strong>
                                                {{number_format($visitas, 0, ",", ".")}}</strong><br><small>Visitas</small></h3>
                                            </div>
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" class="widget-icon themed-background">
                                                    <i class="gi gi-thumbs_up"></i>
                                                </a>
                                                <h3 class="remove-margin-bottom"><strong>{{number_format($nuevousuario, 0, ",", ".")}}</strong><br><small>Usuarios Nuevos</small></h3>
                                            </div>
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" class="widget-icon themed-background">
                                                    <i class="gi gi-thumbs_up"></i>
                                                </a>
                                                <h3 class="remove-margin-bottom"><strong>{{number_format($visitas-$nuevousuario, 0, ",", ".")}}</strong><br><small>Retorno Usuarios</small></h3>
                                            </div>
                                            <div class="col-xs-3">
                                                <a href="javascript:void(0)" class="widget-icon themed-background">
                                                    <i class="fa fa-ticket"></i>
                                                </a>
                                                <h3 class="remove-margin-bottom"><strong>{{number_format($visitas/$conteopagina, 0, ",", ".")}}</strong><br><small>PAginas/Vistas</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Widget -->
                            </div>
</div>

<div class="container">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="block">
                            <!-- Responsive Full Title -->
                            <div class="block-title">
                                <h2><strong>Páginas</strong> Vistas</h2>
                            </div>
                            <!-- END Responsive Full Title -->

                            <!-- Responsive Full Content -->
                            
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Página</th>
                                            <th class="text-primary"># Visitas</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($paginas as $paginas)
                                        <tr>
                                           <td style="width:280px">{{ $paginas->pagina }}</td>
                                           <td style="width:100px">{{number_format($paginas->sum, 0, ",", ".")}}</td>
                                        </tr>
                                       @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Responsive Full Content -->
                        </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="block">
                            <!-- Responsive Full Title -->
                            <div class="block-title">
                                <h2><strong>Visitas</strong> Referidas</h2>
                            </div>
                            <!-- END Responsive Full Title -->

                            <!-- Responsive Full Content -->
                            
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Referidos</th>
                                            <th class="text-primary"># Visitas</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($referidos as $referidos)
                                        <tr>
                                            @if($referidos->referido == '')
                                            <td style="width:280px">/</td>
                                            @else
                                           <td style="width:280px">{{ $referidos->referido }}</td>
                                           @endif
                                           <td style="width:100px">{{number_format($referidos->sum, 0, ",", ".")}}</td>
                                        </tr>
                                       @endforeach 

                                    </tbody>
                                </table>
                            </div>
                            <!-- END Responsive Full Content -->
                        </div>
</div>
</div>

<div class="container">

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="block">
                            <!-- Responsive Full Title -->
                            <div class="block-title">
                                <h2><strong>Visitas</strong> Ciudades</h2>
                            </div>
                            <!-- END Responsive Full Title -->

                            <!-- Responsive Full Content -->
                            
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Ciudades</th>
                                            <th class="text-primary"># Visitas</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($ciudades as $ciudades)
                                        <tr>
                                           <td style="width:280px">{{ $ciudades->ciudad }}</td>
                                           <td style="width:100px">{{number_format($ciudades->sum, 0, ",", ".")}}</td>
                                        </tr>
                                       @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Responsive Full Content -->
                        </div>


</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="block">
                            <!-- Responsive Full Title -->
                            <div class="block-title">
                                <h2><strong>Lenguajes</strong> Visitas</h2>
                            </div>
                            <!-- END Responsive Full Title -->

                            <!-- Responsive Full Content -->
                            
                            <div class="table-responsive">
                                <table class="table table-vcenter table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Lenguaje</th>
                                            <th class="text-primary"># Visitas</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($idiomas as $idiomas)
                                        <tr>
                                           <td style="width:280px">{{ $idiomas->idioma }}</td>
                                           <td style="width:100px">{{number_format( $idiomas->sum, 0, ",", ".")}}</td>
                                        </tr>
                                       @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Responsive Full Content -->
                        </div>


</div>
</div>

  
<div class="container">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
 <div class="block">
                                    <!-- Quick Post Title -->
    <div class="block-title">
     <div class="block-options pull-right">
      
     </div>
      <h2><strong>Visitas</strong> por mes</h2>
                                    
     
       <div id="column" style="height:400px;"></div>
        <script>
         new Chartkick.ColumnChart("column", [
         @foreach($meses as $meses)
         ["{{ $meses->mes }}",{{$meses->sum}}],
         @endforeach
         ]);
        </script>
   </div>
 </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
 <div class="block">
                                    <!-- Quick Post Title -->
    <div class="block-title">
     <div class="block-options pull-right">
  
     </div>
      <h2><strong>Visitas</strong> por país</h2>
                                  
    <div id="geo" style="height:400px"></div>

    <script>
      new Chartkick.GeoChart("geo", [
  @foreach($paises as $paises)
  ["{{ $paises->pais }}",{{$paises->sum}}],
@endforeach
  ]);
    </script>
   </div>
 </div>
</div>


</div>




   {{ Html::style('Calendario/css/bootstrap-datetimepicker.min.css') }}
   


   {{ Html::script('Calendario/jquery/jquery.min.js') }}
     {{ Html::script('Calendario/bootstrap2/js/bootstrap.min.js') }}
  <script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker7').datetimepicker({
      pickTime: false,
      format: 'YYYY-MM-DD'

    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#datetimepicker9').datetimepicker({
      pickTime: false,
      format: 'YYYY-MM-DD'

    });
});
</script>


     {{ Html::script('Calendario/js/underscore-min.js') }}
     {{ Html::script('Calendario/js/jstz.min.js') }}
     {{ Html::script('Calendario/js/es-ES.js') }}
     {{ Html::script('Calendario/js/calendar.js') }}
     {{ Html::script('Calendario/js/apps.js') }}
     {{ Html::script('Calendario/js/moment.min.js') }}
     {{ Html::script('Calendario/js/bootstrap-datetimepicker.min.js') }}
     {{ Html::script('Calendario/js/datetime.js') }}
     {{ Html::script('Calendario/js/validator.js')}}
     {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js') }}
   
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

@stop


