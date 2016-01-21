var Common=function(headTpl,footerTpl){
    this.headTpl='/modules/header/header.tpl';
    this.footerTpl='/modules/footer/footer.tpl';
    this.javascriptListTpl='/modules/javascript/index.tpl';
};
Common.prototype= {
    header: $(".boke-common-header"),
    footer: $(".boke-common-footer"),
    javscriptObj:$(".javascriptList"),
    ajaxCommon:{
        type: "GET",
        dataType: "html",
        error:function(){
            alert("系统出错");
        }
    },
    initHedaer: function(){
        var that=this;
        var params=$.extend(true,{},that.ajaxCommon,{
            url:that.headTpl,
            success:function(data){
                that.header.html(data);
                that.tabTop();
            }
        });
        $.ajax(params);
     },
    initFooter: function () {
        var that=this;
        var params=$.extend(true,{},that.ajaxCommon,{
            url:that.footerTpl,
            success:function(data){
                that.footer.html(data);
            }
        });
        $.ajax(params);
    },
    tabTop:function(){
        var url=window.location.href;
        $(".main-header a").each(function(){
            $(this).click(function(){
                $(this).addClass("active").siblings().removeClass("active");
            })
        })
    },
    javascriptList:function(){
        var that=this;
        var params=$.extend(true,{},that.ajaxCommon,{
            url:that.javascriptListTpl,
            success:function(data){
                that.javscriptObj.html(data);
            }
        });
        $.ajax(params);
    }
};

$(function(){
    var headerFn = new Common();
    headerFn.initHedaer();
    headerFn.initFooter();
    headerFn.javascriptList();
});











