<?

class MyTwitterWidget extends WP_Widget {
	/** Widget setup **/
	function MyTwitterWidget() {
		parent::WP_Widget(
			false, __( 'My Twitter Widget', 'ted-theme' ),
			array('description' => __( 'Displays a list of tweets from a specified user name', 'ted-theme' )),
			array('width' => '400px')
		);
	}
	/** The back-end form **/
	function form( $instance ) {
		?>
<?php
	$defaults = array(
		'title'    => '',
		'limit'    => 5,
	);
	$values = wp_parse_args( $instance, $defaults );
?>
<p>
  <label for='<?php echo $this->get_field_id( 'title' ); ?>'>
    <?php _e( 'Title:', 'ted-theme' ); ?>
    <input class='widefat' id='<?php echo $this->get_field_id( 'title' ); ?>' name='<?php echo $this->get_field_name( 'title' ); ?>' type='text' value='<?php echo $values['title']; ?>' />
  </label>
</p>
<p>
  <label for='<?php echo $this->get_field_id( 'limit' ); ?>'>
    <?php _e( 'Tweets to show:', 'ted-theme' ); ?>
    <input class='widefat' id='<?php echo $this->get_field_id( 'limit' ); ?>' name='<?php echo $this->get_field_name( 'limit' ); ?>' type='text' value='<?php echo $values['limit']; ?>' />
  </label>
  <label for='<?php echo $this->get_field_id( 'limit' ); ?>'>
    <?php _e( 'Screenname to show:', 'ted-theme' ); ?>
    <input class='widefat' id='<?php echo $this->get_field_id( 'limit' ); ?>' name='<?php echo $this->get_field_name( 'limit' ); ?>' type='text' value='<?php echo $values['name']; ?>' />
  </label>
</p>
<?
	}
	/** Saving form data **/
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
	/** The front-end display **/
	function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . $instance['title'] .  $args['after_title'];
		echo '<ul class="list-unstyled">';
		$tweets = getTweets('tedctr', '3');

			if(is_array($tweets)){

// to use with intents
echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

foreach($tweets as $tweet){

    if($tweet['text']){
        $the_tweet = $tweet['text'];
		echo '<li>';
        /*
        Twitter Developer Display Requirements
        https://dev.twitter.com/terms/display-requirements

        2.b. Tweet Entities within the Tweet text must be properly linked to their appropriate home on Twitter. For example:
          i. User_mentions must link to the mentioned user's profile.
         ii. Hashtags must link to a twitter.com search with the hashtag as the query.
        iii. Links in Tweet text must be displayed using the display_url
             field in the URL entities API response, and link to the original t.co url field.
        */

        // i. User_mentions must link to the mentioned user's profile.
        if(is_array($tweet['entities']['user_mentions'])){
            foreach($tweet['entities']['user_mentions'] as $key => $user_mention){
                $the_tweet = preg_replace(
                    '/@'.$user_mention['screen_name'].'/i',
                    '<a href="http://www.twitter.com/'.$user_mention['screen_name'].'" target="_blank">@'.$user_mention['screen_name'].'</a>',
                    $the_tweet);
            }
        }

        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
        if(is_array($tweet['entities']['hashtags'])){
            foreach($tweet['entities']['hashtags'] as $key => $hashtag){
                $the_tweet = preg_replace(
                    '/#'.$hashtag['text'].'/i',
                    '<a href="https://twitter.com/search?q=%23'.$hashtag['text'].'&src=hash" target="_blank">#'.$hashtag['text'].'</a>',
                    $the_tweet);
            }
        }

        // iii. Links in Tweet text must be displayed using the display_url
        //      field in the URL entities API response, and link to the original t.co url field.
        if(is_array($tweet['entities']['urls'])){
            foreach($tweet['entities']['urls'] as $key => $link){
                $the_tweet = preg_replace(
                    '`'.$link['url'].'`',
                    '<a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a>',
                    $the_tweet);
            }
        }

        echo $the_tweet;


        // 3. Tweet Actions
        //    Reply, Retweet, and Favorite action icons must always be visible for the user to interact with the Tweet. These actions must be implemented using Web Intents or with the authenticated Twitter API.
        //    No other social or 3rd party actions similar to Follow, Reply, Retweet and Favorite may be attached to a Tweet.
        // get the sprite or images from twitter's developers resource and update your stylesheet
        echo '
        <ul class="list-inline twitter_intents">
            <li><a class="reply" href="https://twitter.com/intent/tweet?in_reply_to='.$tweet['id_str'].'"><i class="fa fa-reply"></i></a></li>
            <li><a class="retweet" href="https://twitter.com/intent/retweet?tweet_id='.$tweet['id_str'].'"><i class="fa fa-retweet"></i></a></li>
            <li><a class="favorite" href="https://twitter.com/intent/favorite?tweet_id='.$tweet['id_str'].'"><i class="fa fa-star"></i></a></li>
        </ul>';


        // 4. Tweet Timestamp
        //    The Tweet timestamp must always be visible and include the time and date. e.g., “3:00 PM - 31 May 12”.
        // 5. Tweet Permalink
        //    The Tweet timestamp must always be linked to the Tweet permalink.
        echo '
        <p class="timestamp">
            <a href="https://twitter.com/tedctr/status/'.$tweet['id_str'].'" target="_blank">
                '.date('g:i a, F d',strtotime($tweet['created_at']. '- 7 hours')).'
            </a>
        </p>';// -8 GMT for Pacific Standard Time
		echo '</li>';
    
        
    }
}
}echo '
        <a href="http://twitter.com/tedctr" target="_blank" class="btn btn-default btn-block">TEDCenter Twitter feed <i class="fa fa-arrow-right"></i></a>';
		
		echo $args['after_widget'];
	}
	
}
register_widget('MyTwitterWidget');
?>
