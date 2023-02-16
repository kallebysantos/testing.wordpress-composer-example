<h1>Welcome!</h1>

<h2>Authors</h2>
<ul>
  <?php foreach ($authors as $author) : ?>
    <li>
      <?= $this->e($author['name']) ?>
    </li>
  <?php endforeach ?>
</ul>