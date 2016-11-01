String.prototype.format = function() {
    var args = arguments;
    return this.replace(/\{(\d+)\}/g,
        function(m, i) {
            return args[i];
        });
}

/////////////////////////////////////////////////////////////////////
function Title(father) {
    this.doc = {
        content     : "content",
        edit        : "editContent",
        display     : "displayContent",
        operate     : "operate",
        editsort    : "editsort",
        ensure      : "ensure",
        btnedit     : "edit",
        btnsort     : "sort",
        btnsure     : "sure",
        pdefault    : "点击添加章节标题",
    }

    this.dom = {
        content     : '<div id="content" class="content"></div>',
        edit        : '<div id="editContent"></div>',
        display     : '<div id="displayContent"></div>',
        pedit       : '<p seq="{0}" titid="{1}" contentEditable="true">{2}</p>',
        pdisplay    : '<p seq="{0}" titid="{1}" >{2}</p>',
        operate     : '<div id="operate"></div>',
        editsort    : '<div id="editsort"><button id="edit">编辑</button><button id="sort">排序</button></div>',
        ensure      : '<div id="ensure"><button id="sure">确定</button></div>',
        nav         : '<h4>ThinkNote <small>Keep Thinking, Keep Noting</small></h4>',
    };
    // title-wrapper
    this.father = $("#" + father);
    this.init();
}

Title.prototype = {
    init: function() {
        this.create();
        this.bindEvent();
        this.initSortable();
        this.resize();
        this.initScrollbar();
        this.editClick();
    },

    resize: function() {
        var winHeight = $(window).height();
        var offset = this.content.offset().top;
        // title-wrapper
        this.father.height(winHeight);
        this.content.height(winHeight - offset - 70);
        this.content.perfectScrollbar("update");
    },

    create: function() {
        // nav
        this.father.append(this.dom.nav);
        // content
        this.father.append(this.dom.content);
        this.content = $("#" + this.doc.content);
        // editContent
        this.content.append(this.dom.edit);
        this.edit = $("#" + this.doc.edit);
        // displayContent
        this.content.append(this.dom.display);
        this.display = $("#" + this.doc.display);
        // operate
        this.father.append(this.dom.operate);
        this.operate = $("#" + this.doc.operate);
        // edit and sort
        this.operate.append(this.dom.editsort);
        this.editsort = $("#" + this.doc.editsort);
        // ensure
        this.operate.append(this.dom.ensure);
        this.ensure = $("#" + this.doc.ensure);
        // btn
        this.btnedit = $("#" + this.doc.editsort + " #" + this.doc.btnedit);
        this.btnsort = $("#" + this.doc.editsort + " #" + this.doc.btnsort);
        this.btnsure = $("#" + this.doc.ensure + " #" + this.doc.btnsure);
    },

    initScrollbar: function() {
        this.content.perfectScrollbar();
    },

    initSortable: function() {
        this.display.sortable();
        this.display.sortable("option", "disabled", true);
    },

    // 1. 增加TITLE, editContent与displayContent一一对应
    // 2. 更新滚动条
    // 3. 将滚动条移动到最下面
    addTitle: function(seq) {
        var titleID = md5((new Date).getTime());
        this.edit.append(this.dom.pedit.format(seq, titleID, this.doc.pdefault));
        this.display.append(this.dom.pdisplay.format(seq, titleID, this.doc.pdefault));
        this.content.perfectScrollbar("update");
        //将滚动条移动到最下面
        var divHeight = this.content.height();
        if (this.content.prop("scrollHeight") > divHeight) {
            this.content.scrollTop(this.content.prop("scrollHeight") - divHeight + 100);
            this.content.perfectScrollbar("update");
        }
    },

    displayEdit: function() {
        this.edit.css('display', 'block');
        this.display.css('display', 'none');
    },

    hideEdit: function() {
        this.edit.css('display', 'none');
        this.display.css('display', 'block');
    },

    displayEnsure: function() {
        this.editsort.css("display", "none");
        this.ensure.css("display", "block");
    },

    hideEnsure: function() {
        this.editsort.css("display", "block");
        this.ensure.css("display", "none");
    },

    bindEvent: function() {
        var _this = this;
        _this.edit.on("focus", "p", function() {
            _this.pOnFocus($(this));
        });

        _this.edit.on("blur", "p", function() {
            _this.pOnBlur($(this));
        });

        _this.display.on("click", "p", function() {
            //displaycallback($this);
        });

        _this.btnedit.click(function() {
            _this.editClick();
        });

        _this.btnsort.click(function() {
            _this.sortClick();
        });

        _this.btnsure.click(function() {
            _this.sureClick();
        });

        $(window).resize(function() {
            _this.resize();
        });
    },

    pOnFocus: function(o) {
        if (o.text() == this.doc.pdefault) {
            o.text("");
        }
        var len = this.edit.children("p").length; //兄弟节点
        var seq = parseInt(o.attr("seq"));
        if (len == seq) {
            this.addTitle(seq + 1);
        }
    },

    pOnBlur: function(o) {
        if (o.text() == "") {
            o.text(this.doc.pdefault);
        }
        var seq = o.attr("seq");
        var text = o.text();
        this.display.children("p").each(function() {
            if (seq == $(this).attr("seq")) {
                $(this).text(text);
            }
        });
    },

    editClick: function() {
        this.displayEdit();
        this.displayEnsure();
        if(this.edit.children("p").length == 0) {
            this.addTitle(1);
        }
        this.clickFlag = "edit";
    },

    sortClick: function() {
        this.display.sortable("option", "disabled", false);
        this.displayEnsure();
        this.clickFlag = "sort";
    },

    // 1.删掉没被修改的标题 2.重排seq 3.显示编辑/排序按钮 4.显示displayEdit
    sureClick: function() {
        if (this.clickFlag == "edit") {
            if (this.edit.children("p").length > 1) {
                this.reomveRedundancy();
                this.reOrder();
            }
            this.hideEdit();
            this.hideEnsure();
        } else if (this.clickFlag == "sort") {
            this.display.sortable("option", "disabled", true);
            this.reOrder();
            this.hideEnsure();
            this.flushEdit();
        } else {
            console.log("button operate failed");
        }

        this.clickFlag = "";
    },
    // 删掉没被修改的标题
    reomveRedundancy: function() {
        var _this = this;
        _this.edit.children("p").each(function() {
            if ($(this).text() == this.doc.pdefault) {
                var seq = $(this).attr("seq");
                _this.display.children("p").each(function() {
                    if (seq == $(this).attr("seq")) {
                        if ($(this).text() == this.doc.pdefault) {
                            $(this).remove();
                        } else {
                            console.log("标题内容不一致");
                        }
                    }
                });
                $(this).remove();
            }
        });
    },
    // 重排seq
    reOrder: function() {
        var seq = 1;
        this.edit.children("p").each(function() {
            $(this).attr("seq", seq);
            seq = seq + 1;
        });

        seq = 1;
        this.display.children("p").each(function() {
            $(this).attr("seq", seq);
            seq = seq + 1;
        });
    },
    // 根据display重建edit
    flushEdit: function() {
        var _this = this;
        _this.edit.empty();
        _this.display.children("p").each(function() {
            _this.edit.append(this.dom.pedit.format($(this).attr("seq"), $(this).attr("titid"), $(this).text()));
        });
    }
};