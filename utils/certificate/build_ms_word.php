<?php

$fullname   = "";
$coursename = "";
$hours      = "";
$eventdate  = "";
$footnote   = date('Y-m-d H:m:s.v');

function create_msword_docx($full_name, $course_name, $hours, $event_date, $output_filename)
{

    $GLOBALS['fullname']=$full_name;
    $GLOBALS['coursename']=$course_name;
    $GLOBALS['hours']=$hours;
    $GLOBALS['eventdate']=$event_date;


    $TBS = new clsTinyButStrong;
    $TBS->Plugin(TBS_INSTALL, OPENTBS_PLUGIN);

    $template = 'certificate/certificate_template_ms_word.docx';
    $TBS->LoadTemplate($template, OPENTBS_ALREADY_UTF8); // Also merge some [onload] automatic fields (depends of the type of document).


    $TBS->Show(OPENTBS_FILE, $output_filename);
    return;
}
?>