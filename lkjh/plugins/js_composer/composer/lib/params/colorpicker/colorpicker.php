<?php

function vc_colorpicker_form_field($settings, $value) {
    return '<div class="color-group">'
                .'<input name="'.$settings['param_name'].'" class="wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'.$value.'"/>'
                .'<div class="vc-color-picker-block"></div>'
            .'</div>';
}