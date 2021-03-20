
<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>
<!-- Page level custom scripts -->
<script src="../assets/js/demo/chart-area-demo.js"></script>
<script src="../assets/js/demo/chart-pie-demo.js"></script>
<!------- EDIT FOR AGENCE--------------->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#idAL').text(data[0]);
            $('#idA').val(data[0]);
            $('#nom').val(data[1]);
            $('#adr').val(data[2]);
        });
    });
</script>
<!------- END EDIT FOR AGENCE--------------->
<!------- EDIT FOR TYPE BIEN--------------->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#idTl').text(data[0]);
            $('#idT').val(data[0]);
            $('#nomT').val(data[1]);
        });
    });
</script>
<!------- END EDIT FOR TYPE BIEN--------------->
<!------- EDIT FOR DISTRICT--------------->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#idDL').text(data[0]);
            $('#idD').val(data[0]);
            $('#nomD').val(data[1]);
        });
    });
</script>
<!------- END EDIT FOR DISTRICT--------------->
<script>
    $(document).ready(function () {
        $('.deletebtn').on('click', function () {
            $tr = $(this).closest('tr');
            $tof = $(this).attr('tof');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);

            $('#id').val(data[0]);
            $('#pho').val($tof);
            $('#prt').text(data[1]);

        });
    });
</script>


</body>

</html>