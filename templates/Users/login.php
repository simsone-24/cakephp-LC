<div class="container-fluid col-8 bg-info shadow-lg p-5 ">
    <div class="title row text-center ">
<p class="h1 ">Log-in Page</p>
    </div>
    <div class="row">
        <?= $this->Form->create(null,['url'=>['controller'=>'Users','action'=>'login']])?>
        <div class="col-12">
            <label for="email" class="form-label">User Name</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="col">
            <button class="btn btn-danger">Login</button>
        </div>
        <?= $this->Form->end()?>
        </div>
</div>