<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $input;

	public function __construct()
	{
		parent::__construct();
	}

	private function response($data=['status' => 'OK'], int $status=200): void
	{
		$this->output
				->set_status_header($status)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
				->_display();
		exit;
	}

	public function ErrorResponse(string $message=''): void
	{
		$this->response(['status' => 'ERROR', 'message' =>$message]);

	}

	public function SuccessRepponse()
	{
		$this->response(['status' => 'OK']);
	}
}
