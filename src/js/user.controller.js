var user_controller=function (){
    var controller={
        _init:function(){
            this._initPage();
            this._initEvents()
        },
         attr:{

         },
        data:{

        },
        tpmls:{
            userdl:'/page/models/userDialog.html'
        },
        _initEvents:function(){     //事件
            var that=this;
            $(".user").delegate('.btn-titleOne', 'click', function () {
                that.dialog();
            });
        },
        dialog:function(){
            var that=this;
            var htmlobj=$.ajax({
                url:that.tpmls.userdl,
                async:false,
                dataType: "html",
                cache: false
            });
            var html=htmlobj.responseText;
            var d01 = dialog({
                title: '设置标题',
                content:html,
                cancel:true,
                okValue: '保存',
                cancelValue: '取消',
                ok: function () {

                }
            });
            d01.show();
        },
        _initPage:function(){

        }
    };




    controller._init();
    return controller;
};
user_controller();






