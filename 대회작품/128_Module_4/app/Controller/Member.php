<?php

	namespace app\Controller;
	use app\Core\DB;

	class Member
	{	
		//로그인 기능
		public function login()
		{
			extract($_POST);
			$member = DB::fetch("SELECT * FROM member WHERE m_id = ? AND m_pw = ?",[$id, $pw]);

			if(!$member){
				alert("없는 아이디 또는 비밀번호 입니다.");
				back();
			}

			$_SESSION['member'] = $member;
			alert("로그인 성공");
			location("/");
		}
		//로그아웃 기능
		public function logout()
		{
			unset($_SESSION['member']);
			alert("로그아웃 되었습니다.");
			location("/");
		}
		//경로 json 파일 수정
		public function saveJson()
		{	
			extract($_POST);
			$text = '
					{
	"서울" : {
		"서울" : 0,
		"경기" : '.$서울1.',
		"강원" : '.$서울2.',
		"충북" : '.$서울3.',
		"충남" : '.$서울4.',
		"대전" : '.$서울5.',
		"경남" : '.$서울6.',
		"경북" : '.$서울7.',
		"전남" : '.$서울8.',
		"전북" : '.$서울9.'
	},
	"경기" : {
		"서울" : '.$경기1.',
		"경기" : 0,
		"강원" : '.$경기2.',
		"충북" : '.$경기3.',
		"충남" : '.$경기4.',
		"대전" : '.$경기5.',
		"경남" : '.$경기6.',
		"경북" : '.$경기7.',
		"전남" : '.$경기8.',
		"전북" : '.$경기9.'
	},
	"강원" : {
		"서울" : '.$강원1.',
		"경기" : '.$강원2.',
		"강원" : 0,
		"충북" : '.$강원3.',
		"충남" : '.$강원4.',
		"대전" : '.$강원5.',
		"경남" : '.$강원6.',
		"경북" : '.$강원7.',
		"전남" : '.$강원8.',
		"전북" : '.$강원9.'
	},
	"충북" : {
		"서울" : '.$충북1.',
		"경기" : '.$충북2.',
		"강원" : '.$충북3.',
		"충북" : 0,
		"충남" : '.$충북4.',
		"대전" : '.$충북5.',
		"경남" : '.$충북6.',
		"경북" : '.$충북7.',
		"전남" : '.$충북8.',
		"전북" : '.$충북9.'
	},
	"충남" : {
		"서울" : '.$충남1.',
		"경기" : '.$충남2.',
		"강원" : '.$충남3.',
		"충북" : '.$충남4.',
		"충남" : 0,
		"대전" : '.$충남5.',
		"경남" : '.$충남6.',
		"경북" : '.$충남7.',
		"전남" : '.$충남8.',
		"전북" : '.$충남9.'
	},
	"대전" : {
		"서울" : '.$대전1.',
		"경기" : '.$대전2.',
		"강원" : '.$대전3.',
		"충북" : '.$대전4.',
		"충남" : '.$대전5.',
		"대전" : 0,
		"경남" : '.$대전6.',
		"경북" : '.$대전7.',
		"전남" : '.$대전8.',
		"전북" : '.$대전9.'
	},
	"경남" : {
		"서울" : '.$경남1.',
		"경기" : '.$경남2.',
		"강원" : '.$경남3.',
		"충북" : '.$경남4.',
		"충남" : '.$경남5.',
		"대전" : '.$경남6.',
		"경남" : 0,
		"경북" : '.$경남7.',
		"전남" : '.$경남8.',
		"전북" : '.$경남9.'
	},
	"경북" : {
		"서울" : '.$경북1.',
		"경기" : '.$경북2.',
		"강원" : '.$경북3.',
		"충북" : '.$경북4.',
		"충남" : '.$경북5.',
		"대전" : '.$경북6.',
		"경남" : '.$경북7.',
		"경북" : 0,
		"전남" : '.$경북8.',
		"전북" : '.$경북9.'
	},
	"전남" : {
		"서울" : '.$전남1.',
		"경기" : '.$전남2.',
		"강원" : '.$전남3.',
		"충북" : '.$전남4.',
		"충남" : '.$전남5.',
		"대전" : '.$전남6.',
		"경남" : '.$전남7.',
		"경북" : '.$전남8.',
		"전남" : 0,
		"전북" : '.$전남9.'
	},
	"전북" : {
		"서울" : '.$전북1.',
		"경기" : '.$전북2.',
		"강원" : '.$전북3.',
		"충북" : '.$전북4.',
		"충남" : '.$전북5.',
		"대전" : '.$전북6.',
		"경남" : '.$전북7.',
		"경북" : '.$전북8.',
		"전남" : '.$전북9.',
		"전북" : 0
	}
}
			';
			file_put_contents(_PUBLIC."/distance.json",$text);
			alert("저장되었습니다.");
			location("/adminpos");
		}
	}