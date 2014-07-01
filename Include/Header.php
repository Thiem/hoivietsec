<meta content="text/html" charset="utf-8">
<script type="text/javascript" src="Js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="Js/jquery-ui-1.10.4.custom.js"></script>
<script type="text/javascript" src="Js/jquery.easing.min.js"></script>
<script type="text/javascript" src="Js/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="Js/Main.js"></script>
<?php include_once("Class/ClassConnectDatabase.php");
include_once("Class/ClassTableNews.php");
include_once("Class/ClassTableCatalog.php");
include_once("Class/ClassTableNotice.php");
include_once("Class/ClassTableAdvert.php");
include_once("Class/ClassTableLink.php");
include_once("Class/ClassTableView.php");
$use1 = new Class_ConnectDatabase();?>
<link rel="stylesheet" href="Css/style.css">
<div class="banner">
</div>
<div class="main_menu">
    <ul class="nav">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="#">Giới thiệu</a>
            <ul id="subnav_news" class="subnav">
                <li>
                    <a href="#">Giới thiệu chung</a></li>
                <li>
                    <a href="#">Điều lệ hội</a></li>
                <li>
                    <a href="#">Danh sách ban chấp hành</a></li>

            </ul>
        </li>

        <li><a href="#">Hội viên</a>
            <ul id="subnav_news" class="subnav">
                <li><a href="#">Đăng ký hội viên</a></li>
                <li><a href="#">Danh sách hội viên</a></li>
            </ul>
        </li>
        <li><a href="NewsPage.php">Tin tức</a>
            <ul id="subnav_news" class="subnav">
                <?php $use2 = new Class_ClassTableCatalog();
                $array = $use2->SelectCatalogName();
                foreach ($array as $arrayItem) {
                    ?>
                    <li>
                        <a href="NewsCatalogPage.php?ca_id=<?php echo $arrayItem->ca_id; ?>"><?php echo $arrayItem->ca_name; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="#">Thư viện ảnh</a></li>
        <li><a href="#" target="_blank">Diễn đàn</a></li>
        <li><a href="#">Hỏi đáp</a>
            <ul id="subnav_news" class="subnav">
                <li><a href="#">Gửi câu hỏi</a></li>
                <li><a href="#">Danh sách các câu hỏi đã trả lời</a></li>
            </ul>
        </li>
        <li><a href="#">Liên hệ</a></li>
        <li>
        </li>
        <li><a href="#">Sơ đồ trang</a></li>
        <li>
            <a href="#">Cesky</a>
        </li>
        <li>
            <form accept-charset="utf-8" action="" method="post" id="NewSearchForm" controller="news">
                <div style="display:none;"><input type="hidden" value="POST" name="_method"></div>
                <div class="input text"><input type="text" id="NewTitle" name="data[New][title]"></div>
                <div class="submit"><input type="submit" value="Tìm"></div>
            </form>
        </li>

    </ul>

</div>
<div id="feature-news">
    <span>Tin mới</span>
    <div class="vticker">
        <ul>
            <?php $useNews = new Class_ClassTableNews();
            $useNews->numberNews = 10;
            $news = $useNews->SelectNumberNews();
            foreach ($news as $newsItem) {
                ?>
                <li>
                    <a href="NewsDetailed.php?id=<?php echo $newsItem->ne_id; ?>"><?php echo $newsItem->ne_title; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="clr"></div>
</div>
