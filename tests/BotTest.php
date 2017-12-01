<?php

/**
 * PHP version 7.1
 *
 * @package AndreyMashukov\TelegramBot
 */

namespace Tests;

use \PHPUnit\Framework\TestCase;
use \Logics\Tests\InternalWebServer;
use \AM\Telegram\Bot;
use \Exception;

/**
 * Tests for telegram bot
 *
 * @author  Andrey Mashukov <a.mashukoff@gmail.com>
 * @version SVN: $Date: 2017-12-01 15:16:55 +0800 (Fri, 01 Dec 2017) $ $Revision: 1 $
 * @link    $HeadURL: svn+ssh://root@192.168.1.143/mnt/ssd/svn/projects/telegrambot/tests/BotTest.php $
 *
 * @runTestsInSeparateProcesses
 */

class BotTest extends TestCase
    {

	use InternalWebServer;

	/**
	 * Should return all bot updates
	 *
	 * @return void
	 */

	public function testShouldReturnAllBotUpdates()
	    {
		define("TELEGRAM_TOKEN", "Token");
		define("TELEGRAM_API_URL", $this->webserverURL());

		$bot     = new Bot();
		$updates = $bot->getUpdates();

		$expected = json_decode(file_get_contents(__DIR__ . "/botToken/getUpdates"), true);
		$this->assertEquals($expected, $updates);
	    } //end testShouldReturnAllBotUpdates()


	/**
	 * Should send message to chat
	 *
	 * @return void
	 */

	public function testShouldSendMessageToChat()
	    {
		define("TELEGRAM_TOKEN", "Token");
		define("TELEGRAM_API_URL", $this->webserverURL());

		$chatid = "379408101";
		$text   = "test";
		$bot    = new Bot();

		$sendresult = $bot->sendMessage($chatid, $text);
		$expected   = json_decode(file_get_contents(__DIR__ . "/botToken/sendMessage"), true);
		$this->assertEquals($expected, $sendresult);
	    } //end  testShouldSendMessageToChat()


    } //end class


?>
