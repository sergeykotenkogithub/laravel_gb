<div>
    <h1>Категории:</h1>
    <?php foreach ($categories as $category): ?>
       <h2><a href="<?=route('news.item', ['item' => $category])?>"><?=$category?></a></h2>
    <?php endforeach; ?>
</div>

