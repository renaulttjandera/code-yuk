<nav class="navbar navbar-expand-lg navbar-dark bg-danger py-3">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('post'); ?>"><span style="font-family: 'Dancing Script', cursive; font-size: 2rem;">Code,</span> Yuk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($this->session->userdata('email') == 'admin@gmail.com'): ?>
            <li class="nav-item">
                <a class="nav-link me-3" href="<?= base_url('post'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('post/admin'); ?>">Dashboard</a>
            </li>
        <?php endif; ?>
        </ul>
        
        <form class="d-flex ms-auto search" action="<?= base_url('post/search'); ?>" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if (!$this->session->userdata('email')): ?>
            <li class="nav-item">
                <a class="nav-link me-3" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
            </li>
        <?php else: ?>
            <li class="nav-item dropdown profile-pict">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= base_url('assets/') . $user['image']; ?>" class="rounded-circle" width="45">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('post/profile'); ?>">My Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url('post/logout'); ?>">Logout</a></li>
                </ul>
            </li>
        
        <?php endif; ?>
        </ul>
        </div>
    </div>
    </nav>