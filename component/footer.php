</section>
<!-- end section -->
</div>
<!-- end div app -->

<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; meisya <?php echo date('Y') ?> <div class="bullet"></div>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="assets/modules/jquery.min.js"></script>
<script src="assets/modules/popper.js"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/datatables/datatables.min.js"></script>
<script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/modules/summernote/summernote-bs4.js"></script>

<!-- Page Specific JS File -->
<script src="assets/js/page/modules-datatables.js"></script>

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }
</script>
</body>

</html>