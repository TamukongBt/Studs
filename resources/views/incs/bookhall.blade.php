<script type="text/javascript">

    // This script is used in passing data from the table directly to form in the book hall page
    var table = $('#myTable').DataTable();

    //Start Edit Record

    $('table tbody').on('click', '#edit', function () {
        var currow = $(this).closest('tr');
        var col1 = currow.find('td:eq(0)').text();
        var col2 = currow.find('td:eq(1)').text();
        var col3 = currow.find('td:eq(2)').text();
        var col4 = currow.find('td:eq(3)').text();
        var col5 = currow.find('td:eq(4)').text();
        var col6 = currow.find('td:eq(5)').text();
        var col7 = currow.find('td:eq(6)').text();
        var data = col1 + '\n' + col2 + '\n' + col3 + '\n' + col4 + '\n' + col5 + '\n' + col6;


        $('#Building').val(col1);
        $('#ClassID').val(col2);
        $('#Capacity').val(col3);
        $('#Access').val(col4);
        $('#EndTime').val(col6);
        $('#Day').val(col7);
        $('#StartTime').val(col5);


    });


</script>

