

var s5_main_height = 0;

function s5_set_body_height() {

s5_main_height = document.getElementById("s5_inner_wrapper").offsetHeight;

document.getElementById("s5_l_bg_shadow").style.height = s5_main_height + "px";

document.getElementById("s5_r_bg_shadow").style.height = s5_main_height + "px";

s5_main_height = document.getElementById("s5_inner_wrapper").offsetHeight;

}

s5_set_body_height();


function s5_set_body_height_check() {
if (s5_main_height != document.getElementById("s5_inner_wrapper").offsetHeight) {

document.getElementById("s5_l_bg_shadow").style.height = "auto";

document.getElementById("s5_r_bg_shadow").style.height = "auto";

s5_set_body_height();
}

}

var s5_body_Interval = 0;
s5_body_Interval = window.setInterval("s5_set_body_height_check()",200);

