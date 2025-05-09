<h3 class="text-center text-success">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <?php
        $get_payments="select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);
        
        if($row_count==0){
            echo"<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
        }else{
            echo "
            <tr>
            <th>Sl no</th>
            <th>Invoice number</th>
            <th>Amount</th>
            <th>Payment mode</th>
            <th>Oreder date</th>
            <th>Delete</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-light'>";
        ?>
        <?php
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;
                ?>
                <tr>
                <td><?php echo $number?></td>
                <td><?php echo $invoice_number?></td>
                <td><?php echo $amount?></td>
                <td><?php echo $payment_mode?></td>
                <td><?php echo $date?></td>
                <td><a href='index.php?delete_payment=<?php echo $payment_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
<?php             
            }
        }
?>
    </tbody>
</table>