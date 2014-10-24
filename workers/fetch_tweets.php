<?php
/**
 * Created by IntelliJ IDEA.
 * User: sopitz
 * Date: 24/10/14
 * Time: 22:06
 */

require_once('lib/Pirehose/Phirehose.php');

class FetchTweetsWorker extends Phirehose {
    public function enqueueStatus($status) {
        file_put_contents('tweets.txt', $status, FILE_APPEND | LOCK_EX);
    }
}

$fetchTweetsWorker = new FetchTweetsWorker('filterapi', 'twitterbot', Phirehose::METHOD_FILTER);
$fetchTweetsWorker->setTrack(array('#GOOG', '#SPY', '#GLD', '#DIA', '#QQQ', '#AAPL', '#MSFT', '#PG', '#KFT', '#AA', '$GOOG', '$SPY', '$GLD', '$DIA', '$QQQ', '$AAPL', '$MSFT', '$PG', '$KFT', '$AA'));
$fetchTweetsWorker->consume();
