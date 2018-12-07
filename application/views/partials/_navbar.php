<!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark cyan fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
            <img src="<?php echo base_url(); ?>assets/images/nav-logo.png" alt="nav-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if($this->uri->segment(1) === null) echo 'active'; ?>">
                        <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(1) === 'videos') echo 'active';?>">
                        <a class="nav-link" href="<?= base_url(); ?>videos/A">See our Videos </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(1) === 'docs') echo 'active';?>">
                        <a class="nav-link" href="<?= base_url(); ?>docs">Read our Documents </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://bisnis.financialsecurity.id/member">Return to X-panel </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--/.Navbar -->