<?php

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
*/

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * enqueue scripts and styles 
 * GOOGLE MAP APIS
*/

function my_acf_init() {
	
	acf_update_setting('google_api_key', 'AIzaSyDUNBtyAPVbinBn_P2OdztPEuESrMsmnZY');
}

add_action('acf/init', 'my_acf_init');

function nr_load_scripts() {
	//https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false
	wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDUNBtyAPVbinBn_P2OdztPEuESrMsmnZY',null,null,true);  
	wp_enqueue_script('googlemaps');
		
}
add_action( 'wp_enqueue_scripts', 'nr_load_scripts' );



/*
DELETE FROM `wp_options` WHERE `option_name` LIKE ('_transient_%');
DELETE FROM `wp_options` WHERE `option_name` LIKE ('_site_transient_%');
*/
//sierotki
// wywolanie dla ACF
// echo iworks_orphan(get_sub_field('opis'));
function iworks_orphan( $content )
{
    if ( !class_exists( 'iWorks_Orphan' ) ) {
        return $content;
    }
    $orphan = new iWorks_Orphan();
    return $orphan->replace( $content );
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

//umożliwia dodawanie html do opisów category
remove_filter('pre_term_description', 'wp_filter_kses');

// usuń wersję z sekcji head:
remove_action('wp_head', 'wp_generator');

// XMLRPC
add_filter('xmlrpc_enabled', '__return_false');

// usuwanie wersji z RSS
function my_secure_generator( $generator, $type ) {
    return '';
}
add_filter( 'the_generator', 'my_secure_generator', 10, 2 );

// usuwanie wersji w skryptach
function my_remove_src_version( $src ) {
    global $wp_version;

    $version_str = '?ver='.$wp_version;
    $offset = strlen( $src ) - strlen( $version_str );

    if ( $offset >= 0 && strpos($src, $version_str, $offset) !== FALSE )
        return substr( $src, 0, $offset );

    return $src;
}
add_filter( 'script_loader_src', 'my_remove_src_version' );
add_filter( 'style_loader_src', 'my_remove_src_version' );

//remove_filter ('the_content', 'wpautop');
//add_filter('the_content','my_custom_formatting');

function my_custom_formatting($content){
    if(is_page()): 
        return $content;//usuwa p
    else:
        return wpautop($content);
    endif;
}

register_nav_menus( array(
   'primary-menu' => __('Menu główne'),
   'secondary-menu' => __('Menu w stopce'),
) );

register_sidebar(array(
	'name' => __('Logo'),
	'id' => 'logo',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle" style="display: none;">',
	'after_title'   => '</h2>'
));

add_theme_support( 'post-thumbnails');

//set_post_thumbnail_size( 560, 450, true );

if ( function_exists( 'add_image_size' ) ) {
	add_theme_support( 'post-thumbnails' );
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'fullHD', 1920, 1080, true );
    add_image_size( 'avatar', 120, 150, true );
    add_image_size( 'thumb', 560, 450, true );
}

// --------------------------------------------------------

// NEXT I PREVIOUS PAGE

if ( ! function_exists( 'content_nav' ) ) :

/**

 * Display navigation to next/previous pages when applicable

 */

function content_nav(  ) {

	global $wp_query;



	if ( $wp_query->max_num_pages > 1 ) : ?>

		<nav id="<?php echo esc_attr( $html_id ); ?>">

			<div class="prev-next"><?php next_posts_link( __( '<span >&larr;</span> Starsze', 'Estima' ) ); ?></div>

			<div class="prev-next"><?php previous_posts_link( __( 'Nowsze <span >&rarr;</span>', 'Estima' ) ); ?></div>

		</nav><!-- #nav-above -->

	<?php endif;

}

endif; // content_nav

class jwba_social_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'jwba_social_widget', 'Social Icon',
            array('description' => 'Widget wyświetlający linki do popularnych portali społecznościowych.')
        );
    }

    //odpowiedzialna za samo wyświetlanie widgetu, w tablicy $args otrzymujemy ustawienia motywu odnośnie znaczników HTML-a używanych do budowania sidebaru
    public function widget($args, $instance) {


        $fb = $instance['facebook'];
        $tweet = $instance['twitter'];
        $google = $instance['google'];
        $inst = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $in = $instance['linkedin'];
        $yt = $instance['youtube'];


        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];

        if(!empty($title)){
            echo $args['before_title'].$title.$args['after_title'];
        }
        echo '<ul class="social-icons">';

            if(!empty($fb)){
                echo '<li><a href="'.$fb.'" class="btn btn-facebook" target="_blank"><span class="fa fa-facebook"></span></a></li>';
            }
            if(!empty($tweet)){
                echo '<li><a href="'.$tweet.'" class="btn btn-twitter" target="_blank"><span class="fa fa-twitter"></span></a></li>';
            }
            if(!empty($google)){
                echo '<li><a href="'.$google.'" class="btn btn-google" target="_blank"><span class="fa fa-google"></span></a></li>';
            }
            if(!empty($inst)){
                echo '<li><a href="'.$inst.'" class="btn btn-instagram" target="_blank"><span class="fa fa-instagram"></span></a></li>';
            }
            if(!empty($pinterest)){
                echo '<li><a href="'.$pinterest.'" class="btn btn-pinterest" target="_blank"><span class="fa fa-pinterest"></span></a></li>';
            }
            if(!empty($in)){
                echo '<li><a href="'.$in.'" class="btn btn-linkedin" target="_blank"><span class="fa fa-linkedin"></span></a></li>';
            }
            if(!empty($yt)){
                echo '<li><a href="'.$yt.'" class="btn btn-youtube" target="_blank"><span class="fa fa-youtube"></span></a></li>';
            }
        echo '</ul>';
    //    echo '<p>'.$text.'</p>';
        echo $args['after_widget'];

    }

    //wyświetlająca prosty formularz z ustawieniami, my używamy wyłącznie pola do uzupełnienia tytułu
    public function form($instance) {
            if(isset($instance['title'])){
                $title = $instance['title'];
            } else {
                $title = 'FOLLOW ME';
            }
            $fb = $instance['facebook'];
            $tweet = $instance['twitter'];
            $google = $instance['google'];
            $inst = $instance['instagram'];
            $pinterest = $instance['pinterest'];
            $in = $instance['linkedin'];
            $yt = $instance['youtube'];

            echo '<p><label for="'.$this->get_field_id('title').'">'.__('Title:').'</label><input class="widefat" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" type="text" value="'.esc_attr($title).'" /></p>';
            echo '<p><br/></p>';
            echo '<p><label for="'.$this->get_field_id('facebook').'">'.__('Facebook:').'</label><input class="widefat" id="'.$this->get_field_id('facebook').'" name="'.$this->get_field_name('facebook').'" type="text" value="'.esc_attr($fb).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('twitter').'">'.__('Twitter:').'</label><input class="widefat" id="'.$this->get_field_id('twitter').'" name="'.$this->get_field_name('twitter').'" type="text" value="'.esc_attr($tweet).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('google').'">'.__('Google:').'</label><input class="widefat" id="'.$this->get_field_id('google').'" name="'.$this->get_field_name('google').'" type="text" value="'.esc_attr($google).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('instagram').'">'.__('Instagram:').'</label><input class="widefat" id="'.$this->get_field_id('instagram').'" name="'.$this->get_field_name('instagram').'" type="text" value="'.esc_attr($inst).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('pinterest').'">'.__('Pinterest:').'</label><input class="widefat" id="'.$this->get_field_id('pinterest').'" name="'.$this->get_field_name('pinterest').'" type="text" value="'.esc_attr($pinterest).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('linkedin').'">'.__('Linkedin:').'</label><input class="widefat" id="'.$this->get_field_id('linkedin').'" name="'.$this->get_field_name('linkedin').'" type="text" value="'.esc_attr($in).'" /></p>';
            echo '<p><label for="'.$this->get_field_id('youtube').'">'.__('Youtube:').'</label><input class="widefat" id="'.$this->get_field_id('youtube').'" name="'.$this->get_field_name('youtube').'" type="text" value="'.esc_attr($yt).'" /></p>';
    }

    //zapis konfiguracji – możemy tutaj sprawdzić poprawność wprowadzonych danych
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['facebook'] = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google'])) ? strip_tags($new_instance['google']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram'])) ? strip_tags($new_instance['instagram']) : '';
        $instance['pinterest'] = (!empty($new_instance['pinterest'])) ? strip_tags($new_instance['pinterest']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin'])) ? strip_tags($new_instance['linkedin']) : '';
        $instance['youtube'] = (!empty($new_instance['youtube'])) ? strip_tags($new_instance['youtube']) : '';

        return $instance;
    }

}

function register_jwba_social_widget() {
    register_widget('jwba_social_widget');
}
add_action('widgets_init', 'register_jwba_social_widget');


// CUSTOM POST TYPE
add_action('init', 'news_register');

function news_register() {

    $labels = array(
        'name' => _x('Newsy', 'post type general name'),
        'singular_name' => _x('Aktualności', 'post type singular name'),
        'add_new' => _x('Dodaj nowe', 'news item'),
        'add_new_item' => __('Dodaj nowy'),
        'edit_item' => __('Edytuj news'),
        'new_item' => __('Nowy news'),
        'view_item' => __('Zobacz news'),
        'search_items' => __('Szukaj'),
        'not_found' =>  __('Nie znaleziono'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
    //    'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
        'menu_icon' => true,
        'rewrite' => true,
        'capability_type' => 'post',
    //    'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
      );

//    register_post_type( 'news' , $args );
}
/*
register_taxonomy(
    "Kategorie",
    array("news"),
    array(
        "hierarchical" => true,
        "label" => "Kategorie",
        "singular_label" => "Kategoria",
        "rewrite" => true
        )
);
*/
add_action('init', 'offer_register');

function offer_register() {

    $labels = array(
        'name' => _x('Oferta', 'post type general name'),
        'singular_name' => _x('Oferta', 'post type singular name'),
        'add_new' => _x('Dodaj', 'news item'),
        'add_new_item' => __('Dodaj nowy'),
        'edit_item' => __('Edytuj news'),
        'new_item' => __('Nowy news'),
        'view_item' => __('Zobacz news'),
        'search_items' => __('Szukaj'),
        'not_found' =>  __('Nie znaleziono'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
    //    'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
        'menu_icon' => true,
        'rewrite' => true,
        'capability_type' => 'post',
    //    'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
      );

    register_post_type( 'offer' , $args );
}

register_taxonomy(
    "coffer",
    array("offer"),
    array(
        "hierarchical" => true,
        "label" => "Kategorie",
        "singular_label" => "Kategoria",
        "rewrite" => true
        )
);

//wywolanie
//kriesi_pagination($custom_query->max_num_pages);

function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}