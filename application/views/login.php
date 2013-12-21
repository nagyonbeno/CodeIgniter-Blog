<h2>Login</h2>
<?php if($error==1){ ?>
<p>Your username / password did not match!</p>
<? } ?>
<form action="<?=base_url()?>users/login" method="post">
	<label for="nev">Név: </label>
	<input type="text" id="nev" name="nev">
	<label for="jelszo">Jelszó: </label>
	<input type="password" id="jelszo" name="jelszo">
	<label for="user_type">User type: </label>
	<select name="user type" id="user type">
		<option value="" selectted="selected">---</option>
		<option value="admin">Admin</option>
		<option value="author">Author</option>
		<option value="user">User</option>
	</select>
	<input type="submit" name="submit" id="submit" value="Login!">
</form>
<?= anchor('', 'Back to the posts', 'title="Back to the posts"'); ?>