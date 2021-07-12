<?php
class DropDownMenuListTable extends WP_List_Table {

    public function __construct($args = array())
    {
        parent::__construct($args);

        $this->prepare_items();
    }

    function get_columns()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'shortcode' => 'Шорткод'
        );
    }

    function prepare_items()
    {

        $this->process_bulk_action();
        $data = $this->table_data();

        $this->set_pagination_args(array(
            'total_items' => count($data),
            'per_page' => -1,
        ));


       $this->_column_headers = [
           $this->get_columns()
       ];

        $this->items = $data;

    }


    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'dropdown_menus';

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }

    function table_data() {
        global $wpdb;
        $q = "SELECT * FROM `wp_dropdown_menus`";
        return $wpdb->get_results($q);
    }


    function column_default($item, $column_name)
    {
        return $item->$column_name ?? print_r($item, 1);
    }

    function column_cb( $item ){
        echo '<input type="checkbox" name="licids[]" id="cb-select-'. $item->id .'" value="'. $item->id .'" />';
    }

    function column_name($item)
    {
        return $item->name.' '.$this -> row_actions(array(
                'edit'	 => '<a href="?page='.$_REQUEST['page'].'&action=edit&id='.$item->id.'">редактировать</a>',
                'delete' => '<a href="?page='.$_REQUEST['page'].'&action=delete&id='.$item->id.'">удалить</a>',
            ));
    }

    function column_shortcode($item) {

        return "[drop-down id='".$item->shortcode."']";
    }
}