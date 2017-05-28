<?php
	
namespace App\Extensions;

class CompanyInfo
{
	//获取公司规模
	public static function getScale($id)
	{
		$res = '';
		switch ($id) 
		{
			case 0:
				$res .= '未说明';
				break;
			case 1:
				$res .= '50人以下';
				break;
			case 2:
				$res .= '50~200人';
				break;
			case 3:
				$res .= '200~500人';
				break;
			case 4:
				$res .= '500~2000人';
				break;
			case 5:
				$res .= '2000~5000人';
				break;
			case 6:
				$res .= '5000人以上';
				break;
			
			default:
				# code...
				break;
		}
		return $res;
	}

	//获取公司类型
	public static function getCompanyProperty($id)
	{
		$res = '';
		switch ($id) 
		{
			case 0:
				$res .= '未说明';
				break;
			case 1:
				$res .= '国有企业';
				break;
			case 2:
				$res .= '民营企业';
				break;
			case 3:
				$res .= '政府机关';
				break;
			case 4:
				$res .= '事业单位';
				break;
			case 5:
				$res .= '上市公司';
				break;
			case 6:
				$res .= '股份制企业';
				break;
			case 7:
				$res .= '中外合资';
				break;
			case 8:
				$res .= '外伤独资/代表处';
				break;			
			case 9:
				$res .= '非盈利组织';
				break;	
			case 10:
				$res .= '部队';
				break;	
			case 11:
				$res .= '其它';
				break;				
			default:
				# code...
				break;
		}
		return $res;
	}


	public static function getAuth($id)
	{
		$res = '';
		switch ($id) {
			case 0: 
				$res .= '未认证';
				break;
			case 1: 
				$res .= '已认证';
				break;			
			default:
				# code...
				break;
		}
		return $res;
	}
	public static function getIndustry($id)
	{
		$res = '';
		switch ($id) {
			case 0: 
				$res .= '农林牧渔业';
				break;
			case 1: 
				$res .= '采矿业';
				break;
			case 2: 
				$res .= '制造业';
				break;
			case 3: 
				$res .= '能源及水产和供应业';
				break;
			case 4: 
				$res .= '采矿业';
				break;
			case 5: 
				$res .= '建筑业';
				break;
			case 6: 
				$res .= '批发和零售业';
				break;
			case 7: 
				$res .= '交通运输/仓储/邮政业';
				break;
			case 8: 
				$res .= '住宿和餐饮业';
				break;
			case 9: 
				$res .= '软件和信息技术服务业';
				break;
			case 10: 
				$res .= '金融业';
				break;
			case 11: 
				$res .= '房地产业';
				break;
			case 12: 
				$res .= '租赁和商务服务业';
				break;
			case 13: 
				$res .= '科学研究和技术服务业';
				break;
			case 14: 
				$res .= '水利/环境和公共设施管理业';
				break;
			case 15: 
				$res .= '居民服务/修理和其他服务业';
				break;
			case 16: 
				$res .= '教育业';
				break;
			case 17: 
				$res .= '卫生和社会工作业';
				break;
			case 18: 
				$res .= '文化/体育和娱乐业';
				break;
			case 19: 
				$res .= '公共管理和社会保障业';
				break;
			case 20: 
				$res .= '国际组织';
				break;
			case 21: 
				$res .= '军队';
				break;
			case 22: 
				$res .= '土木工程';
				break;
			case 1: 
				$res .= '其他';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}

	public static function getPositionType($id)
	{
		$res = '';
		switch ($id) {
			case 0: 
				$res .= '全职';
				break;
			case 1: 
				$res .= '兼职';
				break;
			case 2:
				$res .= '实习';
				break;	
			default:
				# code...
				break;
		}
		return $res;
	}
}
