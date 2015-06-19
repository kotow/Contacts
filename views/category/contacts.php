<table id="phones">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php while($row = $contacts->fetch_assoc()):?>
        <tr>
            <td> <?=$row['name'];?></td>
            <td><?=$row['phone'];?></td>
            <td><?=$row['email'];?></td>
            <td><?=$row['address'];?></td>
            <td>Edit/Delete</td>
        </tr>
    <?php endwhile ?>
</table>

<br/>
	