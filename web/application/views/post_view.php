<div class="post">
	<div class="postName">
		<div class="editLink"><a href="/edit/<?=$data['post']['id']?>">Редактировать</a></div>
		<?=$data['post']['date']?>: <?=$data['post']['name']?>
	</div>
	<div class="postContent"><?=$data['post']['content']?></div>
</div>
<!--
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
-->