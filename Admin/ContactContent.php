<div id="content">
    <ul class="breadcrumb">
        <li><a href="index.php" class="glyphicons home"><i></i>Quản trị</a></li>
        &gt;
        <li><a href="Contact.php"><i></i>Liên hệ</a></li>
    </ul>
    <div class="separator"></div>
    <div class="heading-buttons">
        <h3 class="glyphicons display"><i></i>Liên hệ</h3>

        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="center-cont-act">
        <br>
        <p>
        </p><p>
	<span style="font-size:12px;"><span style="font-family: arial,helvetica,sans-serif;"><strong>HỘI HỮU NGHỊ VIỆT NAM - SÉC</strong><br>
	Địa chỉ: 105A Quan Thánh - Hà Nội; Điện thoại: (84) 08044136 Fax: (84-4) 38432756<br>
	Website: http://www.hoivietsec.org.vn<br>
	Email: vanphong@hoivietsec.org.vn</span></span></p>
        <p>
            &nbsp;</p>
        <p>
            <span style="font-size:14px;"><strong><span style="font-family: arial,helvetica,sans-serif;">BẠN ĐỌC GỬI THÔNG TIN LIÊN HỆ ĐẾN HỘI:</span></strong></span></p>
        <p></p>
    </div>
    <form name="ContactIndexForm" onsubmit="return checkForm()" id="ContactIndexForm" enctype="multipart/form-data" method="post" action="/lienhe.html" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 	<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1">
            <tbody><tr>
                <td width="160" height="30" class="label"><div align="left">Họ tên:&nbsp;<span>*</span></div></td>
                <td><div align="left"><div class="input text required"><input name="data[Contact][name]" type="text" maxlength="255" id="ContactName"></div></div></td>
            </tr>
            <tr>
                <td height="30" class="label"><div align="left">Điện thoại:&nbsp;<span>*</span></div></td>
                <td><div align="left"><div class="input text required"><input name="data[Contact][mobile]" type="text" maxlength="255" id="ContactMobile"></div></div></td>
            </tr>
            <tr>
                <td height="30" class="label"><div align="left">Địa chỉ:&nbsp;</div></td>
                <td><div align="left"><div class="input text"><input name="data[Contact][address]" type="text" maxlength="255" id="ContactAddress"></div></div></td>
            </tr>
            <tr>
                <td height="30" class="label"><div align="left">Email:&nbsp;<span>*</span></div></td>
                <td><div align="left"><div class="input text required"><input name="data[Contact][email]" type="text" maxlength="255" id="ContactEmail"></div></div></td>
            </tr>
            <tr>
                <td height="30" class="label"><div align="left">Nội dung:&nbsp;<span>*</span></div></td>
                <td><div align="left"><div class="input textarea required"><textarea name="data[Contact][content]" cols="40" rows="5" id="ContactContent"></textarea></div></div></td>
            </tr>
            <tr>
                <td height="30" class="label"><div align="left">File đính kèm: </div></td>
                <td><div align="left">
                        <div class="input file"><input type="file" name="data[Contact][attached]" id="ContactAttached"></div>            </div></td>
            </tr>
            <tr>
                <td class="label">Nhập mã: <span class="check">*</span></td>
                <td>
                    <input name="textcode" type="text" id="textcode" size="10" value="">
                    &nbsp;
                    <img align="absmiddle" src="/img/03.gif"><img align="absmiddle" src="/img/01.gif"><img align="absmiddle" src="/img/06.gif"><img align="absmiddle" src="/img/07.gif"><img align="absmiddle" src="/img/05.gif"><img align="absmiddle" src="/img/00.gif">              <input name="hidecode" type="hidden" id="hidecode" value="316750">
                </td>
            </tr>
            <tr>
                <td height="30"> <div align="left"></div></td>
                <td align="left">
                    <div class="submit"><input type="submit" value="Gửi liên hệ"></div></td>
            </tr>
            </tbody></table>
        <div class="clr"></div>
    </form>
</div>