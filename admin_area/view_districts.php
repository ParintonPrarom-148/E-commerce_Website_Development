<h3 class="text-center text-success">All districts</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-warning">
        <tr class="text-center">
            <th>Slno</th>
            <th>district</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat="select * from `districts`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $district_id=$row['district_id'];
            $district_title=$row['district_title'];
            $number++; 
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $district_title;?></td>
            <td><a href='index.php?edit_districts=<?php echo $district_id?>'class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_district=<?php echo $district_id?>'class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            
        </tr>
<?php

}?>
    </tbody>
</table>
