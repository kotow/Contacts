<form method="POST" id="add-phone-form" class="dialog-box">
    <h1>Edit Group</h1>
    <p>
        <label for="personName">Name:</label>
        <input type="text" id="person" value="<?=$cat['name']?>" name="name" />
    </p>
    <p>
        <label for="personName">Phone:</label>
        <input type="text" id="personName" value="<?=$cat['phone']?>" name="phone" required />
    </p>
    <p>
        <label for="personName">Email:</label>
        <input type="email" id="personName" value="<?=$cat['email']?>" name="email" required />
    </p>
    <p>
        <label for="personName">Address:</label>
        <input type="text" id="personName" value="<?=$cat['address']?>" name="address" required />
    </p>
    <p class="buttons">
        <input type="submit" class="button" value="Edit" />
        <a href="/category/">Cancel</a>
    </p>
</form>

<br/>