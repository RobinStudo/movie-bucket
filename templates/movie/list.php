<h1>Liste des films</h1>

<section>
    <?php foreach ($data['movies'] as $movie) { ?>
        <article>
            <h2><?php echo $movie['title']; ?></h2>
            <p><?php echo $movie['description']; ?></p>
            <span>
                <?php echo $movie['released_at']; ?>
            </span>
        </article>
    <?php } ?>
</section>
