<?php

require_once("$CFG->libdir/formslib.php");
require_once($CFG->dirroot . '/user/lib.php');
require_once($CFG->dirroot . '/local/change_password/lib.php');

class change_password_form extends moodleform
{
    //Add elements to form
    public function definition()
    {
        global $USER, $CFG;
        $mform = $this->_form;

        $mform->setDisableShortforms(true);
        $mform->addElement('header', 'forgetpassword', get_string('pluginname', 'local_change_password'), '');

        // Include the username in the form so browsers will recognise that a password is being set.
        if (isloggedin() OR isguestuser()) {
            $mform->addElement('static', 'username', get_string('username', 'local_change_password'), $USER->username);

            $purpose = user_edit_map_field_purpose($USER->id, 'password');
            $mform->addElement('password', 'password', get_string('oldpassword', 'local_change_password'), $purpose);

            $mform->addRule('password', get_string('required', 'local_change_password'), 'required', null, 'client');
            $mform->setType('password', PARAM_RAW);

            $mform->addElement('password', 'newpassword1', get_string('newpassword', 'local_change_password'));
            $mform->addRule('newpassword1', get_string('required', 'local_change_password'), 'required', null, 'client');
            $mform->setType('newpassword1', PARAM_RAW);

            $mform->addElement('password', 'newpassword2', get_string('newpassword', 'local_change_password') . ' (' . get_String('again', 'local_change_password') . ')');
            $mform->addRule('newpassword2', get_string('required', 'local_change_password'), 'required', null, 'client');
            $mform->setType('newpassword2', PARAM_RAW);

            // hidden optional params
            $mform->addElement('hidden', 'id', 0);
            $mform->setType('id', PARAM_INT);

            // Hook for plugins to extend form definition.
            core_login_extend_set_password_form($mform, $USER);
        } else {
            $mform->addElement('text', 'username', get_string('username', 'local_change_password'));
            $mform->setType('username', PARAM_RAW);
            $mform->addRule('username', get_string('required', 'local_change_password'), 'required', null, 'client');
        }

        // buttons
        if (get_user_preferences('auth_forcepasswordchange')) {
            $this->add_action_buttons(false);
        } else {
            $this->add_action_buttons(true);
        }
    }

    /// perform extra password change validation
    function validation($data, $files)
    {
        GLOBAL $USER, $DB;
        $errors = parent::validation($data, $files);

        // Extend validation for any form extensions from plugins.
        if (isloggedin() OR isguestuser()) {
            $errors = array_merge($errors, core_login_validate_extend_set_password_form($data, $USER));

            // ignore submitted username
            if (!$user = authenticate_user_login($USER->username, $data['password'], true, $reason, false)) {
                $errors['password'] = get_string('invalidpassword', 'local_change_password');
                return $errors;
            }

            // Ignore submitted username.
            if ($data['newpassword1'] <> $data['newpassword2']) {
                $errors['newpassword1'] = get_string('passwordsdiffer', 'local_change_password');
                $errors['newpassword2'] = get_string('passwordsdiffer', 'local_change_password');
                return $errors;
            }

            if ($data['password'] == $data['newpassword1']) {
                $errors['newpassword1'] = get_string('mustchangepassword', 'local_change_password');
                $errors['newpassword2'] = get_string('mustchangepassword', 'local_change_password');
                return $errors;
            }

            if (user_is_previously_used_password($user->id, $data['newpassword1'])) {
                $errors['newpassword1'] = get_string('errorpasswordreused', 'local_change_password');
                $errors['newpassword2'] = get_string('errorpasswordreused', 'local_change_password');
            }

            $errmsg = ''; // Prevents eclipse warnings.
            if (!my_check_password_policy($data['newpassword1'], $errmsg, $user)) {
                $errors['newpassword1'] = $errmsg;
                $errors['newpassword2'] = $errmsg;
                return $errors;
            }

        } else {
            //check if is set username

            $user = $DB->get_record('user', array('username' => $data['username']), 'username');

            if (!$user->username) {
                $errors['username'] = get_string('usernameisnotundefined', 'local_change_password');
                return $errors;
            }
        }
        return $errors;
    }
}

