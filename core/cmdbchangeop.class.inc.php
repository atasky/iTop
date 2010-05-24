<?php
// Copyright (C) 2010 Combodo SARL
//
//   This program is free software; you can redistribute it and/or modify
//   it under the terms of the GNU General Public License as published by
//   the Free Software Foundation; version 3 of the License.
//
//   This program is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU General Public License for more details.
//
//   You should have received a copy of the GNU General Public License
//   along with this program; if not, write to the Free Software
//   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

/**
 * Persistent classes (internal) : cmdbChangeOp and derived
 *
 * @author      Erwan Taloc <erwan.taloc@combodo.com>
 * @author      Romain Quetiez <romain.quetiez@combodo.com>
 * @author      Denis Flaven <denis.flaven@combodo.com>
 * @license     http://www.opensource.org/licenses/gpl-3.0.html LGPL
 */


/**
 * Various atomic change operations, to be tracked 
 *
 * @package     iTopORM
 */

class CMDBChangeOp extends DBObject
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "autoincrement",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop",
			"db_key_field" => "id",
			"db_finalclass_field" => "optype",
		);
		MetaModel::Init_Params($aParams);
		//MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeExternalKey("change", array("allowed_values"=>null, "sql"=>"changeid", "targetclass"=>"CMDBChange", "is_null_allowed"=>false, "on_target_delete"=>DEL_MANUAL, "depends_on"=>array())));
		MetaModel::Init_AddAttribute(new AttributeExternalField("date", array("allowed_values"=>null, "extkey_attcode"=>"change", "target_attcode"=>"date")));
		MetaModel::Init_AddAttribute(new AttributeExternalField("userinfo", array("allowed_values"=>null, "extkey_attcode"=>"change", "target_attcode"=>"userinfo")));
		MetaModel::Init_AddAttribute(new AttributeString("objclass", array("allowed_values"=>null, "sql"=>"objclass", "default_value"=>"", "is_null_allowed"=>false, "depends_on"=>array())));
		MetaModel::Init_AddAttribute(new AttributeString("objkey", array("allowed_values"=>null, "sql"=>"objkey", "default_value"=>"", "is_null_allowed"=>false, "depends_on"=>array())));

		MetaModel::Init_SetZListItems('details', array('change', 'date', 'userinfo')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('change', 'date', 'userinfo')); // Attributes to be displayed for the complete details
	}
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		return '';
	}
}



/**
 * Record the creation of an object  
 *
 * @package     iTopORM
 */
class CMDBChangeOpCreate extends CMDBChangeOp
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_create",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
	}
	
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		return 'Object created';
	}
}


/**
 * Record the deletion of an object 
 *
 * @package     iTopORM
 */
class CMDBChangeOpDelete extends CMDBChangeOp
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_delete",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
	}
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		return 'Object deleted';
	}
}


/**
 * Record the modification of an attribute (abstract)
 *
 * @package     iTopORM
 */
class CMDBChangeOpSetAttribute extends CMDBChangeOp
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_setatt",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("attcode", array("allowed_values"=>null, "sql"=>"attcode", "default_value"=>"", "is_null_allowed"=>false, "depends_on"=>array())));
		
		// Display lists
		MetaModel::Init_SetZListItems('details', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for a list
	}
}

/**
 * Record the modification of a scalar attribute 
 *
 * @package     iTopORM
 */
class CMDBChangeOpSetAttributeScalar extends CMDBChangeOpSetAttribute
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_setatt_scalar",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeString("oldvalue", array("allowed_values"=>null, "sql"=>"oldvalue", "default_value"=>null, "is_null_allowed"=>true, "depends_on"=>array())));
		MetaModel::Init_AddAttribute(new AttributeString("newvalue", array("allowed_values"=>null, "sql"=>"newvalue", "default_value"=>null, "is_null_allowed"=>true, "depends_on"=>array())));
		
		// Display lists
		MetaModel::Init_SetZListItems('details', array('date', 'userinfo', 'attcode', 'oldvalue', 'newvalue')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('date', 'userinfo', 'attcode', 'oldvalue', 'newvalue')); // Attributes to be displayed for a list
	}
	
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		// Temporary, until we change the options of GetDescription() -needs a more global revision
		$bIsHtml = true;
		
		$sResult = '';
		$oTargetObjectClass = $this->Get('objclass');
		$oTargetObjectKey = $this->Get('objkey');
		$oTargetSearch = new DBObjectSearch($oTargetObjectClass);
		$oTargetSearch->AddCondition('id', $oTargetObjectKey);

		$oMonoObjectSet = new DBObjectSet($oTargetSearch);
		if (UserRights::IsActionAllowedOnAttribute($this->Get('objclass'), $this->Get('attcode'), UR_ACTION_READ, $oMonoObjectSet) == UR_ALLOWED_YES)
		{
			$oAttDef = MetaModel::GetAttributeDef($this->Get('objclass'), $this->Get('attcode'));
			$sAttName = $oAttDef->GetLabel();
			$sNewValue = $this->Get('newvalue');
			$sOldValue = $this->Get('oldvalue');
			if ( (($oAttDef->GetType() == 'String') || ($oAttDef->GetType() == 'Text')) &&
				 (strlen($sNewValue) > strlen($sOldValue)) )
			{
				// Check if some text was not appended to the field
				if (substr($sNewValue,0, strlen($sOldValue)) == $sOldValue) // Text added at the end
				{
					$sDelta = substr($sNewValue, strlen($sOldValue));
					$sResult = "$sDelta appended to $sAttName";
				}
				else if (substr($sNewValue, -strlen($sOldValue)) == $sOldValue)   // Text added at the beginning
				{
					$sDelta = substr($sNewValue, 0, strlen($sNewValue) - strlen($sOldValue));
					$sResult = "$sDelta appended to $sAttName";
				}
				else
				{
					$sResult = "$sAttName set to $sNewValue (previous value: $sOldValue)";
				}
			}
			elseif($bIsHtml && $oAttDef->IsExternalKey())
			{
				$sTargetClass = $oAttDef->GetTargetClass();
				$sFrom = MetaModel::GetHyperLink($sTargetClass, $sOldValue);
				$sTo = MetaModel::GetHyperLink($sTargetClass, $sNewValue);
				$sResult = "$sAttName set to $sTo (previous: $sFrom)";
			}
			elseif ($oAttDef instanceOf AttributeBlob)
			{
				$sResult = "#@# Issue... found an attribute for which other type of tracking should be made";
			}
			else
			{
				$sResult = "$sAttName set to $sNewValue (previous value: $sOldValue)";
			}
		}
		return $sResult;
	}
}

/**
 * Record the modification of a blob
 *
 * @package     iTopORM
 */
class CMDBChangeOpSetAttributeBlob extends CMDBChangeOpSetAttribute
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_setatt_data",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeBlob("prevdata", array("depends_on"=>array())));

		// Display lists
		MetaModel::Init_SetZListItems('details', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for a list
	}
	
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		// Temporary, until we change the options of GetDescription() -needs a more global revision
		$bIsHtml = true;
		
		$sResult = '';
		$oTargetObjectClass = $this->Get('objclass');
		$oTargetObjectKey = $this->Get('objkey');
		$oTargetSearch = new DBObjectSearch($oTargetObjectClass);
		$oTargetSearch->AddCondition('id', $oTargetObjectKey);

		$oMonoObjectSet = new DBObjectSet($oTargetSearch);
		if (UserRights::IsActionAllowedOnAttribute($this->Get('objclass'), $this->Get('attcode'), UR_ACTION_READ, $oMonoObjectSet) == UR_ALLOWED_YES)
		{
			$oAttDef = MetaModel::GetAttributeDef($this->Get('objclass'), $this->Get('attcode'));
			$sAttName = $oAttDef->GetLabel();
			$oPrevDoc = $this->Get('prevdata');
			$sDocView = $oPrevDoc->GetAsHtml();
			$sDocView .= "<br/>Open in New Window: ".$oPrevDoc->GetDisplayLink(get_class($this), $this->GetKey(), 'prevdata').", \n";
			$sDocView .= "Download: ".$oPrevDoc->GetDownloadLink(get_class($this), $this->GetKey(), 'prevdata')."\n";

			//$sDocView = $oPrevDoc->GetDisplayInline(get_class($this), $this->GetKey(), 'prevdata');
			$sResult = "$sAttName changed, previous value: $sDocView";
		}
		return $sResult;
	}
}

/**
 * Record the modification of a multiline string (text)
 *
 * @package     iTopORM
 */
class CMDBChangeOpSetAttributeText extends CMDBChangeOpSetAttribute
{
	public static function Init()
	{
		$aParams = array
		(
			"category" => "core/cmdb",
			"key_type" => "",
			"key_label" => "",
			"name_attcode" => "change",
			"state_attcode" => "",
			"reconc_keys" => array(),
			"db_table" => "priv_changeop_setatt_text",
			"db_key_field" => "id",
			"db_finalclass_field" => "",
		);
		MetaModel::Init_Params($aParams);
		MetaModel::Init_InheritAttributes();
		MetaModel::Init_AddAttribute(new AttributeText("prevdata", array("allowed_values"=>null, "sql"=>"prevdata", "default_value"=>"", "is_null_allowed"=>true, "depends_on"=>array())));

		// Display lists
		MetaModel::Init_SetZListItems('details', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for the complete details
		MetaModel::Init_SetZListItems('list', array('date', 'userinfo', 'attcode')); // Attributes to be displayed for a list
	}
	
	/**
	 * Describe (as a text string) the modifications corresponding to this change
	 */	 
	public function GetDescription()
	{
		// Temporary, until we change the options of GetDescription() -needs a more global revision
		$bIsHtml = true;
		
		$sResult = '';
		$oTargetObjectClass = $this->Get('objclass');
		$oTargetObjectKey = $this->Get('objkey');
		$oTargetSearch = new DBObjectSearch($oTargetObjectClass);
		$oTargetSearch->AddCondition('id', $oTargetObjectKey);

		$oMonoObjectSet = new DBObjectSet($oTargetSearch);
		if (UserRights::IsActionAllowedOnAttribute($this->Get('objclass'), $this->Get('attcode'), UR_ACTION_READ, $oMonoObjectSet) == UR_ALLOWED_YES)
		{
			$oAttDef = MetaModel::GetAttributeDef($this->Get('objclass'), $this->Get('attcode'));
			$sAttName = $oAttDef->GetLabel();
			$sTextView = '<div>'.$this->GetAsHtml('prevdata').'</div>';

			//$sDocView = $oPrevDoc->GetDisplayInline(get_class($this), $this->GetKey(), 'prevdata');
			$sResult = "$sAttName changed, previous value: $sTextView";
		}
		return $sResult;
	}
}

?>
