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

class VasiliiB_CategoryBottomDescription_Model_Observer
{

	/**
	* Reindex Catalog Category Data
	*/
	public function reindexFlatCategory(Varien_Event_Observer $observer)
	{
		$reindexer = Mage::getModel('index/indexer')->getProcessByCode('catalog_category_flat');

		if(
			Mage::getStoreConfig('catalog/frontend/flat_catalog_category')
			&&
			$reindexer->getStatus() == Mage_Index_Model_Process::STATUS_REQUIRE_REINDEX
		)
		{
		  $reindexer->reindexAll();
		}
	}
}
