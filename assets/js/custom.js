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
        $.validator.addMethod("dup_area", function (value, element) {
            var textValues = [],
                    //initially mark as valid state
                    valid = true;
            $("input.area").each(function () {
                if ($(this).val() !== "") {
                    var doesExisit = ($.inArray($(this).val(), textValues) === -1) ? false : true;
                    if (doesExisit === false) {
                        console.log("adding the values to array");
                        textValues.push($(this).val());
                        console.log(textValues);
                    } else {
                        console.log(textValues);
                        //update the state as invalid
                        valid = false;
                        return false;
                    }
                }

            });
            //return the valid state
            return valid;
        }, "Duplicate Areas Found. ");
        $.validator.addMethod("no_space", function (value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "Spaces not Allowed. ");
        //payment dialog
        $("#payment").dialog({
            autoOpen: false,
            title: "Make Payment",
            modal: true,
            width: "640"
        });
        //lineman dialog
        $("#lineman_pop").dialog({
            autoOpen: false,
            title: "Edit Lineman",
            modal: true,
            width: "640"
        });
        //ala dialog
        $("#ala").dialog({
            autoOpen: false,
            title: "Ala-Carte",
            modal: true,
            width: "640"
        });
        //password dialog
        $("#password").dialog({
            autoOpen: false,
            title: "Change Password",
            modal: true,
            width: "640"
        });
        //Edit Area dialog
        $("#edit_area").dialog({
            autoOpen: false,
            title: "Edit Area",
            modal: true,
            width: "640"
        });
        $("#delete").dialog({
            autoOpen: false,
            title: "Delete Details",
            modal: true,
            width: "640"
        });
        $("#box_stock").dialog({
            autoOpen: false,
            title: "Activate Box",
            modal: true,
            width: "640"
        });
        //dialog open
        $("#da-ex-dialog").bind("click", function (event) {
            $("#da-ex-dialog-div").dialog("option", {modal: true}).dialog("open");
        });
        //popup form validtion
        $("#popup_form").validate({
            ignore: '.ignore',
            rules: {
                date: {
                    required: true,
                    dateISO: true
                },
                amount: {
                    required: true,
                    number: true
                },
                lineman: {
                    required: true
                },
                mobile: {
                    digits: true,
                    rangelength: [10, 11]
                }
            }
        });
        $("#area_form").validate({
            ignore: '.ignore',
            rules: {
                "areas[]": {
                    required: true,
                    dup_area: true
                }
            }
        });
        $("#sale_form1").validate({
            ignore: '.ignore',
            rules: {
                "sl_trans_id": {
                    digits: true,
                    required: true
                },
                "sl_prd_sold": {
                    required: true
                },
                "sl_batch": {
                    required: true
                },
                "sl_buy_type": {
                    required: true
                },
                "sl_rate": {
                    required: true
                },
                "sl_qty": {
                    required: true
                },
                "sl_tax": {
                    required: true
                }
            }

        });

        $("#purchase_form").validate({
            ignore: '.ignore',
            rules: {
                "pur_batch": {
                    required: true
                },
                "pur_rate": {
                    required: true
                },
                "pur_qty": {
                    required: true
                },
                "pur_from": {
                    required: true
                },
                "pur_product": {
                    required: true
                }
            }
        });

        $("#employee_form").validate({
            ignore: '.ignore',
            rules: {
                "emp_name": {
                    required: true
                },
                "emp_type": {
                    required: true
                },
                "emp_add": {
                    required: true,
                    mach_var: true
                },
                "emp_con": {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                "emp_cur_sal": {
                    required: true,
                    number: true
                },
            }
        });

        $("#employee_salary_form").validate({
            ignore: '.ignore',
            rules: {
                "emp_name": {
                    required: true
                },
                "cur_salary": {
                    required: true,
                    number: true
                },
                "pay": {
                    number: true,
                    required: true
                },
                "pay_mode": {
                    required: true
                }
            }
        });


        $("#product_form").validate({
            ignore: '.ignore',
            rules: {
                "prdct_name": {
                    required: true
                },
                "prdct_type": {
                    required: true
                },
                "prdct_desc": {
                    required: true
                },
                "prdct_md": {
                    required: true
                }

            }
        });

        $("#buyer_form").validate({
            ignore: '.ignore',
            rules: {
                "buy_name": {
                    required: true
                },
                "buy_type": {
                    required: true
                },
                "buy_add": {
                    required: true,
                    rangelength: [1, 100],
                    mach_var: true
                }
            }
        });
        $("#buyer_type").validate({
            ignore: '.ignore',
            rules: {
                "buy_type": {
                    required: true
                }
            }
        });
        $("#seller_type").validate({
            ignore: '.ignore',
            rules: {
                "sel_type": {
                    required: true
                }
            }
        });
        $("#employee_type").validate({
            ignore: '.ignore',
            rules: {
                "buy_type": {
                    required: true
                }
            }
        });

        $("#buyer_type").validate({
            ignore: '.ignore',
            rules: {
                "buy_type": {
                    required: true
                }
            }
        });
        $("#add_expenses_head").validate({
            ignore: '.ignore',
            rules: {
                "exp_name": {
                    required: true
                },
                "exp_type": {
                    required: true
                },
                "exp_desc": {
                    required: true
                }
            }
        });
        $("#edit_buyer").validate({
            ignore: '.ignore',
            rules: {
                "buy_name": {
                    required: true
                },
                "buy_type": {
                    required: true
                }, "buy_address": {
                    required: true
                }


            }
        });
        $("#expenses_form").validate({
            ignore: '.ignore',
            rules: {
                "exp_type": {
                    required: true
                },
                "exp_head": {
                    required: true
                },
                "exp_till": {
                    required: true
                },
                "exp_from": {
                    required: true,
                    dateISO: true
                },
                "exp_by": {
                    required: true,
                },
                "exp_rate": {
                    required: true,
                    number: true
                },
                "exp_desc": {
                    required: true
                },
                "exp_qty": {
                    required: true,
                    digits: true
                }
            }
        });

        $("#roduct_form").validate({
            ignore: '.ignore',
            rules: {
                "prdct_name": {
                    required: true
                },
                "prdct_type": {
                    required: true
                },
                "prdct_desc": {
                    required: true
                },
                "prdct_md": {
                    required: true,
                    dateISO: true
                }
            }
        });
        $("#wizard-form").validate({
            ignore: '[]',
            rules: {
                area: {
                    required: true,
                    mach_var: true
                },
                conNo: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "https://dcntv.in:3035/validate_con",
                        type: "post",
                        data: {
                            con: function () {
                                return $("#conNo").val();
                            },
                            opid: function () {
                                return $("#opid").val();
                            }
                        }
                    }
                },
                name: {
                    required: true,
                    mach_var: true
                },
                contact: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                saf: {
                    required: true,
                    mach_var: true
                },
                date: {
                    required: true,
                    dateISO: true
                },
                address: {
                    required: true,
                    mach_var: true
                },
                near: {
                    mach_var: true
                },
                package: {
                    required: true
                },
                special: {
                    required: true
                },
                paid: {
                    required: true
                },
                primary_amt: {
                    required: true,
                    number: true
                },
                total_amt: {
                    required: true,
                    number: true
                },
                "vc[]": {
                    required: true,
                    mach_var: true,
                    no_space: true,
                    remote: {
                        url: "https://dcntv.in:3035/validate_vc",
                        type: "post",
                        data: {
                            vc: function () {
                                var vc_arr = $("input[name='vc[]']")
                                    .map(function () {
                                        return $(this).val();
                                    }).get();
                                return vc_arr.toString();
                            },
                            opid: function () {
                                return $("#opid").val();
                            }
                        }
                    }
                },
                "stb[]": {
                    required: true,
                    mach_var: true,
                    no_space: true,
                    remote: {
                        url: "https://dcntv.in:3035/validate_stb",
                        type: "post",
                        data: {
                            stb: function () {
                                var stb_arr = $("input[name='stb[]']")
                                    .map(function () {
                                        return $(this).val();
                                    }).get();
                                return stb_arr.toString();
                            },
                            opid: function () {
                                return $("#opid").val();
                            }
                        }
                    }
                }
            }
        });
        $("#edit_password_form").validate({
            ignore: '.ignore',
            rules: {
                old_pass: {
                    required: true,
                },
                new_pass: {
                    required: true,
                },
                conf_pass: {
                    required: true,
                    equalTo: "#new_pass"
                }
            }
        });
        $("#add_cab_cust").validate({
            ignore: '.ignore',
            rules: {
                conNo: {
                    required: true,
                    digits: true
                },
                name: {
                    required: true,
                    mach_var: true
                },
                contact: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                saf: {
                    required: true
                },
                date: {
                    required: true,
                    dateISO: true
                },
                area: {
                    required: true
                },
                address: {
                    required: true,
                    mach_var: true
                },
                near: {
                    mach_var: true
                },
                package: {
                    required: true
                },
                special: {
                    required: true
                },
                paid: {
                    required: true
                },
                primary_amt: {
                    required: true,
                    number: true
                },
                total_amt: {
                    required: true,
                    number: true
                },
                "vc[]": {
                    required: true,
                    duplicate_vc: true
                }
            }
        });
        $("#profile_form").validate({
            ignore: '.ignore',
            rules: {
                firm: {
                    required: true,
                    mach_var: true
                },
                name: {
                    required: true,
                    mach_var: true
                },
                contact: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                toll: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                address: {
                    required: true,
                    mach_var: true
                },
                mailId: {
                    required: true,
                    email: true
                }
            }
        });
        $("#add_cab_boxes").validate({
            ignore: '.ignore',
            rules: {
                package: {
                    required: true
                },
                "vc[]": {
                    required: true,
                    dup_vc: true
                }
            }
        });
        $("#lineman_form").validate({
            ignore: '.ignore',
            rules: {
                name: {
                    required: true
                },
                line_name: {
                    required: true,
                    no_space: true
                },
                line_pass: {
                    required: true
                },
                address: {
                    required: true,
                    mach_var: true
                },
                contact: {
                    required: true,
                    digits: true
                }
            }
        });
        //dialog date picker [primary date picker]
        $('#dp-pr').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        //dialog date picker [primary date picker]
        $('#dp-fr-tm').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#dp-to-tm').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#dp-fr-da').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $('#dp-to-da').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
})(jQuery);
