<?php

use hzhihua\dump\Migration;

/**
 * Class m180319_095215_1_tableData_article
 * @property \yii\db\Transaction $_transaction
 * @Author Hzhihua <cnzhihua@gmail.com>
 */
class m180319_095215_1_tableData_article extends Migration
{

	/**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%article}}', 
            ['id', 'title', 'description', 'content', 'preview_content', 'is_top', 'created_by', 'status_id', 'public_time', 'created_at', 'updated_at'], 
            [
                ['24', 'php', '```php
class Person
{
	public static function show()
	{
		return 1;
	}
}
```', '# 这里是文章标
```php
class Person
{
	public static function show()
	{
		return 1;
	}
}
```', '&lt;h1 id=&quot;h1-u8FD9u91CCu662Fu6587u7AE0u6807&quot;&gt;&lt;a name=&quot;这里是文章标&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;这里是文章标&lt;/h1&gt;&lt;pre&gt;&lt;code class=&quot;lang-php&quot;&gt;class Person
{
    public static function show()
    {
        return 1;
    }
}
&lt;/code&gt;&lt;/pre&gt;
', '1', '1', '3', '1539548583', '1518486620', '1519443020'],
                ['25', 'PHP', '# PHP代码
```php
class Person
{
	public static function show()
	{
		// do some here
		return $this;
	}
}
```', '# PHP代码
```php
class Person
{
	public static function show()
	{
		// do some here
		return $this;
	}
}
```', '&lt;h1 id=&quot;h1-php-&quot;&gt;&lt;a name=&quot;PHP代码&quot; class=&quot;reference-link&quot;&gt;&lt;/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;/span&gt;PHP代码&lt;/h1&gt;&lt;pre&gt;&lt;code class=&quot;lang-php&quot;&gt;class Person
{
    public static function show()
    {
        // do some here
        return $this;
    }
}
&lt;/code&gt;&lt;/pre&gt;
', '0', '1', '2', '1511021061', '1519021105', '1519216547'],
                ['26', 'ckeditor', 'US President Donald Trump is &quot;supportive&quot; of efforts to improve background checks on gun o', '&lt;h1&gt;US President Donald Trump is &amp;quot;supportive&amp;quot; of efforts to improve background checks on gun ownership, the White House says.&lt;/h1&gt;

&lt;h2&gt;He has spoken to Republican Senator John Cornyn about a bipartisan bill he helped introduce, a statement read.&lt;/h2&gt;

&lt;h3&gt;The 2017 bill sought to improve federal compliance with checks that are processed before someone can buy a gun.&lt;/h3&gt;

&lt;h4&gt;It comes after authorities said the suspect in last week&amp;#39;s school shooting in Florida had bought his gun legally.&lt;/h4&gt;

&lt;h5&gt;&amp;quot;While discussions are ongoing and revisions are being considered, the president is supportive of efforts to improve the federal background check system,&amp;quot; White House press secretary Sarah Sanders said on Monday.&lt;/h5&gt;

&lt;h6&gt;The National Instant Criminal Background Check System (NICS) currently relies on state and federal officials to report any criminal convictions and mental health issues that should legally stop someone buying a gun.&lt;/h6&gt;

&lt;p&gt;Its failings were put in the spotlight last year after&amp;nbsp;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-41895695&quot;&gt;the US Air Force admitted it had failed to flag a gunman&amp;#39;s domestic violence conviction&lt;/a&gt;&amp;nbsp;before he shot dead 26 people at a church in Sutherland Springs, Texas.&lt;/p&gt;

&lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43105699&quot;&gt;US students say &amp;#39;Never Again&amp;#39; after attack&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43079587&quot;&gt;Why the NRA wields so much power&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;

&lt;p&gt;After that shooting, the bipartisan bill was introduced by Mr Cornyn and Democratic Senator and gun-control advocate Chris Murphy.&lt;/p&gt;

&lt;p&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-41478293&quot;&gt;Mr Trump&amp;#39;s view on gun control has changed over time,&lt;/a&gt;&amp;nbsp;but he ran as an anti-gun control candidate in the 2016 election.&lt;/p&gt;

&lt;p&gt;Last year the President told a National Rifle Association convention that he would &amp;quot;never, ever infringe&amp;quot; on the constitutional right to keep and bear arms.&lt;/p&gt;

&lt;p&gt;He has previously blamed the FBI and the shooter&amp;#39;s mental health for Florida&amp;#39;s school attack but had yet to comment on&amp;nbsp;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43105701&quot;&gt;fresh demands for gun control coming from surviving Florida students&lt;/a&gt;.&lt;/p&gt;

&lt;p&gt;Nikolas Cruz, 19, had been investigated by the authorities for posting disturbing content online, according to reports.&lt;/p&gt;
', '&lt;h1&gt;US President Donald Trump is &amp;quot;supportive&amp;quot; of efforts to improve background checks on gun ownership, the White House says.&lt;/h1&gt;

&lt;h2&gt;He has spoken to Republican Senator John Cornyn about a bipartisan bill he helped introduce, a statement read.&lt;/h2&gt;

&lt;h3&gt;The 2017 bill sought to improve federal compliance with checks that are processed before someone can buy a gun.&lt;/h3&gt;

&lt;h4&gt;It comes after authorities said the suspect in last week&amp;#39;s school shooting in Florida had bought his gun legally.&lt;/h4&gt;

&lt;h5&gt;&amp;quot;While discussions are ongoing and revisions are being considered, the president is supportive of efforts to improve the federal background check system,&amp;quot; White House press secretary Sarah Sanders said on Monday.&lt;/h5&gt;

&lt;h6&gt;The National Instant Criminal Background Check System (NICS) currently relies on state and federal officials to report any criminal convictions and mental health issues that should legally stop someone buying a gun.&lt;/h6&gt;

&lt;p&gt;Its failings were put in the spotlight last year after&amp;nbsp;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-41895695&quot;&gt;the US Air Force admitted it had failed to flag a gunman&amp;#39;s domestic violence conviction&lt;/a&gt;&amp;nbsp;before he shot dead 26 people at a church in Sutherland Springs, Texas.&lt;/p&gt;

&lt;ul&gt;
	&lt;li&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43105699&quot;&gt;US students say &amp;#39;Never Again&amp;#39; after attack&lt;/a&gt;&lt;/li&gt;
	&lt;li&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43079587&quot;&gt;Why the NRA wields so much power&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;

&lt;p&gt;After that shooting, the bipartisan bill was introduced by Mr Cornyn and Democratic Senator and gun-control advocate Chris Murphy.&lt;/p&gt;

&lt;p&gt;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-41478293&quot;&gt;Mr Trump&amp;#39;s view on gun control has changed over time,&lt;/a&gt;&amp;nbsp;but he ran as an anti-gun control candidate in the 2016 election.&lt;/p&gt;

&lt;p&gt;Last year the President told a National Rifle Association convention that he would &amp;quot;never, ever infringe&amp;quot; on the constitutional right to keep and bear arms.&lt;/p&gt;

&lt;p&gt;He has previously blamed the FBI and the shooter&amp;#39;s mental health for Florida&amp;#39;s school attack but had yet to comment on&amp;nbsp;&lt;a href=&quot;http://www.bbc.co.uk/news/world-us-canada-43105701&quot;&gt;fresh demands for gun control coming from surviving Florida students&lt;/a&gt;.&lt;/p&gt;

&lt;p&gt;Nikolas Cruz, 19, had been investigated by the authorities for posting disturbing content online, according to reports.&lt;/p&gt;
', '0', '1', '2', '1519057150', '1519057172', '1519452274'],
                ['27', '123', 'Essential things to think about before starting a blog


​

It takes several ingredients to cre', '&lt;h2&gt;Essential things to think about before starting a blog&lt;/h2&gt;

&lt;div aria-label=&quot;A picture of wooden spoons with spices and herbs in them. 图像 小部件&quot; contenteditable=&quot;false&quot; role=&quot;region&quot; style=&quot;float:right&quot; tabindex=&quot;-1&quot;&gt;
&lt;figure class=&quot;image&quot; data-widget=&quot;image&quot;&gt;&lt;span&gt;&lt;img alt=&quot;A picture of wooden spoons with spices and herbs in them.&quot; src=&quot;/assets/images/bg/spoons.jpg&quot; style=&quot;width:450px&quot; /&gt;&lt;span title=&quot;点击并拖拽以改变尺寸&quot;&gt;​&lt;/span&gt;&lt;/span&gt;

&lt;figcaption contenteditable=&quot;true&quot;&gt;It takes several ingredients to create a delicious blog.&lt;/figcaption&gt;
&lt;/figure&gt;
&lt;span style=&quot;background:url(&amp;quot;https://ckeditor.com/assets/libs/ckeditor4/4.8.0/plugins/widget/images/handle.png&amp;quot;) rgba(220, 220, 220, 0.5); display:block; left:25px; top:10px&quot;&gt;&lt;img role=&quot;presentation&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==&quot; style=&quot;height:15px; width:15px&quot; title=&quot;点击并拖拽以移动&quot; /&gt;&lt;/span&gt;&lt;/div&gt;

&lt;p&gt;It has been exactly 3 years since I wrote my first blog series entitled &amp;ldquo;Flavorful Tuscany&amp;rdquo;, but starting it was definitely not easy. Back then, I didn&amp;rsquo;t know much about blogging, let alone think that one day it could become &lt;strong&gt;my full-time job&lt;/strong&gt;. Even though I had many recipes and food-related stories to tell, it never crossed my mind that I could be sharing them with the whole world&lt;/p&gt;

&lt;p&gt;I am now a &lt;strong&gt;full-time blogger&lt;/strong&gt; and the curator of the &lt;a href=&quot;https://ckeditor.com/ckeditor-4/#&quot;&gt;Simply delicious newsletter&lt;/a&gt;, sharing stories about traveling and cooking, as well as tips on how to run a successful blog.&lt;/p&gt;

&lt;p&gt;If you are tempted by the idea of creating your own blog, please think about the following:&lt;/p&gt;

&lt;ul&gt;
	&lt;li&gt;Your story (what do you want to tell your audience)&lt;/li&gt;
	&lt;li&gt;Your audience (who do you write for)&lt;/li&gt;
	&lt;li&gt;Your blog name and design&lt;/li&gt;
&lt;/ul&gt;

&lt;p&gt;After you get your head around these 3 essentials, all you have to do is grab your keyboard and the rest will follow.&lt;/p&gt;
', '&lt;h2&gt;Essential things to think about before starting a blog&lt;/h2&gt;

&lt;div aria-label=&quot;A picture of wooden spoons with spices and herbs in them. 图像 小部件&quot; contenteditable=&quot;false&quot; role=&quot;region&quot; style=&quot;float:right&quot; tabindex=&quot;-1&quot;&gt;
&lt;figure class=&quot;image&quot; data-widget=&quot;image&quot;&gt;&lt;span&gt;&lt;img alt=&quot;A picture of wooden spoons with spices and herbs in them.&quot; src=&quot;/assets/images/bg/spoons.jpg&quot; style=&quot;width:450px&quot; /&gt;&lt;span title=&quot;点击并拖拽以改变尺寸&quot;&gt;​&lt;/span&gt;&lt;/span&gt;

&lt;figcaption contenteditable=&quot;true&quot;&gt;It takes several ingredients to create a delicious blog.&lt;/figcaption&gt;
&lt;/figure&gt;
&lt;span style=&quot;background:url(&amp;quot;https://ckeditor.com/assets/libs/ckeditor4/4.8.0/plugins/widget/images/handle.png&amp;quot;) rgba(220, 220, 220, 0.5); display:block; left:25px; top:10px&quot;&gt;&lt;img role=&quot;presentation&quot; src=&quot;data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==&quot; style=&quot;height:15px; width:15px&quot; title=&quot;点击并拖拽以移动&quot; /&gt;&lt;/span&gt;&lt;/div&gt;

&lt;p&gt;It has been exactly 3 years since I wrote my first blog series entitled &amp;ldquo;Flavorful Tuscany&amp;rdquo;, but starting it was definitely not easy. Back then, I didn&amp;rsquo;t know much about blogging, let alone think that one day it could become &lt;strong&gt;my full-time job&lt;/strong&gt;. Even though I had many recipes and food-related stories to tell, it never crossed my mind that I could be sharing them with the whole world&lt;/p&gt;

&lt;p&gt;I am now a &lt;strong&gt;full-time blogger&lt;/strong&gt; and the curator of the &lt;a href=&quot;https://ckeditor.com/ckeditor-4/#&quot;&gt;Simply delicious newsletter&lt;/a&gt;, sharing stories about traveling and cooking, as well as tips on how to run a successful blog.&lt;/p&gt;

&lt;p&gt;If you are tempted by the idea of creating your own blog, please think about the following:&lt;/p&gt;

&lt;ul&gt;
	&lt;li&gt;Your story (what do you want to tell your audience)&lt;/li&gt;
	&lt;li&gt;Your audience (who do you write for)&lt;/li&gt;
	&lt;li&gt;Your blog name and design&lt;/li&gt;
&lt;/ul&gt;

&lt;p&gt;After you get your head around these 3 essentials, all you have to do is grab your keyboard and the rest will follow.&lt;/p&gt;
', '0', '1', '2', '1519103245', '1519103287', '1519103287'],
                ['28', 'test', '123412341341', '123412341341', '&lt;p&gt;123412341341&lt;/p&gt;
', '0', '1', '2', '1510187350', '1519187370', '1519640470'],
                ['30', '123', '123', '123', '&lt;p&gt;123&lt;/p&gt;
', '0', '1', '2', '1519136886', '1519196949', '1519200127'],
                ['31', 'su', 'su', 'su', '&lt;p&gt;su&lt;/p&gt;
', '0', '1', '2', '1519201192', '1519201206', '1519201710'],
            ]
        );
        $this->_transaction->commit();

    }

	/**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
