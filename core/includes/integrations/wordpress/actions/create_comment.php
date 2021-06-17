<?php
if ( ! class_exists( 'WP_Webhooks_Integrations_wordpress_Actions_create_comment' ) ) :

	/**
	 * Load the create_comment action
	 *
	 * @since 4.2.0
	 * @author Ironikus <info@ironikus.com>
	 */
	class WP_Webhooks_Integrations_wordpress_Actions_create_comment {

        public function is_active(){

            //Backwards compatibility for the "Comments" integration
            if( class_exists( 'WP_Webhooks_Comments' ) ){
                return false;
            }

            return true;
        }

        public function get_details(){

            $translation_ident = "action-create_comment-description";

			$parameter = array(
				'comment_agent' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The HTTP user agent of the comment_author when the comment was submitted. Default empty.', $translation_ident ) ),
				'comment_approved' => array( 'short_description' => WPWHPRO()->helpers->translate( '(int|string) Whether the comment has been approved. Default 1.', $translation_ident ) ),
				'comment_author' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The name of the author of the comment. Default empty.', $translation_ident ) ),
				'comment_author_email' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The email address of the $comment_author. Default empty.', $translation_ident ) ),
				'comment_author_IP' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The IP address of the $comment_author. Default empty.', $translation_ident ) ),
				'comment_author_url' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The URL address of the $comment_author. Default empty.', $translation_ident ) ),
				'comment_content' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The content of the comment. Default empty.', $translation_ident ) ),
				'comment_date' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The date the comment was submitted. To set the date manually, comment_date_gmt must also be specified. Default is the current time.', $translation_ident ) ),
				'comment_date_gmt' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) The date the comment was submitted in the GMT timezone. Default is comment_date in the site\'s GMT timezone.', $translation_ident ) ),
				'comment_karma' => array( 'short_description' => WPWHPRO()->helpers->translate( '(int) The karma of the comment. Default 0.', $translation_ident ) ),
				'comment_parent' => array( 'short_description' => WPWHPRO()->helpers->translate( '(int) ID of this comment\'s parent, if any. Default 0.', $translation_ident ) ),
				'comment_post_ID' => array( 'short_description' => WPWHPRO()->helpers->translate( '(int) ID of the post that relates to the comment, if any. Default 0.', $translation_ident ) ),
				'comment_type' => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) Comment type. Default empty.', $translation_ident ) ),
				'comment_meta' => array( 'short_description' => WPWHPRO()->helpers->translate( '(array) Optional. Array of key/value pairs to be stored in commentmeta for the new comment. More info within the description.', $translation_ident ) ),
				'user_id' => array( 'short_description' => WPWHPRO()->helpers->translate( '(int) ID of the user who submitted the comment. Default 0.', $translation_ident ) ),
			);

			$returns = array(
				'success'        => array( 'short_description' => WPWHPRO()->helpers->translate( '(Bool) True if the action was successful, false if not. E.g. array( \'success\' => true )', $translation_ident ) ),
				'data'           => array( 'short_description' => WPWHPRO()->helpers->translate( '(array) The data related to the comment, as well as the user and the post object, incl. the meta values.', $translation_ident ) ),
				'msg'            => array( 'short_description' => WPWHPRO()->helpers->translate( '(string) A message with more information about the current request. E.g. array( \'msg\' => "This action was successful." )', $translation_ident ) ),
			);

			$returns_code = array (
				'success' => true,
				'msg' => 'Comment created successfully.',
				'data' => 
				array (
				  'comment_id' => 4,
				  'comment_data' => 
				  array (
					'comment_ID' => '4',
					'comment_post_ID' => '0',
					'comment_author' => '',
					'comment_author_email' => '',
					'comment_author_url' => '',
					'comment_author_IP' => '',
					'comment_date' => '2021-06-01 19:23:53',
					'comment_date_gmt' => '2021-06-01 19:23:53',
					'comment_content' => 'Demo comment',
					'comment_karma' => '0',
					'comment_approved' => '0',
					'comment_agent' => '',
					'comment_type' => 'comment',
					'comment_parent' => '0',
					'user_id' => '0',
				  ),
				  'comment_meta' => 
				  array (
				  ),
				  'current_post_id' => 0,
				  'current_post_data' => 
				  array (
				  ),
				  'current_post_data_meta' => 
				  array (
				  ),
				  'user_id' => 0,
				  'user_data' => 
				  array (
				  ),
				  'user_data_meta' => 
				  array (
				  ),
				),
			);

			ob_start();
			?>
                <p><?php echo WPWHPRO()->helpers->translate( "This hook enables you to create a comment with all of its settings.", "action-create_comment-content" ); ?></p>
				<p><?php echo WPWHPRO()->helpers->translate( 'You can also add custom post meta. Here is an example on how this would look like using the simple structure (We also support json):', $translation_ident ); ?></p>
				<br><br>
				<pre>meta_key_1,meta_value_1;my_second_key,add_my_value</pre>
				<br><br>
				<?php echo WPWHPRO()->helpers->translate( 'To separate the meta from the value, you can use a comma ",". To separate multiple meta settings from each other, easily separate them with a semicolon ";" (It is not necessary to set a semicolon at the end of the last one)', $translation_ident ); ?>
				<br><br>
				<?php echo WPWHPRO()->helpers->translate( 'This is an example on how you can include the post meta using JSON.', $translation_ident ); ?>
				<br>
				<pre>
{
  "meta_key_1": "This is my meta value 1",
  "another_meta_key": "This is my second meta key!"
}
				</pre>
				<p><?php echo WPWHPRO()->helpers->translate( "For security reasons, we don't send the password within the webhook response. To send the password as well, you can check out the following filter: wpwhpro/webhooks/action_create_comment_restrict_user_values", "action-create_comment-content" ); ?></p>
            <?php
			$description = ob_get_clean();

            return array(
                'action'            => 'create_comment',
                'name'              => WPWHPRO()->helpers->translate( 'Create a comment', $translation_ident ),
                'parameter'         => $parameter,
                'returns'           => $returns,
                'returns_code'      => $returns_code,
                'short_description' => WPWHPRO()->helpers->translate( 'Create a comment using webhooks.', $translation_ident ),
                'description'       => $description,
                'integration'       => 'wordpress',
                'premium' 			=> false,
            );

        }

        public function execute( $return_data, $response_body ){

			$plugin_helpers = WPWHPRO()->integrations->get_helper( 'wordpress', 'comment_helpers' );
            $textdomain_context = 'create_comment';
			$return_args = array(
				'success' => false,
                'msg' => '',
                'data' => array(
					'comment_id'   => 0,
					'comment_data'  => array(),
					'comment_meta'  => array(),
					'current_post_id' => 0,
					'current_post_data' => array(),
					'current_post_data_meta' => array(),
					'user_id' => 0,
					'user_data' => array(),
					'user_data_meta' => array(),
				),
			);

			$comment_agent        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_agent' );
			$comment_approved        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_approved' );
			$comment_author        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_author' );
			$comment_author_email        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_author_email' );
			$comment_author_IP        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_author_IP' );
			$comment_author_url        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_author_url' );
			$comment_content        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_content' );
			$comment_date        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_date' );
			$comment_date_gmt        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_date_gmt' );
			$comment_karma        = intval( WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_karma' ) );
			$comment_parent        = intval( WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_parent' ) );
			$comment_post_ID        = intval( WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_post_ID' ) );
			$comment_type        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_type' );
			$comment_meta        = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_meta' );
			$user_id        = intval( WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'user_id' ));
			$comment_ID        = intval( WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'comment_ID' ));

			$do_action      = WPWHPRO()->helpers->validate_request_value( $response_body['content'], 'do_action' );

			$commentdata = array();

			if( empty( $comment_agent ) ){
				$commentdata['comment_agent'] = '';
			} else {
				$commentdata['comment_agent'] = $comment_agent;
			}

			if( $comment_approved == 0 ){
				$commentdata['comment_approved'] = 0;
			} else {
				$commentdata['comment_approved'] = $comment_approved;
			}

			if( empty( $comment_author ) ){
				$commentdata['comment_author'] = '';
			} else {
				$commentdata['comment_author'] = $comment_author;
			}

			if( empty( $comment_author_email ) ){
				$commentdata['comment_author_email'] = '';
			} else {
				if( is_email( $comment_author_email ) ){
					$commentdata['comment_author_email'] = $comment_author_email;
				}
			}

			if( empty( $comment_author_IP ) ){
				$commentdata['comment_author_IP'] = '';
			} else {
				$commentdata['comment_author_IP'] = $comment_author_IP;
			}

			if( empty( $comment_author_url ) ){
				$commentdata['comment_author_url'] = '';
			} else {
				$commentdata['comment_author_url'] = $comment_author_url;
			}

			if( empty( $comment_date ) ){
				$commentdata['comment_date'] = current_time( 'mysql' );
			} else {
				$commentdata['comment_date'] = $comment_date;
			}

			if( empty( $comment_date_gmt ) ){
				if( ! empty( $commentdata['comment_date'] ) ){
					$commentdata['comment_date_gmt'] = $commentdata['comment_date'];
				} else {
					$commentdata['comment_date_gmt'] = current_time( 'mysql' );
				}
			} else {
				$commentdata['comment_date_gmt'] = $comment_date_gmt;
			}

			if( empty( $comment_content ) ){
				$commentdata['comment_content'] = '';
			} else {
				$commentdata['comment_content'] = $comment_content;
			}

			if( empty( $comment_karma ) ){
				$commentdata['comment_karma'] = 0;
			} else {
				$commentdata['comment_karma'] = $comment_karma;
			}

			if( empty( $comment_parent ) ){
				$commentdata['comment_parent'] = 0;
			} else {
				$commentdata['comment_parent'] = $comment_parent;
			}

			if( empty( $comment_post_ID ) ){
				$commentdata['comment_post_ID'] = 0;
			} else {
				$commentdata['comment_post_ID'] = $comment_post_ID;
			}

			if( empty( $comment_type ) ){
				$commentdata['comment_type'] = '';
			} else {
				$commentdata['comment_type'] = $comment_type;
			}

			if( empty( $user_id ) ){
				$commentdata['user_id'] = 0;
			} else {
				$commentdata['user_id'] = $user_id;
			}

			$commentdata = apply_filters( 'wpwhpro/webhooks/trigger_create_comment_commentdata', $commentdata );

			add_action( 'wp_insert_comment', array( $plugin_helpers, 'create_update_comment_add_meta' ), 8, 1 );
			$comment_id = wp_insert_comment( $commentdata );
			remove_action( 'wp_insert_comment', array( $plugin_helpers, 'create_update_comment_add_meta' ), 8 );
 
			if ( ! empty( $comment_id ) ) {
				$return_args['success'] = true;
				$return_args['data']['comment_id'] = $comment_id;
				$return_args['data']['comment_data'] = get_comment( $comment_id );
				$return_args['data']['comment_meta'] = get_comment_meta( $comment_id );

				$return_args['msg'] = WPWHPRO()->helpers->translate( "Comment created successfully.", 'action-' . $textdomain_context );

				$comment = get_comment( $comment_id );

				if( isset( $comment->comment_post_ID ) ){
					$post_id = $comment->comment_post_ID;
					if( ! empty( $post_id ) ){
						$return_args['data']['current_post_id'] = $post_id;
						$return_args['data']['current_post_data'] = get_post( $post_id );
						$return_args['data']['current_post_data_meta'] = get_post_meta( $post_id );
					}
				}
	
				if( isset( $comment->comment_author_email ) && is_email( $comment->comment_author_email ) ){
					$user = get_user_by( 'email', sanitize_email( $comment->comment_author_email ) );
					if( ! empty( $user ) && ! is_wp_error( $user ) ){
						$return_args['data']['user_id'] = $user->data->ID;
						$return_args['data']['user_data'] = $user;
						$return_args['data']['user_data_meta'] = get_user_meta( $user->data->ID );
	
						//Restrict password
						$restrict = apply_filters( 'wpwhpro/webhooks/action_create_comment_restrict_user_values', array( 'user_pass' ) );
						
						if( is_array( $restrict ) && ! empty( $restrict ) ){
	
							foreach( $restrict as $data_key ){
								if( ! empty( $return_args['data']['user_data'] ) && isset( $return_args['data']['user_data']->data ) && isset( $return_args['data']['user_data']->data->{$data_key} )){
									unset( $return_args['data']['user_data']->data->{$data_key} );
								}
							}
							
						}
	
					}
				}

			} else {
				$return_args['msg'] = WPWHPRO()->helpers->translate( "Error while the comment.", 'action-' . $textdomain_context );
			}

			if( ! empty( $do_action ) ){
				do_action( $do_action, $comment_id, $commentdata, $return_args );
			}

			return $return_args;
    
        }

    }

endif; // End if class_exists check.