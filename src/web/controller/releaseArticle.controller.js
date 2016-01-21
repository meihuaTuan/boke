var user_controller=function (){
    var controller={
        _init:function(){
            this._initPage();
            this._initEvents()
        },
         attr:{

         },
        apis:{
            userSaveTitle:' ',
            userSaveArticle:' '
        },
        tpmls:{
            userdl:'../modules/dialog/userDialog.html'
        },
        _initEvents:function(){     //事件
            var that=this;
            $(".user").delegate('.btn-titleOne', 'click', function () {
                that.userDialog();
            });
            $("#userBtnSave").click(function(){
                that.userpage();
            });
        },
        userDialog:function(){
            var that=this;
            var htmlobj=$.ajax({
                url:that.tpmls.userdl,
                async:false,
                dataType: "html",
                cache: false
            });
            var html=htmlobj.responseText;
            var d01 = dialog({
                cache:false,
                title: '设置标题',
                content:html,
                cancel:true,
                okValue: '保存',
                cancelValue: '取消',
                ok: function () {
                    $('#formTitleUpdate').submit();
                    $.ajax({
                        cache: false,
                        type: "POST",
                        url:that.apis.userSaveTitle,
                        data:$('#formTitleUpdate').serialize(),
                        async: true,
                        error: function(request) {
                            alert("系统出错！");
                        },
                        success: function(data) {
                            window.location.reload();
                        }
                    });
                }
            });
            d01.show();
        },
        userpage:function(){
            $('#userFormid').submit();
            $.ajax({
                cache: false,
                type: "POST",
                url:that.apis.userSaveArticle,
                data:$('#userFormid').serialize(),
                async: true,
                error: function(request) {
                    alert("系统出错！");
                },
                success: function(data) {
                    window.location.reload();
                }
            });
        },
        _initPage:function(){

        }

    };




    controller._init();
    return controller;
};
user_controller();






