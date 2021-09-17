<div>
    <h1>Категории:</h1>
    <?php foreach ($categories as $category): ?>
       <h2><a href="<?=route('news.item', ['item' => $category])?>"><?=$category?></a></h2>
    <?php endforeach; ?>
    <br>
    <h2><a href="<?=route('news')?>"> Все новости </a></h2>
</div>

