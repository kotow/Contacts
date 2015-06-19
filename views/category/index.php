<table id="phones">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
<?php foreach($contacts as $contact):?>
    <tr>
        <td><a href="/category/get/<?=$contact[0];?>"> <?=$contact[1];?></a></td>
        <td><a href="/category/edit/<?=$contact[0];?>">Edit</a> / <a href="/category/delete/<?=$contact[0];?>">Delete</a></td>
    </tr>
    <?php endforeach ?>
</table>
<p><a href="/category/add" class="button">Add Group</a></p>

<br/>
	