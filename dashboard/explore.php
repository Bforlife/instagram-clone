<?php require 'phpHeaderFiles.php'; ?>
<div class="newExplore">
<div class="exploreNav">
    <?php require '../includes/nav.php' ?>
</div>

<div class="mainExplore">
<div class="explore-pattern">
    <?php 
    foreach($posts as $row) { 
    ?>
        <a href="index.php?p=<?php echo $row->id; ?>" style="text-decoration:none;">
            <div class="card <?php echo $cardClass; ?>">
                <img src="<?php echo $row->image_url; ?>">
                <div class="overlay">
                    <span><i class="fa-solid fa-heart"></i> <?php echo $commentObj->countLike($row->id); ?></span>
                    <?php $count = $commentObj->getTotalComments($row->id); ?>
                    <span><i class="fa-solid fa-comment"></i> <?php echo $count; ?></span>
                </div>
            </div>
        </a>
    <?php 
    } 
    ?>
</div>
</div>
</div>
</body>
</html>
