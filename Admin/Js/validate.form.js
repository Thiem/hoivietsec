/**
 * Created by Thanh@401 on 5/15/14.
 */
$(document).ready(function () {

    <!-- begin validate form them tin tuc-->
    var validator = $("#formNews").validate({
        rules: {
            title: {
                required: true,
                minlength: 6
            },
            author: {
                required: true,
                minlength: 6
            },
            description: {
                required: true
            },
            content: {
                required: true
            },
            focus: {
                selectcheck: true
            },
            datepicker: {
                required: true
            },
            catalogID: {
                selectcheck: true
            },
            state: {
                selectcheck: true
            }
        },
        messages: {
            title: {
                required: "please fill text",
                minlength: "Tối thiểu 6 kí tự"
            },
            author: {
                required: "please fill text",
                minlength: "min word to 6"
            },
            description: {
                required: "please fill text"
            },
            content: {
                required: "please fill text"
            },
            focus: {
                required: "please fill text"
            },
            datepicker: {
                required: "please fill text"
            },
            catalogID: {
                required: "please fill text"
            },
            state: {
                required: "please fill text"
            }

        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
<!-- begin validate form thêm ngành nghề-->
    var validator = $("#JobForm").validate({
        rules: {
            "data[Job][name]": {
                required: true,
                minlength: 6
            }
        },
        messages: {
            "data[Job][name]": {
                required: "Nhập tên ngành nghề",
                minlength: "Tối thiểu 6 kí tự"
            }
        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
    <!-- end validate form thêm ngành nghề -->

    <!-- begin validate form thêm chi hội-->
    var validator = $("#GroupForm").validate({
        rules: {
            "data[Group][name]": {
                required: true,
                minlength: 6
            }
        },
        messages: {
            "data[Group][name]": {
                required: "Nhập tên danh sách chi hội",
                minlength: "Tối thiểu 6 kí tự"
            }
        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
    <!-- end validate form chi hội -->

    <!-- begin validate form danh mục ảnh-->
    var validator = $("#PhotoCatForm").validate({
        rules: {
            "data[PhotoCat][name]": {
                required: true,
                minlength: 6
            }
        },
        messages: {
            "data[PhotoCat][name]": {
                required: "Nhập tên danh mục ảnh",
                minlength: "Tối thiểu 6 kí tự"
            }
        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
    <!-- end validate form danh mục ảnh -->

    <!-- begin validate form thư viện ảnh-->
    var validator = $("#PhotoGallery").validate({
        rules: {
            "data[PhotoGallery][name]": {
                required: true,
                minlength: 6
            }
        },
        messages: {
            "data[PhotoGallery][name]": {
                required: "Nhập tên thư viện ảnh",
                minlength: "Tối thiểu 6 kí tự"
            }
        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
    <!-- end validate form thư viện ảnh -->
//    form sua thong tin thanh vien
    var validator = $("#MemberEditForm").validate({
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
                required: true,
                number: true
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
                required: "Nhập năm sinh bốn chữ số",
                number: "Phải là số"
            }
        }

    });
    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "enter choose select");
//      ket thuc form sua thanh vien

});

