<div class="gallery">
<?php
$images = get_sub_field('gallery');
if (!$images) $images = get_field('gallery');

if ($images) : ?>

<div class="gallery-top-slider">
  <div class="gallery-top-slider-container swiper-container" id="gallery-top-slider">
    <div class="gallery-top-slider-wrapper swiper-wrapper">
      <?php foreach ($images as $image) : ?>
        <div class="gallery-top-slide swiper-slide">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="gallery-thumbs-slider">
  <svg class="gallery-thumbs-slide-clippath" width="0" height="0">
    <defs>
      <clipPath id="gallery-thumbs-slide-shape" clipPathUnits="objectBoundingBox">
        <polygon points="0 0.5, 0.5 0, 1 0.5, 0.5 1" />
      </clipPath>
</defs>
  </svg>
  <div class="gallery-thumbs-slider-container swiper-container" id="gallery-thumbs-slider">
    <div class="gallery-thumbs-slider-wrapper swiper-wrapper">
      <?php foreach ($images as $image) : ?>
        <div class="gallery-thumbs-slide swiper-slide">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          <div class="gallery-thumbs-slide-clippath"></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="gallery-thumbs__arrow gallery-thumbs__arrow-prev arrow arrow-prev swiper-button-prev" id="gallery-thumbs__prev">
    <svg class="gallery-thumbs__arrow-svg">
      <use xlink:href="#prev" />
    </svg>
  </div>
  <div class="gallery-thumbs__arrow gallery-thumbs__arrow-next arrow arrow-next swiper-button-next" id="gallery-thumbs__next">
    <svg class="gallery-thumbs__arrow-svg">
      <use xlink:href="#next" />
    </svg>
  </div>
</div>

<?php endif; ?>

</div>
