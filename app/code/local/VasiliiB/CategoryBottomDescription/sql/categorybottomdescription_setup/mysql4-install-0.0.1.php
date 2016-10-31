<?php

/**
* @author Burlacu Vasilii Alexei
* @e-mail  burlacu.vasilii@yandex.ru
* @skype_id regulatu_
* @github https://github.com/vasilii-b
*
* @copyright Copyright (c) 2016 Burlacu Vasilii Alexei
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache Licence 2.0
*
*
* Copyright 2016 Burlacu Vasilii Alexei
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*    http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*
*
*/

$installer = $this;
$installer->startSetup();

$attribute  = array(
    'type' => 'text',
    'label'=> 'Bottom Description',
    'input' => 'textarea',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'wysiwyg_enabled' => true,
    'visible_on_front' => true,
    'is_html_allowed_on_front' => true,
    'default' => "",
    'group' => "General Information"
);

$installer->addAttribute('catalog_category', 'bottom_description', $attribute);
$installer->endSetup();

/**
* Reindex Catalog Category Data
*/
if(Mage::getStoreConfig('catalog/frontend/flat_catalog_category'))
{
  $reindexer = Mage::getModel('index/indexer')->getProcessByCode('catalog_category_flat');
  $reindexer->reindexAll();
}
