<?php

/**
 * PHP version 7.1
 *
 * @package AndreyMashukov\TelegramBot
 */

namespace AM\Telegram;

use \Logics\Foundation\HTTP\HTTPclient;

/**
 * Telegram bot
 *
 * @author  Andrey Mashukov <a.mashukoff@gmail.com>
 * @version SVN: $Date: 2017-12-01 15:16:55 +0800 (Fri, 01 Dec 2017) $ $Revision: 1 $
 * @link    $HeadURL: svn+ssh://root@192.168.1.143/mnt/ssd/svn/projects/telegrambot/src/Bot.php $
 */

class Bot
    {

	/**
	 * Bot token
	 *
	 * @var string
	 */
	private $_token;

	/**
	 * Prepare bot to work
	 *
	 * @return void
	 */

	public function __construct()
	    {
		if (defined("TELEGRAM_TOKEN") === true)
		    {
			$this->_token = TELEGRAM_TOKEN;
		    }
		else
		    {
			exit();
		    }

	    } //end __construct()


	/**
	 * Execute query
	 *
	 * @param string $method Method name
	 * @param array  $params Request params
	 */

	private function _exec(string $method, array $params = []):array
	    {
		$http   = new HTTPclient(TELEGRAM_API_URL . "/bot" . $this->_token . "/" . $method, $params);
		$result = json_decode($http->post(), true);

		return $result;
	    } //end _exec()


	/**
	 * Get bot updates
	 *
	 * @return array Result of query
	 */

	public function getUpdates()
	    {
		return $this->_exec("getUpdates");
	    }


	/**
	 * Send message to chat
	 *
	 * @param string $chatid Telegram chat id
	 * @param string $text   Text of message
	 *
	 * @return array Result of send
	 */

	public function sendMessage(string $chatid, string $text)
	    {
		return $this->_exec("sendMessage", [
		    "chat_id" => $chatid,
		    "text"    => $text,
		]);
	    } //end sendMessage()


    } //end class


?>
