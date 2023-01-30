<?php 
if(!isset($attributes['imgURL'])){
    $attributes['imgURL'] = get_theme_file_uri( '/images/test.jpg' );
}
?>

<div class="banner" style="background-image: url('<?php echo $attributes['imgURL']; ?>')">
    <?php echo $content; ?>
</div>