<?php declare (strict_types = 1);

use PhpOop\Core\Exception\DuplicateKeyException;
use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\Dto\LoginMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class MemberAuthRepostory extends CI_Model implements MemberRepositoryInterface
{
    public function create(CreateMemberDto $createMemberDto): bool
    {
        $this->db->insert('members', [
            'email' => $createMemberDto->getEmail(),
            'name' => $createMemberDto->getName(),
            'password' => $createMemberDto->getPassword(),
        ]);

        if ($this->db->error()['code'] == 1062){
            throw new DuplicateKeyException($this->db->error()['message']);
        }
        return $this->db->affected_rows() > 0;
    }

    public function getEmailByLoginDto(LoginMemberDto $loginMemberDto): string
    {
        $this->db->select('email');
        $this->db->from('members');
        $this->db->where([
            'email' => $loginMemberDto->getEmail(),
            'password' => $loginMemberDto->getPassword(),
        ]);

        $query = $this->db->get();
        $result = $query->row_array();

        return $result['email'] ?? '';
    }
}
