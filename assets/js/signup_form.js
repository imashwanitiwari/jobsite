/* 
     * Copyright © Technopits. All rights Reserved.
     * Project Name: Digital Cable Networks CMS
     * Project Url: http://www.dcnonline.in
     * Project Developer: Rohit Hazra [rohithzr@live.com]
     * Project Theme: Dandelion Admin Template [Simple License]
     */

    jQuery.validator.addMethod("mach_var", function (value, element) {
        var regex = new RegExp("^[a-zA-Z0-9( ).\\/-]+$");
        var key = value;
        if (!regex.test(key)) {
            return false;
        }
        return true;
    }, "please use only numbers, alphabets, dash, spaces, and dots. ");

    (function ($) {
        $(document).ready(function (e) {
            //popup form validtion
            $("#join-form").validate({
                ignore: '.ignore',
                rules: {
                    name: {
                        required: true,
                        mach_var: true
                    },
                    firm: {
                        required: true,
                        mach_var: true
                    },
                    company: {
                        required: true
                    },
                    add: {
                        required: true,
                        mach_var: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    cont: {
                        digits: true,
                        rangelength: [10, 11]
                    },
                    username: {
                        required: true,
                        rangelength: [4, 21],
                        mach_var: true
                    },
                    pass: {
                        required: true,
                        rangelength: [4, 21],
                    },
                    conf_pass: {
                        required: true,
                        equalTo: "#pass"
                    }
                }
            });
        });
    })(jQuery);