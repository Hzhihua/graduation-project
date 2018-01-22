<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-21 21:03
 * @Github: https://github.com/Hzhihua
 */

namespace frontend\controllers;


use yii\web\Controller;

class ArticleController extends Controller
{

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
    public function actionIndex()
    {
        $data = [
            'toc' => $this->toc(),
            'content' => $this->content(),
            'nav' => $this->nav(),
        ];

        return $this->render('index', $data);
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
        ];

        return $this->renderPartial('content', $data);
    }

    /**
     * 文章侧边目录栏
     * @return string
     */
    public function toc()
    {
        return $this->renderPartial('toc');
    }

    /**
     * 版权信息
     * @return string
     */
    public function copyright()
    {
        return $this->renderPartial('copyright');
    }

    /**
     * 文章所属分类信息
     * @return string
     */
    public function footer()
    {
        $share = $this->share();
        return $this->renderPartial('footer', ['share' => $share]);
    }

    /**
     * 分享按钮
     * @return string
     */
    public function share()
    {
        return $this->renderPartial('share');
    }

    /**
     * 文章上一篇，下一篇
     * @return string
     */
    public function nav()
    {
        return $this->renderPartial('nav');
    }
}