<?php
class WPBakeryShortCode_VC_Separator extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {
        $with_line = '';
        extract(shortcode_atts(array(
            'with_line' => '',
        ), $atts));
        $output = '';
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_separator wpb_content_element', $this->settings['base']);
        $output .= '<div class="'.$css_class.'"></div>'.$this->endBlockComment('separator')."\n";
        return $output;
    }

    public function outputTitle($title) {
        return '';
    }
}

class WPBakeryShortCode_VC_Text_separator extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {
        $title = $title_align = $el_class = '';
        extract(shortcode_atts(array(
            'title' => __("Title", "js_composer"),
            'title_align' => 'separator_align_center',
            'el_class' => ''
        ), $atts));
        $output = '';
        $el_class = $this->getExtraClass($el_class);
        
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_text_separator wpb_content_element '.$title_align.$el_class, $this->settings['base']);
        $output .= '<div class="'.$css_class.'"><div>'.$title.'</div></div>'.$this->endBlockComment('separator')."\n";

        return $output;
    }
    public function outputTitle($title) {
        return '';
    }
}