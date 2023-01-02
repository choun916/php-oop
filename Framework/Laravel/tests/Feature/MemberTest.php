<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_auth_member_join_and_login()
    {
        $member = [
            'email' => time().'test@email.com',
            'name' => 'testname',
            'password' => 'testpassword',
        ];

        $response = $this->post('/api/auth/member/join', $member);
        $response->assertStatus(200);

        $response = $this->post('/api/auth/member/login', [
            'email' => $member['email'],
            'password' => '1111'
        ]);
        $response->assertStatus(400);

        $response = $this->post('/api/auth/member/login', [
            'email' => $member['email'],
            'password' => $member['password']
        ]);
        $response->assertStatus(200);
    }
}
