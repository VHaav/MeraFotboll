<?php
namespace Anax\Users;
 
/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable,
        \Anax\Comment\TAccessCommon;
    
    /**
     * Initialize the controller.
     *
     * @return void
     */
    public function initialize()
    {
        $this->users = new \Anax\Users\User();
        $this->users->setDI($this->di);
        
        $this->answears = new \Anax\Comment\Answear();
        $this->answears->setDI($this->di);
        
        $this->comments = new \Anax\Comment\Comment();
        $this->comments->setDI($this->di);
    }
 
    /**
     * List all users.
     *
     * @return void
     */
    public function listAction()
    {
        $all = $this->users->findAll();
     
        $this->theme->setTitle("List all users");
        $this->views->add('users/list', [
            'users' => $all,
            'title' => "View all users",
        ]);
    }
    
    /**
     * List user with id.
     *
     * @param int $id of user to display
     *
     * @return void
     */
    public function idAction($id = null)
    {
        $user = $this->users->find($id);
        $questions = $this->getUserQuestions($user->id);
        $answears = $this->getUserAnswears($user->id);
        $answearedQuestions = $this->getQuestionsForAnswears($answears);
        $this->theme->setTitle("Användare");
        $this->views->add('users/view', [
            'user' => $user,
            'title' => 'Användare',
            'questions' => $questions,
            'answears' => $answears,
            'answearedQuestions' => $answearedQuestions,
        ]);
    }
    
    /**
     * Add new user.
     *
     * @param string $acronym of user to add.
     *
     * @return void
     */
    public function addAction($params = null) // ta emot array med all användar info
    {
        if (!isset($params)) {
            die("Missing parameters for new user, please go back!");
        }
        
        $now = date('Y-m-d H:i:s');
     
        $this->users->save([
            'acronym' => $params['acronym'],
            'email' => $params['email'],
            'name' => $params['name'],
            'password' => password_hash($params['password'], PASSWORD_DEFAULT),
            'created' => $now,
            'active' => $now,
        ]);
        $this->di->flasher->createFlash("Ny användare har skapats!", 'success');
        $url = $this->url->create('form/login');
        $this->response->redirect($url);
    }
    
    /**
     * Delete user.
     *
     * @param integer $id of user to delete.
     *
     * @return void
     */
    public function deleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }
     
        $res = $this->users->delete($id);
     
        $url = $this->url->create('users/list');
        $this->response->redirect($url);
    }
    
    public function updateAction($params = null)
    {
        $now = date('Y-m-d H:i:s');
     
        $this->users->save([
            'id' => $params['id'],
            'acronym' => $params['acronym'],
            'email' => $params['email'],
            'name' => $params['name'],
            'updated' => $now,
            'active' => $now,
        ]);
        if($this->di->session->get('user') !== null){           
            $queryResult = $this->users->query()->where("id = ?")->execute([$params['id']]);
            $this->di->session->set('user', $queryResult[0]); 
        }
        else{
            $this->dispatcher->forward([
                'controller' => 'form',
                'action' => 'login',
            ]);
        }
     
        $url = $this->url->create('users/id/' . $this->users->id);
        $this->response->redirect($url);
    }
    
    public function updateFormAction($id = null){
        if (!isset($id)) {
            die("Missing id");
        }
        $user = $this->users->find($id);
        $params = array('id' => $id, 'acronym' => $user->acronym, 'name' => $user->name, 'email' => $user->email);
        $this->di->dispatcher->forward([
            'controller' => 'form',
            'action' => 'update-user',
            'params' => [$params]
        ]);
    }
    
    /**
     * Delete (soft) user.
     *
     * @param integer $id of user to delete.
     *
     * @return void
     */
    public function softDeleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }
     
        $now = date('Y-m-d H:i:s');
     
        $user = $this->users->find($id);
     
        $user->deleted = $now;
        $user->save();
     
        $url = $this->url->create('users/active/' . $id);
        $this->response->redirect($url);
    }
    
    /**
     * Bring back softly deleted user.
     *
     * @param integer $id of user to bring back.
     *
     * @return void
     */
    public function bringBackAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }
     
        $now = date('Y-m-d H:i:s');
     
        $user = $this->users->find($id);
     
        $user->deleted = null;
        $user->save();
     
        $url = $this->url->create('users/inactive/' . $id);
        $this->response->redirect($url);
    }
    
    /**
     * List all active and not deleted users.
     *
     * @return void
     */
    public function activeAction()
    {
        $all = $this->users->query()
            ->where('active IS NOT NULL')
            ->andWhere('deleted is NULL')
            ->execute();
     
        $this->theme->setTitle("Active Users");
        $this->views->add('users/users', [
            'users' => $all,
            'title' => 'Active users',
        ]);
    }
    
    /**
     * List all soft deleted users.
     *
     * @return void
     */
    public function inactiveAction()
    {
        $all = $this->users->query()
            ->where('deleted IS NOT NULL')
            ->execute();
     
        $this->theme->setTitle("Inactive Users");
        $this->views->add('users/users', [
            'users' => $all,
            'title' => "Inactive users",
        ]);
    }
    
    public function profileAction()
    {
        if($this->di->session->get('user') !== null){
            $user = $this->di->session->get('user');
            
            $questions = $this->getUserQuestions($user->id);
            $answears = $this->getUserAnswears($user->id);
            $answearedQuestions = $this->getQuestionsForAnswears($answears);
            
            $this->theme->setTitle("Profil");
            $this->views->add('users/profile', [
                'title' => "Profil",
                'user' => $user,
                'questions' => $questions,
                'answears' => $answears,
                'answearedQuestions' => $answearedQuestions,
            ]);
        }
        else {
            $this->dispatcher->forward([
                'controller' => 'form',
                'action' => 'login',
            ]);
        }        
    }
    
    public function loginAction($params = null)
    {
        if(!isset($params)){
            die("Missing login parameters! Please go back!");
        }
        
        if($this->login($params['acronym'], $params['password'])) {
            $this->di->flasher->createFlash("Inloggning lyckades. Du är nu inloggad som {$this->di->session->get('user')->acronym}, välkommen!", 'success');
        }
        else{
            $this->di->flasher->createFlash("Inloggning misslyckades! Var vänlig kontroller dina inloggninguppgifter och försök igen.", 'failed');
        }
        
        $url = $this->url->create("form/login");
        $this->response->redirect($url);
    }
    
    public function login($acr, $pass)
    {
        if($user = $this->getUserByAcronym($acr)){
            $now = date('Y-m-d H:i:s');
            $this->users->save([
                'id' => $user->id,
                'active' => $now,
            ]);            
            $hashedPassword = $user->password;
            if(password_verify($pass, $hashedPassword)){
                $this->di->session->set('user', $user);
                return true;
            }
            else
                return false;
        }
        else{
            return false;
        }
    }
    
    public function getUserByAcronym($acr)
    {
        $response = $this->users->query()
            ->where('acronym = ?')
            ->execute([$acr]);
            
        if(isset($response[0])){
            return $response[0];
        }
        else{
            return false;   
        }
    }
    
    public function logoutAction()
    {
        $this->di->session->set('user', null);
        $this->di->flasher->createFlash("Utloggning lyckades. Välkommen åter!", 'success');
        $url = $this->url->create("form/login");
        $this->response->redirect($url);
    }    
    
    public function resetAction()
    {
        $this->di->db->dropTableIfExists('user')->execute();
        $this->di->db->createTable(
            'user',
            [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'acronym' => ['varchar(20)', 'unique', 'not null'],
                'email' => ['varchar(80)'],
                'name' => ['varchar(80)'],
                'password' => ['varchar(255)'],
                'activityPoints' => ['integer', 'default 0'],
                'created' => ['datetime'],
                'updated' => ['datetime'],
                'deleted' => ['datetime'],
                'active' => ['datetime'],
            ]
        )->execute();
        
        $this->di->db->insert(
            'user',
            ['acronym', 'email', 'name', 'password', 'created', 'active']
        );
        
        $now = date('Y-m-d H:i:s');
     
        $this->di->db->execute([
            'admin',
            'admin@dbwebb.se',
            'Administrator',
            password_hash('admin', PASSWORD_DEFAULT),
            $now,
            $now
        ]);
     
        $this->di->db->execute([
            'doe',
            'doe@dbwebb.se',
            'John/Jane Doe',
            password_hash('doe', PASSWORD_DEFAULT),
            $now,
            $now
        ]);
        
        $this->di->dispatcher->forward([
            'controller' => 'users',
            'action'     => 'list',
        ]);
    }
}