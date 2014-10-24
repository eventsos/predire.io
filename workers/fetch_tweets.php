<?php
/**
 * Created by IntelliJ IDEA.
 * User: sopitz
 * Date: 24/10/14
 * Time: 22:06
 */

require_once('libs/Pirehose/lib/Phirehose.php');
require_once('libs/Pirehose/lib/OauthPhirehose.php');

define("TWITTER_CONSUMER_KEY", "niBlreyN8veWB4ikPvrwR5lAp");
define("TWITTER_CONSUMER_SECRET", "ifwuH9DjNHu9Yi3yYQDCludVT7AzbR3PhDDKBPgaQkwHFOCVG2");


// The OAuth data for the twitter account
define("OAUTH_TOKEN", "2842831673-Ss69IHpFJTB3n34PV1irlGRqkQ34ybXuDTa6JPT");
define("OAUTH_SECRET", "stIK6q4fTDXqZIZAAkatCJ6dtzuaWlCytxLfCWxbKkEjg");
date_default_timezone_set('Europe/Berlin');
class FetchTweetsWorker extends OauthPhirehose {
    public function enqueueStatus($status) {
        $today = date('Ymd');
        file_put_contents('../data/'.$today.'_tweets.txt', $status, FILE_APPEND | LOCK_EX);
    }
}

$fetchTweetsWorker = new FetchTweetsWorker(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
$fetchTweetsWorker->setTrack(array('#GOOG', '#SPY', '#GLD', '#DIA', '#QQQ', '#AAPL', '#MSFT', '#PG', '#KFT', '#AA', '$GOOG', '$SPY', '$GLD', '$DIA', '$QQQ', '$AAPL', '$MSFT', '$PG', '$KFT', '$AA'));
$fetchTweetsWorker->consume();
