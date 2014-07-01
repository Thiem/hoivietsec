<div id="content">
        <ul class="breadcrumb">
            <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
            <li class="divider"></li>
            <li>Giới thiệu chung</li>
        </ul>
        <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
            <h3 class="glyphicons display"><i></i>Sửa thông tin giới thiệu chung</h3>
            <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                    src="Image/circle_back_arrow.png"
                    alt=""/>Trang trước</a>

            <div class="clearfix"></div>
            <div class="separator"></div>
        </div>
    <div class="form-news">
        <form name="formNews" id="formNews" action="IntroductionAction.php" method="post"
              enctype="multipart/form-data">
            <?php
            $intro = new Class_IntroductionClass();
            $introOne = $intro->getIntroduction();
            ?>
            <div class="form">
                <div><label>Nội dung lời giới thiệu:</label>

                    <div class="editor">
                        <textarea class="ckeditor" name="content"
                                  id="content"><?php echo $introOne['intro_text'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group width">
                    <label>Trạng thái đăng trang chủ: </label>
                    <input type="checkbox" value="1" <?php if ($introOne['intro_status'] == 1){?>checked="checked" <?php }?> name="status"/>
                </div>
                <div>
                    <input type="submit" value="Sửa giới thiệu chung"/>
                </div>
            </div>
        </form>
    </div>
</div>
