$(document).ready(function() {
    var scroll = 10;
    var scrollTop, readership, h, browserHeight;
    var page_id = 1;// itlp 縦

    postAnalyzeData(page_id, $('body'), 'documentReady');

    $("input,textarea").change(function() {
        postAnalyzeData(page_id, $(this), 'change');
    });
    $('input,a').click(function() {
        postAnalyzeData(page_id, $(this), 'click');
    });

    $(window).scroll(function(e) {
        scrollTop = $(window).scrollTop();
        h = Math.max.apply(null, [document.documentElement.scrollHeight, document.body.scrollHeight, document.documentElement.clientHeight, document.body.clientHeight]);
        browserHeight = document.documentElement.clientHeight;
        readership = (scrollTop + browserHeight) / h * 100;
        readership = Math.floor(readership);
        if (readership > scroll) {
            scroll = readership / 10 * 10 + 10; // 10% ごとにログ出力
            postAnalyzeData(page_id, $(this), 'scroll', readership);
        }
    });
});


var get_current_timestamp = function() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();
    var hour = d.getHours();
    var minute = d.getMinutes();
    var second = d.getSeconds();

    return d.getFullYear() + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
}
function postAnalyzeData(page_id, object, event, readership) {
    var data = {};
    var myEvent = {};
    myEvent['event'] = event;
    myEvent['m_page_id'] = page_id;

    if (event === 'scroll') {
        myEvent['readership'] = readership;
    } else {
        myEvent['name'] = $(object).attr("name");
        myEvent['element_id'] = $(object).attr("id");
        myEvent['href'] = $(object).attr("href");
        myEvent['class'] = $(object).attr("class");
    }
    if ($('body').attr("id") == 'cont') { // 古いinquiry対応
        myEvent['body_id'] = $('body').attr("class");
    } else {
        myEvent['body_id'] = $('body').attr("id");
    }
    myEvent['timestamp'] = get_current_timestamp();
    data['Event'] = myEvent;

    $.ajax({
        type: 'POST',
        url: '//www.be-dash.co.jp/analyzer/Events/add',
        data: data,
        success: function(data) {
        },
        error: function(data) {
        }
    });

}