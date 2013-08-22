<h2><?=$data['message']?></h2>
<p>
<form action="/add" method="post" class="formAdd">
	<p>Введите название<br>
		<input type="text" name="name" value="<?=$data['name']?>">
	</p>
	<p>Выберите категорию<br>
		<select name="category">
			<?php 
			foreach ($data['categories'] as $cat) {
			?>
			<option value="<?=$cat['id']?>"><?=$cat['name']?></option>
			<?php 
			}
			?>			
		</select>
	</p>
	<p>	
		Введите текст<br>
		<textarea rows="8" name="text"><?=$data['text']?></textarea>
	</p>
	<p><input type="submit" class="button"></p>
</form>
</p>	