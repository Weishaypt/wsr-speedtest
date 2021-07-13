<?php
/*
Plugin Name: E3
Description: CountDown Kazan WorldSkills plugin
Version: 4.1.9
*/


class CountDownTimerWidget extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'count_down_timer',
            'Count Down Timer'
        );
    }

    public function widget($args, $instance)
    {

        $timer = getCountDownTimerDate();
        $id = time();
?>
        <style>
            .count-down-timer {
                background: deepskyblue;
                padding: 1em;
                text-align: center;
            }
            .count-down-timer .timer {
                color: white;
                font-weight: bold;
                font-size: 48px;
            }
        </style>
        <div data-id="<?php echo $id;?>" class="count-down-timer">
            <div class="timer">
                <?php echo $timer;?>
            </div>
        </div>
        <script>
            window.addEventListener('load', function () {
                setInterval(() => {
                    fetch('<?php echo admin_url('admin-ajax.php')?>?action=getcountdowntimer', {
                        method: "POST"
                    })
                    .then(res => {
                        res.text().then(text => {
                            document.querySelector('.count-down-timer[data-id="<?php echo $id?>"] .timer').innerHTML = text;
                        })
                    })
                }, 1000)
            })
        </script>
<?php
    }
}

function getCountDownTimerDate() {
    $dateEnd = mktime(23, 59, 0, 8, 22, 2021);
    $dateStart = time();
    $secondsRemaining = $dateEnd - $dateStart;

    $days = floor($secondsRemaining / 86400);
    $secondsRemaining -= $days * 86400;

    $hours = floor($secondsRemaining / 3600);
    $secondsRemaining -= $hours * 3600;

    $minutes = floor($secondsRemaining / 60);
    $secondsRemaining -= $minutes * 60;

    return $days . ':' . $hours . ':' . $minutes . ':' . $secondsRemaining;

}


add_action('widgets_init', function () {
    register_widget('CountDownTimerWidget');
});

add_action('wp_ajax_getcountdowntimer', 'get_count_down_timer_');

function get_count_down_timer_() {
    echo getCountDownTimerDate();
    wp_die();
}