<?php

namespace WPEssentialRequireNotifier;

/*
 * Require Notifier is the open source library. Used to apply the notifications fire in WordPress admin panel.
 *
 * (c) WPEssential <WordPress.essential@gmail.com>
 *
 * Version:1.0.0
 */

final class RequireNotifier
{
	public $title        = '';
	public $desc         = '';
	public $type         = 'error';
	public $link         = '';
	public $link_title   = '';
	public $learn_desc   = '';
	public $learn_link   = '';
	public $icon         = '';
	public $dismiss      = '';
	public $plugin_check = false;
	public $icon_alt     = 'WPEssential';
	public $css_color    = '#9b0a46';

	public function __construct ( $title )
	{
		$this->title( $title );

		add_action( 'admin_notices', [ $this, 'output' ] );
	}

	public function title ( $callback )
	{
		$this->title = $callback;
		return $this;
	}

	public static function make ( ...$arguments )
	{
		return new static( ...$arguments );
	}

	public function desc ( $callback )
	{
		$this->desc = $callback;
		return $this;
	}

	public function type ( $callback )
	{
		$this->type = $callback;
		return $this;
	}

	public function dismiss ( $callback )
	{
		if ( true == $callback ) {
			$this->dismiss = 'is-dismissible';
		}
		else {
			$this->dismiss = '';
		}
		return $this;
	}

	public function learn_desc ( $callback )
	{
		$this->learn_desc = $callback;
		return $this;
	}

	public function learn_link ( $callback )
	{
		$this->learn_link = $callback;
		return $this;
	}

	public function icon ( $callback )
	{
		$this->icon = $callback;
		return $this;
	}

	public function icon_alt ( $callback )
	{
		$this->icon_alt = $callback;
		return $this;
	}

	public function css_color ( $callback )
	{
		$this->css_color = $callback;
		return $this;
	}

	/**
	 * Check whether the plugin is active by checking the active_plugins list.
	 *
	 * @param string $callback Base plugin path from plugins directory.
	 *
	 * @return \WPEssentialRequireNotifier\RequireNotifier True, if in the active plugins list. False, not in the list.
	 * @since 1.0.0
	 */
	public function plugin_check ( string $callback )
	{
		if ( ! \function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin = "{$callback}/{$callback}.php";

		$installed_plugins = get_plugins();

		$is_wpe_installed = isset( $installed_plugins[ $plugin ] );

		$name = ucwords( str_replace( [ '_', '-' ], ' ', $callback ) );

		if ( $is_wpe_installed ) {
			if ( ! current_user_can( 'activate_plugins' ) ) {
				return $this;
			}

			$this->link_title( sprintf( esc_html__( 'Activate %s', 'wpessential-elementor-blocks' ), $name ) );
			$this->link( wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin ) );
		}
		else {
			if ( ! current_user_can( 'install_plugins' ) ) {
				return $this;
			}

			$plugin = str_replace( '.php', '', basename( $plugin ) );

			$this->link_title( sprintf( esc_html__( 'Install %s', 'wpessential-elementor-blocks' ), $name ) );
			$this->link( wp_nonce_url( self_admin_url( "update.php?action=install-plugin&plugin={$plugin}" ), "install-plugin_{$plugin}" ) );
		}

		return $this;
	}

	public function link_title ( $callback )
	{
		$this->link_title = $callback;
		return $this;
	}

	public function link ( $callback )
	{
		$this->link = $callback;
		return $this;
	}

	public function output ()
	{
		$screen = get_current_screen();
		if ( isset( $screen->parent_file ) && $screen->parent_file === 'plugins.php' && $screen->id === 'update' ) {
			return;
		}

		?>
		<div class="notice notice-<?php echo esc_attr( $this->type ) ?> <?php echo esc_attr( $this->dismiss ); ?> wpessential-notice">
            <div class="wpessential-notice-inner">
                <div class="wpessential-notice-icon">
                    <img src="<?php echo esc_url( $this->icon ); ?>" alt="<?php echo esc_attr( $this->icon_alt ); ?>" />
                </div>
                <div class="wpessential-notice-content">
                    <h3><?php echo esc_htmlesc_html__( $this->title ); ?></h3>
                    <p>
						<?php _e( $this->desc, 'wpessential-elementor-blocks' ); ?>
                    </p>
					<?php
					if ( $this->learn_link && $this->learn_desc ) {
						?>
						<a target="_blank" href="<?php echo esc_url( $this->learn_link ) ?>" title="<?php echo esc_attr( $this->learn_desc ) ?>"><?php _e( $this->learn_desc, 'wpessential-elementor-blocks' ); ?></a>
						<?php
					}
					?>
                </div>
				<?php
				if ( $this->link && $this->link_title ) {
					?>
					<div class="wpessneital-install-now">
                        <a class="button button-primary wpessneital-install-install-button" target="_blank" href="<?php echo esc_url( $this->link ) ?>" title="<?php echo esc_attr( $this->link_title ) ?>"><i class="dashicons dashicons-download"></i><?php _e( $this->link_title, 'wpessential-elementor-blocks' ); ?>
                        </a>
                    </div>
					<?php
				}
				?>
            </div>
        </div>
		<style>
            .notice.wpessential-notice {
	            border-left-color: <?php echo esc_attr($this->css_color); ?> !important;
	            padding: 20px;
            }

            .rtl .notice.wpessential-notice {
	            border-right-color: <?php echo esc_attr($this->css_color); ?> !important;
            }

            .notice.wpessential-notice .wpessential-notice-inner {
	            display: table;
	            width: 100%;
            }

            .notice.wpessential-notice .wpessential-notice-inner .wpessential-notice-icon,
            .notice.wpessential-notice .wpessential-notice-inner .wpessential-notice-content,
            .notice.wpessential-notice .wpessential-notice-inner .wpessneital-install-now {
	            display: table-cell;
	            vertical-align: middle;
            }

            .notice.wpessential-notice .wpessential-notice-icon {
	            color: <?php echo esc_attr($this->css_color); ?>;
	            font-size: 50px;
	            width: 50px;
            }

            .notice.wpessential-notice .wpessential-notice-content {
	            padding: 0 20px;
            }

            .notice.wpessential-notice p {
	            padding: 0;
	            margin: 0;
            }

            .notice.wpessential-notice h3 {
	            margin: 0 0 5px;
            }

            .notice.wpessential-notice .wpessneital-install-now {
	            text-align: center;
            }

            .notice.wpessential-notice .wpessneital-install-now .wpessneital-install-install-button {
	            padding: 5px 30px;
	            height: auto;
	            line-height: 20px;
	            text-transform: capitalize;
            }

            .notice.wpessential-notice .wpessneital-install-now .wpessneital-install-install-button i {
	            padding-right: 5px;
            }

            .rtl .notice.wpessential-notice .wpessneital-install-now .wpessneital-install-install-button i {
	            padding-right: 0;
	            padding-left: 5px;
            }

            .notice.wpessential-notice .wpessneital-install-now .wpessneital-install-install-button:active {
	            transform: translateY(1px);
            }

            @media (max-width: 767px) {
	            .notice.wpessential-notice {
		            padding: 10px;
	            }

	            .notice.wpessential-notice .wpessential-notice-inner {
		            display: block;
	            }

	            .notice.wpessential-notice .wpessential-notice-inner .wpessential-notice-content {
		            display: block;
		            padding: 0;
	            }

	            .notice.wpessential-notice .wpessential-notice-inner .wpessential-notice-icon,
	            .notice.wpessential-notice .wpessential-notice-inner .wpessneital-install-now {
		            display: none;
	            }
            }
        </style>
		<?php
	}
}
