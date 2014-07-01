<div class="body_left">
    <div class="members form">
        <div id="main-content">
            <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="/">Trang chủ</a>››Liên hệ</span>
            </div>

        </div>
        <div class="content">
            <div class="catenews">&nbsp;Đặt câu hỏi</div>
            <table cellspacing="0" cellpadding="0" width="98%" border="0" align="center">
                <tbody>
                <tr>
                    <td>
                        <form name="QuestionAddForm" onsubmit="return checkForm()" id="QuestionAddForm"
                              enctype="multipart/form-data" method="post" action="QuestionAction.php"
                              accept-charset="utf-8">
                            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                            <table width="100%" align="left" cellpadding="2" cellspacing="1" class="add">
                                <tbody>
                                <tr>
                                    <td class="label">&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="label" width="150" height="26">Họ tên người gửi: <span
                                            class="check">*</span></td>
                                    <td>
                                        <div class="input text required"><input name="data[Question][fullname]"
                                                                                type="text" style="width:300px;"
                                                                                maxlength="50" id="QuestionFullname">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label" width="150" height="26">Điện thoại:</td>
                                    <td>
                                        <div class="input text"><input name="data[Question][phone]" type="text"
                                                                       style="width:150px;" maxlength="50"
                                                                       id="QuestionPhone"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label" width="150" height="26">Email người gửi: <span
                                            class="check">*</span></td>
                                    <td>
                                        <div class="input text required"><input name="data[Question][email]" type="text"
                                                                                style="width:300px;" maxlength="100"
                                                                                id="QuestionEmail"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label" width="150">Nội dung câu hỏi: <span class="check">*</span></td>
                                    <td style="padding-top:4px; padding-bottom:4px;">
                                        <div class="input textarea required"><textarea name="data[Question][content]"
                                                                                       cols="3" style="width:300px;"
                                                                                       rows="6"
                                                                                       id="QuestionContent"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label" height="26">Ngày gửi:</td>
                                    <td>
                                        <div class="input date"><select name="data[Question][datetime][day]"
                                                                        id="QuestionDatetimeDay">
                                                <?php
                                                for ($i = 1; $i <= 31; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i ?>"
                                                            <?php if (date("d") == $i){ ?>selected="selected" <?php } ?>><?php echo $i ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            -<select name="data[Question][datetime][month]"
                                                     id="QuestionDatetimeMonth">
                                                <option value="01"
                                                        <?php if (date("m") == 1){ ?>selected="selected"<?php } ?>>
                                                    January
                                                </option>
                                                <option value="02"
                                                        <?php if (date("m") == 2){ ?>selected="selected"<?php } ?>>
                                                    February
                                                </option>
                                                <option value="03"
                                                        <?php if (date("m") == 3){ ?>selected="selected"<?php } ?>>March
                                                </option>
                                                <option value="04"
                                                        <?php if (date("m") == 4){ ?>selected="selected"<?php } ?>>April
                                                </option>
                                                <option value="05"
                                                        <?php if (date("m") == 5){ ?>selected="selected"<?php } ?>>May
                                                </option>
                                                <option value="06"
                                                        <?php if (date("m") == 6){ ?>selected="selected"<?php } ?>>June
                                                </option>
                                                <option value="07"
                                                        <?php if (date("m") == 7){ ?>selected="selected"<?php } ?>>July
                                                </option>
                                                <option value="08"
                                                        <?php if (date("m") == 8){ ?>selected="selected"<?php } ?>>
                                                    August
                                                </option>
                                                <option value="09"
                                                        <?php if (date("m") == 9){ ?>selected="selected"<?php } ?>>
                                                    September
                                                </option>
                                                <option value="10"
                                                        <?php if (date("m") == 10){ ?>selected="selected"<?php } ?>>
                                                    October
                                                </option>
                                                <option value="11"
                                                        <?php if (date("m") == 11){ ?>selected="selected"<?php } ?>>
                                                    November
                                                </option>
                                                <option value="12"
                                                        <?php if (date("m") == 12){ ?>selected="selected"<?php } ?>>
                                                    December
                                                </option>
                                            </select>-<select name="data[Question][datetime][year]"
                                                              id="QuestionDatetimeYear">
                                                <?php
                                                for ($i = 2020; $i >= 2000; $i--) {
                                                    ?>
                                                    <option value="<?php echo $i ?>"
                                                            <?php if (date("Y") == $i){ ?>selected="selected" <?php } ?>><?php echo $i ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label" height="26"></td>
                                    <td>
                                        <div class="submit"><input type="submit" value="Gửi câu hỏi"></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- </form>-->

                        </form>
                    </td>
                </tr>

                </tbody>

            </table>


        </div>
    </div>
</div>
