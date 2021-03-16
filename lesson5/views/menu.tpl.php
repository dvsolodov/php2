<ul>
    <?php foreach ($menu as $item): ?>
    <ul>
        <a class="<?= $menuActive == $item['link'] ? 'active' : ''; ?>" href="/<?= $item['link']; ?>">
            <?= $item['name']; ?>
        </a>
    </ul>
    <?php endforeach; ?>
</ul>
