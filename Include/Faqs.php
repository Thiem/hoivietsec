<?php  $user2 = new Class_FaqsClass();?>
<div class="body_left">
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="/">Trang chủ</a>››
	<a href="/gioithieu.html"></a></span>
        </div>

    </div>
    <div class="catenews">&nbsp;Danh sách câu hỏi thường gặp</div>
    <div class="content">
<!--cau hoi cau tra loi-->
        <?php
        //BEGINING
        if (isset($_REQUEST['rows'])) {
            $display = $_REQUEST['rows'];
        } else {
            $display = 30;
        }
        // Tinh tong so trang can hien thi
        if (isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
            $page = $_REQUEST['page'];
        } else { // tu tinh page
            $records = $user2->countShowFaqs();
            if ($records > $display) {
                $page = ceil($records / $display);
//                                $use2->page = $_REQUEST['page'];
            } else {
                $page = 1;
            }
        }
        $start = (isset($_GET['start']) && (int)$_GET['start'] >= 0) ? $_GET['start'] : 0;

        $user2->display = $display;
        $user2->start = $start;

        $selectArray = $user2->showFaqs();
        if ($selectArray == null) {
            echo 'Khong tim thay';
        } else {
        foreach ($selectArray as $selectArrayItem) {
        ?>

        <table class="list-ans" border="0" width="100%">
            <tbody>
            <tr>
                <td width="160" valign="top"><b>Tên người gửi: </b></td>
                <td><?php echo $selectArrayItem->faq_name; ?></td>
            </tr>
            <tr>
                <td width="160" valign="top"><b>Email: </b></td>
                <td><?php echo $selectArrayItem->faq_email; ?></td>
            </tr>
            <tr>
                <td width="160" valign="top"><b>Nội dung câu hỏi: </b></td>
                <td><?php echo $selectArrayItem->faq_content; ?></td>
            </tr>
            <tr>
                <td width="160"><b>Ngày gửi câu hỏi: </b></td>
                <td><?php echo $selectArrayItem->faq_date; ?></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" onclick="
					if (document.getElementById('show1').style.display != '') {
						document.getElementById('show1').style.display = '';
						this.innerText = ''; this.value = 'Ẩn câu trả lời';
					} else {
						document.getElementById('show1').style.display = 'none';
					  this.innerText = ''; this.value = 'Xem trả lời';
					}
					" style="font-size:12px;margin:10px;padding:0px;" value="Xem trả lời">
                </td>

            </tr>
            <tr id="show1" style="display: none;">
                <td colspan="2">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr>
                            <td width="160"><b>Người trả lời: </b></td>
                            <td><?php echo $selectArrayItem->faq_ans_people; ?></td>
                        </tr>
                        <tr>
                            <td width="160" valign="top"><b>Nội dung câu trả lời: </b></td>
                            <td><?php echo $selectArrayItem->faq_answer; ?></td>
                        </tr>
                        <tr>
                            <td width="160" valign="top">&nbsp;</td>
                            <td></td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>
            </tbody>
        </table>

        <?php }
        }?>
        <div class="paging">
            <?php

            //                                echo $page; die;
            if ($page > 1) {
                $next = $start + $display;
                $prev = $start - $display;
                $current = $start / $display + 1;

                // hien thi trang previous
                if ($current != 1) {
                    ?>
                    <span>
                        <a href='Faqs.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Prev</a>
                    </span> |
                <?php
                }
                // Hien thi so link
                for ($i = 1; $i <= $page; $i++) {
                    if ($current != $i) {
                        ?>
                        <span>
                            <a href='Faqs.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                       </span> |
                    <?php
                    } else {
                        ?>
                        <span class="current">
                <a href='Faqs.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                        </span> |
                    <?php
                    }

                }
                // Hien thi trang next
                if ($current != $page) {
                    ?>
                    <span>
                        <a href='Faqs.php?rows=<?php echo $display ?>&start=<?php echo $next ?>'>Next</a>
                    </span>
                <?php
                }
            }

            ?>
        </div>
    </div>
</div>