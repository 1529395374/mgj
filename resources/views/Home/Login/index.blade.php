<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/Home/regis/AmazeUI-2.4.2/assets/css/amazeui.css" />
    <link href="/Home/regis/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/layui/layui.all.js" type="text/javascript"></script>
  </head>

  <body>

    <div class="login-boxtitle">
      <a href="/"><img alt="logo" src="/Home/regis/images/logobig.png" /></a>
    </div>

    <div class="login-banner">
      <div class="login-main">
        <div class="login-banner-bg"><span></span><img src="/Home/regis/images/big.jpg" /></div>
        <div class="login-box">
             @if(session('success'))
                  <div class="mws-form-message success">
                      <script>
                          layer.msg("{{session('success')}}")
                      </script>
                  </div>
              @endif
              @if(session('error'))
                <div class="mws-form-message error">
                      <script>
                        layer.msg("{{session('error')}}")
                      </script>
                </div>
              @endif
              @if (count($errors) > 0)
                  <div class="mws-form-message error">
                      <script>
                        layer.open({
                            type: 1,
                            title: false,
                            closeBtn: 0,
                            shadeClose: true,
                            skin: 'yourclass',
                            content: "<p><span><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></span></p>"
                          });
                      </script>
                  </div>
              @endif
              <h3 class="title">登录商城</h3>

              <div class="clear"></div>
            
            <div class="login-form">
              <form method="post" action="/home/login/dologin">
              {{ csrf_field() }}
                 <div class="user-name">
                    <label for="user"><i class="am-icon-user"></i></label>
                    <input type="text" name="user" id="user" placeholder="邮箱/手机/用户名">
                 </div>
                 <div class="user-pass">
                    <label for="upwd"><i class="am-icon-lock"></i></label>
                    <input type="password" name="upwd" id="upwd" placeholder="请输入密码">
                 </div>
                 <div class="am-cf">
                  <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm">
                </div>
              </form>
           </div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
                <a href="#" class="am-fr">忘记密码</a>
                <a href="/home/register" class="zcnext am-fr am-btn-default">注册</a>
                <br />
            </div>
        </div>
      </div>
    </div>


          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>

</html>