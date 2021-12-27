<?php

class Customers
{
    public function getCustomerId() {

    }

    public function getName() {

    }

    public function getEmail() {

    }

    public function sendNotification() {

        $notification_template = "Hello ". $this->getName()."<br /> This is a test notification";

        @mail($this->getEmail(), "Notification subject", $notification_template);
    }
}