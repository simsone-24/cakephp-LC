<div class="authors form content">
    <h1>Add author</h1>
    <?= $this->Form->create($author, ['type' => 'file','id'=>'form', 'url' => $author->isNew() ? ['action' => 'add'] : ['action' => 'edit', $author->id]]) ?>
    <input type="file" class="dropify" name="image" id="image" data-default-file="<?= !empty($author->image) ? $this->url->image($author->image) : '' ?>" value="">

    <label for="name" class="form-label mt-4">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= h($author->name ?? '') ?>">

    <label for="" class="form-label">Gender</label>
    <select name="gender"  class="form-select" id="gender">
        <option value="">Select Gender</option>
        <option value="male"<?= isset($author->gender)&&($author->gender==='male') ? 'selected':''?>>Male</option>
        <option value="female"<?= isset($author->gender)&&($author->gender==='female') ? 'selected':''?>>Female</option>
        <option value="others"<?= isset($author->gender)&&($author->gender==='others') ? 'selected':''?>>Others</option>
    </select>


    <label for="rate" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= h($author->email ?? '') ?>">

    <label for="status" class="form-label">Status</label>

    <label for="status" class="form-label">Active</label>
    <input type="radio" id="active" name="status" class="status" value="1" <?= (isset($author->status) && $author->status == 1) ? 'checked' : '' ?>>
    <label for="status" class="form-label">In Active</label>
    <input type="radio" id="notAvailable" class="status" name="status" value="0" <?= (isset($author->status) && $author->status == 0) ? 'checked' : '' ?>>

    <button class="btn btn-md bg-info" id="submitBtn">Submit</button>

    <?= $this->Form->end() ?>;
</div>