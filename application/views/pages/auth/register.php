<section class="vh-100" style="background-color: #eee;">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-5 mt-5"> <!-- Adjusted the column width -->
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-3"> <!-- Reduced padding here -->
                        <div class="row justify-content-center">
                            <div class="col-12"> <!-- Adjusted the column width -->
                                <p class="text-center h3 fw-bold mb-0">Daftar</p> <!-- Reduced heading size and margin -->
                                <?= form_open('register', ['method' => 'POST'], ['class' => 'mx-1 mx-md-4']) ?>
                                <div class="mb-3"> <!-- Reduced margin bottom -->
                                    <i class="fas fa-user fa-lg me-2 fa-fw"></i> <!-- Slightly reduced icon size -->
                                    <div class="form-outline flex-fill mb-0">
                                        <?= form_input('name', $input->name, ['class' => 'form-control', 'placeholder' => 'Nama Anda', 'required' => true, 'autofocus' => true]) ?>
                                        <?= form_error('name') ?>
                                    </div>
                                </div>

                                <div class="mb-3"> <!-- Reduced margin bottom -->
                                    <i class="fas fa-envelope fa-lg me-2 fa-fw"></i> <!-- Slightly reduced icon size -->
                                    <div class="form-outline flex-fill mb-0">
                                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Email Anda', 'required' => true]) ?>
                                        <?= form_error('email') ?>
                                    </div>
                                </div>

                                <div class="mb-3"> <!-- Reduced margin bottom -->
                                    <i class="fas fa-lock fa-lg me-2 fa-fw"></i> <!-- Slightly reduced icon size -->
                                    <div class="input-group"> <!-- Wrap the input field and icon inside a div with the 'input-group' class -->
                                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password Anda', 'required' => true], ['id' => 'passwordfield']) ?>
                                        <span class="input-group-text"> <!-- Add 'input-group-text' class to create a bordered container for the icon -->
                                            <span class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></span>
                                        </span>
                                    </div>
                                    <div style="display: flex; justify-content: flex-end;">
                                        <span style="font-size: 13px;">*Masukkan Minimal 8 Karakter</span>
                                    </div>
                                    <script>
                                        $("#togglePassword").on("mousedown", function() {
                                            $("input[name='password']").attr('type', 'text');
                                        }).on("mouseup", function() {
                                            $("input[name='password']").attr('type', 'password');
                                        }).on("mouseout", function() {
                                            $("input[name='password']").attr('type', 'password');
                                        });
                                    </script>
                                    <?= form_error('password') ?>
                                </div>


                                <div class="mb-3"> <!-- Reduced margin bottom -->
                                    <i class="fas fa-key fa-lg me-2 fa-fw"></i> <!-- Slightly reduced icon size -->
                                    <div class="form-outline flex-fill mb-0">
                                        <div class="input-group"> <!-- Wrap the input field and icon inside a div with the 'input-group' class -->
                                            <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Konfirmasi Password Anda', 'required' => true]) ?>
                                            <span class="input-group-text"> <!-- Add 'input-group-text' class to create a bordered container for the icon -->
                                                <span class="fas fa-eye" id="togglePassword2" style="cursor: pointer;"></span>
                                            </span>
                                        </div>
                                        <script>
                                            $("#togglePassword2").on("mousedown", function() {
                                                $("input[name='password_confirmation']").attr('type', 'text');
                                            }).on("mouseup", function() {
                                                $("input[name='password_confirmation']").attr('type', 'password');
                                            }).on("mouseout", function() {
                                                $("input[name='password_confirmation']").attr('type', 'password');
                                            });
                                        </script>
                                    </div>
                                    <?= form_error('password_confirmation') ?>
                                </div>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary rounded-pill py-sm-2 px-sm-4">Daftar</button>
                                </div>
                                <a href="<?= base_url('login') ?>"><u>Saya Sudah Memiliki Akun</u></a>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>