<div class="books form content">
    <h1>Add Book</h1>
    <?= $this->Form->create($book, ['type' => 'file', 'url' => $book->isNew() ? ['action' => 'add'] : ['action' => 'edit', $book->id]]) ?>
    <input type="file" class="dropify" name="image" data-default-file="<?= !empty($book->image) ? $this->url->image($book->image) : '' ?>" value="">
   
    <label for="name" class="form-label mt-4">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= h($book->name ?? '') ?>">

    <label for="year" class="form-label">Publish Year</label>
    <input type="date" class="form-control" id="publishYear" name="publish_year"
        value="<?= isset($book->publish_year) ? h($book->publish_year->format('Y-m-d')) : '' ?>">


    <label for="rate" class="form-label">Rate</label>
    <input type="text" class="form-control" id="rate" name="rate" value="<?= h($book->rate ?? '') ?>">

    <label for="status" class="form-label">Status</label>

    <label for="status" class="form-label">available</label>
    <input type="radio" id="active" name="status" value="1" <?= (isset($book->status) && $book->status == 1) ? 'checked' : '' ?>>
    <label for="status" class="form-label">Not Available</label>
    <input type="radio" id="notAvailable" name="status" value="0" <?= (isset($book->status) && $book->status == 0) ? 'checked' : '' ?>>

    <button class="btn btn-md bg-info" id="submitBtn">Submit</button>

    <?= $this->Form->end() ?>;
</div>