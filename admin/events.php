<?php
include "includes/header.php";
include "includes/functions.php";

$TimeSlotList = getTimeSlots($conn);

?>
<div class="container" style="margin-top:200px;">
    <section style="padding:0px;">
        <div class="dash-bar">
            Add Time Slots
        </div>
        <div class="col-md-6">
            <div class="row">
                <form name="add_timeslot" id="add_timeslot" method="post">
                    <input type="hidden" name="action" value="add_timeslot">
                    <table id="slottable" style="width:100%">
                        <tr>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th style="text-align: center;" >Action</th>
                        </tr>
                        <?php
                                foreach ($TimeSlotList as $value) {
                                    echo ' <tr id="'.$value["id"].'" ><td><input type="text" class="form-control timerslots updateslot"  data-inject="'.$value["id"].'#from_time" placeholder="" value="'.$value["from_time"].'"></td><td><input type="text" class="form-control timerslots updateslot"  data-inject="'.$value["id"].'#to_time" placeholder="" value="'.$value["to_time"].'" ></td><td style="text-align: center;" ><a href="#" class="delete_timeslot" data-slotid="'.$value["id"].'" title="Delete Slot"><i class="fa  fa-trash-o"></i></a></td></tr>';
                                }
                        ?>
                       
                      
                    </table>
                    
                   
                    <div class="col-md-6">
                        <div class="row">
                                <button type="button" id="bt_add_slots" class="btn btn-primary">Add Slot</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            

                        </div>
                    </div>
                </form>
            </div>
        </div>
       
        
    </section>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.12.4.min.js"></script>

<script>


$(document).ready(function() { 
 
});
</script>
<?php
include "includes/footer.php";
?>