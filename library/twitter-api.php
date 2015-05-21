<?php
class MyCustomizer {
	public static function register ( $wp_customize ) {

		/** Sections **/
		$wp_customize->add_section( 'twitter_api' , array(
			'title'    => __( 'Twitter API Details', 'ted-theme' ),
			'priority' => 10,
		));

		/** Settings **/
		$wp_customize->add_setting( 'twitter_consumer_key' );
		$wp_customize->add_setting( 'twitter_consumer_secret' );
		$wp_customize->add_setting( 'twitter_access_token' );
		$wp_customize->add_setting( 'twitter_access_token_secret' );

		/** Controls **/
		$wp_customize->add_control(
			'twitter_consumer_key',
			 array(
				'label' => __( 'Consumer Key', 'ted-theme' ),
			 	'section' => 'twitter_api',
				'priority' => 10,
			 )
		);
		$wp_customize->add_control(
			'twitter_consumer_secret',
			 array(
				'label' => __( 'Consumer Secret', 'ted-theme' ),
			 	'section' => 'twitter_api',
				'priority' => 20,
			 )
		);
		$wp_customize->add_control(
			'twitter_access_token',
			 array(
				'label' => __( 'Access Token', 'ted-theme' ),
			 	'section' => 'twitter_api',
				'priority' => 30,
			 )
		);
		$wp_customize->add_control(
			'twitter_access_token_secret',
			 array(
				'label' => __( 'Access Token Secret', 'ted-theme' ),
			 	'section' => 'twitter_api',
				'priority' => 40,
			 )
		);
   }
}
add_action( 'customize_register' , array( 'MyCustomizer' , 'register' ) );
?>