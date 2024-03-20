<?php
/*
    Controller za novice. Vključuje naslednje standardne akcije:
        index: izpiše vse novice
        show: izpiše posamezno novico
        
    TODO:
        list: izpiše novice prijavljenega uporabnika
        create: izpiše obrazec za vstavljanje novice
        store: vstavi novico v bazo
        edit: izpiše vmesnik za urejanje novice
        update: posodobi novico v bazi
        delete: izbriše novico iz baze
*/

class articles_controller
{
    public function index()
    {
        //s pomočjo statične metode modela, dobimo seznam vseh novic
        //$ads bo na voljo v pogledu za vse oglase index.php
        $articles = Article::all();

        //pogled bo oblikoval seznam vseh oglasov v html kodo
        require_once('views/articles/index.php');
    }

    public function show()
    {
        //preverimo, če je uporabnik podal informacijo, o oglasu, ki ga želi pogledati
        if (!isset($_GET['id'])) {
            return call('pages', 'error'); //če ne, kličemo akcijo napaka na kontrolerju stran
            //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
        }
        //drugače najdemo oglas in ga prikažemo
        $article = Article::find($_GET['id']);
        require_once('views/articles/show.php');
    }

    public function create(){
        require_once('views/articles/create.php');
    }

    public function store()
    {
        // Check if the form was submitted via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';

            // Validate form data (you may add more validation logic here)
            if (empty($title) || empty($content)) {
                // Handle validation errors (for example, redirect back to the form with an error message)
                // You may also want to display error messages on the form itself
                header('Location: /articles/create?error=empty_fields');
                exit;
            }

            // Create a new Article instance
            $article = new Article();
            $article->setTitle($title);
            $article->setContent($content);

            // Save the new article to the database
            $article->save();

            // Redirect the user to a relevant page
            header('Location: /articles/show?id=' . $article->getId());
            exit;
        } else {
            // If the form was not submitted via POST, redirect to the 'create' action
            header('Location: /articles/create');
            exit;
        }
    }
}