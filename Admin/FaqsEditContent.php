<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="FaqsList.php" >Danh sách câu hỏi - câu trả lời</a></li>
        <li class="divider"></li>
        <li>Sửa câu hỏi - câu trả lời</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Sửa câu hỏi - câu trả lời</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="FaqEditForm" id="FaqEditForm" action="FaqsEditAction.php?id=<?php echo $_REQUEST['id']?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <?php
                $faq = new Class_FaqsClass();
            $faq->FaqId = $_REQUEST['id'];
            $row = $faq->OneFaq();
            ?>
            <div class="form">
                <div class="form-group ">
                    <label>Họ tên người gửi: * </label>
                    <input type="text" placeholder="Họ tên người gửi..." name="data[Question][fullname]" id="title" class="form-control" value="<?php echo $row['faq_name']?>">
                </div>
                <div class="form-group ">
                    <label>Điện thoại: </label>
                    <input type="text" placeholder="Điện thoại..." name="data[Question][phone]" class="form-control" value="<?php echo $row['faq_phone']?>">
                </div>
                <div class="form-group ">
                    <label>Email người gửi: * </label>
                    <input type="text" placeholder="Email người gửi..." name="data[Question][email]" class="form-control" value="<?php echo $row['faq_email']?>">
                </div>

                <div><label>Nội dung câu hỏi: * </label>

                    <div>
                        <textarea style="width: 690px; height: 50px" name="data[Question][content]" cols="3" rows="6"><?php echo $row['faq_content']?></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label>Họ tên người trả lời: </label>
                    <input type="text" placeholder="Họ tên người trả lời..." name="data[Question][answer]" class="form-control" value="<?php echo $row['faq_ans_people']?>">
                </div>

                <div><label>Nội dung trả lời:  </label>

                    <div>
                        <textarea style="width: 690px; height: 50px" name="data[Question][content1]" cols="3" rows="6"><?php echo $row['faq_answer']?></textarea>
                    </div>
                </div>
                <div class="form-group width"><label>Ngày gửi: </label><input class="form-control" type="text" name="data[Question][date]"
                                                                              name="datepicker"
                                                                              id="datepicker" placeholder="yy/mm/dd" value="<?php echo $row['faq_date']?>"/>
                </div>

                <div class="form-group width">
                    <label for="Status">Trạng thái đăng trang chủ:
                    <input type="checkbox" value="1" name="data[Question][status]" <?php if ($row['faq_status'] == 1){?>checked="checked" <?php }?> id="Status"/></label>
                </div>
                <div class="form-group width">
                    <label for="number">Số thự tự hiển thị:</label>
<!--                        <input type="checkbox" value="1" name="data[Question][status]" --><?php //if ($row['faq_status'] == 1){?><!--checked="checked" --><?php //}?><!-- id="Status"/>-->
                    <input type="text" name="data[Question][number]" id="number" value="<?php echo $row['faq_number']?>" class="form-control"/>
                </div>
                <div>
                    <input type="submit" value="Lưu kết quả "/>
                </div>
            </div>
        </form>
    </div>
</div>
