<div class="body_left">
    <div id="breadcrumb"><span class="breadcrumb-home">
	<a href="index.php">Trang chủ</a> ›› <a href="NoticePage.php">Thông báo</a></span>
    </div>
    <div class="content">
        <div class="item-news-header">
            <?php $use2 = new Class_ClassTableNotice();
            $use2->numberNotice = 1;
            $array = $use2->SelectNumberNotice();
            foreach($array as $arrayItem){
                ?>
                <a style="float:left; padding:15px;padding-left:0;" href="NoticeDetailed.php?id=<?php echo $arrayItem->no_id;?>">
                    <img width="200" height="150" align="absmiddle" class="img_list" src="Admin/Image/<?php echo $arrayItem->no_image;?>">
                </a>
                <div class="tieude">
                    <a title="<?php echo $arrayItem->no_title;?>" class="link_text_14_xanh_dam" href="NoticeDetailed.php?id=<?php echo $arrayItem->no_id;?>"><?php echo $arrayItem->no_title;?></a></div>
                <div style="margin-bottom:5px; margin-top:3px;">(<?php echo $arrayItem->no_date;?>)</div>
                <div class="text">
                    <span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt"><?php echo $arrayItem->no_destion;?></span>
                </div>
            <?php } ?>
            <div class="clr"></div>
        </div>
        <?php $use2->numberNotice = 10;
        $news = $use2->SelectNumberNotice();
        foreach($news as $newsItem){
            ?>
            <div class="item-news">
                <a style="float:left; padding:15px;padding-left:0;" href="NoticeDetailed.php?id=<?php echo $newsItem->no_id;?>">
                    <img width="120" height="90" align="absmiddle" class="img_list" src="Admin/Image/<?php echo $newsItem->no_image;?>">
                </a>
                <div class="tieude">
                    <a title="<?php echo $newsItem->ne_title;?>" class="link_text_14_xanh_dam" href="NoticeDetailed.php?id=<?php echo $newsItem->no_id;?>"><?php echo $newsItem->no_title;?></a></div>
                <div style="margin-bottom:3px; margin-top:1px;">
                    (<?php echo $newsItem->no_date;?>)
                </div>

                <div class="text">
                    <span style="FONT-FAMILY: Arial; FONT-SIZE: 10pt"><?php echo $newsItem->no_destion;?></span></div>
                <div class="clr"></div>
            </div>
        <?php } ?>
    </div>
</div>