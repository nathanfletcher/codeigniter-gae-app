<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use \google\appengine\api\mail\Message;

class Mail_Controller {
	
	var $CI;
	
	function __construct() {

		//Get CI
		$this->CI = &get_instance();
	}
	
	function super_admin_forgot_password_mail( $user ) {

		//Subject
		$subject = 'Code to reset your password.';
		$login_link = base_url() . "super-admin/user/reset_password/" . rawurlencode($user['id']) . "/" . $user['token'];

$message = <<<EOD
<p>Dear <strong>{$user['name']}</strong>,</p>
<p>Use the following link to reset your Super Admin password.</p>
<p><a href="$login_link">$login_link</a></p>
EOD;

		//Prepare data to send email
		$data = array(
			'to'		=> $user['email'],
			'subject'	=> $subject,
			'message'	=> $message
		);
		
		$this->_sendmail ( $data );
	}
	
	function _sendmail ( $data ) {

        try {

            $message = new Message();
            $message->addTo($data['to']);
            $message->setSender($this->CI->config->item('email_from'));
            $message->setReplyTo($this->CI->config->item('email_reply_to'));
            $message->setSubject($this->CI->config->item('site_name_url') . " - " . $data['subject']);
            $message->setHtmlBody($this->CI->load->view('email/template.php', array(
                'message' => $data['message'],
                'subject' => $data['subject']
            ), true));

            $message->send();

        } catch (InvalidArgumentException $e) {

        }

	}
}