<a href="new.php" class="btn btn-primary mb-4">読書ログを登録する</a>

<main>
    <?php if (count($reviews) > 0) : ?>
        <?php foreach ($reviews as $review) : ?>
            <section class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2 class="card-title h4 mb-5"><?php echo escape($review['title']); ?></h2>
                    <div><?php echo escape($review['author']); ?>&nbsp;/&nbsp;<?php echo escape($review['status']); ?>&nbsp;/&nbsp;<?php echo escape($review['evaluation']); ?></div>
                    <p>
                        <?php echo escape($review['impression']); ?>
                    </p>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else : ?>
        <p>読書ログが登録されていません。</p>
    <?php endif; ?>

</main>
