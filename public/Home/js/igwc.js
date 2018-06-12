 $(function(){

  //购物车 
 // 总计
      var totalmoney = $('.ifr').find('b');
  // 减号 
  $('.car_btn_1').click(function(){
        //数量
          var num = $(this).next();//2
        //商品id
          var gid = $(this).next().next().next().val();
        // 商品单价
          var dj = $(this).next().next().next().next().next().val();//40
        // 商品小计
          var xj = $(this).parent().parent().next().find('span');

           if (num.val() == 1) {
            num.val() = 1;
      } else{
         num.val(num.val()-1); //1
      }
      //变化后的数量
      var inum = num.val();  //1
       // 计算小计
      var newxj  = parseInt(dj)*parseInt(inum);
      //重新赋值if
      xj.text(newxj);
      //总计
      if($(this).parent().parent().prev().prev().find('input').prop('checked')) {
        // alert(1)
          totalmoney.text(parseInt(totalmoney.text()) - parseInt(dj))
      }
      //设置ajax保护
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
      //发送ajax
      $.ajax({
        url:'/home/car/changenum',
        data:{'id':gid,'num':inum},
        type:'POST',
        dataType:'json',
        success:function(msg){
           if (msg.status == 0) {
              layer.msg(msg.msg, {icon: 5, time: 1000});
           }
        },
        async: false,
      });
      
  });
  //加号
  
      $('.car_btn_2').click(function(){
    //数量
      var num = $(this).prev();
    //商品id
      var gid = $(this).next().val();
    //商品库存
      var gnum =$(this).next().next().val();
    // 商品单价
      var dj = $(this).next().next().next().val();//40
    // 商品小计
      var xj = $(this).parent().parent().next().find('span');
      if (num.val() == gnum) {
        num.val() = gnum;
      } else{
        num.val(parseInt(num.val())+1);
      }
      //变化后的数量
      var inum = num.val();
      // 计算小计
      var newxj  = parseInt(dj)*parseInt(inum);
      //重新赋值if
     xj.text(newxj);
      //总计
      if($(this).parent().parent().prev().prev().find('input').prop('checked')) {
        // alert(1)
          totalmoney.text(parseInt(totalmoney.text()) + parseInt(dj))
      }
      //设置ajax保护
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
      //发送ajax
      $.ajax({
        url:'/home/car/changenum',
        data:{'id':gid,'num':inum},
        type:'POST',
        dataType:'json',
        success:function(msg){
           if (msg.status == 0) {
              layer.msg(msg.msg, {icon: 5, time: 1000});
           }
        },
        async: false,
      });
      
  });

    //全选全不选事件
    $('.car_checkeds').click(function(){  
      //判断  
      if($(this).is(':checked')){ 
          //全选
          $('.car_checkeds').attr('checked',true); 
          //清空原来总计
          totalmoney.text('0.00');
          $('.car_checked').each(function(){  
              $(this).prop("checked",true); 
              // 更换结账图片
              var img = $('.gobuy');
              img.attr('src','images/buy2.gif');
              //单条商品小计
              var ixj = $(this).parent().next().next().next().find('span').text();
              //每个商品遍历叠加
              totalmoney.text(parseInt(totalmoney.text()) + parseInt(ixj));
          });  
      }else{ 
        //全不选 
        $('.car_checked').each(function(){  
                $(this).removeAttr("checked",false); 
                //清空总价 
                 totalmoney.text('0.00')
            }); 
                // 更换结账图片
                var img = $('.gobuy');
                img.attr('src','images/buy3.jpg'); 
        }  
    });  


        
    //统计被选中的商品
    // 单个选择框
    
    $('.car_checked').click(function(){
        //选中状态
        if($(this).prop('checked')) {
            //获取小计
            var xj = $(this).parent().next().next().next().find('span').text();
            //每选中一条 总价加一条小计
            totalmoney.text(parseInt(totalmoney.text()) + parseInt(xj));
            // 更换结账图片
              var img = $('.gobuy');
              img.attr('src','images/buy2.gif'); 
        } else {
            // 取消状态
            var xj = $(this).parent().next().next().next().find('span').text();
            // 总计减去该条小计
            totalmoney.text(parseInt(totalmoney.text()) - parseInt(xj));
             if (totalmoney.text() == 0.00) {
                // 更换结账图片
                   var img = $('.gobuy');
                   img.attr('src','images/buy3.jpg');
             }
           
        }

    });

    //单条删除商品
    
   $('.car_delete').click(function(){
      //设置ajax保护
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
      //发送ajax
      var id = $(this).parent().prev().prev().find('.igid').val();
      var tr = $(this).parent().parent();
      // alert(id)
      $.ajax({
        url:'/home/car/'+id,
        type:'DELETE',
        dataType:'json',
        success:function(msg){
          if (msg.status == 1) {
            layer.msg(msg.msg, {icon: 6, time: 1000});
            tr.remove();
            totalmoney.text('0.00');
            $('.car_checkeds').attr('checked',false);
            $('.car_checked').attr('checked',false);
            var img = $('.gobuy');
            img.attr('src','images/buy3.jpg');
          } else {
            layer.msg(msg.msg, {icon: 5, time: 1000});
          }
        },
        async:true,
      });
    });

      
      //删除选中指定商品
      $('.deleteall').click(function(){
        //获取被选中的商品id
       var select = $('.car_checked:checked');
       //定义空数组存所有被选中的id
       var gid  = new Array();
       var tr = new Array();
          select.each(function(){
            // 遍历 压入商品id
            gid.push($(this).parents().next().next().find('.igid').val());
            // 遍历获取所需删除的tr
            tr.push($(this).parent().parent()); 
          });
       
         //设置ajax保护
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          // 发送ajax
          $.ajax({
              url:'/home/car/deleteall',
              data:{'id':gid},
              type:'POST',
              dataType:'json',
              success: function(msg){
                if (msg.status == 1) {
                layer.msg(msg.msg, {icon: 6, time: 1000});
                  //移除tr
                  $.each(tr,function(){
                  $(this).remove();
                  });
                  //清空价格
                  totalmoney.text('0.00');
              } else {
                layer.msg(msg.msg, {icon: 5, time: 1000});
              }  
              },
              async:true,
          })
        });


       // 确认订单
       $('.gobuy').click(function(){
       
           //获取被选中的商品id
           var select = $('.car_checked:checked');
           //定义空数组存所有被选中的id
           var id  = new Array();
           var num = new Array();
           select.each(function(){
           // 遍历 压入商品id
           id.push($(this).parents().next().next().find('.igid').val());
           num.push($(this).parents().next().next().find('.car_ipt').val());
          });
           //转换成字符串
          var gid =  id.join(',');
          var gnum = num.join(',');
          var total = totalmoney.text();
          if (total == 0.00) {
            return false
          }
         $('.gobuy').parent().attr('href','/home/car/rebuy?gid='+gid+'&gnum='+gnum+'&total='+total);
        });

       // 生成订单
           $('.fbuy').click(function(){
           //获取被选中的商品id
           var good = $('.order_list');
           // console.log(good)
           // return false;
           //定义空数组存所有被选中的id
           var id  = new Array();
           var num = new Array();
           good.each(function(){
           // 遍历 压入商品id
           id.push($(this).find('input').val());
           num.push($(this).find('b').text());
          });
           //转换成字符串
          var gid =  id.join(',');
          var gnum = num.join(',');
          var total = $('.itotal').text();
         $('.fbuy').attr('href','/home/orders/add?gid='+gid+'&gnum='+gnum+'&total='+total);
        });
 });
