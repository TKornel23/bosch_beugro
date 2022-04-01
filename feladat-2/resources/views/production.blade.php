@extends('layouts.app')
@section('content')

<div class='container' style='margin-top: 10px'>
    <div id='productions'>
        <table class='table'>
            <thead>
                    <th>ID</th>
                    <th>Pcb_Id</th>
                    <th>Quantity</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                <thead>
                <tbody>
                <?php
                $conn = mysqli_connect('localhost','root','asd123','cs_beugro',3306);
                $query = 'SELECT * FROM production';
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['pcb_id'];  ?> </td>
                        <td> <?php echo $row['quantity']; ?> </td>
                        <td> <?php echo $row['startDate']; ?> </td>
                        <td> <?php echo $row['endDate']; ?> </td>
                    </tr>
                <?php 
                endwhile;
                mysqli_close($conn); 
                ?>
                </tbody>
        </table>
    </div>
</div>
@endsection