<?php
class WPBakeryShortCode_VC_Single_image extends WPBakeryShortCode {

    public function content( $atts, $content = null ) {

        $el_class = $width = $el_position = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $css_animation = '';

        extract(shortcode_atts(array(
            'title' => '',
            'width' => '1/2',
            'image' => $image,
            'el_position' => '',
            'img_size'  => 'thumbnail',
            'img_link_large' => false,
            'img_link' => '',
            'img_link_target' => '_self',
            'el_class' => '',
            'css_animation' => ''
        ), $atts));

        $output = '';
        $img_id = preg_replace('/[^\d]/', '', $image);
        $img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
        if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" /> <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';
        $el_class = $this->getExtraClass($el_class);
        
        $a_class = '';
        if ( $el_class != '' ) {
          $tmp_class = explode(" ", strtolower($el_class));
          $tmp_class = str_replace(".", "", $tmp_class);
          if ( in_array("prettyphoto", $tmp_class) ) {
            wp_enqueue_script( 'prettyphoto' );
            wp_enqueue_style( 'prettyphoto' );
            $a_class = ' class="prettyphoto"';
            $el_class = str_ireplace(" prettyphoto", "", $el_class);
          }
        }
        
        $width = '';//wpb_translateColumnWidthToSpan($width);
        // $content =  !empty($image) ? '<img src="'..'" alt="">' : '';
        
        $link_to = '';
        if ($img_link_large==true) {
          $link_to = wp_get_attachment_image_src( $img_id, 'large');
          $link_to = $link_to[0];
        }
        else if (!empty($img_link)) {
          $link_to = $img_link;
        }
        $image_string = !empty($link_to) ? '<a'.$a_class.' href="'.$link_to.'"'.($img_link_target!='_self' ? ' target="'.$img_link_target.'"' : '').'>'.$img['thumbnail'].'</a>' : $img['thumbnail'];
        
        
        
        $content = '';
        $css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_single_image wpb_content_element'.$width.$el_class, $this->settings['base']);
        $css_class .= $this->getCSSAnimation($css_animation);
        $output .= "\n\t".'<div class="'.$css_class.'">';
        $output .= "\n\t\t".'<div class="wpb_wrapper">';
        $output .= "\n\t\t\t".wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_singleimage_heading'));
        $output .= "\n\t\t\t".$image_string;
        $output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
        $output .= "\n\t".'</div> '.$this->endBlockComment($width);
        //
        $output = $this->startRow($el_position) . $output . $this->endRow($el_position);
        return $output;
    }

    public function singleParamHtmlHolder($param, $value) {
        $output = '';
        // Compatibility fixes
        $old_names = array('yellow_message', 'blue_message', 'green_message', 'button_green', 'button_grey', 'button_yellow', 'button_blue', 'button_red', 'button_orange');
        $new_names = array('alert-block', 'alert-info', 'alert-success', 'btn-success', 'btn', 'btn-info', 'btn-primary', 'btn-danger', 'btn-warning');
        $value = str_ireplace($old_names, $new_names, $value);
        //$value = __($value, "js_composer");
        //
        $param_name = isset($param['param_name']) ? $param['param_name'] : '';
        $type = isset($param['type']) ? $param['type'] : '';
        $class = isset($param['class']) ? $param['class'] : '';

        if ( isset($param['holder']) == false || $param['holder'] == 'hidden' ) {
            $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" />';
            if(($param['type'])=='attach_image') {
                $img = wpb_getImageBySize(array( 'attach_id' => (int)preg_replace('/[^\d]/', '', $value), 'thumb_size' => 'thumbnail' ));
                $output .= ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/blank.gif') . '" class="attachment-thumbnail"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />') . '<img src="' . WPBakeryVisualComposer::getInstance()->assetURL('vc/elements_icons/single_image.png') . '" class="no_image_image' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && !empty($img['p_img_large'][0]) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'js_composer' ) . '</a>';
            }
        }
        else {
            $output .= '<'.$param['holder'].' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">'.$value.'</'.$param['holder'].'>';
        }
        return $output;
    }
}