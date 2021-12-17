<?php

namespace App\Models;

use MercadoPago\Preference;

class CustomPreference extends Preference
{
    public function getId()
    {
        return $this->id;
    }

    public function getAutoReturn() : string
    {
        return $this->auto_return;
    }

    public function setAutoReturn(string $autoReturn): void
    {
        $this->auto_return = $autoReturn;
    }

    public function getBackUrls() : array
    {
        return $this->back_urls;
    }

    public function setBackUrls(array $backUrls): void
    {
        $this->back_urls = $backUrls;
    }

    public function getNotificationUrl() : string
    {
        return $this->notification_url;
    }

    public function setNotificationUrl(string $notificationUrl): void
    {
        $this->notification_url = $notificationUrl;
    }

    public function getExternalReference() : string
    {
        return $this->external_reference;
    }

    public function setExternalReference(string $externalReference): void
    {
        $this->external_reference = $externalReference;
    }

    public function getItems() : array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function getStatementDescriptor() : string
    {
        return $this->statement_descriptor;
    }

    public function setStatementDescriptor(string $statementDescriptor): void
    {
        $this->statement_descriptor = $statementDescriptor;
    }

}
