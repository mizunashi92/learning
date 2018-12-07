<section class="blog-page">
    <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2) === 'A'){ echo 'active';} ?>" href="<?= base_url();?>videos/A" role="tab">Section A</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($this->uri->segment(2) === 'B'){ echo 'active';} ?>" href="<?= base_url();?>videos/B" role="tab">Section B</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 left-side">
                <h2 class="header-section">Our Recent Documents</h2>
                <div class="row">
                    <?php foreach($files as $file) : ?>
                    <div class="col-md-3">
                        <figure class="figure">
                            <img src="http://bisnis.financialsecurity.id/assets/learning/<?= $file['img']; ?>" class="figure-img img-fluid imagedropshadow" alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption"><img src="<?php echo base_url();?>assets/images/comment.png" alt=""><span>45</span>
                            
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><?= $file['title']; ?></h4>
                        <a href="http://bisnis.financialsecurity.id/assets/learning/<?= $file['file']; ?>">
                            <img src="<?= base_url();?>assets/images/down.png">
                        </a>
                        <p>Posted on : <?= date('M j, Y', strtotime($file ['created_at'])); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>                
            </div>
        </div>
    </div>
</section>
<!--/.Portfolio-Section -->
    
