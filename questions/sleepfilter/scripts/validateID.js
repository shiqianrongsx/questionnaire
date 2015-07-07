var aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"內蒙古",21:"遼寧",22:"吉林",23:"黑龍江",31:"上海",32:"江蘇",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山東",41:"河南",42:"湖北",43:"湖南",44:"廣東",45:"廣西",46:"海南",50:"重慶",51:"四川",52:"貴州" ,53:"雲南",54:"西藏",61:"陝西",62:"甘肅",63:"青海",64:"寧夏",65:"新疆",71:"臺灣",81:"香港",82:"澳門",91:"國外"} ;

function checkCard(sId){  
         
    var iSum=0 
    var info="" 
    var result = new Array() ;
   
   if(sId.length!=15 && sId.length!=18) 
   {
         result[0] = false ;
        result[1] = "身份证号码长度错误";
        return result; 
   }
   
   if(sId.length==15) 
   {//15位身份證驗證
        if (isNaN(sId))
        {
            result[0] = false ;
            result[1] = "身份号码格式错误";
            return result; 
        }        
        if(aCity[parseInt(sId.substr(0,2))]==null)
        {
            result[0] = false ;
            result[1] = "非法地区";
            return result ;
        }
        var sBirthday="19"+sId.substr(6,2)+"-"+Number(sId.substr(8,2))+"-"+Number(sId.substr(10,2)); 
        var d=new Date(sBirthday.replace(/-/g,"/")) ;
        if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate()))
        {
            result[0] = false ;
            result[1] = "非法生日";

            return result ;

        }
   }
   else
   {//18位身份證驗證  
        if(!/^\d{17}(\d|x)$/i.test(sId))
        {
            result[0] = false ;
            result[1] = "非身份证号码";
            return result; 
        }
        sId=sId.replace(/x$/i,"a"); 
        if(aCity[parseInt(sId.substr(0,2))]==null)
        {
            result[0] = false ;
            result[1] = "非法地区";
            return result ;
        }
        var sBirthday=sId.substr(6,4)+"-"+Number(sId.substr(10,2))+"-"+Number(sId.substr(12,2)); 
        var d=new Date(sBirthday.replace(/-/g,"/")) ;
        if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate()))
        {
            result[0] = false ;
            result[1] = "非法生日";

            return result ;

        }
        for(var i = 17;i>=0;i --) iSum += (Math.pow(2,i) % 11) * parseInt(sId.charAt(17 - i),11) ;
        if(iSum%11!=1)
        {
            result[0] = false ;
            result[1] = "非法号码";
            return result ;

        }
    } 
     result[0] = true ;      
     return result ;
}

 function checkResult(w)
{
    var sId = w.value ;
    if( sId != "")
    {
        var result = checkCard(sId);
        
        if( result[0] == false )
        {
            w.focus();
            alert(result[1]);
            return false;
        }
    }    
}

