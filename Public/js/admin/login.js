/**
 * 前端登录业务类
 * 使用异步方式请求登录接口
 * @author milletpu
 */

var login = {
    check : function(){

        //获取登录页面中的'用户名'和'密码'  ->   $('input[name = "username"]').val();
        var username = $('input[name = "username"]').val();
        var password = $('input[name = "password"]').val();

        //执行ajax异步请求  ->   $.post;
        var url = "/admin.php?c=login&a=check"; //！！！此check为LoginController.class.php中的check()
        var data = {'username':username, "password":password};
        $.post(url,data,function(result){
            if(result.status == 0){
                return dialog.error(result.message);
            }
            if(result.status == 1){
                return dialog.success(result.message, '/admin.php?c=index');
            }

        }, 'JSON');
    }

};