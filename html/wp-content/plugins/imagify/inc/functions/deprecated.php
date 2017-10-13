<?php
defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

/**
 * Deprecated imagify.io API for WordPress.
 *
 * @since 1.6.5
 */
class Imagify_Deprecated {

	/**
	 * A shorthand to display a message about a deprecated method.
	 *
	 * @since 1.6.5
	 * @author Grégory Viguier
	 *
	 * @param string $method_name The deprecated method.
	 */
	protected function deprecated_camelcased_method( $method_name ) {
		$class_name      = get_class( $this );
		$new_method_name = preg_replace( '/[A-Z]/', '_$0', $method_name );
		_deprecated_function( $class_name . '::' . $method_name . '()', '1.6.5', $class_name . '::' . $new_method_name . '()' );
	}

	/**
	 * Main Instance.
	 * Ensures only one instance of class is loaded or can be loaded.
	 * Well, actually it ensures nothing since it's not a full singleton pattern.
	 *
	 * @return object Main instance.
	 */
	public static function instance() {
		$class_name = get_class( $this );
		_deprecated_function( $class_name . '::' . __FUNCTION__ . '()', '1.6.5', 'imagify()' );
		return Imagify::get_instance();
	}

	/**
	 * Get your Imagify account infos.
	 *
	 * @return object
	 */
	public function getUser() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_user();
	}

	/**
	 * Create a user on your Imagify account.
	 *
	 * @param  array $data All user data. Details here: --.
	 * @return object
	 */
	public function createUser( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->create_user( $data );
	}

	/**
	 * Update an existing user on your Imagify account.
	 *
	 * @param  string $data All user data. Details here: --.
	 * @return object
	 */
	public function updateUser( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->update_user( $data );
	}

	/**
	 * Check your Imagify API key status.
	 *
	 * @param  string $data The license key.
	 * @return object
	 */
	public function getStatus( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_status( $data );
	}

	/**
	 * Get the Imagify API version.
	 *
	 * @return object
	 */
	public function getApiVersion() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_api_version();
	}

	/**
	 * Get Public Info.
	 *
	 * @return object
	 */
	public function getPublicInfo() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_public_info();
	}

	/**
	 * Optimize an image from its binary content.
	 *
	 * @param  string $data All options. Details here: --.
	 * @return object
	 */
	public function uploadImage( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->upload_image( $data );
	}

	/**
	 * Optimize an image from its URL.
	 *
	 * @param  string $data All options. Details here: --.
	 * @return object
	 */
	public function fetchImage( $data ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->fetch_image( $data );
	}

	/**
	 * Get prices for plans.
	 *
	 * @return object
	 */
	public function getPlansPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_plans_prices();
	}

	/**
	 * Get prices for packs (one time).
	 *
	 * @return object
	 */
	public function getPacksPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_packs_prices();
	}

	/**
	 * Get all prices (packs & plans included).
	 *
	 * @return object
	 */
	public function getAllPrices() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->get_all_prices();
	}

	/**
	 * Get all prices (packs & plans included).
	 *
	 * @param  string $coupon A coupon code.
	 * @return object
	 */
	public function checkCouponCode( $coupon ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->check_coupon_code( $coupon );
	}

	/**
	 * Get information about current discount.
	 *
	 * @return object
	 */
	public function checkDiscount() {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->check_discount();
	}

	/**
	 * Make an HTTP call using curl.
	 *
	 * @param  string $url  The URL to call.
	 * @param  array  $args The request args.
	 * @return object
	 */
	private function httpCall( $url, $args = array() ) {
		$this->deprecated_camelcased_method( __FUNCTION__ );
		return $this->http_call( $url, $args );
	}
}


if ( class_exists( 'WpeCommon' ) ) :

	/**
	 * Change the limit for the number of posts: WP Engine limits SQL queries size to 2048 octets (16384 characters).
	 *
	 * @since  1.4.7
	 * @since  1.6.7 Deprecated.
	 * @author Jonathan Buttigieg
	 *
	 * @return int
	 */
	function _imagify_wengine_unoptimized_attachment_limit() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.7', '_imagify_wpengine_unoptimized_attachment_limit()' );
		return _imagify_wpengine_unoptimized_attachment_limit();
	}

endif;

if ( function_exists( 'emr_delete_current_files' ) ) :

	/**
	 * Re-Optimize an attachment after replace it with Enable Media Replace.
	 *
	 * @since  1.0
	 * @since  1.6.9 Deprecated.
	 * @author Jonathan Buttigieg
	 *
	 * @param string $guid A post guid.
	 */
	function _imagify_optimize_enable_media_replace( $guid ) {
		global $wpdb;

		_deprecated_function( __FUNCTION__ . '()', '1.6.9', 'imagify_enable_media_replace()->optimize()' );

		$attachment_id = (int) $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $guid ) );

		// Stop if the attachment wasn't optimized yet by Imagify.
		if ( ! get_post_meta( $attachment_id, '_imagify_data', true ) ) {
			return;
		}

		$optimization_level = get_post_meta( $attachment_id, '_imagify_optimization_level', true );
		$class_name         = get_imagify_attachment_class_name( 'wp', $attachment_id, 'enable-media-replace-upload-done' );
		$attachment         = new $class_name( $attachment_id );

		// Remove old optimization data.
		$attachment->delete_imagify_data();

		// Optimize it!!!!!
		$attachment->optimize( $optimization_level );
	}

endif;

/**
 * Include Admin Bar Profile informations styles in front.
 *
 * @since 1.2
 * @since 1.6.10 Deprecated.
 */
function _imagify_admin_bar_styles() {
	_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Assets::get_instance()->enqueue_styles_and_scripts_frontend()' );

	if ( ! is_admin() ) {
		Imagify_Assets::get_instance()->enqueue_styles_and_scripts_frontend();
	}
}


/**
 * Make an absolute path relative to WordPress' root folder.
 * Also works for files from registered symlinked plugins.
 *
 * @since  1.6.8
 * @since  1.6.10 Deprecated. Don't laugh.
 * @author Grégory Viguier
 *
 * @param  string $file_path An absolute path.
 * @return string            A relative path. Can return the absolute path in case of a failure.
 */
function imagify_make_file_path_replative( $file_path ) {
	_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'imagify_make_file_path_relative( $file_path )' );

	return imagify_make_file_path_relative( $file_path );
}

if ( is_admin() ) :

	/**
	 * Add some CSS on the whole administration.
	 *
	 * @since 1.0
	 * @since 1.6.10 Deprecated.
	 */
	function _imagify_admin_print_styles() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Assets::get_instance()->enqueue_styles_and_scripts()' );

		Imagify_Assets::get_instance()->enqueue_styles_and_scripts();
	}

	/**
	 * Add Intercom on Options page an Bulk Optimization.
	 *
	 * @since 1.0
	 * @since 1.6.10 Deprecated.
	 */
	function _imagify_admin_print_intercom() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Assets::get_instance()->print_support_script()' );

		Imagify_Assets::get_instance()->print_support_script();
	}

	/**
	 * Add Intercom on Options page an Bulk Optimization
	 *
	 * @since  1.5
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_ngg_admin_print_intercom() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Assets::get_instance()->print_support_script()' );

		$current_screen = get_current_screen();

		if ( isset( $current_screen ) && false !== strpos( $current_screen->base, '_page_imagify-ngg-bulk-optimization' ) ) {
			Imagify_Assets::get_instance()->print_support_script();
		}
	}

	/**
	 * A helper to deprecate old admin notice functions.
	 *
	 * @since  1.6.10
	 * @author Grégory Viguier
	 * @see    Imagify_Notices::notices()
	 *
	 * @param string $function  The function to deprecate.
	 * @param string $notice_id The notice to deprecate.
	 */
	function _imagify_deprecate_old_notice( $function, $notice_id ) {
		_deprecated_function( $function . '()', '1.6.10' );

		$notices  = Imagify_Notices::get_instance();
		$callback = 'display_' . str_replace( '-', '_', $notice_id );
		$data     = method_exists( $notices, $callback ) ? call_user_func( array( $notices, $callback ) ) : false;

		if ( $data ) {
			$this->render_view( str_replace( '_', '-', $notice_id ), $data );
		}
	}

	/**
	 * This warning is displayed when the API key is empty.
	 *
	 * @since  1.0
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_warning_empty_api_key_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'welcome-steps' );
	}

	/**
	 * This warning is displayed when the API key is empty.
	 *
	 * @since  1.0
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_warning_wrong_api_key_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'wrong-api-key' );
	}

	/**
	 * This warning is displayed when some plugins may conflict with Imagify.
	 *
	 * @since  1.0
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_warning_plugins_to_deactivate_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'plugins-to-deactivate' );
	}

	/**
	 * This notice is displayed when external HTTP requests are blocked via the WP_HTTP_BLOCK_EXTERNAL constant.
	 *
	 * @since  1.0
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_http_block_external_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'http-block-external' );
	}

	/**
	 * This warning is displayed when the grid view is active on the library.
	 *
	 * @since  1.0.2
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_warning_grid_view_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'grid-view' );
	}

	/**
	 * This warning is displayed to warn the user that its quota is consumed for the current month.
	 *
	 * @since  1.1.1
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_warning_over_quota_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'over-quota' );
	}

	/**
	 * This warning is displayed if the backup folder is not writable.
	 *
	 * @since  1.6.8
	 * @since  1.6.10 Deprecated.
	 * @author Grégory Viguier
	 */
	function _imagify_warning_backup_folder_not_writable_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'backup-folder-not-writable' );
	}

	/**
	 * Add a message about WP Rocket on the "Bulk Optimization" screen.
	 *
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_rocket_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'rocket' );
	}

	/**
	 * This notice is displayed to rate the plugin after 100 optimization & 7 days after the first installation.
	 *
	 * @since  1.4.2
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_rating_notice() {
		_imagify_deprecate_old_notice( __FUNCTION__, 'rating' );
	}

	/**
	 * Stop the rating cron when the notice is dismissed.
	 *
	 * @since 1.6.10 Deprecated.
	 *
	 * @param string $notice The notice name.
	 */
	function _imagify_clear_scheduled_rating( $notice ) {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::get_instance()->clear_scheduled_rating( $notice )' );

		Imagify_Notices::get_instance()->clear_scheduled_rating( $notice );
	}

	/**
	 * Process a dismissed notice.
	 *
	 * @since  1.0
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _do_admin_post_imagify_dismiss_notice() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::get_instance()->admin_post_dismiss_notice()' );

		Imagify_Notices::get_instance()->admin_post_dismiss_notice();
	}

	/**
	 * Disable a plugin which can be in conflict with Imagify
	 *
	 * @since  1.2
	 * @since  1.6.10 Deprecated.
	 * @author Jonathan Buttigieg
	 */
	function _imagify_deactivate_plugin() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::get_instance()->deactivate_plugin()' );

		Imagify_Notices::get_instance()->deactivate_plugin();
	}

	/**
	 * Renew a dismissed Imagify notice.
	 *
	 * @since 1.0
	 * @since 1.6.10 Deprecated.
	 *
	 * @param  string $notice  A notice ID.
	 * @param  int    $user_id A user ID.
	 * @return void
	 */
	function imagify_renew_notice( $notice, $user_id = 0 ) {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::renew_notice( $notice, $user_id )' );

		Imagify_Notices::renew_notice( $notice, $user_id );
	}

	/**
	 * Dismiss an Imagify notice.
	 *
	 * @since 1.0
	 * @since 1.6.10 Deprecated.
	 *
	 * @param  string $notice  A notice ID.
	 * @param  int    $user_id A user ID.
	 * @return void
	 */
	function imagify_dismiss_notice( $notice, $user_id = 0 ) {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::dismiss_notice( $notice, $user_id )' );

		Imagify_Notices::dismiss_notice( $notice, $user_id );
	}

	/**
	 * Tell if an Imagify notice is dismissed.
	 *
	 * @since  1.6.5
	 * @since  1.6.10 Deprecated.
	 * @author Grégory Viguier
	 *
	 * @param  string $notice  A notice ID.
	 * @param  int    $user_id A user ID.
	 * @return bool
	 */
	function imagify_notice_is_dismissed( $notice, $user_id = 0 ) {
		_deprecated_function( __FUNCTION__ . '()', '1.6.10', 'Imagify_Notices::notice_is_dismissed( $notice, $user_id )' );

		return Imagify_Notices::notice_is_dismissed( $notice, $user_id );
	}

	/**
	 * Process all thumbnails of a specific image with Imagify with the manual method.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_upload_callback()
	 * @deprecated
	 */
	function _do_admin_post_imagify_manual_upload() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_upload_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_upload_callback();
	}

	/**
	 * Process all thumbnails of a specific image with Imagify with a different optimization level.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_override_upload_callback()
	 * @deprecated
	 */
	function _do_admin_post_imagify_manual_override_upload() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_override_upload_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_manual_override_upload_callback();
	}

	/**
	 * Process one or some thumbnails that are not optimized yet.
	 *
	 * @since  1.6.10
	 * @since  1.6.11 Deprecated.
	 * @author Grégory Viguier
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_optimize_missing_sizes_callback()
	 * @deprecated
	 */
	function _do_admin_post_imagify_optimize_missing_sizes() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_optimize_missing_sizes_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_optimize_missing_sizes_callback();
	}

	/**
	 * Process a restoration to the original attachment.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_restore_upload_callback()
	 * @deprecated
	 */
	function _do_admin_post_imagify_restore_upload() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_restore_upload_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_restore_upload_callback();
	}

	/**
	 * Process all thumbnails of a specific image with Imagify with the bulk method.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_bulk_upload_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_bulk_upload() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_bulk_upload_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_bulk_upload_callback();
	}

	/**
	 * Optimize image on picture uploading with async request.
	 *
	 * @since  1.5
	 * @since  1.6.11 Deprecated.
	 * @author Julio Potier
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_upload_new_media_callback()
	 * @deprecated
	 */
	function _do_admin_post_async_optimize_upload_new_media() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_upload_new_media_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_upload_new_media_callback();
	}

	/**
	 * Optimize image on picture editing (resize, crop...) with async request.
	 *
	 * @since  1.4
	 * @since  1.6.11 Deprecated.
	 * @author Julio Potier
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_save_image_editor_file_callback()
	 * @deprecated
	 */
	function _do_admin_post_async_optimize_save_image_editor_file() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_save_image_editor_file_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_async_optimize_save_image_editor_file_callback();
	}

	/**
	 * Get all unoptimized attachment ids.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_get_unoptimized_attachment_ids_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_get_unoptimized_attachment_ids() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_get_unoptimized_attachment_ids_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_get_unoptimized_attachment_ids_callback();
	}

	/**
	 * Check if the backup directory is writable.
	 * This is used to display an error message in the plugin's settings page.
	 *
	 * @since  1.6.8
	 * @since  1.6.11 Deprecated.
	 * @author Grégory Viguier
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_check_backup_dir_is_writable_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_check_backup_dir_is_writable() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_check_backup_dir_is_writable_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_check_backup_dir_is_writable_callback();
	}

	/**
	 * Create a new Imagify account.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_signup_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_signup() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_signup_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_signup_callback();
	}

	/**
	 * Process an API key check validity.
	 *
	 * @since  1.0
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_check_api_key_validity_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_check_api_key_validity() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_check_api_key_validity_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_check_api_key_validity_callback();
	}

	/**
	 * Get admin bar profile output.
	 *
	 * @since  1.2.3
	 * @since  1.6.11 Deprecated.
	 * @author Jonathan Buttigieg
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_get_admin_bar_profile_callback()
	 * @deprecated
	 */
	function _do_wp_ajax_imagify_get_admin_bar_profile() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_get_admin_bar_profile_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_get_admin_bar_profile_callback();
	}

	/**
	 * Get pricings from API for Onetime and Plans at the same time.
	 *
	 * @since  1.6
	 * @since  1.6.11 Deprecated.
	 * @author Geoffrey Crofte
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_get_prices_callback()
	 * @deprecated
	 */
	function _imagify_get_prices_from_api() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_get_prices_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_get_prices_callback();
	}

	/**
	 * Check Coupon code on modal popin.
	 *
	 * @since  1.6
	 * @since  1.6.11 Deprecated.
	 * @author Geoffrey Crofte
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_check_coupon_callback()
	 * @deprecated
	 */
	function _imagify_check_coupon_code() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_check_coupon_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_check_coupon_callback();
	}

	/**
	 * Get current discount promotion to display information on payment modal.
	 *
	 * @since  1.6.3
	 * @since  1.6.11 Deprecated.
	 * @author Geoffrey Crofte
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_get_discount_callback()
	 * @deprecated
	 */
	function _imagify_get_discount() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_get_discount_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_get_discount_callback();
	}

	/**
	 * Get estimated sizes from the WordPress library.
	 *
	 * @since  1.6
	 * @since  1.6.11 Deprecated.
	 * @author Geoffrey Crofte
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_get_images_counts_callback()
	 * @deprecated
	 */
	function _imagify_get_estimated_sizes() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_get_images_counts_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_get_images_counts_callback();
	}

	/**
	 * Estimate sizes and update the options values for them.
	 *
	 * @since  1.6
	 * @since  1.6.11 Deprecated.
	 * @author Remy Perona
	 * @see    Imagify_Admin_Ajax_Post::get_instance()->imagify_update_estimate_sizes_callback()
	 * @deprecated
	 */
	function _imagify_update_estimate_sizes() {
		_deprecated_function( __FUNCTION__ . '()', '1.6.11', 'Imagify_Admin_Ajax_Post::get_instance()->imagify_update_estimate_sizes_callback()' );

		Imagify_Admin_Ajax_Post::get_instance()->imagify_update_estimate_sizes_callback();
	}

endif;
