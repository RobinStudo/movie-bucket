<h1>Liste des films</h1>

<ul>
    <?php foreach ($data['movies'] as $movie) { ?>
        <li><?php echo $movie; ?></li>
    <?php } ?>
</ul>
