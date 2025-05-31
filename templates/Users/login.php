<div class="container-fluid  col-6  login-page shadow-lg p-5   ">
    <div class="title row text-center  ">
<p class="h1 ">Log-in Page</p>
    </div>
    <?= $this->Form->create(null,['url'=>['controller'=>'Users','action'=>'login']])?>
    <div class="row login-form ">
        <div class="col-8 mt-4">
            <label for="email" class="form-label">User Name</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="col-8 mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="col-8 mt-4">
                    <button class="btn btn-primary px-4" id="loginBtn">Login</button>
                    <button onclick="history.back()"  class="btn btn-dark px-5 ms-3">Back</button>
                </div>
            </div>
        <?= $this->Form->end()?>
</div>