<h2><?=$data['message']?></h2>
<p>
<form action="/category/add" method="post" class="formAdd">
	<p>Введите название категории<br>
		<input type="text" name="name" value="<?=$data['name']?>">
	</p>
	<p><input type="submit" class="button"></p>
</form>
</p>	