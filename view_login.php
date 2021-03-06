<?php
$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);

if(!has_capability('local/change_password:change', $systemcontext)){
    print_error('password_access_exception');
}

// setup text strings
$strforgotten = get_string('passwordforgotten', 'local_change_password');
$strlogin = get_string('login', 'local_change_password');

$PAGE->navbar->add($strlogin, get_login_url());
$PAGE->navbar->add($strforgotten);
$PAGE->set_title($strforgotten);
$PAGE->set_heading($COURSE->fullname);

//user context
$mform = new change_password_form();

if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot . '/login/index.php');
} else if ($data = $mform->get_data()) {
    $strpasswordchanged = get_string('emailpasswordconfirmmaybesent', 'local_change_password');
    if (empty($token)) {
        $user_field = $DB->get_record('user', array('username' => $data->username), 'email');
        core_login_user_password_reset($data->username, $user_field->email);
    }

    $PAGE->set_title($strforgotten);
    $PAGE->set_heading($COURSE->fullname);
    $PAGE->requires->css('/local/change_password/css/styles.css');
    echo $OUTPUT->header();

    notice($strpasswordchanged, new moodle_url('/login/index.php'));

    echo $OUTPUT->footer();
    exit;
}

if (empty($token)) {
    echo $OUTPUT->header();
    echo $OUTPUT->box(get_string('passwordforgotteninstructions2', 'local_change_password'), 'generalbox boxwidthnormal boxaligncenter');
    $mform->display();
    echo $OUTPUT->footer();
}
