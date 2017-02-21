<div class="board-game-form">
  <div class="row">
    <div class="col-lg-12">
      <?php print render($form['field_game_photo']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php print render($form['title']); ?>
    </div>
    <div class="col-lg-6">
      <?php print render($form['field_game_category']); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-2">
      <?php print render($form['field_available_as']); ?>
    </div>
    <div class="col-lg-10">
      <div id="rent-details">
        <div class="col-lg-6">
          <?php print render($form['field_rent']); ?>
        </div>
        <div class="col-lg-6">
          <?php print render($form['field_deposit_required']); ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
          <?php print render($form['field_special_terms']); ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="selling-details">
        <div class="col-lg-6">
          <?php print render($form['field_selling_price']); ?>
        </div>
        <div class="col-lg-6">
        </div>
        <div class="clearfix"></div>
      </div>
      <div id="swap-details">
        <div class="col-lg-12">
          <?php print render($form['field_interested_to_swap_with']); ?>
        </div>
      </div>
    </div>



  </div>
  <div class="row">
    <div class="col-lg-12">
      <div id="additional-details">
        <fieldset class="panel panel-default form-wrapper">
          <legend class="panel-heading">
            <a href="javascript:void(0);" class="panel-title fieldset-legend">
              <span class="panel-title fieldset-legend">Additional Info</span>
            </a>
          </legend>

          <div class="panel-body">
            <div class="col-lg-12">
              <?php print render($form['field_game_description']); ?>
            </div>
            <div class="col-lg-12">
              <?php print render($form['field_game_pieces']); ?>
            </div>
            <div class="col-lg-12">
              <?php print render($form['field_number_players']); ?>
            </div>
          </div>
          </fieldset>
      </div>
    </div>
  </div>
</div>

<!-- Render any remaining elements, such as hidden inputs (token, form_id, etc). -->
<?php print drupal_render_children($form); ?>