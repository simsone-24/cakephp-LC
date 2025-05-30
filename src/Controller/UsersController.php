<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    // public function initialize(): void
    // {
    //     parent::initialize();
    //     $this->loadModel('UsersHistory');
    // }


    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            // $password= $data['password'];
            $user = $this->Users->patchEntity($user, $data);
            // debug($user);
            // die();

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            // debug($data);
            // die();
            $user = $this->Users->find()->where(['email' => $data['email']])->first();

            if ($user && password_verify($data['password'], $user->password)) {
                $this->request->getSession()->write('Auth.user', $user);
                $this->Flash->success("logged in ");
                $time = date('Y-m-d H:i:s');
                $username = $data['email'];

                $data_history = [
                    'email' => $username,
                    'time' => $time
                ];

                // debug($data_history);
                // die();
                // $history = $this->UsersHistory->newEmptyEntity();

                // $history = $this->UsersHistory->patchEntity($history, $data_history);
                // $this->UsersHistory->save($history);

                // debug($time);
                // die;
                return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'homepage']);

            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
