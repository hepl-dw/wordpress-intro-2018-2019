<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ceci est mon titre</title>
  <style type="text/css">
    body {
      font-family: sans-serif;
    }
    .archive {
      margin: 2em auto;
    }
    .post {
      border: 1px solid #000;
      padding: 1em 2em;
      position: relative;
    }
    .post + .post {
      margin-top: 1em;
    }
    .post__body {
      margin-left: 320px;
      min-height: 200px;
    }
    .post__thumb {
      width: 300px;
      height: 200px;
      position: absolute;
      top: 0;
      left: 0;
    }
    .post__noimg {
      width: 100%;
      height: 100%;
      background: #dddddd;
      position: relative;
    }
    .post__noimg:before {
      content: ':-(';
      display: block;
      height: 1em;
      width: 100%;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      text-align: center;
    }

    .article {
      margin: 2em 0;
      position: relative;
    }
    .article__head {
      padding: 5em 0;
      text-align: center;
      color: #fff;
      background-size: cover;
      background-position: center center;
    }
    .article__title {
      font-size: 3em;
    }
  </style>
</head>
<body>
  <header class="top">
    <h1 class="top__logo">Mon site</h1>


    <nav class="top__nav nav">
      <h2 class="nav__title">Ma navigation</h2>
      <ul classs="nav__container">
        <?php foreach(dw_getMenu('main') as $item): ?>
          <li class="nav__item">
            <a href="<?= $item->url; ?>" class="nav__link"><?= $item->label; ?></a>
            <?php if($item->children): ?>
              <ul class="nav__sub">
                <?php foreach($item->children as $child): ?>
                  <li class="nav__item">
                    <a href="<?= $child->url; ?>" class="nav__link"><?= $child->label; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

  </header>