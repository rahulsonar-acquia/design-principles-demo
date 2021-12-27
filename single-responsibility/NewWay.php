<?php

class Customers
{
    public function __construct($id) {
        $this->id = $id;
    }
    public function getCustomerId() {

    }

    public function getName() {

    }

    public function getEmail() {

    }

    public function getPhoneNumber() {

    }
}

Interface Notification {

    /**
     * @param $customer
     * @param $subject
     * @param $message
     * @return mixed
     */
    public function send($customer, $subject, $message);

    public function  parseTemplate($template);
}

class NotificationFactory {
    public static function get($type) {
        if($type=='email') {
            $obj = new EmailNotifications();
        }
        return $obj;
    }
}

class EmailNotifications
{

    public $customer;


    public function send($customer, $subject, $message) {
        $message = $this->parseTemplate($message);
        @mail($customer->getEmail(), $subject, $message);
    }

    public function parseTemplate($customer, $template) {
        return str_trplace("{customer_name}",$customer->getName(), $template);
    }
}

$customer = new Customers(1);

$notification =  NotificationFactory::get('email');

$notification->send($customer, "Test Subject", "Hello {customer_name}<br /> This is a test notification");