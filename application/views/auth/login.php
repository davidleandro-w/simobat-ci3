<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url() ?>" class="h1">SIM<b>OBAT</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <?= form_open('auth/login/authenticate', ['class' => 'form-signin']) ?>
            <?= @$this->session->flashdata('message') ?>
            <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
           
            <?= form_error('username', '<small class="text-danger mt-0">', '</small>') ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            
            <?= form_error('password', '<small class="text-danger mt-0">', '</small>') ?>
            <div class="input-group mb-3">
                <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" placeholder="password" name="password" value="<?= set_value('password') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block w-100">Sign In</button>
            <?= form_close() ?>

            <hr>
            <p class="mb-0">
                <a href="<?= base_url() ?>auth/register" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>