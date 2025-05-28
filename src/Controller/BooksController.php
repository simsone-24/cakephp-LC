<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Books->find();
        $books = $this->paginate($query);


        $this->set(compact('books'));
    }



public function form($id = null)
{
    if ($id) {
        $book = $this->Books->get($id);        
    
    } else {
        $book = $this->Books->newEmptyEntity();
    }

    if ($this->request->is(['post', 'put', 'patch'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
debug($book);
die();
        $data = $this->request->getData();
        $image = $data['image'] ?? null;
        unset($data['image']); // prevent object error

        $book = $this->Books->patchEntity($book);

        if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
            $filename = time() . '_' . $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img/uploads/' . $filename;
            $image->moveTo($targetPath);
            $book->image = 'uploads/' . $filename;
        }
        if ($this->Books->save($book)) {
            $this->Flash->success('Book saved.');
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('Failed to save book.');
        }
    }

    $this->set(compact('book'));
    $this->render('/Pages/form'); // Your shared form view
}

   

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, contain: []);
        $authors = $this->Books->Authors->find('list')->toArray();
        $this->set(compact('book', 'authors'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $book = $this->Books->newEmptyEntity();

    if ($this->request->is('post')) {
        $data = $this->request->getData();

        // Extract and remove image from $data BEFORE patching
        $image = $data['image'] ?? null;
        unset($data['image']);

        // Patch entity WITHOUT image field
        $book = $this->Books->patchEntity($book, $data);

        // Handle the file upload separately
        if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
            $filename = time() . '_' . $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img/uploads/' . $filename;
            $image->moveTo($targetPath);

            // Set the image field AFTER patching
            $book->image = 'uploads/' . $filename;
        }

        // Now save your entity
        if ($this->Books->save($book)) {
            $this->Flash->success(__('The book has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The book could not be saved. Please, try again.'));
    }

    $this->set(compact('book'));
}


    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  public function edit($id = null)
{
    $book = $this->Books->get($id); // No need for contain if you're not loading associations

    $authors = $this->Books->Authors->find('list')->toArray();

    if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData(); // ✅ you forgot this line before
        $image = $data['image'] ?? null;
        unset($data['image']); // remove file object before patching

        $book = $this->Books->patchEntity($book, $data);

        if ($image instanceof \Laminas\Diactoros\UploadedFile && $image->getError() === UPLOAD_ERR_OK) {
            $filename = time() . '_' . $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img/uploads/' . $filename;
            $image->moveTo($targetPath);
            $book->image = 'uploads/' . $filename;
        }

        if ($this->Books->save($book)) {
            $this->Flash->success('Book saved.');
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error('Failed to save book.');
        }
    }

    $this->set(compact('book', 'authors'));
}


    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

      public function record()
    {
        $data = $this->request->getData();
        $book = $data['name'];
        $status = $data['status'];

        if (!empty($book) && !empty($status)) {
            $query = $this->Books->find()
                ->where([
                    "Books.name LIKE" => "%$book%",
                    "Books.status" => $status
                ]);
            $books = $this->paginate($query);
            $this->set(compact('books'));
            return $this->render('index');
        }
        if ($book && empty($status)) {
            $query = $this->Books->find()
                ->where([
                    "Books.name LIKE" => "%$book"
                ]);

            $books = $this->paginate($query);
            $this->set(compact('books'));
            return $this->render('index');
        }
        if (empty($book) && !empty($status)) {
            $query = $this->Books->find()
                ->where([
                    "Books.status" => $status
                ]);

            $books = $this->paginate($query);
            $this->set(compact('books'));
            return $this->render('index');
        }
        $this->set(compact('books'));
    }
}
