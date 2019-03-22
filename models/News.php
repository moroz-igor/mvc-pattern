<?php


class News
{

	/** Returns single news items with specified id
	* @rapam integer &id
	*/

	public static function getNewsItemByID($id)
	{
		$id = intval($id);

		if ($id) {
			//$host = 'localhost';
			//$dbname = 'mvc_site';
			//$user = 'root';
			//$password = '';
			//$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM news WHERE id=' . $id);

			/*$result->setFetchMode(PDO::FETCH_NUM);*/
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}

	}

	/**
	* Returns an array of news items
	*/
	public static function getNewsList() {
		//$host = 'localhost';
		//$dbname = 'mvc_site';
		//$user = 'root';
		//$password = '';
		//$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

		$db = Db::getConnection();
		$newsList = array();

		$result = $db->query('SELECT id, title, date, author_name, short_content, preview, type FROM news ORDER BY id ASC LIMIT 4');

		$i = 0;
		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['author_name'] = $row['author_name'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['preview'] = $row['preview'];
			$newsList[$i]['type'] = $row['type'];
			$i++;
		}

		return $newsList;

}

}
