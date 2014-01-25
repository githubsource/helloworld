<?php
$cl = ucfirst("accountService");
		$daoClass = $cl."Dao";
		BaseDao::includeOnceTarget("app/".$daoClass);

		$dao = new $daoClass($db);
		//$dao->addLimit(10);
		$list = $dao->select();
		try {
			foreach ($list as $r) {
				$dao = new $daoClass($db);

				$desc = $dao->_getDesc();
				foreach ($desc as $k => $inf) {
					if($inf['type'] == 'number') $dao->addColVal($k, $r[$k]);
					else $dao->addColValStr($k, $r[$k]);
				}

				$dao->insert($mysql = true);

			}
		} catch (Exception $e) {
		}