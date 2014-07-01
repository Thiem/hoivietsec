<div class="body_right">
    <div id="notice-sidebar">
        <div id="title-notice-s"><span><a href="NoticePage.php">Thông báo</a></span></div>
        <div id="content-notice-s">
            <div id="title-cont-s">
                <?php
                $useNotice = new Class_ClassTableNotice();
                $useNotice->numberNotice = 1;
                $array = $useNotice->SelectNumberNotice();
                foreach($array as $arrayItem){
                ?>
                <a href="#"><?php echo $arrayItem->no_title;?></a></div>
            <?php } ?>
        </div>
    </div>
    <div id="video_2">
        <div align="center" style="z-index:0" id="container1">
<!--            <embed width="260" height="220" allowfullscreen="true"-->
<!--                   flashvars="file=/files/uploads/videos/QUOCCA_SEC_x264.mp4&amp;image=/files/uploads/videos/02.11.12-s1.jpg&amp;backcolor=0x000000&amp;frontcolor=0xCCCCCC&amp;lightcolor=0x557722&amp;shuffle=false&amp;autostart=false&amp;repeat=list&amp;plugins=embed-1&amp;embed.code="-->
<!--                   quality="high" bgcolor="#FFFFFF" name="ply" id="ply" style="undefined" src="/player.swf"-->
<!--                   type="application/x-shockwave-flash">-->
            <div>
                <iframe width="260" height="220" src="//www.youtube.com/embed/Fx3wFI-usmU" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <p style="margin:8px;"><b>Quốc ca CH Séc</b></p>

        <div style="margin-left:8px; margin-bottom:5px;padding: 0;" class="video_others_content">
            <ul>
                <li><a onclick="video_2(13); return false;" href="#" id="video_2">
                        Ten kdo ma te rad Lucie Vondrackova</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="links">
        <select onchange="window.location=this.value" style="width:220px;margin:10px;margin-left:30px">
            <option value="">---Liên kết website---</option>
            <?php $useLink = new Class_ClassTableLink();
            $link = $useLink->SelectNumberLink();
            foreach ($link as $linkItem) {
                ?>
                <option value="<?php echo $linkItem->li_link; ?>"><?php echo $linkItem->li_name; ?></option>
            <?php } ?>
        </select>

        <div style="border-bottom:#CCC 1px dotted;">
            <p>Số lượt truy cập:
                <?php $useView = new Class_ClassTableView();
                $view = $useView->SelectView();
//                echo "<pre>";
//                print_r($view);
                $viewOld = 0;
                foreach($view as $viewItem){
                    $viewOld = $viewItem->vi_views;
                }
                $useView->views =  $viewOld + 1;
                $useView->Update();
                foreach($view as $viewItem){
//                echo $viewOld.die;
                ?>
                <span id="luongtruycap"><?php echo $viewItem->vi_views;?><span><?php } ?>
                </span></span></p>
        </div>
        <br>
    </div>
    <div id="advertising">
        <?php
            $useAdvert = new Class_ClassTableAdvert();
            $useAdvert->numberAdvert = 20;
            $advert = $useAdvert->SelectNumberAdvert();
        foreach ($advert as $advertItem) {
        ?>
        <a target="_blank" href="<?php echo $advertItem->ad_link;?>" title="<?php echo $advertItem->ad_name;?>">
            <img src="Admin/Image/<?php echo $advertItem->ad_image;?>">
        </a>
        <?php } ?>
    </div>
</div>
<div style="clear: both;"></div>