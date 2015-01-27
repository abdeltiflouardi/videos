<div id="leftMenu">
    <h2>Catégories</h2>
    <?php echo $this->getMenu($this);?>
    <div class="sep"></div>
    <h2>Rechercher</h2>
    <?php echo $this->searchForm;?>
    <div class="sep"></div>
    <h2>Menu</h2>
    <ul class="menu">
        <li><a href="/">Accueil</a></li>
        <li><a href="/">Contact</a></li>
    </ul>
    <div class="sep"></div>
    <?php if(PUB_SIDE_BAR === true): ?>
        <h2>Publicité</h2>
        <div id="sideBar">
            <script type="text/javascript"><!--
google_ad_client = "pub-5144241215926384";
/* sidebare_blog */
google_ad_slot = "0357249069";
google_ad_width = 200;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
        </div>
    <?php endif; ?>

</div>
