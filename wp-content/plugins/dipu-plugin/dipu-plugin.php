<?php
/** 
* plugin name: dipu-plugin
* plugin URI: www.dipuchaudhary.com.np/plugin
* description: This is my first attempt to writing wordpress plugin
* version: 1.0.0
* Author: Dipu Chaudhary
* Author URI: dipuchaudhary.com.np
* License: GPLV2 or later
* Text Domain: dipu-plugin
*/

defined ( 'ABSPATH') or die('hey you silly man!, What are you trying to do?');

class dipuPlugin {

    public function __construct(){
        add_action('admin_menu', array($this,'custom_menu_pages'));
        add_action('admin_notices',array($this,'plugin_active_msg'));
        add_action('init',array($this,'custom_post_type'));
        add_action('admin_init',array($this,'update_description'));
        add_filter('description_update',array($this,'custom_email_description'));
        
    }

   public function custom_menu_pages(){
        add_menu_page('test email','Test Email','manage_options','email_slug',array($this,'testemail'));
        add_submenu_page('email_slug','send email','Send Email','manage_options','send_email_slug',array($this,'sendemail'));
    }
    
    public function activate() {
        $this->custom_post_type();
        flush_rewrite_rules();
    }
    public function deactivate() {
        flush_rewrite_rules();
    }

    public function custom_post_type() {
        register_post_type('book',['public'=> true,'label'=>'Books']);
    }

    public function plugin_active_msg(){
        echo '<div class="notice notice-success is-dismissible"><p>Dipu Plugin is now activated</p></div>';
    }

    public function testemail() {
        echo "<h1>Test Email</h1>";
    }

    public function sendemail() {
        echo '
        <form action="" method="post">
        <div class="mb-3">
            <label for="subject" class="form-label">Email Subject</label>
            <input type="text" name="subject" class="form-control" placeholder="Email Subject">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" name="description"cols="30" rows="5" placeholder="description"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Send To</button>
      </form>
        ';
    }

    public function update_description(){
        
        if( isset ($_POST['submit'] ) ) {
            $desc = apply_filters('description_update',$_POST['description']);
            echo '<div class="container"><div class="notice is-dismissable"><p class="text-center">'.$desc.'</p></div></div>';
        
        }
    }

    public function custom_email_description($content) {
        $content .= 'is modified';
        return $content;
    }
}
if ( class_exists ('dipuPlugin') ){
    $dipuplugin = new dipuPlugin();
}

register_activation_hook(__FILE__,array($dipuplugin,'activate'));

register_deactivation_hook(__FILE__,array($dipuplugin,'deactivate'));