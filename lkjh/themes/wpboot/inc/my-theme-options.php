<?php 

/** 
 * Define our settings sections 
 * 
 * array key=$id, array value=$title in: add_settings_section( $id, $title, $callback, $page ); 
 * @return array 
 */  
function cwd_options_page_sections() {  
      
    $sections = array();  
    // $sections[$id]       = __($title, 'cwd_textdomain');  
    $sections['txt_section']    = __('Linkuri retele de socializare', 'cwd_textdomain');  
    /*$sections['txtarea_section']    = __('Textarea Form Fields', 'cwd_textdomain');  
    $sections['select_section']     = __('Select Form Fields', 'cwd_textdomain');  
    $sections['checkbox_section']   = __('Checkbox Form Fields', 'cwd_textdomain'); */ 
      
    return $sections;     
}

/** 
 * Define our form fields (settings)  
 * 
 * @return array 
 */  
function cwd_options_page_fields() {  

    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_fb_txt_input",  
        "title"   => __( 'Facebook Address', 'cwd_textdomain' ),  
        "desc"    => __( 'Adresa dvs. de Facebook', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "https://www.facebook.com/creativedesign4web",  
        "class"   => "url"  
    );

    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_tw_txt_input",  
        "title"   => __( 'Twitter Address', 'cwd_textdomain' ),  
        "desc"    => __( 'Adresa dvs. de Twitter', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "https://twitter.com/webdesignbuc",  
        "class"   => "url"  
    );

    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_gplus_txt_input",  
        "title"   => __( 'Google+ Address', 'cwd_textdomain' ),  
        "desc"    => __( 'Adresa dvs. de Google+', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "https://plus.google.com/103907225546063045621/posts",  
        "class"   => "url"  
    );

    // Text Form Fields section  
   /* $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_txt_input",  
        "title"   => __( 'Text Input - Some HTML OK!', 'cwd_textdomain' ),  
        "desc"    => __( 'A regular text input field. Some inline HTML (a, b, em, i, strong) is allowed.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => __('Some default value','cwd_textdomain')  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_nohtml_txt_input",  
        "title"   => __( 'No HTML!', 'cwd_textdomain' ),  
        "desc"    => __( 'A text input field where no html input is allowed.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => __('Some default value','cwd_textdomain'),  
        "class"   => "nohtml"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_numeric_txt_input",  
        "title"   => __( 'Numeric Input', 'cwd_textdomain' ),  
        "desc"    => __( 'A text input field where only numeric input is allowed.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "123",  
        "class"   => "numeric"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_multinumeric_txt_input",  
        "title"   => __( 'Multinumeric Input', 'cwd_textdomain' ),  
        "desc"    => __( 'A text input field where only multible numeric input (i.e. comma separated numeric values) is allowed.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "123,234,345",  
        "class"   => "multinumeric"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_url_txt_input",  
        "title"   => __( 'URL Input', 'cwd_textdomain' ),  
        "desc"    => __( 'A text input field which can be used for urls.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "http://wp.tutsplus.com",  
        "class"   => "url"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_email_txt_input",  
        "title"   => __( 'Email Input', 'cwd_textdomain' ),  
        "desc"    => __( 'A text input field which can be used for email input.', 'cwd_textdomain' ),  
        "type"    => "text",  
        "std"     => "email@email.com",  
        "class"   => "email"  
    );  
      
    $options[] = array(  
        "section" => "txt_section",  
        "id"      => CWD_SHORTNAME . "_multi_txt_input",  
        "title"   => __( 'Multi-Text Inputs', 'cwd_textdomain' ),  
        "desc"    => __( 'A group of text input fields', 'cwd_textdomain' ),  
        "type"    => "multi-text",  
        "choices" => array( __('Text input 1','cwd_textdomain') . "|txt_input1", __('Text input 2','cwd_textdomain') . "|txt_input2", __('Text input 3','cwd_textdomain') . "|txt_input3", __('Text input 4','cwd_textdomain') . "|txt_input4"),  
        "std"     => ""  
    );  
      
    // Textarea Form Fields section  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => CWD_SHORTNAME . "_txtarea_input",  
        "title"   => __( 'Textarea - HTML OK!', 'cwd_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text. HTML tags allowed!', 'cwd_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','cwd_textdomain')  
    );  
  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => CWD_SHORTNAME . "_nohtml_txtarea_input",  
        "title"   => __( 'No HTML!', 'cwd_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text. No HTML!', 'cwd_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','cwd_textdomain'),  
        "class"   => "nohtml"  
    );  
      
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => CWD_SHORTNAME . "_allowlinebreaks_txtarea_input",  
        "title"   => __( 'No HTML! Line breaks OK!', 'cwd_textdomain' ),  
        "desc"    => __( 'No HTML! Line breaks allowed!', 'cwd_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','cwd_textdomain'),  
        "class"   => "allowlinebreaks"  
    );  
  
    $options[] = array(  
        "section" => "txtarea_section",  
        "id"      => CWD_SHORTNAME . "_inlinehtml_txtarea_input",  
        "title"   => __( 'Some Inline HTML ONLY!', 'cwd_textdomain' ),  
        "desc"    => __( 'A textarea for a block of text.  
            Only some inline HTML  
            (a, b, em, strong, abbr, acronym, blockquote, cite, code, del, q, strike)   
            is allowed!', 'cwd_textdomain' ),  
        "type"    => "textarea",  
        "std"     => __('Some default value','cwd_textdomain'),  
        "class"   => "inlinehtml"  
    );    
      
    // Select Form Fields section  
    $options[] = array(  
        "section" => "select_section",  
        "id"      => CWD_SHORTNAME . "_select_input",  
        "title"   => __( 'Select (type one)', 'cwd_textdomain' ),  
        "desc"    => __( 'A regular select form field', 'cwd_textdomain' ),  
        "type"    => "select",  
        "std"    => "3",  
        "choices" => array( "1", "2", "3")  
    );  
      
    $options[] = array(  
        "section" => "select_section",  
        "id"      => CWD_SHORTNAME . "_select2_input",  
        "title"   => __( 'Select (type two)', 'cwd_textdomain' ),  
        "desc"    => __( 'A select field with a label for the option and a corresponding value.', 'cwd_textdomain' ),  
        "type"    => "select2",  
        "std"    => "",  
        "choices" => array( __('Option 1','cwd_textdomain') . "|opt1", __('Option 2','cwd_textdomain') . "|opt2", __('Option 3','cwd_textdomain') . "|opt3", __('Option 4','cwd_textdomain') . "|opt4")  
    );  
      
    // Checkbox Form Fields section  
    $options[] = array(  
        "section" => "checkbox_section",  
        "id"      => CWD_SHORTNAME . "_checkbox_input",  
        "title"   => __( 'Checkbox', 'cwd_textdomain' ),  
        "desc"    => __( 'Some Description', 'cwd_textdomain' ),  
        "type"    => "checkbox",  
        "std"     => 1 // 0 for off  
    );  
      
    $options[] = array(  
        "section" => "checkbox_section",  
        "id"      => CWD_SHORTNAME . "_multicheckbox_inputs",  
        "title"   => __( 'Multi-Checkbox', 'cwd_textdomain' ),  
        "desc"    => __( 'Some Description', 'cwd_textdomain' ),  
        "type"    => "multi-checkbox",  
        "std"     => '',  
        "choices" => array( __('Checkbox 1','cwd_textdomain') . "|chckbx1", __('Checkbox 2','cwd_textdomain') . "|chckbx2", __('Checkbox 3','cwd_textdomain') . "|chckbx3", __('Checkbox 4','cwd_textdomain') . "|chckbx4")    
    ); */ 
      
    return $options;      
} 