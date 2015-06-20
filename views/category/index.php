<table id="phones">
    <tr>
        <th>Name</th>
        <th>Action</th>
    </tr>
<?php while($row = $contacts->fetch_assoc()):?>
    <tr>
        <td><a href="/category/get/<?=$row['id'];?>"> <?=htmlspecialchars($row['name']);?></a></td>
        <td><a href="/category/edit/<?=$row['id'];?>">Edit</a> / <a href="/category/delete/<?=$row['id'];?>">Delete</a></td>
    </tr>
    <?php endwhile ?>
</table>
<p><a href="/category/add" class="button">Add Group</a></p>

<br/>
	