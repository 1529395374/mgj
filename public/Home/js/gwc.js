$(function(){
	//添加购物车
	//定义变量
	var jia = $('.n_btn_1');
	var jian = $('.n_btn_2');
	//库存
	var gnum = $('.ignum');
	//购买数量
	var num = $('.n_ipt');	

	jia.click(function(){
		if (parseInt(gnum.text()) == 0)  {
				gnum.text(0)
				num.val(parseInt(num.val()))
		} else{
			num.val(parseInt(num.val())+1)
		gnum.text(parseInt(gnum.text())-1)
		}
	});
	jian.click(function(){
		if (parseInt(num.val()) == 1)  {
				return false;
		} else{
			num.val(parseInt(num.val())-1)
			gnum.text(parseInt(gnum.text())+1)
		}
	});


			
		// 点击购物 弹出购物车
		$('#gwc').click(function(){
			if (parseInt(num.val()) == 0) {
				layer.msg('请选择商品数量', {icon: 5, time: 2000});
				return false;
			}

            if(!$('.color1').hasClass('checked') && !$('.color2').hasClass('checked') && !$('.color3').hasClass('checked')){
				layer.msg('请选择商品颜色', {icon: 5, time: 2000});  
				return false;          
				 }

			if(!$('.size1').hasClass('checked') && !$('.size2').hasClass('checked') && !$('.size3').hasClass('checked')){
				layer.msg('请选择尺寸大小', {icon: 5, time: 2000});      
				return false;      
				 }
			if($('.username').length <= 0){
				layer.msg('请先登录', {icon: 5, time: 2000});    
				return false;  
			}
				 //发送ajax判断是否添加成功
				 $.ajaxSetup({
        			headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        		}
				});	
				var id = $('.goodsid').val()
				// console.log(id)
				$.ajax({
					url:'/home/car',
					data:{'id':id,'num':num.val()},
					type:'POST',
					dataType: 'json',
					success:function(msg){
						if (msg.status == 1) {
							//弹出购物车信息
							 $('#MyDiv1').css('display','block');          
							 $('#fade1').css({'display':'block'});          
						 	//购买数量
						 	var icar = $('.icar');
						 	icar.text(num.val());
						 	//单价
						 	var money = parseInt($('.money').text());
						 	console.log(money);
						 	//总价
						 	var imoney = $('.imoney');
						 	var a = imoney.text(num.val()*money);
						 	
						} else {
							layer.msg(msg.msg, {icon: 5, time: 1000});
							return false;
						}
					},
					async:true
				});
		});


});