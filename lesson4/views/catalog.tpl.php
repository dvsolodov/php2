<h2>Каталог</h2>
<?php if (!empty($products)): ?>
    <?php foreach ($products as $product): ?>
    <section>
        <img src="/assets/images/products/small/<?= $product['img']; ?>">
        <h3><a href="/products/<?= $product['id']; ?>"><?= $product['name']; ?></a></h3>
        <p>Цена: <?= $product['price']; ?></p>
        <button>В корзину</button>
    </section>
    <?php endforeach; ?> 
    <button data-start="<?= $startId; ?>">Еще</button>
<?php else: ?>
<p>Каталог пуст.</p>
<?php endif; ?>

<script src="/assets/scripts/addProductToPage.js"></script>
