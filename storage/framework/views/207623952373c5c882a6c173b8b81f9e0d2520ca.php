<?php $__env->startSection('content'); ?>

<main class="page-content">


<div class="page-header-bg page-header-bg--slider animate">
    <div class="homeslider-section" id="homeslider">
        <div>
            <div class="image" style="background-image: url('<?php echo e(url('/public/img/content/image1.jpg')); ?>')"></div>
            <div class="image-mobile" style="background-image: url('<?php echo e(url('/public/img/content/image1.jpg')); ?>')"></div>
        </div>
        <div>
            <div class="image" style="background-image: url('<?php echo e(url('/public/img/content/2017_bentley.jpg')); ?>')"></div>
            <div class="image-mobile" style="background-image: url('<?php echo e(url('/public/img/content/2017_bentley.jpg')); ?>')"></div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="page-container">
            <h2 class="page-title">Why Us</h2>
        </div>
    </div>
</div>

<!-- Section Profile -->
<section class="section section--content-inner section-why-us animate">
    <div class="page-wrapper">
        <div class="page-container">
            <div class="why-us-container">
                <div class="main">
                    <div class="section-text">
                        <h2><?php echo e($_page->text_1); ?></h2>
                        <div><?php echo $_page->text_2; ?></div>
                    </div>
                    <img src="/autobox/public/img/icons-general/map.svg" class="parts-map">
                </div>
                <div class="aside">
                    <div class="parts-excerpt parts-excerpt--narrow animate">
                        <div class="parts-excerpt__header">
                            <div class="parts-excerpt__image" style="background-image: url('<?php echo e(url('/public/img/content/parts/why-us-parts-bg.jpg')); ?>')"></div>
                            <div class="parts-excerpt__overlay"></div>
                            <div class="parts-excerpt__header__container">
                                <h3 class="parts-excerpt__title">Parts</h3>
                            </div>
                        </div>
                        <div class="parts-excerpt__body">
                            <div class="parts-excerpt__list scrollbar-dark">
                              <?php foreach($producers as $producer): ?>
                                <div class="parts-excerpt__list__link"><a href="<?php echo e(url('/parts', $producer->Id)); ?>"><?php echo e($producer->Name); ?></a></div>
                              <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo e(url('/public/img/icons-general/map.svg')); ?>" class="parts-map-mobile">

        </div>
    </div>
</section>


</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>