define(['jquery'],function(jquery){
    var skin=function(){
        this.skinFn=function(color,bg){
            this.color=color||'#fff';
            this.bg=bg||'#fff';
            if(this.bg)
            {
                $('.main-header').css('background',this.bg)
                $('.asideLeft h2').css('background',this.bg)
            }
            if(this.color)
            {
                $('.main-header nav a').css('color',this.color);
            }
        }
    };
    return new skin();
});






