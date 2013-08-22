<h2><?=$data['message']?></h2>
<form action="/edit/<?=$data['post']['id']?>" method="post" class="formEdit">
	<p>Введите название<br>
		<input type="text" name="name" value="<?=$data['post']['name']?>">
	</p>
	<p>Выберите категорию<br>
		<select name="category">
			<?php 
			foreach ($data['categories'] as $cat) {
				echo "<option value=\"".$cat['id']."\" ";
				if ($cat['id'] == $data['post']['category_id'])
					echo "selected ";
				echo ">".$cat['name']."</option>";
			}
			?>			
		</select>
	</p>
	<p>	
		Введите текст<br>
		<textarea rows="8" name="text"><?=$data['post']['content']?></textarea>
	</p>
	<p><input type="submit" class="button"></p>
</form>