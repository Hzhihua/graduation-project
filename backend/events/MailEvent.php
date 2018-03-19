<?php
/**
 * @Author: cnzhihua
 * @Time: 18-1-23 09:58
 * @Github: https://github.com/Hzhihua
 */

namespace backend\events;


use yii\base\Event;

class MailEvent extends Event
{
    /**
     * 发送邮件事件名称
     */
    const EVENT_SEND_EMAIL = 'sendEmail';

    /**
     * 发送给谁
     * @var string
     */
    public $email = '';

    /**
     * 邮件主题
     * @var string
     */
    public $subject = '';

    /**
     * 邮件内容
     * @var string
     */
    public $content = '';
}