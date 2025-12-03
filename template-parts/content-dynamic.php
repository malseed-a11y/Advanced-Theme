<?php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
    <?php
    get_template_part('template-parts/dynamic/entry-content.php');
    get_template_part('template-parts/dynamic/entry-meta.php');
    get_template_part('template-parts/dynamic/entry-header.php');
    get_template_part('template-parts/dynamic/entry-footer.php');
    ?>

</article>