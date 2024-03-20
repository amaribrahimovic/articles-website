<div class="container">
    <h3>Objavi novico</h3>
    <form action="/articles/store" method="post">
        <label for="title">Naslov:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="abstract">Povzetek:</label><br>
        <input type="text" id="abstract" name="abstract"></input type="text"><br>
        <label for="text">Tekst:</label><br>
        <textarea id="text" name="text"></textarea><br><br>
        <input type="submit" value="Objavi">
    </form>
</div>