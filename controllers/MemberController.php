<?php 

require_once 'config.php';
require_once './models/Member.php';


class MemberContoller{

    public function index(){
        $member = new Member();
        $members = $member->getMembers();
        $tree = $this->buildTree($members);
        $renderTree = $this->renderTree($tree);
        include './views/member/index.php';
    }

    private function buildTree($members , $parent_id = null){
        $branch = [];
        foreach($members as $member){
            if($member['parent_id'] == $parent_id){
               $children = $this->buildTree($members, $member['id']);
               if($children){
                $member['children'] = $children;
               }
               $branch[]= $member;
            }
        }
        return $branch;
    }

    public function addMember() {
        $name = $_POST['name'];
        $parentId = $_POST['parent_id'];
        if (!empty($name) && is_string($name)) {
            $memberModel = new Member();
            if ($memberModel->insertMember($name, $parentId)) {
                $members = $memberModel->getMembers();
                $tree = $this->buildTree($members);
                $renderTree = $this->renderTree($tree);
                echo json_encode(['status' => 'success', 'name' => $name, 'parent_id' => $parentId, 'tree' =>$renderTree]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to insert member.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid name.']);
        }
    }

    public function renderTree($members){
        $html = '<ul>';
        foreach($members as $member){
            $html .='<li>' . htmlspecialchars($member['name']);
            if(!empty($member['children'])){
                $html .= $this->renderTree($member['children']);
            }
            $html .='</li>';
        }
        $html .='</ul>';
        return $html;
    }
}

?>