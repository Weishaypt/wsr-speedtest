<?php
/*
Plugin Name: E8
Description: Create a plug-in that displays the button “Enable technical work” / “Disable technical work”
Version: 4.1.9
*/

add_action('admin_menu', 'add_my_page_tech_work');

add_action( 'wp_head', 'technical_work_footer');

function technical_work_footer() {
    if(get_option('technical_work') == 'false') return;
?>
    <style>
        .technical-work {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: black;
            color: white;
            font-weight: bold;
            font-size: 60px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="technical-work">
        Technical work!
    </div>
<?php
    return;
}

function add_my_page_tech_work () {
    add_menu_page('Technical works', 'Technical works', 'read', 'tech-work-plugin', function () {
        $message = '';
        if(!empty($_POST['submit'])) {
            update_option('technical_work', 'true');
            $message = 'Updated';
        }
        if(!empty($_POST['submitdisable'])) {
            update_option('technical_work', 'false');
            $message = 'Updated';
        }
        ?>
        <div class="wrap">
            <h2>Add</h2>
            <?php echo $message;?>
            <form method="POST">
                <input style="margin: 20px" type="submit" value="Active work" id="submit" class="button-primary" name="submit">
                <input style="margin: 20px" type="submit" value="Disable work" id="submit" class="button-primary" name="submitdisable">
            </form>
        </div>
        <?php
    });
}

register_activation_hook(__FILE__, function () {
    add_option('technical_work', 'false');

});

register_deactivation_hook(__FILE__, function () {
    delete_option('technical_work');

});