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

    <div class="share">
        <h2 class="share__title">Partagez votre recette !</h2>
        <form action="#" method="POST" class="share__form">
            <fieldset class="share__fields">
                <input type="hidden" name="dw_recipe_token" value="<?= dw_get_recipe_form_token() ?>">
                <div class="share__field">
                    <label for="recipe_title" class="share__label">Titre de la recette</label>
                    <input type="text" name="recipe_title" id="recipe_title">
                </div>
                <div class="share__field">
                    <label for="recipe_time" class="share__label">Temps nécessaire</label>
                    <input type="text" name="recipe_time" id="recipe_time">
                </div>
                <div class="share__field">
                    <label for="recipe_ingredients" class="share__label">Ingrédients</label>
                    <textarea name="recipe_ingredients" id="recipe_ingredients" cols="30" rows="10"></textarea>
                </div>
                <div class="share__field">
                    <label for="recipe_guide" class="share__label">Mode opératoire</label>
                    <textarea name="recipe_guide" id="recipe_guide" cols="30" rows="10"></textarea>
                </div>
            </fieldset>
            <fieldset class="share__end">
                <p class="share__info">Prêt à envoyer au four? Allé, hop, c'est parti!</p>
                <button type="submit" class="share__submit">Envoyer ma recette</button>
            </fieldset>
        </form>
    </div>

    <div class="contact">
        <h2 class="contact__title">Contactez-moi!</h2>
        <div class="contact__form">
            <?= apply_filters('the_content', '[contact-form-7 id="30" title="Contact form 1"]'); ?>
        </div>
    </div>

    <p class="end__copyright">Ne copiez pas mon site svp.</p>
    <p class="end__signature">Moi</p>
</footer>
</body>
</html>