<script type="text/javascript">
    $(document).ready(function(){
        $('.table-datatable').DataTable();
    })
</script>

<script>
    document.getElementById('hapusBtn').addEventListener('click', function (event) {
        var confirmDelete = confirm('Apakah Anda yakin akan menghapus gejala ini?');

        if (confirmDelete) {
            event.preventDefault(); 
        }
    });
</script>

</body>
</html>