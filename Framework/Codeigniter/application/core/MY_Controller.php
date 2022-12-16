<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $input;

	public function __construct()
	{
		parent::__construct();
	}

	private function response($data, int $status=200): void
	{
		$this->output
				->set_status_header($status)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();
		exit;
	}

	public function errorResponse(string $message=''): void
	{
		$this->response(['status' => 'ERROR', 'message' =>$message]);

	}

	public function successRepponse($data=[]): void
	{
		$this->response(['status' => 'OK', 'data' => $data]);
	}
}
