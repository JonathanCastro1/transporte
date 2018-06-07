
	<div class="footer  col-md-12  text-center">
		<footer>@Jonathan Castro All right reserved</footer>
	</div>

  <!-- en el calendario es importante cargar primero jquery y moment, si no hay problemas -->
   <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

   <script src="<?php echo base_url();?>assets/js/moment.js"></script>

   <!-- <script src="assets/js/sidebar.js"></script> -->
    
   <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

   <script src="<?php echo base_url();?>assets/js/cargar.js"></script>

<!--    <script src="<?php echo base_url();?>assets/js/sidebar.js"></script> -->

   <script src="<?php echo base_url();?>assets/js/tooltip.js"></script>

   <script src="<?php echo base_url();?>assets/js/efectos.js"></script> 


  <!-- probando el get -->
   <!--   <script src="<?php echo base_url();?>assets/js/pruebaget.js"></script> -->

  <!--    Datepicker js -->

   <script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>

  <!-- Datatable js -->
   <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

   <script src="<?php echo base_url();?>assets/js/tabla.js"></script>

  <!--   calendario script -->

   <!-- <script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script> -->

   <script src="<?php echo base_url();?>assets/js/fullcalendar.js"></script>

   <!-- <script src="<?php echo base_url();?>assets/js/moment.js"></script> -->

   <script src="<?php echo base_url();?>assets/js/calendario.js"></script>



  <!--  <script src="assets/js/scripts.js"></script> -->

 <!--   <script src="assets/js/validar.js"></script> -->

 <!--   <script src="assets/js/tabla.js"></script> -->

    <!--  date picker libreria -->
  <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <!-- tabla script -->
  <!--  <script src="assets/js/jquery.dataTables.min.js"></script> -->

<!-- Date picker -->
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy",
monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
changeMonth: true,
changeYear: true

}
      );
  } );
  </script>




 <!--  probando cargar un date picker -->
<!--   <script>
  $( function() {
    $( "#datepickerCargado" ).datepicker({dateFormat: "dd-mm-yy",
monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi',<?php echo $datos->hora?>],
changeMonth: true,
changeYear: true


}
      );
  } );
  </script> -->


  <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Ingresos', 1],
          ['Egresos', 2]
          
        ]);

        // Set chart options
        var options = {'title':'Estadisticas contables',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
      }
    </script> -->


 <!-- <script type="text/javascript">
   
 google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMultSeries);

function drawMultSeries() {
      var data = google.visualization.arrayToDataTable([
        ['Estadistica', 'Comunidad activa'],
        ['Usuarios', <?php echo $tUsuarios->totalusuarios?>],
        ['Profesores', <?php echo $tProfesores->totalprofesores?>],
        ['Estudiantes', <?php echo $tEstudiantes->totalestudiantes?>],        
      ]);

      var options = {
        title: 'Gráfico Estadistico',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Estadisticas fecha: <?php echo date("d-m-y");?>',
          minValue: 0
        },
        // vAxis: {
        //   title: 'Estadistica'
        // }
      };

      var chart = new google.visualization.BarChart(document.getElementById('grafico'));
      chart.draw(data, options);
    }
 </script> -->



</body>
</html>