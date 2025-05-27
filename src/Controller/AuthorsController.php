<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 */
class AuthorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Authors->find();
        $authors = $this->paginate($query);

        $this->set(compact('authors'));
    }

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $author = $this->Authors->get($id, contain: []);
        $publishers = $this->Authors->Publishers->find('list')->toArray();
        $this->set(compact('author', 'publishers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function form($id = null)
    {
        if (empty($id)) {
            $author = $this->Authors->newEmptyEntity();
            $this->set(compact('author'));
            $this->render('form');
        } 
        
        else {
            $author = $this->Authors->get($id);
            $this->set(compact('author'));
            $this->render('form');
        }

       
    }

    public function add()
    {
        $author = $this->Authors->newEmptyEntity();
        $publishers = $this->Authors->Publishers->find('list')->toArray();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $image = $data['image'];
            unset($data['image']);
            $author = $this->Authors->patchEntity($author, $data);

            if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $image->getClientFilename();
                $path = WWW_ROOT . 'img/uploads/' . $fileName;
                $image->moveTo($path);
                $author->image = 'uploads/' . $fileName;
            }
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        // $this->set(compact('author'));
        $this->set(compact('author', 'publishers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function edit($id = null)
    {
        $author = $this->Authors->get($id, ['contain' => []]);
        $publishers = $this->Authors->Publishers->find('list')->toArray();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $image = $data['image'];
            unset($data['image']);

            $author = $this->Authors->patchEntity($author, $data);

            if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $image->getClientFilename();
                $path = WWW_ROOT . 'img/uploads/' . $fileName;
                $image->moveTo($path);
                $author->image = 'uploads/' . $fileName;
            }

            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been updated.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The author could not be updated. Please, try again.'));
        }

        $this->set(compact('author', 'publishers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('The author has been deleted.'));
        } else {
            $this->Flash->error(__('The author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function record()
    {
        $data=$this->request->getData();
        $author=$data['name'];
        $status=$data['status'];

        // if(!empty($author)&&!empty($status)) {
           $query= $this->Authors->find()
           ->where([
                "Authors.name LIKE"=> "%$author%",
                "Authors.status"=>$status
            ]);
            $authors=$query->all();
            debug($authors);
            die();
            // $this->set(compact('authors'));
        // }

        
    }
}
