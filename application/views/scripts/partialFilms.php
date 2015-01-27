    <ul class="item">
        <?php  ?>
        <li><a href="<?php echo $this->url;?>"><?php echo $this->getShortTitle($this->escape($this->nom_film));?></a></li>
        <li><a href="<?php echo $this->url;?>"><img src="<?php echo $this->getImg($this->img);?>" title="<?php echo $this->escape($this->nom_film);?>" alt="<?php echo $this->escape($this->nom_film);?>" /></a></li>
    </ul>