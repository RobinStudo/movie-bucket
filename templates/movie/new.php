<h1>Créer un film</h1>

<form method="post">
    <?php if (!empty($data['errors'])) { ?>
        <ul>
            <?php foreach ($data['errors'] as $error) { ?>
                <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>
    <?php } ?>


    <div>
        <label>
            Titre du film
            <input type="text" name="title">
        </label>
    </div>

    <div>
        <label>
            Résumé
            <textarea name="description"></textarea>
        </label>
    </div>

    <div>
        <label>
            Date de sortie
            <input type="date" name="released_at">
        </label>
    </div>

    <button>Enregistrer</button>
</form>
