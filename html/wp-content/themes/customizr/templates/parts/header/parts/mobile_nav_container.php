<div class="mobile-nav__container col-12 <?php czr_fn_echo('element_class') ?>" <?php czr_fn_echo('element_attributes') ?>>
   <nav class="mobile-nav__nav collapse flex-column col" id="mobile-nav">
    <?php
      if ( czr_fn_is_registered_or_possible( 'mobile_menu_search' ) ) {
        czr_fn_render_template( 'header/parts/search_form', array(
          'model_id'   =>  'mobile_menu_search',
          'model_args' => array(
            'element_tag'     => 'div'
          )
        ) );
      }
      if ( czr_fn_is_registered_or_possible('mobile_menu') ) {
        czr_fn_render_template( 'header/parts/menu', array(
          'model_id'   =>  'mobile_menu',
        ) );
      };
    ?>
  </nav>
</div>