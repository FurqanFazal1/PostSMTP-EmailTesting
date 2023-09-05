<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace PostSMTPMailTester\Vendor\Google\Service\Gmail;

class ListSendAsResponse extends \PostSMTPMailTester\Vendor\Google\Collection
{
    protected $collection_key = 'sendAs';
    protected $sendAsType = \PostSMTPMailTester\Vendor\Google\Service\Gmail\SendAs::class;
    protected $sendAsDataType = 'array';
    /**
     * @param SendAs[]
     */
    public function setSendAs($sendAs)
    {
        $this->sendAs = $sendAs;
    }
    /**
     * @return SendAs[]
     */
    public function getSendAs()
    {
        return $this->sendAs;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(\PostSMTPMailTester\Vendor\Google\Service\Gmail\ListSendAsResponse::class, 'PostSMTPMailTester\\Vendor\\Google_Service_Gmail_ListSendAsResponse');