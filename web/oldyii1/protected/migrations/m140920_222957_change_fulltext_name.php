<?php

class m140920_222957_change_fulltext_name extends CDbMigration
{
	public function safeUp()
	{
		$this->dropColumn('sl_blog_post', 'fullText');
		$this->addColumn('sl_blog_post', 'fullArticle', 'TEXT NOT NULL');
	}

	public function safeDown()
	{
		$this->dropColumn('sl_blog_post', 'fullArticle');
		$this->addColumn('sl_blog_post', 'fullText', 'TEXT NOT NULL');
	}
}