<form method="POST" id="add-phone-form" class="dialog-box">
    <h1>Edit Group</h1>
    <p>
        <label for="personName">Name:</label>
        <input type="text" id="person" value="<?=$cat['name']?>" name="name" disabled />
    </p>
    <p class="buttons">
        <input type="submit" class="button" value="Delete" name="delete" />
        <a href="/category/">Cancel</a>
    </p>
</form>

<br/>