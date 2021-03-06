<h3>
  <input type="radio" name="<?php Echo $this->Field_Name('excerpt_type') ?>" id="excerpt_type_images" value="images" <?php Checked($this->Get_Meta('excerpt_type'), 'images') ?>>
  <label for="excerpt_type_images"><?php Echo $this->t('Random Images') ?></label>
</h3>
<div class="togglebox">
  <p><?php Echo $this->t('In this mode the excerpt of the gallery will display a set of random images.') ?></p>

  <table>
  <tr>
    <td><label for="<?php Echo $this->Field_Name('excerpt_image_number') ?>"><?php Echo $this->t('Images per excerpt') ?></label></td>
    <td><input type="number" name="<?php Echo $this->Field_Name('excerpt_image_number') ?>" id="<?php Echo $this->Field_Name('excerpt_image_number') ?>" value="<?php Echo Esc_Attr($this->Get_Meta('excerpt_image_number')) ?>"></td>
  </tr>
  <tr>
    <td><label for="<?php Echo $this->Field_Name('excerpt_thumb_width') ?>"><?php Echo $this->t('Thumbnail width') ?></label></td>
    <td><input type="number" name="<?php Echo $this->Field_Name('excerpt_thumb_width') ?>" id="<?php Echo $this->Field_Name('excerpt_thumb_width') ?>" value="<?php Echo Esc_Attr($this->Get_Meta('excerpt_thumb_width')) ?>" <?php Disabled(True) ?> > px <span class="asterisk">*</span></td>
  </tr>
  <tr>
    <td><label for="<?php Echo $this->Field_Name('excerpt_thumb_height') ?>"><?php Echo $this->t('Thumbnail height') ?></label></td>
    <td><input type="number" name="<?php Echo $this->Field_Name('excerpt_thumb_height') ?>" id="<?php Echo $this->Field_Name('excerpt_thumb_height') ?>" value="<?php Echo Esc_Attr($this->Get_Meta('excerpt_thumb_height')) ?>" <?php Disabled(True) ?> > px <span class="asterisk">*</span></td>
  </tr>
  </table>
  <p>
    <input type="checkbox" name="<?php Echo $this->Field_Name('excerpt_thumb_grayscale') ?>" id="<?php Echo $this->Field_Name('excerpt_thumb_grayscale') ?>" value="yes" <?php Checked($this->Get_Meta('excerpt_thumb_grayscale'), 'yes'); Disabled(True) ?> >
    <label for="<?php Echo $this->Field_Name('excerpt_thumb_grayscale') ?>"><?php Echo $this->t('Convert thumbnails to grayscale.') ?> <span class="asterisk">*</span></label>
  </p>
  <p>
    <input type="checkbox" name="<?php Echo $this->Field_Name('excerpt_thumb_negate') ?>" id="<?php Echo $this->Field_Name('excerpt_thumb_negate') ?>" value="yes" <?php Checked($this->Get_Meta('excerpt_thumb_negate'), 'yes'); Disabled(True) ?> >
    <label for="<?php Echo $this->Field_Name('excerpt_thumb_negate') ?>"><?php Echo $this->t('Negate the thumbnails.') ?> <span class="asterisk">*</span></label>
  </p>

  <h4><?php Echo $this->t('Template') ?></h4>
  <p><?php Echo $this->t('Please choose a template to display the excerpt of this gallery.') ?></p>
  <?php ForEach ( $this->core->Get_Template_Files() AS $name => $properties ) : ?>
  <p>
    <input type="radio" name="<?php Echo $this->Field_Name('excerpt_template') ?>" id="excerpt_template_<?php Echo Sanitize_Title($properties['file']) ?>" value="<?php Echo HTMLSpecialChars($properties['file']) ?>"
      <?php Checked($this->Get_Meta('excerpt_template'), $properties['file']) ?>
      <?php Checked(!$this->Get_Meta('excerpt_template') && $properties['file'] == $this->core->Get_Default_Template()) ?> >
    <label for="excerpt_template_<?php Echo Sanitize_Title($properties['file']) ?>">
    <?php If (Empty($properties['name'])) : ?>
      <em><?php Echo $properties['file'] ?></em>
    <?php Else : ?>
      <strong><?php Echo $properties['name'] ?></strong>
    <?php EndIf; ?>
    </label>
    <?php If ($properties['version']) : ?> (<?php Echo $properties['version'] ?>)<?php Endif; ?>
    <?php If ($properties['author'] && !$properties['author_uri'] ) : ?>
      <?php Echo $this->t('by') ?> <?php Echo $properties['author'] ?>
    <?php ElseIf ($properties['author'] && $properties['author_uri'] ) : ?>
      <?php Echo $this->t('by') ?> <a href="<?php Echo $properties['author_uri'] ?>" target="_blank"><?php Echo $properties['author'] ?></a>
    <?php Endif; ?>
    <?php If ($properties['description']) : ?><br><?php Echo $properties['description']; Endif; ?>
  </p>
  <?php EndForEach ?>

  <p>
    <span class="asterisk">*</span>
    <?php Echo $this->core->mocking_bird->Pro_Notice('feature') ?>
  </p>
</div>

<h3>
  <input type="radio" name="<?php Echo $this->Field_Name('excerpt_type') ?>" id="excerpt_type_text" value="text" <?php Checked($this->Get_Meta('excerpt_type'), 'text') ?> >
  <label for="excerpt_type_text"><?php Echo $this->t('Text Excerpt') ?></label>
</h3>
<div class="togglebox">
  <p>
    <label class="screen-reader-text" for="excerpt"><?php _e('Excerpt') ?></label>
    <textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt; # textarea_escaped ?></textarea>
  </p>
  <p><?php _e('Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="http://codex.wordpress.org/Excerpt" target="_blank">Learn more about manual excerpts.</a>') ?></p>
</div>