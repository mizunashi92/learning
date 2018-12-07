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
                <h2 class="header-section">Our Recent Videos</h2>
                <div class="row">
                    <?php foreach($videos as $video) : ?>
                    <div class="col-md-3">
                        <figure class="figure">
                           <iframe width="100%" src="https://www.youtube.com/embed/<?= $video['url']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </figure>
                    </div>
                    <div class="col-md-3">
                        <h4><?= $video['title']; ?></h4>

                        <p>Posted on : <?= date('M j, Y', strtotime($video['created_at'])); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>                 
            </div>
        </div>
    </div>
</section>
<!--/.Portfolio-Section -->
  