            <div class="footer">
                <div class="pull-right">
                </div>
                <div>
                   <strong>Copyright</strong> PT Internusa Master Niaga © <?php date("Y"); ?>
               </div>
           </div>

       </div>
   </div>

   <!-- Mainly scripts -->
   <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

   <!-- Custom and plugin javascript -->
   <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/jsKnob/jquery.knob.js')?>"></script>
   <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>

   <!-- Page-Level Scripts -->
   <script>
    $(document).ready(function(){
        $('.pimpinan').DataTable();

        $(".dial").knob();

        $('#date_added').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    });
</script>

</body>

</html>