/**
 * Created by Thanh@401 on 5/15/14.
 */
$(document).ready(function () {

    <!-- begin validate form dang ky thanh vien-->
    var validator = $("#Fregister").validate({
        rules: {
            "data[Member][hotendem]": {
                required: true,
                minlength: 6
            },
            "data[Member][ten]": {
                required: true,
                minlength: 3
            },
            "data[Member][namsinh]": {
                required:true,
                number: true,
                minlength: 4
            },
            "data[Member][gioitinh]": {
                required:true
            },
            "data[Member][group_id]": {
                selectcheck: true
            },
            "data[Member][thehoivien]": {
                required:true
            }
        },
        messages: {
            "data[Member][hotendem]": {
                required: "Nhập họ tên đệm",
                minlength: "Tối thiểu 6 kí tự"
            },
            "data[Member][ten]": {
                required: "Nhập tên",
                minlength: "Tối thiểu 3 kí tự"
            },
            "data[Member][namsinh]": {
                required: "Nhập năm sinh",
                number: "Nhập năm sinh là số",
                minlength: "Năm sinh bốn số"
            },
            "data[Member][gioitinh]": {
                required: "Chọn giới tinh"
            },
            "data[Member][group_id]": {
                required: "Chọn hội viên chi hội"
            },
            "data[Member][thehoivien]": {
                required: "Chọn trạng thái thẻ hội viên"
            }

        }

    });

//    form dat cau hoi
    var validator = $("#QuestionAddForm").validate({
        rules: {
            "data[Question][fullname]": {
                required: true,
                minlength: 6
            },
            "data[Question][email]": {
                email: true,
                required:true
            },
            "data[Question][content]": {
                required: true
            }
        },
        messages: {
            "data[Question][fullname]": {
                required: "Nhập họ tên",
                minlength: "Tối thiểu 6 kí tự"
            },
            "data[Question][email]": {
                email: "Chưa đáng định dạng email",
                required: "Nhập email"
            },
            "data[Question][content]": {
                required: "Nhập nội dung câu hỏi"
            }
        }

    });
//    ket thuc form dat cau hoi

//    Bat dau form lien he
    var validator = $("#ContactIndexForm").validate({
        rules: {
            "data[Contact][name]": {
                required: true,
                minlength: 6
            },
            "data[Contact][email]": {
                email: true,
                required:true
            },
            "data[Contact][mobile]": {
                required: true,
                number: true,
                minlength: 9

            },
            "data[Contact][content]": {
                required: true,
                minlength: 50
            }
        },
        messages: {
            "data[Contact][name]": {
                required: "Nhập họ tên",
                minlength: "Tối thiểu 6 kí tự"
            },
            "data[Contact][email]": {
                email: "Chưa đáng định dạng email",
                required: "Nhập email"
            },
            "data[Contact][mobile]": {
                required: "Nhập số điện thoại",
                minlength: "Ít nhất 9 chữ số",
                number: "Chưa đúng dạng số"
            },
            "data[Contact][content]": {
                minlength: "Ít nhất 50 kí tự",
                required: "Nhập nội dung câu hỏi"
            }
        }

    });
//Ket thuc form lien he
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
    jQuery.validator.addMethod('check', function (value) {
        return (value != '0');
    }, "enter choose check");
});

