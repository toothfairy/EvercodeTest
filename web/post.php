<?php
require_once "/tmpl/functions.php";

$conf = new conf;
$base = $conf->connect();

$tmpl = new templates;

$id = isset($_GET['id']) ? $_GET['id'] : 'NULL';

if ($id != 'NULL')
{
	$sql = 'SELECT id, name, content, date FROM posts WHERE id=:id';
	$sql = $base -> prepare($sql);
	$sql -> bindParam (':id',$id,PDO::PARAM_INT);
	$sql -> execute();
	$post = $sql -> fetch();
	
	if ($post)
	{
		$tmpl->printHeader($post['name']);

				?>
				<div class="post">
					<div class="postName">
						<div class="editLink"><a href="/edit/<?=$post['id']?>">Редактировать</a></div>
						<?=$post['date']?>: <?=$post['name']?>
					</div>
					<div class="postContent"><?=$post['content']?></div>
				</div>

		<div class="comments">
			<div id="disqus_thread"></div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				var disqus_shortname = 'evercodetest'; // required: replace example with your forum shortname

				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
					var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
					dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
		</div>
		<?php
	}
	else
	{
		$tmpl->printHeader("404: Запись не найдена");
		echo "<p><strong>404 Ошибка!<br>Запись не найдена</strong></p>";
	}	
}
else
{
	$tmpl->printHeader("Ошибка");
	echo "<p><strong>Ошибка!<br>Что-то пошло не так и поломалось</strong></p>";
}

$tmpl->printFooter();
?>