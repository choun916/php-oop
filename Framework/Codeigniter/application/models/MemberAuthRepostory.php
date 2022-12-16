<?php declare (strict_types = 1);

use PhpOop\Core\Exception\DuplicateKeyException;
use PhpOop\Core\Repository\Auth\Dto\CreateMemberDto;
use PhpOop\Core\Repository\Auth\MemberRepositoryInterface;

class MemberAuthRepostory extends CI_Model implements MemberRepositoryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

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

    public function get_last_ten_entries()
    {
        echo 11111111;
    }

    public function insert_entry()
    {
        $this->title = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
