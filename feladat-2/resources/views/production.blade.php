@extends('layouts.app')
@section('content')

<div class='container' style='margin-top: 10px'>
    <div id='productions'>
        <label for="pdc_id">Select pcb</label>
        <select name="pcb_id_select" id="selector">
            <from method="POST">
            <option value="">--- Choose a pcb ---</option>
            <?php
                foreach($Productionrows as $itemP){
                foreach($Productsrows as $item) {  
                    if($itemP['pcb_id'] == $item['id']){                    
                    ?>
                    <option value="<?php $itemP['pcb_id'] ?>"><?php echo $item['pcb'] ?></option>                
                <?php 
                }
            }
        }?>
        
        </select>
        <input type="submit" name="submit">
    </form>
        <table class='table'>
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
                    <td id="itemid"> <?php echo $item['id']; ?> </td>
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
@endsection