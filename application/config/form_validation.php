<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
    'super-admin-user-login' => array(
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        )
    ),
    'super-admin-user-forgot_password' => array(
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'trim|required|valid_email'
        )
    ),
    'super-admin-user-reset_password' => array(
        array(
            'field' => 'new-password',
            'label' => 'New Password',
            'rules' => 'required|min_length[6]|max_length[20]'
        ),
        array(
            'field' => 'retype-new-password',
            'label' => 'Retype New Password',
            'rules' => 'required|min_length[6]|max_length[20]|matches[new-password]'
        )
    ),
    'super-admin-profile-edit' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'E-mail',
            'rules' => 'trim|required|strtolower|valid_email'
        )
    ),
    'super-admin-profile-change_password' => array(
        array(
            'field' => 'current-password',
            'label' => 'Current Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new-password',
            'label' => 'New Password',
            'rules' => 'required|min_length[6]|max_length[20]'
        ),
        array(
            'field' => 'retype-new-password',
            'label' => 'Retype New Password',
            'rules' => 'required|min_length[6]|max_length[20]|matches[new-password]'
        )
    ),
);