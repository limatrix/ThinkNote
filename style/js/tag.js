function Tag(father) {

    this.dom = {
        tagview :   '<div id="tag-plus" class="disp mid">' + 
                        '<span class="glyphicon glyphicon-plus cursor"></span>' +
                    '</div>' +
                    '<div id="tag-view" class="disp top view">' +
                        '<span class="none"> 还没有标签哦</span>' + 
                    '</div>' + 
                    '<div id="tag-more" class="disp more"><span class="more">更多</span></div></div>',
        
        tagnew :    '<div id="tag-new" class="tag-new">' +
                        '<div class="new"></div>' +
                        '<div>' +
                            '<input class="add" type="text" placeholder="回车增加标签"/>' +
                            '<button type="button" class="btn btn-default btn-xs">关闭</button>' +
                        '</div>' +
                    '</div>',
    },

    this.father = $("#" + father);
    this.init();
}

                        
Tag.prototype = {
    init: function() {
        this.create();
        this.bindEvent();
    },

    create: function() {
        this.father.append(this.dom.tagview);
        this.father.after(this.dom.tagnew);

        this.icon = $("#tag-plus .glyphicon-plus");
        this.view = $("#tag-view");
        this.more = $("#tag-more .more");
        this.none = $("#tag-view .none");
        this.wrapper = $("#tag-new");
        this.new = $("#tag-new .new");
        this.add  = $("#tag-new .add");
        this.close = $("#tag-new .btn");
    },

    bindEvent: function() {
        var _this = this;
        _this.icon.click(function(){
            _this.iconClick();
        });

        _this.add.keydown(function(event){
            if(event.keyCode == 13){
                 _this.addTag($(this));
            }
        });

        _this.new.on("click", "li", function(){
            _this.liClick($(this));
        });

        _this.more.click(function(){
            _this.moreClick();
        });

        _this.close.click(function(){
            _this.wrapper.css("display", "none");
        });
    },

    iconClick: function() {
        this.wrapper.toggle();
    },

    addTag: function(o) {
        if(o.val()) {
            this.new.append("<li>" + o.val() + "</li>");
            o.val("");
        }
    },

    liClick: function(o) {
        if (o.hasClass("in")) {
            o.removeClass("in");
            var tag = o.text();
            // 查找view, 并删除
            var _this = this;
            _this.view.children("li").each(function(){
                if( tag == $(this).text()) {
                    $(this).remove();
                    if(_this.view.prop("scrollHeight") == _this.view.prop("clientHeight")) {
                        _this.more.css("display", "none");
                    }
                }
            });
            console.log(this.view.children("li").length);
            if(this.view.children("li").length == 0) {
                this.none.css("display", "block");
            }
        } else {
            // 增加样式
            o.addClass("in");
            // 判断view里是否有li, 如果没有, 需要隐藏this.none
            if(this.view.children("li").length == 0) {
                this.none.css("display", "none");
            }
            this.view.append("<li>" + o.text() + "</li>");
            if(this.view.prop("scrollHeight") > this.view.prop("clientHeight")) {
                this.more.css("display", "inline");
            }
        }
    },    

    moreClick: function() {
        if(this.more.text() == "更多") {
            this.view.css("height", "auto");
            this.more.text("收起");
        } else {
            this.view.css("height", "23px");
            this.more.text("更多");
        }
    },
    
};