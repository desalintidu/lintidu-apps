<!-- container -->
</div>
<!-- content -->
<!-- Footer Start -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <script>
          document.write(new Date().getFullYear())
        </script> © Lintidu Apps
      </div>

    </div>
  </div>
</footer>
</div>
</div>
<!-- bundle -->




<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.material.min.js"></script>
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

<!-- third party js -->
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="assets/js/vendor/buttons.html5.min.js"></script>
<script src="assets/js/vendor/buttons.flash.min.js"></script>
<script src="assets/js/vendor/buttons.print.min.js"></script>
<script src="assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="assets/js/vendor/dataTables.select.min.js"></script>



<!-- third party js -->
<script src="assets/js/vendor/apexcharts.min.js"></script>
<script src="assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script> -->


<script>
  $(document).ready(function() {
    $('#example').DataTable({
      autoWidth: true,
      columnDefs: [{
        targets: ['_all'],
        className: 'mdc-data-table__cell'
      }]
    });
  });
</script>


</body>

</html>