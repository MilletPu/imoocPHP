/**
 * 前端登录业务类
 * 使用异步方式请求登录接口
 * @author milletpu
 */

var login = {
    check : function(){
        //获取登录页面中的用户名 和 密码
        var username = $('input[name = "username"]').val();
        var password = $('input[name = "password"]').val();
        if (!username){
            dialog.error("用户名不能为空");
        }
        if (!password){
            dialog.error("密码不能为空");
        }

        var url = "/index.php?m=admin&c=login&a=check";
        var data = {'username':username, "password":password};
        //执行异步请求 ajax   $.post;
        $.post(url,data,function(result){

        });
    }

}