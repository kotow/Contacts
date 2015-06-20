<h1><?=$group?></h1>
<?php
if($contacts->num_rows == 0){
    echo "No Contacts";
    return;
}
?>
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
            <td> <?=htmlspecialchars($row['name']);?></td>
            <td><?=htmlspecialchars($row['phone']);?></td>
            <td><?=htmlspecialchars($row['email']);?></td>
            <td><?=htmlspecialchars($row['address']);?></td>
            <td>Edit/Delete</td>
        </tr>
    <?php endwhile ?>
</table>

<br/>
	