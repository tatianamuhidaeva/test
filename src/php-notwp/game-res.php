<?php include('header.php') ?>

<div class="game-res">
  <?php include('widgets/tblock.php') ?>
  <div class="game-res-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <div class="game-res-wrapper">
          <div class="game-res-congratulations">
            <span class="game-res-congratulations__text">ПОЗДРАВЛЯЕМ! <br>
              вам идеально подходит</span>
            <h2 class="game-res-congratulations__title">ВЬЕТНАМ</h2>
          </div>
          <?php include('widgets/gallery.php') ?>

          <div class="game-res-content">
            <table class="game-res-table">
              <tbody>
                <tr class="game-res-table__row">
                  <td class="game-res-table__cell">
                    <div class="caption">
                      <img src="../img/content/ways/country/flag-china.png" alt="флаг">
                      <span>Тайланд</span>
                    </div>
                  </td>
                  <td class="game-res-table__cell">
                    <span>Паттайя</span>
                  </td>
                  <td class="game-res-table__cell">
                    <span>Вылет 09 апреля</span>
                  </td>
                  <td class="game-res-table__cell">
                    <span> на 7 ночей</span>
                  </td>
                  <td class="game-res-table__cell price">
                    <span> от 28 000 руб.</span>
                  </td>
                  <td class="game-res-table__cell button">
                    <button class="game-res-table__btn btn btn-y">заполнить заявку на тур</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <button class="game-res__btn btn btn-y">пройти квиз еще раз</button>
      </div>
    </main>
  </div>
</div>

<?php include('footer.php'); ?>