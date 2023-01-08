<?php

namespace Tests\Feature;

use Tests\TestCase;

class CurriculumVitaeTest extends TestCase
{
    public function test_create_curriculum_vitae()
    {
        $member = [
            'email' => time().'test@email.com',
            'name' => 'testname',
            'password' => 'testpassword',
        ];

        $response = $this->post('/api/cv/23', $member);
        $response->assertStatus(200);
    }
}
