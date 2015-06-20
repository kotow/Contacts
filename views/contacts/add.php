<script>
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<p><input type="text" name="custom[0][]" required/><input type="text" name="custom[1][]" required/><a href="#" class="remove_field">Remove</a></p>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
<form method="POST" id="add-phone-form" class="dialog-box">
    <h1>Add Contact</h1>
    <p>
        <label for="personName">Name:</label>
        <input type="text" id="personName" name="name" required />
    </p>
    <p>
        <label for="personName">Phone:</label>
        <input type="text" id="personName" name="phone" required />
    </p>
    <p>
        <label for="personName">Email:</label>
        <input type="email" id="personName" name="email" required />
    </p>
    <p>
        <label for="personName">Address:</label>
        <input type="text" id="personName" name="address" required />
    </p>
    <div class="input_fields_wrap">
        <button class="add_field_button">Add More Fields</button>
    </div>
    <p class="buttons">
        <input type="submit" class="button" value="Add" />
        <a href="/category/">Cancel</a>
    </p>
</form>

<br/>
