<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Example of ServerSide jQuery Datatable</title>
    <link href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
   
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt">Simple Example of ServerSide jQuery Datatable</h1>
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Age</th>
                </tr>
            </tfoot>
        </table>
    </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
       "serverSide": true, //Feature control DataTables' servermside processing mode.
        //"order": [], //Initial no order.
		"iDisplayLength" : 10,

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('/employee/ajax_list')?>",
            "type": "POST",
            "dataType": "json",
            "dataSrc": function (jsonData) {
			  
			  
			  return jsonData.data;
			}
        },
		
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});
</script>

</body>
</html>