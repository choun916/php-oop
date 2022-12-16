<?php defined('BASEPATH') or exit('No direct script access allowed');

use PhpOop\Core\Service\Auth\MemberService;

class Member extends MY_Controller
{

    private MemberService $memberService;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('MemberAuthRepostory');

        $this->memberService = new MemberService($this->MemberAuthRepostory);
    }

    /**
     * Index Page for this controller.
     */
    public function join()
    {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $password = $this->input->post('password');

        try {
            $result = $this->memberService->join($email, $name, $password);
			$result === true ? $this->SuccessRepponse() : $this->ErrorResponse();
        } catch (\Exception $e) {
			$this->ErrorResponse($e->getMessage());
        }

		$this->ErrorResponse();
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->memberService->login($email, $password);

        return $result;
    }
}
