  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



    <!-- text editor tinymce -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['View',     <?php echo $session->count; ?>],
          ['Comments', <?php echo Comment::count_all(); ?>],
          ['Users',  <?php echo User::count_all(); ?>],
          ['Photo',      <?php echo Photo::count_all(); ?>],
        
          // ['Sleep',    7]
        ]);

        var options = {
          legend: 'none',
          pieSliceText: 'label',
          backgroundColor: 'transparent',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>

</html>
