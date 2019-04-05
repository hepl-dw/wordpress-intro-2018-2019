<footer class="end">
    <ul class="nav">
        <?php foreach(dw_getMenu('footer') as $item): ?>
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
    <p class="end__copyright">Ne copiez pas mon site svp.</p>
    <p class="end__signature">Moi</p>
</footer>
</body>
</html>