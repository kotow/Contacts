<form method="POST" action="/user/register" class="dialog-box">
    <h1>Register</h1>
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" required />
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" required />
    </p>
    <p>
        <label for="passwordConf">Confirm Password:</label>
        <input type="password" name="passwordConf" required />
    </p>
    <p class="buttons">
        <input type="submit" class="button" value="Register">
        <a href="/home/login" class="link">Login</a>
    </p>
</form>
<?=$error;?>
<br/>
