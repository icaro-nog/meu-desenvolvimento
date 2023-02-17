<div id="tab_panel_feed_image_card" class="panel qligg_options_panel <# if (data.panel != 'tab_panel_feed_image_card') { #>hidden<# } #>">

    <div class="options_group qligg-premium-field">
        <p class="form-field">
            <label><?php esc_html_e('Images card', 'insta-gallery'); ?></label>
            <input class="media-modal-render-panels" name="card[display]" type="checkbox" value="true" <# if (data.card.display){ #>checked<# } #> />
                <span class="description"><small><?php esc_html_e('Display card gallery by clicking on image', 'insta-gallery'); ?></small></span>
                <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>
    </div>
    <div class="options_group qligg-premium-field <# if (!data.card.display){ #>disabled-field<# } #>">
        <p class="form-field">
            <label><?php esc_html_e('Card radius', 'insta-gallery'); ?></label>
            <input name="card[radius]" type="number" min="0" max="1000" value="{{data.card.radius}}" />
            <span class="description"><small><?php esc_html_e('Add radius to the Instagram Feed', 'insta-gallery'); ?></small></span>
            <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card font size', 'insta-gallery'); ?></label>
            <input name="card[font_size]" type="number" min="8" max="36" value="{{data.card.font_size}}" />
            <span class="description"><small><?php esc_html_e('Add font-size to the Instagram Feed', 'insta-gallery'); ?></small></span>
            <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card background', 'insta-gallery'); ?></label>
            <input class="color-picker" data-alpha="true" name="card[background]" type="link" placeholder="#007aff" value="{{data.card.background}}" />
            <span class="description"><small><?php esc_html_e('Color which is displayed when over images', 'insta-gallery'); ?></small></span>
            <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card text color', 'insta-gallery'); ?></label>
            <input class="color-picker" data-alpha="true" name="card[text_color]" type="link" placeholder="#000000" value="{{data.card.text_color}}" />
            <span class="description"><small><?php esc_html_e('Color Text', 'insta-gallery'); ?></small></span>
            <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card padding', 'insta-gallery'); ?></label>
            <input name="card[padding]" type="number" min="0" max="50" value="{{data.card.padding}}" />
            <span class="description"><small><?php esc_html_e('Add blank space between images', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card info', 'insta-gallery'); ?></label>
            <input name="card[info]" type="checkbox" value="true" <# if (data.card.info){ #>checked<# } #> />
                <span class="description"><small><?php esc_html_e('Display likes count of images', 'insta-gallery'); ?></small></span>
                <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card caption', 'insta-gallery'); ?></label>
            <input name="card[caption]" type="checkbox" value="true" <# if (data.card.caption){ #>checked<# } #> />
                <span class="description"><small><?php esc_html_e('Display caption count of images', 'insta-gallery'); ?></small></span>
                <span class="description hidden"><small><?php esc_html_e('(This is a premium feature)', 'insta-gallery'); ?></small></span>
        </p>

        <p class="form-field">
            <label><?php esc_html_e('Card length', 'insta-gallery'); ?></label>
            <input name="card[length]" type="number" min="5" max="1000" value="{{data.card.length}}" /></small></span>
            <span class="description"><small><?php esc_html_e('Add blank space between images', 'insta-gallery'); ?></small></span>
        </p>
    </div>
</div>