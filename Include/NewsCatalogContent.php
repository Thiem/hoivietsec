<div class="body_left">
    <?php $useCatalog = new Class_ClassTableCatalog();
        $useCatalog->id = $_REQUEST['ca_id'];
         $catalog = $useCatalog->SelectId();
        foreach ($catalog as $catalogItem) {
    ?>
    <div id="breadcrumb"><span class="breadcrumb-home"><a href="index.php">Trang chủ</a> <!--&rsaquo;&rsaquo; --> ›› <a href=""><?php echo $catalogItem->ca_name;?></a></span>
    </div>
    <div class="content">
        <div class="item-news-header">
            <?php $use2 = new Class_ClassTableNews();
            $use2->numberNews = 1;
            $use2->catalogId = $catalogItem->ca_id;
            $array = $use2->SelectNewCatalog();
            foreach($array as $arrayItem){
            ?>
            <a style="float:left; padding:15px;padding-left:0;" href="NewsDetailed.php?id=<?php echo $arrayItem->ne_id;?>">
                <img width="200" height="150" align="absmiddle" class="img_list" src="Admin/Image/<?php echo $arrayItem->ne_image;?>">
            </a>
            <div class="tieude">
                <a title="<?php echo $arrayItem->ne_id;?>" class="link_text_14_xanh_dam" href="NewsDetailed.php?id=<?php echo $arrayItem->ne_id;?>"><?php echo $arrayItem->ne_title;?></a></div>
            <div style="margin-bottom:5px; margin-top:3px;">(<?php echo $arrayItem->ne_date;?>)</div>
            <div class="text">
				<span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt"><?php echo $arrayItem->ne_destion;?></span>
            </div>
            <?php } ?>
            <div class="clr"></div>
        </div>
        <?php $use2->numberNews = 10;
        $use2->catalogId = $catalogItem->ca_id;
        $news = $use2->SelectNewCatalog();
        foreach($news as $newsItem){
        ?>
        <div class="item-news">
            <a style="float:left; padding:15px;padding-left:0;" href="NewsDetailed.php?id=<?php echo $newsItem->ne_id;?>">
                <img width="120" height="90" align="absmiddle" class="img_list" src="Admin/Image/<?php echo $newsItem->ne_image;?>">
            </a>
            <div class="tieude">
                <a title="<?php echo $newsItem->ne_title;?>" class="link_text_14_xanh_dam" href="NewsDetailed.php?id=<?php echo $newsItem->ne_id;?>"><?php echo $newsItem->ne_title;?></a></div>
            <div style="margin-bottom:3px; margin-top:1px;">
                (<?php echo $newsItem->ne_date;?>)
            </div>

            <div class="text">
				<span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt"><?php echo $newsItem->ne_destion;?></span></div>
            <div class="clr"></div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>