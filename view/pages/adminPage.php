<section id="adminPannel">
	<article id="WrittingChap">

		<h2><span class="maj">é</span>crire un nouveau chapitre:</h2>

			<form id="getNewChapter" action="./index.php?action=postChap" method="post">
					
				<label>Titre:<input type="text" name="title" id="title" value="" required/></label>
					
				<textarea class="tinymce" name="tinymce_Chap"></textarea>
					
				<input type="submit" id="send" value="Publier" />
			</form>
		</article>

		

</section>

</body>
</html>