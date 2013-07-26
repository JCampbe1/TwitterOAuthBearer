<?php

require_once( "class.TwitterOAuthBearer.php" );

$twitter = new TwitterOAuthBearer( "[consumer_key]", "[consumer_secret]" );
if ( $twitter->authenticate( ) )
{
	$tweets = array( );
	$tweets["@campbelljustin"] = $twitter->request( "statuses/user_timeline", array( "count" => "5", "screen_name" => "campbelljustin" ) );
	$tweets["#cdnpoli"] = $twitter->request( "search/tweets", array( "count" => "5", "q" => "#cdnpoli", "result_type" => "popular" ) );
	$tweets["CityofOttawa"] = $twitter->request( "search/tweets", array( "count" => "5", "q" => "City of Ottawa", "result_type" => "popular" ) );
	
	echo "<pre>";
	foreach( $tweets as $key => $tweet )
	{
		echo $key.PHP_EOL."####".PHP_EOL;
		print_r( $tweet );
		echo PHP_EOL.PHP_EOL;
	}
}
else
	echo "Error!";

?>