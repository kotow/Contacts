<divid="add-phone-form" class="dialog-box">
    <h1>Confirm Delete Contact</h1>
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
    <p class="buttons">
        <input type="submit" class="button" value="Delete" name="delete" />
        <a href="/contact/">Cancel</a>
    </p>
</div>

<br/>