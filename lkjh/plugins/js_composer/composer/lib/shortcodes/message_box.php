<?php
class WPBakeryShortCode_VC_Message extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {
        $color = $el_class = $css_animation = '';
        extract(shortcode_atts(array(
            'color' => 'alert-info',
            'el_class' => '',
            'css_animation' => ''
        ), $atts));
        $output = '';
        $el_class = $this->getExtraClass($el_class);

        if ($color == "alert-block") $color = "";
        $color = ( $color != '' ) ? ' wpb_'.$color : '';
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_alert wpb_content_element'.$color.$el_class, $this->settings['base']);
        $css_class .= $this->getCSSAnimation($css_animation);
        $output .= '<div class="'.$css_class.'"><div class="messagebox_text clearfix">'.wpb_js_remove_wpautop($content).'</div></div>'.$this->endBlockComment('alert box')."\n";
        //$output .= '<div class="wpb_vc_messagebox message '.$color.'"><div class="messagebox_text">'.wpb_js_remove_wpautop($content).'</div></div>';
        return $output;
    }
    public function outputTitle($title) {
        return '';
    }
}