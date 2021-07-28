        <h2 class="h3 text-dark mb-4">読書ログの登録</h2>
        <form action="create.php" method="post">
            <?php if (count($errors)) : ?>
                <ul class="text-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <div class="form-group">
                <label for="title">書籍名</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo $review['title'] ?>">
            </div>
            <div class="form-group">
                <label for="author">著者名</label>
                <input type="text" name="author" class="form-control" id="author" value="<?php echo $review['author'] ?>">
            </div>
            <div>
                <label>読書状況</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status1" value="未読" <?php echo ($review['status'] === '未読') ? 'checked' : ''; ?>>
                        <label for="status1">未読</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status2" value="読書中" <?php echo ($review['status'] === '読書中') ? 'checked' : ''; ?>>
                        <label for="status2">読書中</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="status3" value="読了" <?php echo ($review['status'] === '読了') ? 'checked' : ''; ?>>
                        <label for="status3">読了</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="evaluation">評価（5点満点の整数）
                </label>
                <input type="number" name="evaluation" class="form-control" id="evaluation" value="<?php echo $review['evaluation'] ?>">
            </div>
            <div class="form-group"> <label for="impression">感想</label>
                <textarea type="text" name="impression" class="form-control" rows="10" id="impression"><?php echo $review['impression'] ?></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">登録する</button>
            </div>

        </form>
