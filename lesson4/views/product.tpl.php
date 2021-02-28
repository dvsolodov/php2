<section>
    <img src="/assets/images/products/big/<?= $product['img']; ?>" width="400">
    <h2><?= $product['name']; ?></h2>
    <p><?= $product['description']; ?></p>
    <p>Цена: <?= $product['price']; ?></p>
    <button>В корзину</button>
</section>

<section>
    <h3>Оставить отзыв о товаре</h3>

    <?php if (isset($_SESSION['commentMsg'])): ?>
    <p><?= $_SESSION['commentMsg']; ?></p>
    <?php unset($_SESSION['commentMsg']); ?>
    <?php endif; ?>

    <form action="/comments/<?= $formAction; ?>" method="POST">
        <p>
            <span>Ваше имя: </span>
            <input type="text" name="name">
            <span>Количество символов от <?= MIN_NAME; ?> до <?= MAX_NAME; ?></span>
        </p>
        <p>
            <span>Ваш отзыв: </span>
            <textarea name="text" cols="30" rows="10"></textarea>
            <span>Количество символов от <?= MIN_COMMENT; ?> до <?= MAX_COMMENT; ?></span>
        </p>
        <input type="hidden" name="productId" value="<?= $product['id']; ?>">
        <input type="submit" name="comment" value="<?= $buttonName; ?>">
    </form>
</section>

<section>
    <h3>Отзывы</h3>
<?php foreach ($comments as $comment): ?>
    <p>
        <span><?= date("Y-M-d H:i:s", $comment['comment_date']); ?></span>
        <span><?= $comment['user_name']; ?></span>
        <span><?= $comment['text']; ?></span>
    </p>
<?php endforeach; ?>
</section>    
    
