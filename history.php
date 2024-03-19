<?php
include "includes/header.php";
include "includes/functions.php";

$TimeSlotList = getTimeSlots($conn);

?>
<div class="container" style="margin-top:200px;">
    <section style="padding:0px;">
        <div class="dash-bar">
            Book Requests
        </div>
        <div class="col-md-12">
            <table cellpadding="0" cellspacing="0" border="0" class="dataTable table table-striped" id="EventRequestTable">

            </table>
        </div>
       
        
    </section>
</div>

<script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
<script>
    var reserveTable;
    var StatusOptions = {"Overdue" : "Overdue","Paid":"Paid"};

    var columnDefs = [
        {
        data: "request_id",
        title: "Request Id",
        type: "readonly"
        },
        {
        data: "username",
        title: "Student Name",
        type: "readonly"

        },
        {
        data: "email",
        title: "Student Email",
        type: "readonly"

        },
        {
        data: "book_title",
        title: "Book",
        type: "readonly"

        },
        {
        data: "slot",
        title: "Slot",
        type: "readonly"

        },
        {
        data: "pickup_date",
        title: "Pickup Date",
        type: "readonly"

        },
        {
        data: "return_date",
        title: "Return Date",
        type: "readonly"

        },
        {
        data: "status",
        title: "Status",
        type: "select",
        options: StatusOptions,
            select2 : { width: "100%"},
            render : function (data, type, row, meta) {
                if (data == null || row == null || row.status == null) return null;
                return data;
            }
        }
    ];

    $(document).ready(function() { 
        myTable = $('#EventRequestTable').DataTable({
            "sPaginationType": "full_numbers",
            ajax: {
                url : 'api/api.php?action=user_due_requests',
                dataSrc : ''
            },
            columns: columnDefs,
            dom: 'Bfrtip',        
            select: 'single',
            responsive: true,
            altEditor: true,    
            buttons: [
                // {
                //     text: 'Add',
                //     name: 'add'        // do not change name
                // },
                // {
                //     extend: 'selected', // Bind to Selected row
                //     text: 'Edit',
                //     name: 'edit'        // do not change name
                // },
                // {
                //     extend: 'selected', // Bind to Selected row
                //     text: 'Delete',
                //     name: 'delete'      // do not change name
                // },
                // {
                //     text: 'Refresh',
                //     name: 'refresh'      // do not change name
                // }
            ],
          
            onEditRow: function(datatable, rowdata, success, error) {
                console.log(rowdata.request_id);

                $.ajax({
                    url: "api/api.php",
                    type: "POST",
                    data: {
                                action: "due_requests", 
                                request_id: rowdata.request_id, 
                                status: rowdata.status, 
                                rdate: rowdata.return_date,
                        },
                    success: function(data) {
                        var details = JSON.parse(data);

                        if (details["status"] == "200") {

                                Toastify({
                                    text: details["message"],
                                    duration: 3000,
                                    close: true,
                                    gravity: "top", 
                                    position: "center", 
                                    stopOnFocus: true, 
                                    style: {
                                    background: "#84bb45",
                                    },
                                    callback: function() {
                                        redirect("requests.php");
                                        Toastify.reposition();
                                        },
                                    onClick: function(){} 
                                }).showToast();

                        } else {
                                Toastify({
                                    text: details["message"],
                                    duration: 5000,
                                    close: true,
                                    gravity: "top", 
                                    position: "center", 
                                    stopOnFocus: true, 
                                    style: {
                                    background: "#FF0000",
                                    },
                                    callback: function() {
                                        redirect("requests.php");
                                        Toastify.reposition();
                                        },
                                    onClick: function(){} 
                                }).showToast();
                        }
                    },
                    error: function() {
                        alert("E4: Add Favourite Error.");
                        return false;
                    }
                });
            }
        });
    });
</script>


<?php include "includes/footer.php" ?>
