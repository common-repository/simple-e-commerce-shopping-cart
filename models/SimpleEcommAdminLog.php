<?php

/**
 * Class to admin logging.
 * @since 3.1.2
 * @author Naim-Ul-Hassan
 */
class SimpleEcommAdminLog
{
    /**
     * Initialize SimpleEcommAdminLog class.
     */
    public function __construct( )
    {
        add_action( 'admin_notices', array( $this, 'render_default' ) );
    }

    /**
     * Render default log
     * @return void
     */
    public function render_default(): void
    {
        $type = "success";
        $message = "successfully done";
        printf( '<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>', esc_attr( $type ), esc_html( $message ) );
    }

    /**
     * Displays warning on the admin screen.
     * By default success
     * @param string $message
     * @param string $type
     * @return void
     */
    public static function render(string $message = "successfully saved", string $type = "success"): void
    {
        printf( '<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>', esc_attr( $type ), esc_html( $message ) );
    }


    /**
     * Print admin SUCCESS notice
     * @param string $message
     * @return void
     */
    public static function success(string $message): void
    {
        SimpleEcommAdminLog::render($message);

    }


    /**
     * Print admin WARNING notice
     * @param string $message
     * @return void
     */
    public static function warning(string $message): void
    {
        SimpleEcommAdminLog::render($message, "warning");
    }


    /**
     * Print admin ERROR notice
     * @param string $message
     * @return void
     */
    public static function error(string $message): void
    {
        SimpleEcommAdminLog::render($message, "error");
    }

}
