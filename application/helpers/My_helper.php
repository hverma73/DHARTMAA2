<?php
    function checkLogin() {
        $CI = & get_instance();
        if ($user_info = $CI->session->userdata('userData')) {
            $user_info = $CI->session->userdata('userData');
            if ($user_info) {
                // $CI->session->set_flashdata('alertMsg', 'You are not authorized to see this area.');
                // redirect('home/login');
            }
        } else {
            $CI->session->set_flashdata('alertMsg', 'You are not authorized to see this area.');
            redirect('home/login');
        }
    }
?>