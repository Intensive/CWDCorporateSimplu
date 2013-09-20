<?php
class WPBakeryShortCode_VC_Column_text extends WPBakeryShortCode {

    public function content( $atts, $content = null ) {

        $el_class = $width = $el_position = $css_animation = '';

        extract(shortcode_atts(array(
            'el_class' => '',
            'el_position' => '',
            'width' => '1/2',
            'css_animation' => ''
        ), $atts));

        $output = '';

        $el_class = $this->getExtraClass($el_class);

        $width = '';//wpb_translateColumnWidthToSpan($width);
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'wpb_text_column wpb_content_element '.$width.$el_class, $this->settings['base']);
        $css_class .= $this->getCSSAnimation($css_animation);
        $output .= "\n\t".'<div class="'.$css_class.'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
        $output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
        $output .= "\n\t\t".'</div> ' . $this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div> ' . $this->endBlockComment($width);

        //
        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}