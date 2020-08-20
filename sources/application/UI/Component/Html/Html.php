<?php
/**
 * Copyright (C) 2013-2020 Combodo SARL
 *
 * This file is part of iTop.
 *
 * iTop is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * iTop is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 */

namespace Combodo\iTop\Application\UI\Component\Html\Html;



use Combodo\iTop\Application\UI\UIBlock;

/**
 * Class Html
 *
 * @author Stephen Abello <stephen.abello@combodo.com>
 * @package Combodo\iTop\Application\UI\Component\Html\Html
 * @since 2.8.0
 */
class Html extends UIBlock
{
	// Overloaded constants
	const BLOCK_CODE = 'ibo-html';
	const HTML_TEMPLATE_REL_PATH = 'components/html/layout';
	const JS_TEMPLATE_REL_PATH = 'components/html/layout';

	/** @var string $sHtml */
	protected $sHtml;

	/**
	 * Html constructor.
	 *
	 * @param string $sHtml
	 */
	public function __construct($sHtml = '')
	{
		$this->sHtml = $sHtml;
		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function GetHtml()
	{
		return $this->sHtml;
	}

	/**
	 * @param string $sHtml
	 * @return $this
	 */
	public function SetHtml($sHtml)
	{
		$this->sHtml = $sHtml;
		return $this;
	}
}