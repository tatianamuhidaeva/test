<?php get_header(); ?>

<div class="game">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="game-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <form class="game-form" id="game-form" action="<?php echo site_url(); ?>/gameres">
        <?php 
        $info = get_field('infopanel');
        $questions = get_field('quiz');
        $summations = get_field('result');

        $stepDiscount = $info['maxdiscount'] / count($questions);
        $currDiscount = 0;
        $iterQuest = 0;
        if (($info) && ($questions)) {
        ?>

          <div class="game-slider">
            <div class="game-slider-container swiper-container" id="game-slider">
              <ol class="game-slider-wrapper swiper-wrapper">
                
              <?php foreach($questions as $question) :?>
              <?php 
              $iterQuest++;
              $iterAnswer = 0;
              ?>
                <li class="game-slide swiper-slide">
                  <div class="game-slide__info">
                  <?php $currDiscount += $stepDiscount; ?>
                  <img class="game-slide__info-img" src="<?php echo $question['img']['url']; ?>" alt="<?php echo $question['img']['alt']; ?>">
                    <h2 class="game-slide__info-title title"><?php echo $info['text']; ?></h2>
                    <span class="game-slide__info-text"><?php echo $info['subtext']; ?></span>
                    <strong class="game-slide__info-discount"><?php echo number_format($currDiscount, 1, ',', ' '); ?>%</strong>
                  </div>

                  <div class="game-slide__question">
                    <h2 class="game-slide__question-title title"><?php echo $question['question']; ?></h2>
                    <?php $answers = $question['answers']; 
                    if ($answers) {?>
                    <ul class="game-slide__question-items">
                      <?php foreach($answers as $answer) : ?>
                      <?php $iterAnswer++; ?>
                      <li  class="game-slide__question-item">
                        <input class="game-slide__question-radio" type="radio" id="answer-<?php echo $iterQuest?>-<?php echo $iterAnswer?>" name="quest<?php echo $iterQuest?>" value="<?php echo $iterAnswer; ?>">
                        <label class="game-slide__question-label" for="answer-<?php echo $iterQuest?>-<?php echo $iterAnswer?>"><?php echo $answer['answer']?></label>
                      </li>
                    <?php endforeach;?>
                    </ul> 
                    <?php } //end aanswers?>
                    <!-- end .game-slide__question-items -->
                  </div>
                </li>
                <!-- end .swiper-slide -->
                <?php endforeach; //endquestion ?>
              </ol>
              <!-- end .game-slider-wrapper  -->
            </div>
            <div class="game__pagination swiper-pagination "></div>
          </div>
                      <input type="hidden" name="discount" value="<?php echo $currDiscount?>">
        <?php } // endif panelinfo   ?>
        </form>
      </div>
    </main>
  </div>
</div>

<?php get_footer();?>