<?php
class WPBakeryShortCode_VC_Gmaps extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {

        $title = $link = $size = $zoom = $type = $el_position = $width = $el_class = '';
        extract(shortcode_atts(array(
            'title' => '',
            'link' => 'https://maps.google.com/maps?q=New+York&hl=en&sll=40.686236,-73.995409&sspn=0.038009,0.078192',
            'size' => 200,
            'zoom' => 14,
            'type' => 'm',
            'el_position' => '',
            'width' => '1/1',
            'el_class' => ''
        ), $atts));
        $output = '';

        if ( $link == '' ) { return null; }

        $el_class = $this->getExtraClass($el_class);
        $width = '';//wpb_translateColumnWidthToSpan($width);

        $size = str_replace(array( 'px', ' ' ), array( '', '' ), $size);
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gmaps_widget wpb_content_element'.$width.$el_class, $this->settings['base']);
        $output .= "\n\t".'<div class="'.$css_class.'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
        //$output .= ($title != '' ) ? "\n\t\t\t".'<h2 class="wpb_heading wpb_map_heading">'.$title.'</h2>' : '';
        $output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_map_heading'));
        $output .= '<div class="wpb_map_wraper"><iframe width="100%" height="'.$size.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$link.'&amp;t='.$type.'&amp;z='.$zoom.'&amp;output=embed"></iframe></div>';

        $output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div> '.$this->endBlockComment($width);

        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}