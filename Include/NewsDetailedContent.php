<?php
    $use2 = new Class_ClassTableNews();
    $use2->id = $_REQUEST['id'];
    $array = $use2->SelectId();
    foreach ($array as $arrayItem) {
?>
<div class="body_left">
    <div id="breadcrumb"><span class="breadcrumb-home"><a href="/">Trang chủ</a> <!--&rsaquo;&rsaquo; --> ›› <a
                href="#">Quan hệ Việt - Séc</a></span>
    </div>
    <div class="content">
        <div class="aticle-title">
            <?php echo $arrayItem->ne_title;?>
            <P>
                <small>Ngày đăng:<?php echo $arrayItem->ne_date;?></small>
            </P>
        </div>
        <div class="clr"></div>
        <div class="aticle-content">
            <?php echo $arrayItem->ne_content;?>
        </div>
        <br>
        <p align="center" style="float: right"><?php echo $arrayItem->ne_author;?></p>
        <br>

        <div class="other-aticle">
            <div class="other-aticle-title"><span> <div style="border-bottom:#efefef 1px solid;">Các tin khác:
                    </div></span>
            </div>
            <?php
            $use2->numberNews = 9;
            $news = $use2->SelectNumberNews();
            foreach($news as $newsItem){
            ?>
            <ul>
                <li style="margin-right:15px;">
                    <a class="text_12_xanh" href="NewsDetailed.php?id=<?php echo $newsItem->ne_id;?>"><?php echo $newsItem->ne_title;?></a>(<?php echo $newsItem->ne_date;?>)
                </li>
            </ul>
            <?php } ?>
            <div class="clr"></div>
        </div>
        <div class="find-bydate">
            <form accept-charset="utf-8" action="/news/view" method="post" id="NewsViewForm" controller="news">
                <div style="display:none;"><input type="hidden" value="POST" name="_method"></div>
                <b>
                    Xem tin theo ngày: </b>
                <select id="NewsDDay" name="data[News][d][day]">
                    <option value="01">1</option>
                    <option value="02">2</option>
                    <option value="03">3</option>
                    <option value="04">4</option>
                    <option value="05">5</option>
                    <option value="06">6</option>
                    <option value="07">7</option>
                    <option value="08">8</option>
                    <option value="09">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select><select id="NewsMMonth" name="data[News][m][month]">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select><select id="NewsYYear" name="data[News][y][year]">
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                </select>
                <div class="submit"><input type="submit" value="Xem"></div>
            </form>
        </div>
        <div class="clr"></div>
        <?php } ?>
    </div>
</div>