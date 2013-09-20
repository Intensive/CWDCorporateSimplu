<?php
class WPBakeryShortCode_VC_Video extends WPBakeryShortCode {

    protected function content( $atts, $content = null ) {
        $title = $link = $size = $el_position = $width = $el_class = '';
        extract(shortcode_atts(array(
            'title' => '',
            'link' => 'http://vimeo.com/23237102',
            'size' => ( isset($content_width) ) ? $content_width : 500,
            'el_position' => '',
            'width' => '1/1',
            'el_class' => ''
        ), $atts));
        $output = '';

        if ( $link == '' ) { return null; }
        $el_class = $this->getExtraClass($el_class);
        $width = '';//wpb_translateColumnWidthToSpan($width);
        /*$size = str_replace(array( 'px', ' ' ), array( '', '' ), $size);
        $size = explode("x", $size);
        $video_w = $size[0];
        $video_h = '';
        if ( count($size) > 1 ) {
            $video_h = ' height="'.$size[1].'"';
        }*/
        $video_w = ( isset($content_width) ) ? $content_width : 500;
        $video_h = $video_w/1.61; //1.61 golden ratio
        global $wp_embed;
        $embed = $wp_embed->run_shortcode('[embed width="'.$video_w.'"'.$video_h.']'.$link.'[/embed]');
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_video_widget wpb_content_element'.$width.$el_class, $this->settings['base']);
        $output .= "\n\t".'<div class="'.$css_class.'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
        //$output .= ($title != '' ) ? "\n\t\t\t".'<h2 class="wpb_heading wpb_video_heading">'.$title.'</h2>' : '';
        $output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_video_heading'));
        $output .= '<div class="wpb_video_wrapper">' . $embed . '</div>';
        $output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div> '.$this->endBlockComment($width);

        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}