<form method="POST" id="add-phone-form" class="dialog-box">
    <h1>Edit Group</h1>
    <p>
        <label for="personName">Name:</label>
        <input type="text" id="person" value="<?=$cat['name']?>" name="name" disabled />
    </p>
    <p>
        <label for="personName">Phone:</label>
        <input type="text" id="personName" name="phone"  value="<?=$cat['name']?>" disabled />
    </p>
    <p>
        <label for="personName">Email:</label>
        <input type="email" id="personName" name="email" value="<?=$cat['name']?>" disabled />
    </p>
    <p>
        <label for="personName">Address:</label>
        <input type="text" id="personName" name="address" value="<?=$cat['name']?>" disabled />
    </p>
    <p class="buttons">
        <input type="submit" class="button" value="Delete" name="delete" />
        <a href="/contact/">Cancel</a>
    </p>
</form>

<br/>