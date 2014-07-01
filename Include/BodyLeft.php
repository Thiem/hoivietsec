<?php include_once("Class/ClassTableNews.php"); ?>
<div class="body_left">
<div id="lastest-new">
    <?php
    $use2 = new Class_ClassTableNews();
    $use2->numberNews = 1;
    $array = $use2->SelectNumberNews();
    //        echo "<pre>";
    //        print_r($array);die;
    foreach ($array as $arrayItem) {
        ?>
        <div id="main-lastest">
            <img width="370" src="Admin/Image/<?php echo $arrayItem->ne_image; ?>">

            <div class="main-title-lastest">
                <a href="NewsDetailed.php?id=<?php echo $arrayItem->ne_id;?>"><?php echo $arrayItem->ne_title; ?></a>
            </div>
            <div class="desc-lastest">
                <span><?php echo $arrayItem->ne_destion; ?></span>
            </div>
        </div>
    <?php } ?>
    <div id="feature-lastest">
        <div id="title-feature-lastest">
            <span><a>Tin nổi bật</a></span>
        </div>
        <ul id="ul-lastestnews">
            <?php
            $use2->numberNews = 6;
            $array = $use2->SelectNewsSpecial();
            foreach ($array as $arrayItem) {
                ?>
                <li>
                    <img alt="" src="Admin/Image/<?php echo $arrayItem->ne_image; ?>">
                    <a href="">
                        <?php echo $arrayItem->ne_title; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="crl"></div>
</div>
<div class="crl"></div>
<div class="adv-cent" align="center"></div>
<div class="new-tab-block">
<?php
$useCatalog = new Class_ClassTableCatalog();
$catalog = $useCatalog->SelectCatalogName();
foreach ($catalog as $catalogItem) {
    ?>
    <div class="vs_blocks">
        <div class="vs_title">
            <a href="NewsCatalogPage.php?ca_id=<?php echo $catalogItem->ca_id;?>"><span><?php echo $catalogItem->ca_name; ?></span></a>
        </div>
        <?php $use2->numberNews = 1;
        $use2->catalogId = $catalogItem->ca_id;
        $array = $use2->SelectNewCatalog();
        foreach ($array as $arrayItem){
        ?>
        <div class="vs_content_block">
            <img width="100" height="80" src="Admin/Image/<?php echo $arrayItem->ne_image; ?>">

            <div class="vs_title_content">
                <a href="NewsDetailed.php?id=<?php echo $arrayItem->ne_id; ?>"><?php echo $arrayItem->ne_title; ?></a>
            </div>
            <span><?php echo $arrayItem->ne_destion; ?></span>
            <?php } ?>
            <div class="crl"></div>
            <ul class="vs_others_content">
                <?php $use2->numberNews = 3;
                $use2->catalogId = $catalogItem->ca_id;
                $array = $use2->SelectNewCatalog();
                if($array != null){
                foreach ($array as $arrayItem) {
                    ?>
                    <li>
                        <a href="NewsDetailed.php?id=<?php echo $arrayItem->ne_id; ?>"><?php echo $arrayItem->ne_title; ?></a>
                    </li>
                <?php }
                }
                ?>
            </ul>
        </div>
    </div>
<?php } ?>
<div class="clr"></div>
<!--<div class="vs_blocks_bottom vs_gallerys">-->
<!--    <div class="vs_title">-->
<!--        <a href="#gal-1"><span>Thư viện ảnh</span></a>-->
<!--    </div>-->
<!--    <div style="background-color: #FFFFFF;" id="gall-1">-->
<!--        <div class=" jcarousel-skin-tango">-->
<!--            <div class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">-->
<!--                <div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;">-->
<!--                    <ul class="jcarousel-list jcarousel-list-horizontal" id="mycarousel"-->
<!--                        style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: -2687.79px; width: 4068px;">-->
<!--                        <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal"-->
<!--                            style="float: left; list-style: none outside none;" jcarouselindex="1">-->
<!--                            <a href="/galleries/view/1">-->
<!--                                <img width="100" height="80" title=""-->
<!--                                     src="/img.php?f=files/uploads/images/night_thumb.jpg&amp;w=100&amp;h=80">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="jcarousel-prev jcarousel-prev-horizontal" style="display: block;"></div>-->
<!--                <div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="clr"></div>-->
<!--    </div>-->
<!--</div>-->
</div>
</div>