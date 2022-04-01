@extends('layouts.app')
@section('content')

<div class='container' style='margin-top: 10px'>
    <div id='productions'>
        <label for="pdc_id">Select pcb</label>
        <select name="pcb_id_select" id="selector">
            <option value="">--- Choose a pcb ---</option>
            <?php
                foreach($Productionrows as $itemP){
                foreach($Productsrows as $item) {  
                    if($itemP['pcb_id'] == $item['id']){                    
                    ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['pcb']; ?></option>                
                <?php 
                }
            }
        }?>
        
        </select>
        <table class='table' id="table">
            <thead>
                    <th>ID</th>
                    <th>Pcb_Id</th>
                    <th>Quantity</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>Action</th>
            </thead>
            <tbody>
           <?php foreach($Productionrows as $item) { ?>
                <tr>
                    <td> <?php echo $item['id']; ?> </td>
                    <td> <?php echo $item['pcb_id'];  ?> </td>
                    <td> <?php echo $item['quantity']; ?> </td>
                    <td> <?php echo $item['startDate']; ?> </td>
                    <td> <?php echo $item['endDate']; ?> </td>
                    <td><a href='delete/{{$item["id"]}}'><button type="button" class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php }
            ?>
            </tbody     
           </table>
    </div>
</div>

<script>
   $('#selector').change(function(){
    var selectedId = $('#selector option:selected');

    if(selectedId.text != '--- Choose a pcb ---'){
        var table = document.getElementById("table");
        var all_tr = table.getElementsByTagName("tr");
        for(var i=0; i<all_tr.length; i++){
            var name_column = all_tr[i].getElementsByTagName("td")[1];
            if(name_column){
                var name_value = name_column.textContent || name_column.innerText;
                if(name_value.indexOf(selectedId.val()) > -1){
                    all_tr[i].style.display = "";
                }else{
                    all_tr[i].style.display = "none";
                }
            }
        }
    }
});
</script>
@endsection