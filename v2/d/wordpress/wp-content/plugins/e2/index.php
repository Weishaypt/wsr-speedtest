<?php
/*
Plugin Name: E2
Description: Dropdown menu plugin
Version: 4.1.9
*/

add_action('admin_menu', 'add_my_page_dropdown');

add_shortcode('drop-down', function ($atts) {
    $id = $atts['id'];
    global $wpdb;

    $result = $wpdb->get_results('SELECT * FROM wp_dropdown_menus WHERE shortcode = "'.$id.'"');
    $result = $result[0];
    $data = json_decode($result->data);
    $list = '';
    foreach ($data as $item) {
        $list .= '<li><a href="'.$item->url.'">'.$item->name.'</a></li>';
    }
    $id = round(microtime(true) * 1000);
    $html = '
    <div class="dropdown-menu">
       <div class="name" data-id="'.$id.'">'.$result->name.'</div>
       <ul style="display: none" data-menu-id="'.$id.'">
       '.$list.'
        </ul>
    </div>
    <script>
        window.addEventListener("load", function () {
            let links = document.querySelectorAll(".dropdown-menu .name")
            links.forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault()
                    
                    let list = document.querySelector(`[data-menu-id="'.$id.'"]`)
                    console.log(list)
                    if(list.style.display == "none") {
                        list.style.display = "block"
                    }
                    else {
                        list.style.display = "none"
                    }
                })
            })
        })
    </script>
    ';

    echo $html;
});

function add_my_page_dropdown () {
    add_menu_page('Plugin works!', 'Plugin Dropdown', 'read', 'dropdown-plugin-add', function () {
        $error = '';
        $message = '';
        global $wpdb;

        if(!empty($_POST['submit'])) {
            if(empty($_POST['name'])) {
                $error = 'Поле name не должно быть пустым';
            }
            else if(empty($_POST['data'])) {
                $error = 'Поле ссылок не должно быть пустым';
            }
            else {
                $list = [];
                foreach ($_POST['data']['name'] as $item => $key) {
                    $list[] = [
                        'name' => $key,
                        'url' => $_POST['data']['url'][$item]
                    ];
                }

                $wpdb->insert('wp_dropdown_menus', array(
                        'name' => $_POST['name'],
                        'shortcode' => time(),
                        'data' => json_encode($list)
                ));
            }
        }
    ?>
        <div class="wrap">
            <h2>Add</h2>
            <form method="POST">
                <div>
                    <?php echo $error;?>
                    <?php echo $message;?>
                </div>
                <div>
                    <label>
                        Name:
                        <input type="text" name="name">
                    </label>
                </div>
                <button class="button-primary" style="margin: 20px" id="addDropdown">Add</button>
                <div class="dropdown-links">
                    <div>
                        <input name="data[name][]" placeholder="Name" />
                        <input name="data[url][]" placeholder="URL" />
                    </div>
                </div>
                <input style="margin: 20px" type="submit" value="Save" id="submit" class="button-primary" name="submit">
            </form>
        </div>
        <script>
            window.addEventListener('load', function () {
                let btn = document.getElementById('addDropdown')
                btn.addEventListener('click', function (e) {
                    e.preventDefault();

                    let block = document.createElement('div')
                    block.innerHTML = '<input name="data[name][]" placeholder="Name" /><input name="data[url][]" placeholder="URL" />'

                    document.querySelector('.dropdown-links').append(block);
                })
            })
        </script>
    <?php
    });

    add_menu_page('Plugin works!', 'Plugin Dropdown', 'read', 'dropdown-plugin', function () {
        require_once __DIR__ . '/DropDownMenuListTable.php';
        $table = new DropDownMenuListTable();

        $message = '';
        if ('delete' === $table->current_action()) {
            $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'swlp'), (is_array($_REQUEST['id'])?count($_REQUEST['id']):1)) . '</p></div>';
        }
?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>
            <a class="add-new-h2"
               href="<?php echo get_admin_url(get_current_blog_id(), 'admin.php?page=dropdown-plugin-add');?>"><?php _e('Add new ip address', 'swlp')?></a>
            <?php echo $message?>
            <?php
            // выводим таблицу на экран где нужно
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="page" value="'.$_REQUEST['page'].'">';
            $table->display();
            echo '</form>';
            ?>

        </div>
<?php
    });
}