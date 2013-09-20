<?php
class WPBakeryShortCode_VC_flickr extends WPBakeryShortCode {

    protected function content($atts, $content = null) {

        extract(shortcode_atts(array(
            'width' => '1/2',
            'el_position' => '',
            'el_class' => '',
            'title' => '',
            'flickr_id' => '95572727@N00',
            'count' => '6',
            'type' => 'user',
            'display' => 'latest'
        ), $atts));

        $width_class = '';//wpb_translateColumnWidthToSpan($width); // Determine width for our div holder
        $el_class = $this->getExtraClass( $el_class );
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_flickr_widget wpb_content_element'.$width_class.$el_class, $this->settings['base']);
        $output = "\n\t".'<div class="'.$css_class.'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
        //$output .= ($title != '' ) ? "\n\t\t\t".'<h2 class="wpb_heading wpb_flickr_heading">'.$title.'</h2>' : '';
        $output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_flickr_heading'));

        $output .= "\n\t\t\t".'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='. $count . '&amp;display='. $display .'&amp;size=s&amp;layout=x&amp;source='. $type .'&amp;'. $type .'='. $flickr_id .'"></script>';

        $output .= "\n\t\t\t".'<p class="flickr_stream_wrap"><a class="wpb_follow_btn wpb_flickr_stream" href="http://www.flickr.com/photos/'. $flickr_id .'">'.__("View stream on flickr", "js_composer").'</a></p>';

        $output .= "\n\t\t".'</div>'.$this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div>'.$this->endBlockComment('.wpb_flickr_widget')."\n";

        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }
}