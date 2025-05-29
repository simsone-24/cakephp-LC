<div class="container-fluid col-8 bg-secondary text-white shadow-lg p-5 ">
    <div class="title row text-center ">
        <p class="h1 ">Registration Page</p>
    </div>
    <div class="row">
        <form action="" method="post" id="form" class="form">

        <?= $this->Form->create(null,['url'=>['controller'=>'Users','action'=>'register']])?>
            <div class="col-12">
                <label for="name" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" id="Name">
            </div>
            <div class="col-12">
                <label for="email" class="form-label"> Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            
            <div class="col-12">
                <label for="confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm" id="confirm">
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="col">
                <button class="btn btn-danger">Login</button>
            </div>
        </form>
    </div>
</div>