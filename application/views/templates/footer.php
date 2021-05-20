<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="<?= base_url('post'); ?>">
                    <div class="mb-3">
                        <label for="email-login" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email-login" name="email-login" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password-login" class="form-label" required>Password</label>
                        <input type="password" class="form-control" id="password-login" name="password-login">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="<?= base_url('post'); ?>">
                    <div class="mb-3">
                        <label for="name-regist" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name-regist" name="name-regist">
                    </div>
                    <div class="mb-3">
                        <label for="email-regist" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email-regist" name="email-regist">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password1-regist" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1-regist" name="password1-regist">
                    </div>
                    <div class="mb-3">
                        <label for="password2-regist" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password2-regist" name="password2-regist">
                        <div id="passwordHelp" class="form-text">Password should be minimum 8 characters.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Register</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    
  </body>
</html>