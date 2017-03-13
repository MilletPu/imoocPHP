/**
 * 添加按钮操作，比如View/Menu/index.html中的按钮，
 * id为button-add的所有都适用
 *
 * milletpu
 */

$("#button-add").click(function(){

    var url = SCOPE.add_url;
    window.location.href = url; //点击添加按钮后，跳转到表单页面

});


/**
 * 提交form表单操作，
 * id为singcms-button-submit的所有都适用
 *
 * milletpu
 */
$("#singcms-button-submit").click(function(){

    //获取form表单的数据，根据表单的id为singcms-form
    var data = $("#singcms-form").serializeArray();
    postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });
    console.log(postData); //

    //将获取的数据Ajax $.post给服务器，MenuController中$_POST进行接收
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url, postData, function(result){
        if (result.status == 1) {
            return dialog.success(result.message, jump_url);
        } else if (result.status == 0) {
            return dialog.error(result.message);
        }
    },'JSON');

});