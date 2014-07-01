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


});

