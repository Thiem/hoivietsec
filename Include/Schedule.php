<div class="body_left">
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="Index.php">Trang chủ</a>››
	<a href="Introduction.php">Giới thiệu</a>›› Điều lệ hội</span>
        </div>

    </div>
    <div class="content">
        <div class="aticle-content">
            <br/>
            <?php
            $schedule = new Class_ScheduleClass();
            $introOne = $schedule->showSchedule();
            if ($introOne == null) {
                echo "Không có dữ liệu";
            } else {
                echo $introOne['schedule_text'];
            }

            ?>
        </div>
        <div class="other-article">
            <div class="other-article-title"><span><div style="border-bottom:#efefef 1px solid;">Các thông tin khác:</div></span></div>
            <ul>
                <li><a href="Introduction.php">Giới thiệu chung</a></li>
                <li><a href="Association.php">Danh sách ban chấp hành</a></li>
            </ul>
            <div class="clr"></div>
        </div>
    </div>
</div>