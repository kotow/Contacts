<table id="phones">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php foreach($contacts as $contact):?>
        <tr>
            <td> <?=$contact[1];?></td>
            <td><?=$contact[2];?></td>
            <td><?=$contact[3];?></td>
            <td><?=$contact[4];?></td>
            <td>Edit/Delete/Add to group</td>
        </tr>
    <?php endforeach ?>
</table>
<p><a href="/category/add" class="button">Add New Contact</a></p>

<br/>
	