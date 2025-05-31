<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Publisher;

/**
 * Publishers Controller
 *
 * @property \App\Model\Table\PublishersTable $Publishers
 */
class PublishersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Publishers->find();
        $publishers = $this->paginate($query);

        $this->set(compact('publishers'));
    }

    /**
     * View method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publisher = $this->Publishers->get($id, contain: []);

        $authors = $this->Publishers->Authors->find('list')->toArray();
        $this->set(compact('publisher', 'authors'));
        // $this->set(compact('publisher'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function form($id = null)
    {
        if (empty($id)) {
            $publisher = $this->Publishers->newEmptyEntity();
            $this->set(compact('publisher'));
            $this->render('form');
        } else {
            $publisher = $this->Publishers->get($id);
            $this->set(compact('publisher'));
            $this->render('form');
        }
    }

    public function add()
    {
        $publisher = $this->Publishers->newEmptyEntity();
        $authors = $this->Publishers->Authors->find('list')->toArray();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $image = $data['image'];
            unset($data['image']);

            $publisher = $this->Publishers->patchEntity($publisher, $data);
            if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $image->getClientFilename();
                $path = WWW_ROOT . 'img/uploads/' . $fileName;
                $image->moveTo($path);
                $publisher->image = 'uploads/' . $fileName;
            }
            if ($this->Publishers->save($publisher)) {
                $this->Flash->success(__('The publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publisher could not be saved. Please, try again.'));
        }
        $this->set(compact('publisher', 'authors'));
        // $this->set(compact('publisher'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publisher = $this->Publishers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $image = $data['image'];
            unset($data['image']);

            $publisher = $this->Publishers->patchEntity($publisher, $data);

            if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
                $fileName = time() . '_' . $image->getClientFilename();
                $path = WWW_ROOT . 'img/uploads/' . $fileName;
                $image->moveTo($path);
                $publisher->image = 'uploads/' . $fileName;
            }
            if ($this->Publishers->save($publisher)) {
                $this->Session->setFlash->success(__('The publisher has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The publisher could not be saved. Please, try again.'));
        }
        $authors = $this->Publishers->Authors->find('list')->toArray();
        $this->set(compact('publisher', 'authors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Publisher id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publisher = $this->Publishers->get($id);
        if ($this->Publishers->delete($publisher)) {
            $this->Flash->success(__('The publisher has been deleted.'));
        } else {
            $this->Flash->error(__('The publisher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

      public function record()
    {
        $data = $this->request->getData();
        $publisher = $data['name'];
        $status = $data['status'];

        if ($publisher !== '' && $status !== '') {
            $query = $this->Publishers->find()
                ->where([
                    "Publishers.name LIKE" => "%$publisher%",
                    "Publishers.status" => $status
                ]);
            $publishers = $this->paginate($query);
            $this->set(compact('publishers'));
            return $this->render('index');
        }
        if ($publisher && empty($status)) {
            $query = $this->Publishers->find()
                ->where([
                    "Publishers.name LIKE" => "%$publisher"
                ]);

            $publishers = $this->paginate($query);
            $this->set(compact('publishers'));
            return $this->render('index');
        }
        if (($publisher==='') && $status !=='')  {
            $query = $this->Publishers->find()
                ->where([
                    "Publishers.status" => $status
                ]);

            $publishers = $this->paginate($query);
            $this->set(compact('publishers'));
            return $this->render('index');
        }
        $this->set(compact('books'));
    }

}
