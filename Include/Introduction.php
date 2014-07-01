<div class="body_left">
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="/">Trang chủ</a>››
	<a href="/gioithieu.html">Giới thiệu</a>›› Giới thiệu chung</span>
        </div>

    </div>
    <div class="content">
        <div class="aticle-content">
            <br/>
            <?php
            $intro = new Class_IntroductionClass();
            $introOne = $intro->showIntroduction();
            if ($introOne == null) {
                echo "Không có dữ liệu";
            } else {
                echo $introOne['intro_text'];
            }

            ?>
        </div>
        <div class="other-article">
            <div class="other-article-title"><span><div style="border-bottom:#efefef 1px solid;">Các thông tin khác:</div></span></div>
            <ul>
                <li><a href="Schedule.php">Điều lệ hội</a></li>
                <li><a href="Association.php">Danh sách ban chấp hành</a></li>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
</div>
<!--</div>-->