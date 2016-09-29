<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <!-- <link href="/style/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://cdn.jsdelivr.net/editor/0.1.0/editor.css" rel="stylesheet" >
    <link href="/style/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="/style/css/main.css" rel="stylesheet">

    <script src="/style/js/jquery.min.js"></script>
    <script src="/style/js/perfect-scrollbar.jquery.min.js"></script>

      
</head>

<body>
    <div class="container">
        <!-- 标题 -->
        <div class="row clearfix">
            <div style="float:left;">
                <p>ThinkNote</p>
            </div>
            <div id="tagView" style="float:left;width:19%;">
                <!-- <p contentEditable="true">关键字,关键字,关键字</p> -->
                <p>
                    <span id="addTagGlyph" class="glyphicon glyphicon-plus" style="cursor:pointer;"></span>
                    <span id="notag"> 还没有标签哦</span>
                </p>
            </div>
            <div style="float:left;width:50%;">
                <p contentEditable="true">点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题点此添加标题</p>
            </div>
            <div style="float:right;">
                <p>参考</p>
            </div>
            
        </div>

        <div id="tagWrapper" class="tagWrapper" style="position:fixed; display:none; width:360px; max-height:250px; overflow:auto; border:1px solid #ddd; padding:10px;">
            <div id="tag">
                <li>汽车</li><li>飞机</li><li>坦克</li><li>导弹</li>
            </div>

            <div>
                <input type="text" placeholder="回车增加标签"/>
                <button type="button" class="btn btn-default btn-sm" id="tagWrapperClose">关闭</button>
            </div>
        </div>
        <!-- 问题记录 -->
        <!-- 滚动条: 需要样式contentHolder, 需要固定高度$('#content').height(winHeight - offset - 100);-->
        <!-- bootstrap居中: style="display:table; width:auto; margin-left:auto; margin-right:auto"  -->
        <!-- perfect 默认显示滚动条：always-visible -->
        <!-- 监听resize：$(window).resize(function() {});  -->
        <!-- 隐藏滚动条：overflow:hidden -->
        <div class="row clearfix">
            <div id="title-wrapper" class="col-md-3 title-border">
                <div id="content" class="contentHolder" style="padding-top:30px;">
                    <?php if($flag == 'create') { ?>
                        <p><a seq="1" href="">点击添加章节标题</a></p>
                        <p><a seq="2" href="">点击添加章节标题</a></p>
                        <p><a seq="3" href="">点击添加章节标题</a></p>
                    <?php } ?>
                </div>
                <div id="titleOpt" class="center" style="padding-top:20px;">
                    <button class="btn btn-default btn-sm" onclick="editTitle();">编辑</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-default btn-sm">排序</button>
                </div>
            </div>
            <div id="col-content-right" class="col-md-9">
                
                <div id="operation" style="height:30px;">
                    <div style="float:left;"><span id="section-title">xxxxxxx</span></div>
                    <div style="float:right;">
                        <button type="button" class="btn btn-default btn-xs">reference</button>
                    </div>
                    
                </div>
                <!-- 编辑器 -->
                <div id="section">
                    <div class="editor-wrapper">
                        <textarea id="editor" placeholder="Content here ...."></textarea>
                    </div>
                    <button class="btn btn-default btn-sm">保存</button>
                </div>
                <!-- 编辑器 -->
            </div>
        </div>
    </div>

</body>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/style/js/editor.js"></script>
<script src="/style/js/marked.js"></script>
<script type="text/javascript">
var g_winHeight = 0;


function initEditor() {
    var editor = new Editor();
    editor.render();
}

function setTitleWrapperHeight() {
    //浏览器当前窗口可视区域高度
    var winHeight = $(window).height();
    var offset = $("#content").offset().top;
    $('#content').height(winHeight - offset - 100);
    $('#title-wrapper').height(winHeight - offset);
}

function initScrollbar() {
    $('#content').perfectScrollbar();
}

function initTagWrapper() {
    //$("#tagWrapper").hide();

    $("#addTagGlyph").click(function(){
        setTagWrapperOffset();
        $("#tagWrapper").toggle();
    });

    $("#tagWrapper").on('click', 'li', function(){
        //alert($(this).text());
        alert($("#notag").length > 0);
    });

    $("#tagWrapperClose").click(function(){
        $("#tagWrapper").toggle();
    });

}

$(document).ready(function() {

    initEditor();
    
    setTitleWrapperHeight();

    initScrollbar();

    initTagWrapper();

    <?php if($flag == 'create') { ?>
    editTitle();
    <?php } ?>
});

    // $("#content").on("click", "a", function(){
    //     //alert($(this).text());
    //     $("#section-title").text($(this).text());
    //     return false;
    // });

// 窗口变化时需要
// 1. 重新计算标题栏高度，因为滚动条需要明确的高度
// 2. 更新滚动条
$(window).resize(function() {
    var winHeight = $(window).height(); //浏览器当前窗口可视区域高度
    var offset = $("#content").offset().top;
    $('#content').height(winHeight - offset - 100);
    $('#content').perfectScrollbar("update");
});

// 需计算seq值
function addTitle(nextSeq) {
    $("#content").append("<p seq=\"" + nextSeq + "\" contentEditable=\"true\">点击添加章节标题</p>");
    $('#content').perfectScrollbar("update");

    //将滚动条移动到最下面
    var divHeight = $("#content").height();
    if ($('#content').prop("scrollHeight") > divHeight) {
        $('#content').scrollTop($('#content').prop("scrollHeight") - divHeight + 100);
        $('#content').perfectScrollbar("update");
    }
}

function addEvent() {

    $("#content").on("click", "p", function() {
        // 清空预留字
        if ($(this).text() == "点击添加章节标题") {
            $(this).text("");
        }
        // 如果点击的是最后一个，新增
        var pLen = $("#content p").length;
        var seq = $(this).attr("seq");
        //alert('length ' + pLen + " seq " + seq);
        if (pLen == seq) {
            addTitle(parseInt(seq) + 1);
        }

    });

    // 失去焦点
    $("#content").on("blur", "p", function() {
        // 如果什么也没写，就恢复默认
        if ($(this).text() == "") {
            $(this).text("点击添加章节标题");
            return;
        }


    });
}

function saveHrefTitle() {
    var arr = [];
    $("#content a").each(function() {
        var seq = $(this).attr("seq");
        var text = $(this).text();
        arr.push("<p seq=\"" + seq + "\" contentEditable=\"true\">" + text + "</p>");
    });
    console.log(arr);
    return arr;
}

function clearHrefTitle() {

    $("#content").empty(); //删除子元素 remove()连这个元素都删
}

function displayEditTitle(arr) {
    arr.forEach(function(p) {
        $("#content").append(p);
    });
}

function hideEditAndSort() {

    $("#titleOpt").empty();
}

function displaySave() {

    $("#titleOpt").append('<button class="btn btn-default btn-sm" onclick="saveTitle();">保存</button>');
}

function editTitle() {
    // 保存Href所有信息
    var arr = saveHrefTitle();
    // 清空
    clearHrefTitle();
    // 重新加载
    displayEditTitle(arr);
    // 添加事件
    addEvent();
    // 隐藏 编辑/排序
    hideEditAndSort();
    // 显示保存
    displaySave();
}

function openSection(obj) {
    console.log($(this));
    $("#section-title").text("ssss");
}

function setTagWrapperOffset() {
    var tagTop = $("#tagView").offset().top;
    var tagleft = $("#tagView").offset().left;
    var tagHeight = $("#tagView").height();

    $("#tagWrapper").css('left', tagleft - 12 + 'px');
    $("#tagWrapper").css('top', tagTop + tagHeight - 5 + 'px');
}
</script>

</html>