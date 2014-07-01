<div id="content">
    <ul class="breadcrumb">
        <li><a href="../../Index.php?lang=en" class="glyphicons home"><i></i> AdminPlus</a></li>
        <li class="divider"></li>
        <li>Form News</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons cart_in"><i></i> Gửi câu hỏi</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png" alt=""/>Trang trước</a>


        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="QuestionAddForm" onsubmit="return checkForm()" id="QuestionAddForm" enctype="multipart/form-data"
              method="post" action="QuestionAction.php" accept-charset="utf-8">
            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
            <table width="100%" align="left" cellpadding="2" cellspacing="1" class="add">
                <tbody>
                <tr>
                    <td class="label" style="width: 100%">Nội dung câu hỏi</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="label" width="150" height="26">Họ tên người gửi: <span class="check">*</span></td>
                    <td>
                        <!--<input type="text" name="fullname" id="fullname" style="width:300px;" />-->
                        <div class="input text required"><input name="data[Question][fullname]" type="text"
                                                                style="width:300px;" maxlength="50"
                                                                id="QuestionFullname"></div>
                    </td>
                </tr>
                <tr>
                    <td class="label" width="150" height="26">Điện thoại:</td>
                    <td>
                        <!--<input type="text" name="email" id="email" style="width:300px;" />-->
                        <div class="input text"><input name="data[Question][phone]" type="text" style="width:150px;"
                                                       maxlength="50" id="QuestionPhone"></div>
                    </td>
                </tr>
                <tr>
                    <td class="label" width="150" height="26">Email người gửi: <span class="check">*</span></td>
                    <td>
                        <!--<input type="text" name="email" id="email" style="width:300px;" />-->
                        <div class="input text required"><input name="data[Question][email]" type="text"
                                                                style="width:300px;" maxlength="100" id="QuestionEmail">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="label" width="150">Nội dung câu hỏi: <span class="check">*</span></td>
                    <td style="padding-top:4px; padding-bottom:4px;">
                        <!--<textarea rows="6" name="content" style="width:300px;"></textarea>-->
                        <div class="input textarea required"><textarea name="data[Question][content]" cols="3"
                                                                       style="width:300px;" rows="6"
                                                                       id="QuestionContent"></textarea></div>
                    </td>
                </tr>
                <!--	<tr>
                     <td height="30" class='label'><div align="left">
                     : </div></td>
                     <td><div align="left">
                                             </div></td>
                 </tr>-->
                <tr>
                    <td class="label" height="26">Ngày gửi:</td>
                    <td>
                        <div class="input date"><select name="data[Question][datetime][day]" id="QuestionDatetimeDay">
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
                                <option value="13" selected="selected">13</option>
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
                            </select>-<select name="data[Question][datetime][month]" id="QuestionDatetimeMonth">
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06" selected="selected">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>-<select name="data[Question][datetime][year]" id="QuestionDatetimeYear">
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014" selected="selected">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                            </select></div>
                    </td>
                </tr>
                <tr>
                    <td class="label">Nhập mã: <span class="check">*</span></td>
                    <td>
                        <input name="textcode" type="text" id="textcode" size="10" value="">
                        &nbsp;
                        <img align="absmiddle" src="/img/03.gif"><img align="absmiddle" src="/img/09.gif"><img
                            align="absmiddle" src="/img/03.gif"><img align="absmiddle" src="/img/01.gif"><img
                            align="absmiddle" src="/img/01.gif"><img align="absmiddle" src="/img/00.gif"> <input
                            name="hidecode" type="hidden" id="hidecode" value="393110">
                    </td>
                </tr>
                <tr>
                    <td class="label" height="26"></td>
                    <td>
                        <!--                        <div class="submit"><input type="submit" value="Gửi câu hỏi"></div>-->
                        <input type="submit" value="Gửi câu hỏi"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- </form>-->

        </form>
    </div>
</div>