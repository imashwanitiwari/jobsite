function set_wiz_error(wiz) {
    $pos = $(wiz);
    $pos.parent().removeClass("done");
    $pos.parent().addClass("notdone");
}
function set_wiz_ok(wiz) {
    $pos = $(wiz);
    $pos.parent().removeClass("notdone");
    $pos.parent().addClass("done");
}
(function ($) {
    $(document).ready(function (e) {
        var v = $("#wizard-form").validate({onsubmit: false});

        $("#wizard-form").Wizard({
            onLeaveStep: function () {
                var stp = this.data.activeStep;
                if (stp == 0) {
                    if (!(v.element("#area") && v.element("#add") && v.element("#near"))) {
                        $pos = $('.wiz_state_1');
                        set_wiz_error($pos);
                        return false;
                    } else {
                        $pos = $('.wiz_state_1');
                        set_wiz_ok($pos);
                    }
                }
                //step 1
                if (stp == 1) {
                    if (!(v.element("#vc") && v.element("#stb"))) {
                        $pos = $('.wiz_state_2');
                        set_wiz_error($pos);
                        return false;
                    } else {
                        $pos = $('.wiz_state_2');
                        set_wiz_ok($pos);
                    }
                }
                //step 2
                if (stp == 2) {
                    if (!(v.element("#package") && v.element("#ala_amt") && v.element("#primary_amt"))) {
                        $pos = $('.wiz_state_3');
                        set_wiz_error($pos);
                        return false;
                    } else {
                        $pos = $('.wiz_state_3');
                        set_wiz_ok($pos);
                    }
                }
                //step 3
                if (stp == 3) {
                    console.log("stp");
                    if (!(v.element("#conNo") && v.element("#name") && v.element("#phone"))) {
                        $pos = $('.wiz_state_4');
                        set_wiz_error($pos);
                        return false;
                    } else {
                        $pos = $('.wiz_state_5');
                        set_wiz_ok($pos);
                    }
                }

            }
        });
    });
})(jQuery);