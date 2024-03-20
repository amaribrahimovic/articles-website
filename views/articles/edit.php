<div class="container">
    <h3>Uredi novico</h3>
    <form action="/articles/update" method="post">
        <input type="hidden" name="id" value="<?php echo $article->id; ?>">
        <label for="title">Naslov:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $article->title; ?>"><br>
        <label for="abstract">Povzetek:</label><br>
        <input type="text" id="abstract" name="abstract" value="<?php echo $article->abstract; ?>"><br>
        <label for="text">Tekst:</label><br>
        <textarea id="text" name="text"><?php echo $article->text; ?></textarea><br><br>
        <input type="submit" value="Shrani spremembe">
    </form>
</div>
