<h2><?=$data['message']?></h2>
<form action="/edit/<?=$data['post']['id']?>" method="post" class="formEdit">
	<p>Введите название<br>
		<input type="text" name="name" value="<?=$data['post']['name']?>">
	</p>
	<p>Введите дату<br>
		<input type="text" name="date" value="<?=$data['post']['date']?>">
	</p>
	<p>	
		Введите текст<br>
		<textarea rows="8" name="text"><?=$data['post']['content']?></textarea>
	</p>
	<p><input type="submit" class="button" autofocus></p>
</form>