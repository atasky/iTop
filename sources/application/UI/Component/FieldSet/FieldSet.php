<?php
/**
 * @copyright   Copyright (C) 2010-2020 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace Combodo\iTop\Application\UI\Component\FieldSet;


use Combodo\iTop\Application\UI\Layout\UIContentBlock;

/**
 * Class FieldSet
 *
 * @package Combodo\iTop\Application\UI\Component\FieldSet
 */
class FieldSet extends UIContentBlock
{
	// Overloaded constants
	public const BLOCK_CODE = 'ibo-fieldset';
	public const HTML_TEMPLATE_REL_PATH = 'components/fieldset/layout';

	/** @var string */
	protected $sLegend;

	/**
	 * FieldSet constructor.
	 *
	 * @param string $sLegend
	 * @param string|null $sId
	 */
	public function __construct(string $sLegend, ?string $sId = null)
	{
		parent::__construct($sId);
		$this->sLegend = $sLegend;
	}

	/**
	 * @return string
	 */
	public function GetLegend(): string
	{
		return $this->sLegend;
	}
	
}