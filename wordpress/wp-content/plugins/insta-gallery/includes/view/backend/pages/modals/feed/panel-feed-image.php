<div id="tab_panel_feed_image" class="panel qligg_options_panel <# if (data.panel != 'tab_panel_feed_image') { #>hidden<# } #>">

  <div class="options_group">
    <p class="form-field">
      <label><?php esc_html_e('Images resolution', 'insta-gallery'); ?></label>
      <select class="media-modal-render-panels panel disabled-field" name="resolution">
        <option <# if ( data.resolution=='standard' ) { #>selected="selected"<# } #> value="standard"><?php esc_html_e('Standard', 'insta-gallery'); ?> (1080 x auto)</option>
        <!-- <option <# if ( data.resolution=='medium' ) { #>selected="selected"<# } #> value="medium"><?php esc_html_e('Medium', 'insta-gallery'); ?> (320 x auto)</option>
        <option <# if ( data.resolution=='small' ) { #>selected="selected"<# } #> value="small"><?php esc_html_e('Small', 'insta-gallery'); ?> (150 x 150)</option> -->
      </select>
    </p>
  </div>


    <div class="disabled-feature options_group">
      <p class="form-field">
        Unfortunatelly the new Instagram Personal API dosent allow us to recover small and medium images. The new standar size is 1080px and this could cause perfomance issues in the feed load. We strongly recommend to switch to business.
      </p>
    </div>
    
    <div class="options_group">
      <p class="form-field">
        <label><?php esc_html_e('Images spacing', 'insta-gallery'); ?></label>
        <input name="spacing" min="0" type="number" value="{{data.spacing}}" />
        <span class="description"><small><?php esc_html_e('Add blank space between images', 'insta-gallery'); ?></small></span>
      </p>
    </div>

    <div class="options_group">
      <p class="form-field">
        <label><?php esc_html_e('Images lazy load', 'insta-gallery'); ?></label>
        <input class="media-modal-render-panels" name="lazy" type="checkbox" value="true" <# if (data.lazy){ #>checked<# } #> />
          <span class="description"><small><?php esc_html_e('Defers feed images loading', 'insta-gallery'); ?></small></span>
      </p>
    </div>
</div>