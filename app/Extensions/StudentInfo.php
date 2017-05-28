<?php
	
namespace App\Extensions;

class StudentInfo
{

	
	//获取民族
	public static function getNation($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '汉族'; 
				break;
			case 2 :
				$res .= '壮族';
				break;
			case 3 :
				$res .= '回族';
				break;
				case 4 :
				$res .= '满族';
				break;
				case 5 :
				$res .= '维吾尔族';
				break;
				case 6 :
				$res .= '苗族';
				break;
				case 7 :
				$res .= '彝族';
				break;
				case 8 :
				$res .= '土家族';
				break;
				case 9 :
				$res .= '藏族';
				break;
				case 10 :
				$res .= '蒙古族';
				break;
				case 11 :
				$res .= '侗族';
				break;
				case 12 :
				$res .= '布依族';
				break;
				case 13 :
				$res .= '瑶族';
				break;
				case 14 :
				$res .= '白族';
				break;
				case 15 :
				$res .= '朝鲜族';
				break;
				case 16 :
				$res .= '哈尼族';
				break;
				case 17 :
				$res .= '黎族';
				break;
				case 18 :
				$res .= '哈萨克族';
				break;
				case 19 :
				$res .= '傣族';
				break;
				case 20 :
				$res .= '畲族';
				break;
				case 21 :
				$res .= '傈僳族';
				break;
				case 22 :
				$res .= '东乡族';
				break;
				case 23 :
				$res .= '仡佬族';
				break;
				case 24 :
				$res .= '拉祜族';
				break;
				case 25 :
				$res .= '佤族';
				break;
				case 26 :
				$res .= '水族';
				break;
				case 27 :
				$res .= '纳西族';
				break;
				case 28 :
				$res .= '羌族';
				break;
				case 29 :
				$res .= '土族';
				break;
				case 30 :
				$res .= '仫佬族';
				break;
				case 31 :
				$res .= '锡伯族';
				break;
				case 32 :
				$res .= '柯尔克孜族';
				break;
				case 33 :
				$res .= '景颇族';
				break;
				case 34 :
				$res .= '达斡尔族';
				break;
				case 35 :
				$res .= '撒拉族';
				break;
				case 36 :
				$res .= '布朗族';
				break;
				case 37 :
				$res .= '毛南族';
				break;
				case 38 :
				$res .= '塔吉克族';
				break;
				case 39 :
				$res .= '普米族';
				break;
				case 40 :
				$res .= '阿昌族';
				break;
				case 41 :
				$res .= '怒族';
				break;
				case 42 :
				$res .= '鄂温克族';
				break;
				case 43 :
				$res .= '京族';
				break;
				case 44 :
				$res .= '基诺族';
				break;
				case 45 :
				$res .= '德昂族';
				break;
				case 46 :
				$res .= '保安族';
				break;
				case 47 :
				$res .= '俄罗斯族';
				break;
				case 48 :
				$res .= '裕固族';
				break;
				case 49 :
				$res .= '乌孜别克族';
				break;
				case 50 :
				$res .= '门巴族';
				break;
				case 51 :
				$res .= '鄂伦春族';
				break;
				case 52 :
				$res .= '独龙族';
				break;
				case 53 :
				$res .= '赫哲族';
				break;

				case 54 :
				$res .= '高山族';
				break;
				case 55 :
				$res .= '珞巴族';
				break;
				case 56 :
				$res .= '塔塔尔族';
				break;
				case 57 :
				$res .= '其它';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取性别
	public static function getGender($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '男'; 
				break;
			case 2 :
				$res .= '女';
				break;

			default:
				# code...
				break;
		}
		return $res;
	}
	//获取健康
	public static function getHealth($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '健康'; 
				break;
			case 2 :
				$res .= '良好';
				break;
			case 3 :
				$res .= '有病史';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取政治面貌
	public static function getStatus($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '党员'; 
				break;
			case 2 :
				$res .= '团员';
				break;
			case 3 :
				$res .= '群众';
				break;
			case 4 :
				$res .= '民主党派';
				break;
			case 5 :
				$res .= '其它';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取婚姻信息
	public static function getMarriage($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '已婚'; 
				break;
			case 2 :
				$res .= '未婚';
				break;
			case 3 :
				$res .= '离异';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}

	//获取教育类型
	public static function getEducationType($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '全日制'; 
				break;
			case 2 :
				$res .= '非全日制';
				break;
			case 3 :
				$res .= '其它';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取学位
	public static function getDegree($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '学士'; 
				break;
			case 2 :
				$res .= '学术型硕士';
				break;
			case 3 :
				$res .= '全日制专业硕士';
				break;
			case 4 :
				$res .= '非全日制专业硕士';
				break;
			case 5 :
				$res .= '其它';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取学历
	public static function getQualification($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '博士'; 
				break;
			case 2 :
				$res .= '研究生';
				break;
			case 3 :
				$res .= '本科';
				break;
			case 4 :
				$res .= '大专';
				break;
			case 5 :
				$res .= '中专';
				break;
			case 6 :
				$res .= '其它';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}

	//获取奖励等级
	public static function getLevel($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '国家级'; 
				break;
			case 2 :
				$res .= '省级';
				break;
			case 3 :
				$res .= '校级';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取期望公司性质
	public static function getProperty($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '国有企业'; 
				break;
			case 2 :
				$res .= '股份合作企业';
				break;
			case 3 :
				$res .= '联营企业';
				break;
			case 4 :
				$res .= '有限责任公司'; 
				break;
			case 5 :
				$res .= '股份有限公司';
				break;
			case 6 :
				$res .= '私营企业';
				break;
			case 7 :
				$res .= '中外合资企业'; 
				break;
			case 8 :
				$res .= '外商独资企业';
				break;
			case 9 :
				$res .= '其它企业';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取目前状况
	public static function getState($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= '应届毕业生'; 
				break;
			case 2 :
				$res .= '往届毕业生';
				break;
			default:
				# code...
				break;
		}
		return $res;
	}
	//获取专业技能
	public static function getSkill($id)
	{
		$res = '';
		switch ($id) {
			case 0 :
				$res .= '未填写';
				break;
			case 1 :
				$res .= 'CET-4'; 
				break;
			case 2 :
				$res .= 'CET-6';
				break;
			case 3 :
				$res .= '计算机二级'; 
				break;
			case 4 :
				$res .= '计算机三级';
				break;
			case 5 :
				$res .= '其它'; 
				break;

			default:
				# code...
				break;
		}
		return $res;
	}
}