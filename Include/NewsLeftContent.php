<div class="body_left">
    <div id="breadcrumb"><span class="breadcrumb-home"><a href="/">Trang chủ</a></span>››
        <a href="">Tin tức</a>
    </div>
    <div class="content">
        <?php $useCatalog = new Class_ClassTableCatalog();
        $catalog = $useCatalog->SelectCatalogName();
        foreach ($catalog as $catalogItem) {
            ?>
        <div class="itemcat">
            <h3><a href="/news/catenews/1/hoat-dong-cua-hoi.html"><?php echo $catalogItem->ca_name;?></a>            </h3>
            <div class="cathomecontent">
                <div class="itemtright">
                    <?php $use2 = new Class_ClassTableNews();
                    $use2->numberNews =1;
                    $use2->catalogId = $catalogItem->ca_id;
                    $newsFocus = $use2->SelectNewCatalog();
                    foreach ($newsFocus as $newsFocusItem) {
                    ?>
                    <h4 style="padding-top:0;">
                        <a href="NewsDetailed.php?id=<?php echo $newsFocusItem->ne_id;?>"><?php echo $newsFocusItem->ne_title;?></a></h4>
                    <p style="margin-bottom: 5px;color: #585858;"><?php echo $newsFocusItem->ne_destion;?></p>
                    <img border="0" src="Admin/Image/<?php $newsFocusItem->ne_image;?>">
                    <?php } ?>
                </div>
                <div class="itemleft">
                    <h4><a href="/news/view/2755/trao-tang-dai-su-cong-hoa-sec-tai-viet-nam-martin-klepetko-hai-tap-dai-tu-dien-giao-khoa-sec-viet.html">Trao tặng Đại sứ Cộng hòa Séc tại Việt Nam Martin Klepetko hai tập Đại từ điển giáo khoa Séc-Việt </a></h4>
                    <div class="fi-content">
                        <img width="80" height="60" border="0" src="/files/uploads/news/22.05.14-s1b.JPG.jpg">
                        <p>Chiều tối ngày 21.5.2014, tại số 5 Đặng Thái Thân - Hà Nội, lãnh đạo Hội
                            hữu nghị Việt Nam-Séc đã tiếp ngài Martin Klepetko, Đại sứ Cộng hòa Séc
                            tại Việt Nam và ngài Trương Mạnh Sơn, Đại sứ...								</p>
                    </div>
                    <ul style=" padding-right: 5px;">
                        <?php $use2->numberNews = 5;
                        $use2->catalogId = $catalogItem->ca_id;
                        $newLink = $use2->SelectNewCatalog();
                        foreach($newLink as $newLinkItem){
                        ?>
                        <li>
                            <a href="NewsDetailed.php?id=<?php echo $newLinkItem->ne_id;?>"><?php echo $newLinkItem->ne_title;?></a><span>(<?php echo $newLinkItem->ne_date;?>)</span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>

</div>