<div class="publishers form content">
    <h1>Add publisher</h1>
    <?= $this->Form->create($publisher, ['type' => 'file', 'url' => $publisher->isNew() ? ['action' => 'add'] : ['action' => 'edit', $publisher->id]]) ?>
    <input type="file" class="dropify" name="image" data-default-file="<?= !empty($publisher->image) ? $this->url->image($publisher->image) : '' ?>" value="">

    <label for="name" class="form-label mt-4">Publication Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= h($publisher->name ?? '') ?>">


    <label for="rate" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= h($publisher->email ?? '') ?>">

    <label for="" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" value="<?= h($publisher->address ?? '') ?>">
    
    
    <!-- <select name="gender" class="form-select" id="gender">
        <option value="">Select Gender</option>
        <option value="male"<?= isset($publisher->gender)&&($publisher->gender==='male') ? 'selected':''?>>Male</option>
        <option value="female"<?= isset($publisher->gender)&&($publisher->gender==='female') ? 'selected':''?>>Female</option>
        <option value="others"<?= isset($publisher->gender)&&($publisher->gender==='others') ? 'selected':''?>>Others</option>
    </select> -->


    <label for="status" class="form-label">Status</label>

    <label for="status" class="form-label">Active</label>
    <input type="radio" id="active" name="status" value="1" <?= (isset($publisher->status) && $publisher->status == 1) ? 'checked' : '' ?>>
    <label for="status" class="form-label">In Active</label>
    <input type="radio" id="notAvailable" name="status" value="0" <?= (isset($publisher->status) && $publisher->status == 0) ? 'checked' : '' ?>>

    <button class="btn btn-md bg-info" id="submit">Submit</button>

    <?= $this->Form->end() ?>;
</div>