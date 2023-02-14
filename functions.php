<html>
<?php
//functions --------------------------------------------------------------------------------------------------

//form item functions
//------------------------------------------------------------------------------------------------------------
//print a text box
function input_text($element_name, $values, $size="30", $maxlength="30") {
    print '<input type="text" id="' . $element_name . '" name="' . $element_name . '"value="';
    print htmlentities($values[$element_name]) . '"';
    print ' size ="' . $size . '"maxlength="' .$maxlength . '"/>';
}

//print a submit,clear button
function input_submitclear($type, $element_name, $label) {
    print '<input type="' . $type . '" name="' . $element_name .'" value="';
    print htmlentities($label) . '"/>';
}

//print a <select> menu
function input_select ($element_name, $selected, $options, $multiple = false) {
    //print out the <select tag
    print '<select id="' . $element_name . '" name="' . $element_name;
    //if multiple choices are permitted, add the multiple attribute
    // and add a [] to the end of the tag name
    if ($multiple) { print '[]" multiple="multiple'; }
    print '">';

    //set up the list of things to be selected
    $selected_options = array();
    if ($multiple) {
    foreach ($selected[$element_name] as $val) {
        $selected_options[$val] = true;
        }
    } else {
        $selected_options[ $selected[$element_name]] = true;
    }

    //print out the <option> tags
    foreach ($options as $option => $label) {
        print '<option value="' . htmlentities($option) . '"';
        if (isset($selected_options[$option])) {
            print ' selected="selected"';
        }
        print '>' . htmlentities ($label) . '</option>';
    }
    print '</select>';
}

//print a textarea
function input_textarea($element_name, $values, $focus, $maxlength) {
    print '<textarea rows="8" cols="50" wrap="physical" onfocus="'. $focus . '" id="' . $element_name . '" maxlength="' . $maxlength . '" name="' . $element_name . '">';
    print htmlentities($values[$element_name]) . '</textarea>';
}
//print a radio button or checkbox
function input_radiocheck($type, $element_name, $values, $element_value,  $id = "" , $onclick = "") {
    print '<input type="' . $type . '" id="'. $id . '" name="' . $element_name . '" value="' .$element_value . '" ';
    print 'onclick="' . $onclick . '" ';
    if($element_value == $values[$element_name]) {
        print ' checked="checked"';
    }
    print '/>';
}
?>
</html>
