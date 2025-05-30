<div class="authors form content ">
    <h1>Add author</h1>
    <?= $this->Form->create($author, ['type' => 'file', 'id' => 'form', 'url' => $author->isNew() ? ['action' => 'add'] : ['action' => 'edit', $author->id]]) ?>
    <div class="form-content container p-5">
        <div class="row justify-content-center">
            <div class="col-3 ">
                <input type="file" class="dropify col-3" name="image" id="image" data-default-file="<?= !empty($author->image) ? $this->url->image($author->image) : '' ?>" value="">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="name" class="form-label ">Name</label>
                <input type="text" class="form-control bg-white " id="name" name="name" value="<?= h($author->name ?? '') ?>">
            </div>

            <div class="col-6">
                <label for="rate" class="form-label">Email</label>
                <input type="text" class="form-control bg-white " id="email" name="email" value="<?= h($author->email ?? '') ?>">
            </div>

            <div class="row">
                <div class="col-6">
                    <label for="" class="form-label">Gender</label>
                    <select name="gender" class="form-select" id="gender">
                        <option value="">Select Gender</option>
                        <option value="male" <?= isset($author->gender) && ($author->gender === 'male') ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?= isset($author->gender) && ($author->gender === 'female') ? 'selected' : '' ?>>Female</option>
                        <option value="others" <?= isset($author->gender) && ($author->gender === 'others') ? 'selected' : '' ?>>Others</option>
                    </select>
                </div>
                <div class="col-6 d-flex">
                    <label for="status" class="form-label">Status</label>
                    <div class="status d-flex">
                        <label for="status" class="form-label">Active</label>
                        <input type="radio" id="active" name="status" class="status" value="1" <?= (isset($author->status) && $author->status == 1) ? 'checked' : '' ?>>
                        <label for="status" class="form-label">In Active</label>
                        <input type="radio" id="notAvailable" class="status" name="status" value="0" <?= (isset($author->status) && $author->status == 0) ? 'checked' : '' ?>>
                    </div>

                </div>
            </div>
        </div>
        <button class="btn btn-md bg-info px-4 text-center" id="submitBtn">Submit</button>

        <?= $this->Form->end() ?>
    </div>

</div>