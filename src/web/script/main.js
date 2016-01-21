
require.config({
    paths: {
        jquery: 'jquery',
        template: 'baiduTemplate',
        skin:'skin'
    },
    shim: {
        template: ['jquery']
    }
});

require.intload = function () {
    require(['jquery','template','skin'],function (jquery,template,skin) {
            function skinInit(){
                $('#spanSkin').click(function(){
                    var ul=$(this).siblings('ul');
                    if(ul.is(':hidden'))
                    {
                        ul.show();
                    }
                    else
                    {
                        ul.hide();
                    }
                });
                var skinA=$('#spanSkin').siblings('ul').find('a');
                skinA.each(function(index){
                    $(this).click(function(){
                        var cl=$(this).css('background-color');
                        var color='#fff';
                        skin.skinFn(color,cl);
                    })
                })
            }
         skinInit();//换肤

    });
};
require.intload();






