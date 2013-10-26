<?php
/*小黄鸡
*/
    

class QueenChater{

//将一些字符转化成utf8格式 
	function get_utf8_string($content) {  
	 	$encoding = mb_detect_encoding($content, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
        //echo $encoding;
	   	return  mb_convert_encoding($content, 'utf-8', $encoding);
	}
	
	
//小九机器人
    public function xiaojo($keyword){

        //$curlPost=array("chat"=>$keyword);
        $key="chat";
        $curlPost="";
        $header=array('Content-type:application/x-www-form-urlencoded');
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,'http://www.xiaojo.com/bot/chata.php');//抓取指定网页
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        if(!empty($data)){
            return $data;
        }else{
            $ran=rand(1,3);
            switch($ran){
                case 1:
                    return "航姐今天累了，明天再陪你聊天吧。";
                    break;
                case 2:
                    return "女王睡觉喽~~";
                    break;
                case 3:
                    return "嘻嘻~~嘻嘻~~";
                    break;
                
            }
        }
    }
 

//小黄鸡
    public function simsim($tt){
		
		//DATE:2013-10-25
        $key="";
        $url_simsimi="http://sandbox.api.simsimi.com/request.p?key=".$key."&lc=ch&ft=1.0&text=".urlencode($tt);
        
        $message=file_get_contents($url_simsimi);
        $de_msg=json_decode($message,1); 
        $response=$de_msg["response"];
        if(!empty($response)){
            return $response;
        }else{
            return "女王很忙哦 >@<";
        }
        return $response;
        //*/
    }	

    
//双龙戏凤
    public function chatter($keyword){

        //$curlPost=array("chat"=>$keyword);
        $key="chat";
        $curlPost="";
        $ch = curl_init();    //初始化curl
		$header=array('Content-type:application/x-www-form-urlencoded');
        curl_setopt($ch, CURLOPT_URL,'http://www.xiaojo.com/bot/chata.php');    //抓取指定网页
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_HEADER, 0);    //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);    //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);    //运行curl
        curl_close($ch);

        if(!empty($data)){
            return "航姐说：".$data;
        }else{
            return "女王说：".$this->simsim($keyword);
        }
    }   
//替换函数

	public function ChatterReplace($data){
		$regx="小九";
		return str_replace($regx,$key,$data);
	}
	
	
		
}

?>
