<?php
namespace common\tests\models;

use Codeception\Test\Unit;
use common\models\Article;

/**
 * Class ArticleTest
 *
 * run in the terminal:
 * > codecept run unit models/ArticleTest
 * or
 * > codecept run unit models/ArticleTest --debug
 *
 * @property Article $_model test model object
 * @package common\tests\models
 */
class ArticleTest extends Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    /**
     * @var Article
     */
    protected $_model = null;

    /**
     * test data
     * @var array
     */
    protected $_post = [];

    /**
     * 初始化数据
     */
    protected function _before()
    {
        $time = $_SERVER['REQUEST_TIME'];
        $this->_post = [
            'data' => [
                'title' => '这里是文章标题-test',
                'description' => '这是文章描述-test',
                'content' => '这是文章内容-test',
                'is_top' => 1,
                'status' => 1,
                'public_time' => $time,
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ];

//        $this->_model = new Article();
    }

    protected function _after()
    {

    }

    protected function titleField()
    {
        $model = $this->_model;
        $post = $this->_post;
        $last_id = false;

        $model->setScenario('insert');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->true();

        $last_id = false;
        $post['data']['title'] .= '-update';
        $model->setScenario('update');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->true();
    }

    protected function titleEmpty()
    {
        $model = $this->_model;
        $post = $this->_post;
        $last_id = false;

        $post['data']['title'] = '';
        $model->setScenario('insert');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->false();

        $last_id = false;
        $model->setScenario('update');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->false();
    }

    protected function titleTooLong()
    {
        $model = $this->_model;
        $post = $this->_post;
        $last_id = false;

        $post['data']['title'] = '这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test这里是文章标题-test'; // 300
        $model->setScenario('insert');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->false();

        $last_id = false;
        $model->setScenario('update');
        $model->load($post, 'data') && $last_id = $model->save();
        $errors = $model->getFirstErrors();
        expect(array_shift($errors), $last_id)->false();
    }

//    public function testTitleField()
//    {
//        $this->titleField();
//        $this->titleEmpty();
//        $this->titleTooLong();
//    }

    public function testI18N()
    {
        /* @var $model \hzhihua\yii2_articles\models\Article */
        $model = new \hzhihua\yii2_articles\models\Article();
        $this->assertTrue($model->getAttributeLabel('ID'), '序号');
        $this->assertTrue($model->getAttributeLabel('Created At'), '创建时间');
    }


}