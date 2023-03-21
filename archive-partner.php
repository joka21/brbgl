<?php
get_header();
$args = array(
    'post_type' => 'partner',
    'posts_per_page' => 30,
    'orderby' => 'random',
    'order' => 'DESC'
);

$posts = get_posts($args);

if ($posts) {
    foreach ($posts as $post) {
        setup_postdata($post);
        
        // Hier können Sie Ihre benutzerdefinierten Felder abrufen und anzeigen
        $partner_name = get_field('Name_Betrieb');
        $partner_description = get_field('Beschreibung_Betrieb');
        $partner_website = get_field('Webseite_Betrieb');
        $partner_image = get_field('Bild_Betrieb');
        $partner_address = get_field('Adressse');
        
        // Hier können Sie den HTML-Code für jeden Partnerbeitrag erstellen und anzeigen
        ?>
        <div class="partner">
            <h3><?php echo $partner_name; ?></h3>
            <?php if ($partner_image) { ?>
                <img src="<?php echo $partner_image['url']; ?>" alt="<?php echo $partner_image['alt']; ?>">
            <?php } ?>
            <p><?php echo $partner_description; ?></p>
            <p><?php echo $partner_address; ?></p>
            <?php if ($partner_website) { ?>
                <p><a href="<?php echo $partner_website['url']; ?>">Besuchen Sie die Webseite von <?php echo $partner_name; ?></a></p>
            <?php } ?>
        </div>
        <?php
    }
    wp_reset_postdata();
}
get_footer();
?>
