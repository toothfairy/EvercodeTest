<?php
require_once "/tmpl/functions.php";

$base = Connect();

$id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
	
PrintHeader("Главная страница");

$sql = 'SELECT id, name, content, date FROM posts WHERE id='.$id;
foreach ($base -> query($sql) as $row) {
        ?>
		<div class="post">
			<div class="postName"><?=$row['date']?>: <a href="/post.php?id=<?=$row['id']?>"><?=$row['name']?></a></div>
			<div class="postContent"><?=$row['content']?></div>
		</div>
		<?php
    }
	
?>
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
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>    
</div>
<?php
PrintFooter();
?>