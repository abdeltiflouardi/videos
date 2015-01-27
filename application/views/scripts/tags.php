<div class="tags">
    <?php foreach($this->getTags() as $tag): ?>
    <a href="<?php echo $this->url(array('q'=>$tag) , 'tags'); ?>" title="<?php echo $tag; ?>"><?php echo $tag; ?></a>
    <?php endforeach; ?>
</div>