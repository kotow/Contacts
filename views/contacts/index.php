<?php if($contacts->num_rows == 0){
echo "No Contacts";
} else {
?>
<table id="phones">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php while($contact = $contacts->fetch_assoc()):?>
        <tr>
            <td> <a href="/contact/edit/<?=$contact['id'];?>"> <?=htmlspecialchars($contact['name']);?></a></td>
            <td><?=htmlspecialchars($contact['phone']);?></td>
            <td><?=htmlspecialchars($contact['email']);?></td>
            <td><?=htmlspecialchars($contact['address']);?></td>
            <td>
                <a href="/contact/edit/<?=$contact['id'];?>"> Edit</a> /
                <a href="/contact/delete/<?=$contact['id'];?>"> Delete</a> /
                <a href="/contact/details/<?=$contact['id'];?>"> Details</a>
            </td>
        </tr>
    <?php endwhile ?>
</table>
<?php }?>
<p><a href="/contact/add" class="button">Add New Contact</a></p>

<br/>
	