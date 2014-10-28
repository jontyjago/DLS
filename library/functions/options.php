<?php

// Author: Jonathan Evans

//Start DLS Options
//***********************
// Options Page Functions

add_action( 'admin_menu', 'dls_options_menu' );

function dls_options_menu() {
	add_menu_page( 'DLS Options', 'DLS Options', 'manage_options', 'dls-user-options', 'dls_options_page', '', 99 );
}

function dls_options_page() {
	//if we got here with a POST, update the database with the new options
	if (isset($_POST['update_dls_options'])) {
        if ( $_POST['update_dls_options'] == 'true' ) { dls_options_update(); }
    }
	// here's the main function that will generate our options page
?>

<!--Options Markup-->
<div class="wrap">
    <div id="icon-themes" class="icon32"><br />
    </div>
    <h2>DLS Options</h2>
    <form method="POST" action="">
        <input type="hidden" name="update_dls_options" value="true" />
        <h3>Homepage Text</h3>
        <p>These options allow you to customise the titles and text at the top of the homepage.</p>
        <p><input type="text" name="intro-title" id="intro-title" size="48" value="<?php esc_attr_e( get_option( 'intro-title' ) ); ?>"/> Homepage Title</p>
        <p><textarea name="intro-text" id="intro-text" cols=36 rows=6><?php esc_attr_e( get_option( 'intro-text' ) ); ?></textarea> Homepage Text - Use &lt;br /&gt; for line breaks.</p>
        
        <h3>Photo Caption</h3>
        <p>The text for the All You Need is Love image on the homepage.</p>
        <p><input type="text" name="photo-caption" id="photo-caption" size="48" value="<?php esc_attr_e( get_option( 'photo-caption' ) ); ?>"/> Photo Caption</p>
        

        <h3>Town Texts</h3>
        <p>These options allow you to customise the text for each of the town descriptions.</p>
        <p><textarea name="dorch-text" id="dorch-text" cols=36 rows=6><?php esc_attr_e( get_option( 'dorch-text' ) ); ?></textarea> Dorchester Text - Use &lt;br /&gt; for line breaks.</p>
        <p><textarea name="luebb-text" id="luebb-text" cols=36 rows=6><?php esc_attr_e( get_option( 'luebb-text' ) ); ?></textarea> Luebbeck Text - Use &lt;br /&gt; for line breaks.</p>

        <!-- submit button -->
        <p><input type="submit" name="search" value="Update Options" class="button" /></p>
    </form>
</div>

<?php
}
function dls_options_update() {
	// this is where validation would go
	update_option( 'intro-title', stripslashes($_POST['intro-title']) );
	update_option( 'intro-text', stripslashes($_POST['intro-text']) );
    update_option( 'photo-caption', stripslashes($_POST['photo-caption']) );
    update_option( 'dorch-text', stripslashes($_POST['dorch-text']) );
    update_option( 'luebb-text', stripslashes($_POST['luebb-text']) );
}
//Google fonts into header

function load_fonts() {
	wp_register_style( 'googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700' );
	wp_enqueue_style( 'googleFonts' );
}

add_action( 'wp_print_styles', 'load_fonts' );

function remove_page_excerpt_field() {
	remove_meta_box( 'postexcerpt' , 'course' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'venue' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'tutor' , 'normal' );
	remove_meta_box( 'commentstatusdiv', 'course', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'venue', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'tutor', 'normal' );
}
add_action( 'admin_menu' , 'remove_page_excerpt_field' );