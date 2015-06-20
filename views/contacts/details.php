<div id="add-phone-form" class="dialog-box">
    <h1>Contact Details</h1>
    <p>
        <label for="personName">Name:</label>
        <input type="text" id="person" value="<?=htmlspecialchars($cat['name']);?>" name="name" disabled />
    </p>
    <p>
        <label for="personName">Phone:</label>
        <input type="text" id="personName" name="phone"  value="<?=htmlspecialchars($cat['phone']);?>" disabled />
    </p>
    <p>
        <label for="personName">Email:</label>
        <input type="email" id="personName" name="email" value="<?=htmlspecialchars($cat['email']);?>" disabled />
    </p>
    <p>
        <label for="personName">Address:</label>
        <input type="text" id="personName" name="address" value="<?=htmlspecialchars($cat['address']);?>" disabled />
    </p>
    <?php while($field = $fields->fetch_assoc()):?>
    <p>
        <label for="personName"><?=htmlspecialchars($field['field']);?>:</label>
        <input type="text" id="personName" name="address" value="<?=htmlspecialchars($field['value']);?>" disabled />
    </p>
    <?php endwhile;?>
    <p>
    <label for="personName">Groups:</label>
    <?php while($group = $groups->fetch_assoc()):?>
        <input type="text" id="personName" name="address" value="<?=htmlspecialchars($group['name']);?>" disabled />
    <?php endwhile;?>
    </p>
    <form method="POST" action="/contact/addTo/<?=$cat['id'];?>">
    <p>
        <label for="personName">Add Contact To Group:</label>
        <select name="group">
            <?php
            while($group = $availableGroups->fetch_assoc()):?>
            <option value="<?=$group['id'];?>"><?=htmlspecialchars($group['name']);?></option>
        <?php endwhile;?>
        </select>
        <input type="submit">
    </p>
</form>
</div>

<br/>