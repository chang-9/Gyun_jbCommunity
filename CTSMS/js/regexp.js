
/*전화번호 정규식*/
$(function(){

	$(".phone-number-check").on('keydown', function(e){
  	// 숫자만 입력받기
    var trans_num = $(this).val().replace(/-/gi,'');
		var k = e.keyCode;
				
		if(trans_num.length >= 11 && ((k >= 48 && k <=126) || (k >= 12592 && k <= 12687 || k==32 || k==229 || (k>=45032 && k<=55203)) ))
		{
			e.preventDefault();
		}
  }).on('blur', function(){
  if($(this).val() == '') return;
				
        var trans_num = $(this).val().replace(/-/gi,'');
        if(trans_num != null && trans_num != '')
        {
            if(trans_num.length==11 || trans_num.length==10) 
            {   
                var regExp_ctn = /^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})([0-9]{3,4})([0-9]{4})$/;
                if(regExp_ctn.test(trans_num))
                {
                    trans_num = trans_num.replace(/^(01[016789]{1}|02|0[3-9]{1}[0-9]{1})-?([0-9]{3,4})-?([0-9]{4})$/, "$1-$2-$3");                  
                    $(this).val(trans_num);
                }
                else
                {
                    alert("check your phone number.");
                    $(this).val("");
                    $(this).focus();
                }
            }
            else 
            {
                alert("check your phone number.");
                $(this).val("");
                $(this).focus();
            }
        }
  });  
});
