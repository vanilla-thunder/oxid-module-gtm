<?php

/**
 * [bla] tag-manager
 * Copyright (C) 2018  bestlife AG
 * info:  oxid@bestlife.ag
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 **/
class oxsession_blatm extends oxsession_blatm_parent
{
	public function start ()
	{
		parent::start();

		// check if blForceSessionStart is set to true in config.inc.php
		if ($this->_allowSessionStart() && !parent::_getCookieSid())
		{
			$cfg = oxRegistry::getConfig();
			$aRefs = [
				'http'   => (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '-',
				'ref'    => current(array_filter([
					$cfg->getRequestParameter('ref'),
					$cfg->getRequestParameter('REF'),
					$cfg->getRequestParameter('utm_content')
				])),
				'subref' => $cfg->getRequestParameter('subref')
			];
			self::setVariable('bla_refs', $aRefs);
		}
	}
}
