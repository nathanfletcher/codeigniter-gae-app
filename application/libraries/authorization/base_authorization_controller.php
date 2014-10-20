<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_Authorization_Controller extends MY_Controller {

    protected $site = "";
    protected $page = "";
    protected $auth = "";
    protected $list_page = null;

    public function __construct() {

        parent::__construct();

        $this->_init();
    }

    private function _init() {

        if ( !$this->{$this->auth}->isLoggedIn() ) {
            redirect ( $this->site . '/user/login' );
        }
    }

    protected function getView() {

        $callers=debug_backtrace();
        $caller = $callers[2]['function'];

        return "/" . $this->site . "/" . $this->page . "/" . $caller;
    }

    protected function loadSuccessView() {
        redirect($this->getView() . "_success");
    }

    protected function loadFailedView() {
        redirect($this->getView() . "_failed");
    }

    protected function validateForm() {

        $callers=debug_backtrace();
        $caller = $callers[1]['function'];

        error_log($this->site . "-" . $this->page . "-" . $caller);

        return $this->form_validation->run($this->site . "-" . $this->page . "-" . $caller);
    }
}