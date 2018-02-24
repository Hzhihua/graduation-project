<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 21:03
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\BadRequestHttpException;
use frontend\models\Article;

class ArticleController extends Controller
{

    private $_id = 0;
    private $_articleData = null;
    private $_articleModel = null;

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->layout = 'main-article';
        return true;
    }

    /**
     * @return string
     */
    public function actionView()
    {
        $data = [
            'toc' => $this->toc(),
            'content' => $this->content(),
            'nav' => $this->nav(),
            'header' => $this->header(),
            'comment' => $this->comment(),
        ];

        return $this->render('index', $data);
    }

    /**
     * 获取文章标题信息
     * @return string
     */
    public function header()
    {
        return $this->renderPartial('_header', [
            'data' => $this->getArticleData(),
        ]);
    }

    /**
     * 获取评论信息
     * @return string
     */
    public function comment()
    {
        return $this->renderPartial('_comment', [
            'model' => $this->getArticleModel(),
        ]);
    }

    /**
     * 文章内容，包括版权信息，分类信息
     * @return string
     */
    public function content()
    {
        $data = [
            'copyright' => $this->copyright(),
            'footer' => $this->footer(),
            'data' => $this->getArticleData(),
        ];

        return $this->renderPartial('_content', $data);
    }

    /**
     * 文章侧边目录栏
     * @return string
     */
    public function toc()
    {
        return $this->renderPartial('_toc', [
            'data' => $this->getArticleData(),
        ]);
    }

    /**
     * 版权信息
     * @return string
     */
    public function copyright()
    {
        return $this->renderPartial('_copyright', [
            'data' => $this->getArticleData(),
        ]);
    }

    /**
     * 文章所属分类信息
     * @return string
     */
    public function footer()
    {
        $data = [
            'share' => $this->share(),
            'data' => $this->getArticleData(),
        ];
        return $this->renderPartial('_footer', $data);
    }

    /**
     * 分享按钮
     * @return string
     */
    public function share()
    {
        $data = [
            'data' => $this->getArticleData(),
        ];
        return $this->renderPartial('_share', $data);
    }

    /**
     * 文章上一篇，下一篇
     * @return string
     */
    public function nav()
    {
        $data = [
            'data' => $this->getArticleData(),
        ];
        return $this->renderPartial('_nav', $data);
    }

    /**
     * @return array
     * @throws BadRequestHttpException
     */
    public function getArticleData()
    {
        if (empty($this->_articleData)) {
            $this->_id = Yii::$app->getRequest()->get('id');

            if (empty($this->_id)) {
                $errorMsg = Yii::t('frontend', 'params `id` is must.');
                Yii::warning($errorMsg, __METHOD__);

                YII_DEBUG ?: $errorMsg = Yii::t('frontend', 'Something error has been happened, please try it again later.');

                throw new BadRequestHttpException($errorMsg);
            }

            $this->_articleData = Article::find()->where(['id' => $this->_id])->with('articleStatus', 'articleAndCategory', 'articleAndTag')->asArray()->one();
        }

        if (empty($this->_articleData)) {
            $errorMsg = Yii::t('frontend', "Could not find any data for article id({id})", ['id' => $this->_id]);

            YII_DEBUG ?: $errorMsg = Yii::t('frontend', 'Something error has been happened, please try it again later.');

            Yii::warning($errorMsg, __METHOD__);
            throw new BadRequestHttpException($errorMsg);
        }

        return $this->_articleData;
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     * @throws BadRequestHttpException
     */
    public function getArticleModel()
    {
        if (empty($this->_articleModel)) {
            $id = Yii::$app->getRequest()->get('id');

            if (empty($id)) {
                $errorMsg = 'params `id` is must.';
                Yii::warning($errorMsg, __METHOD__);

                YII_DEBUG ?: $errorMsg = Yii::t('frontend', 'Something error has been happened, please try it again later.');

                throw new BadRequestHttpException($errorMsg);
            }

            $this->_articleModel = Article::findOne(['id' => $this->_id]);
        }

        if (empty($this->_articleData)) {
            $errorMsg = Yii::t('frontend', "Could not find any data for article id({id})", ['id' => $this->_id]);

            YII_DEBUG ?: $errorMsg = Yii::t('frontend', 'Something error has been happened, please try it again later.');

            Yii::warning($errorMsg, __METHOD__);
            throw new BadRequestHttpException($errorMsg);
        }

        return $this->_articleModel;
    }
}