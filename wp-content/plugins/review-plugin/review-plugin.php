<?php
/**
* Plugin Name:  Review Plugin
* Plugin URI:   https://dipuchaudhary.com.np/review-plugin
* Description:  Review plugin help users to reviews on your webiste
* Version:  1.0.0
* Author:   Dipu Chaudhary
* Author URI: dipuchaudhary.com.np
* Text Domain: review-plugin
* Domain Path: /languages
* License: GPL v2 or later
*/


 defined( 'ABSPATH' ) or die();

    /**
     * Review Class
     */

    class ReviewPlugin {

    /** Review plugin constructor */
        public function __construct() {
            
            $this->init_hooks();
            add_action( 'plugins_loaded', array( $this, 'review_plugin_load_text_domain' ) );
        }

        /** review plugin load text domain */

        public function review_plugin_load_text_domain() {

            load_plugin_textdomain( 'review-plugin', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
        }

        /** hooks into action and filters */
        private function init_hooks() {

            add_action( 'init', array( $this, 'review_post_type' ) );
            add_shortcode( 'rv_shortcode', array( $this, 'review_shortcode' ) );
            add_shortcode( 'rv_show_code', array( $this, 'show_review_template' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'review_plugin_enqueue_script' ) );
            add_action( 'wp_ajax_review_register', array( $this, 'review_register' ) );
            add_action( 'wp_ajax_review_data', array( $this, 'show_review_data' ) );
            add_filter( 'username', array($this, 'get_username' ) );

        }

        /** activate */
        public function activate() {

            flush_rewrite_rules();
        }

        /** deactivate */
        public function deactivate() {

            flush_rewrite_rules();
        }

        /** review post type */
        public function review_post_type() {

            register_post_type( 'review', [ 'public' => true, 'label' => 'Review', 'menu_icon' => 'dashicons-star-half' ] );
        }

        /** review shortcode */
        public function review_shortcode() {

            ob_start();
            require_once 'templates/register.php';
            return ob_get_clean();
        }

        public function show_review_template() {

            ob_start();
            require_once 'templates/show-review.php';
            return ob_get_clean();
        }
        

        public function review_plugin_enqueue_script() {

            wp_register_script( 'review_script' , WP_PLUGIN_URL .'/review-plugin/assets/js/review-script.js', array( 'jquery' ), '1.0.0', true );
            wp_localize_script( 'review_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'review_nonce' => wp_create_nonce( 'review_script_nonce' ) ) );
            wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'review_script' );
            wp_enqueue_style( 'style' , plugins_url().'/review-plugin/assets/css/review-style.css', array(), '1.0.0', 'all' );

        }

        public function get_username( $email ) {
            
                
                $rvemail = ( isset ($_POST['email'] ) ? $_POST['email'] : ''  );
                
                $email = strstr( $rvemail, '@', true );
                
                return $email;
            
        }

        public function review_register() {

            if( ! isset( $_POST['review_nonce'] ) || ! wp_verify_nonce( $_POST['review_nonce'], 'review_script_nonce' ) ) {
                return;
            }

            $fname = sanitize_text_field( $_POST['fname'] );
            $lname = sanitize_text_field( $_POST['lname'] );
            $email = sanitize_email( $_POST['email'] );
            $pass = $_POST['password'];
            $review = sanitize_textarea_field( $_POST['review_desc'] );
            $rating = sanitize_textarea_field( $_POST['rating'] );
            $username = apply_filters( 'username', $email );

            if( ! email_exists( $email ) ) {

                $data = array (
                    'user_login' => $username,
                    'user_pass' =>  $pass,
                    'user_email' => $email,
                );

                $user_id = wp_insert_user( $data );

                $metas = array( 
                    'review' => $review,
                    'rating' => $rating
                );

                if( ! is_wp_error( $user_id ) ) {

                    foreach( $metas as $key => $val ) {

                        add_user_meta( $user_id, $key, $val );
                    }
                    update_user_meta( $user_id,'first_name',$fname );
                    update_user_meta( $user_id,'last_name',$lname );
                    
                    wp_send_json_success( array( 'msg' => __('User Registered successfully','review-plugin') ) );
                   
                }
                 
            } else {

                wp_send_json_error( array( 'msg' => __( 'Email id already exists', 'review-plugin' ) ) );
                return;
            }
           
    }

        public function show_review_data() {

            // $args = array(
            //     'number'        => '5',
            //     'role'           => 'subscriber',    
            // );
    
            // // The User Query
            // $users = new WP_User_Query( $args );
            // $user_array = array();
            // // The User Loop
            // if ( ! empty( $users->results ) ) {
            //     foreach( $users->results as $user ) {
                    
            //         $user_id = $user->ID;
            //         $u['user_email'] = $user->user_email;
            //         $u['first_name'] = get_user_meta( $user_id,'first_name',true);
            //         $u['last_name'] = get_user_meta( $user_id,'last_name',true);
            //         $u['review'] = get_user_meta( $user_id,'review',true);
            //         $u['rating'] = get_user_meta( $user_id,'rating',true);

            //         array_push($user_array,$u);
            //     }
            // } 

            $output = '';
            $limit = 5;
            if( isset($_POST['page_no'])) {
                $page_no = $_POST['page_no'];
            } 
            else {
                $page_no = 1;
            }
            $offset = ($page_no-1) * $limit;
            $args = array (
                'number'        => $limit,
                'offset'        => $offset,
                'role'          => 'subscriber',
            );
            $users = new WP_User_Query( $args );
            if(count($users->results) > 0 ) {
                foreach( $users->results as $user){
                    $user_id = $user->ID;
                    $email= $user->user_email;
                    $fname = get_user_meta( $user_id,'first_name',true);
                    $lname = get_user_meta( $user_id,'last_name',true);
                    $review = get_user_meta( $user_id,'review',true);
                    $rating = get_user_meta( $user_id,'rating',true);

                    $output .= '<div class="card text-white text-center p-3">
                    <blockquote class="blockquote mb-0">
                     <p>'.$review.'</p>
                    <footer class="blockquote-footer">
                    <div class="rating">'.$rating.' <span class="fa fa-star checked"></span></div>
                        <small id="fullname">
                         '.$fname.' '.$lname.'
                        </small>
                        <cite title="Source Title">'.$email.'</cite>
                    </footer>
                    </blockquote>
                    </div>';
                }
                
            }
            $args1 = array(
                'role' => 'subscriber',
            );
            
            $ucount_query = new WP_User_Query($args1);
            $d = $ucount_query->get_results();
            $total_users = $d ? count($d) : 1;
            // $records = count($total_users);
            $totalpage = ceil($total_users/$limit);

                $output.="<ul class='pagination justify-content-center' style='margin:20px 0'>";

            for ($i=1; $i <= $totalpage ; $i++) { 
            if ($i == $page_no) {
                $active = "active";
            }else{
                $active = "";
            }

                $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
            }

            $output .= "</ul>";
            echo $output;
            
            die();
        
    }


}

     /** class instantiation */
     if ( class_exists ( 'ReviewPlugin' ) ) {

        $reviewPlugin = new ReviewPlugin();
    }

    /** register activation and deactivation */
    register_activation_hook( __FILE__, array( $reviewPlugin, 'activate' )  );
    register_deactivation_hook( __FILE__, array( $reviewPlugin, 'deactivate' ) );

?>