/**
 * Created by kevin on 2014/11/05.
 * 基于jQuery
 */
(function(window){
    var html = '<div id="tool_tip_by_kevin" style="border-radius:8px;box-shadow: 10px 10px 5px #888888;padding:15px 28px;font-weight: bold;position: absolute;top: 50px;left: 50%;display: none;z-index: 998;"></div>';
    function createTip(){
        $('body').append(html);
    }
    function showTip(tip, type) {
        var type2color = {
            'success':'#def0d8',
            'fail':'#f2dedf',
            'warn':'#fdf8e4',
            'info':'#d9edf6'
        };
        var $tip = $('#tool_tip_by_kevin');
        $tip.stop(true,true);
        $tip.text(tip).css({'margin-left':( -$tip.outerWidth()/2),'position':'fixed','top':'30%','background-color':type2color[type]}).fadeIn(300).delay(1500).fadeOut(300);
    }
    function tipSuccess(tip){
        showTip(tip,'success');
    }
    function tipFail(tip){
        showTip(tip,'fail');
    }
    function tipWarn(tip){
        showTip(tip,'warn');
    }
    function tipInfo(tip){
        showTip(tip,'info');
    }
    window.createTip = createTip;
    window.tipSuccess = tipSuccess;
    window.tipFail = tipFail;
    window.tipWarn = tipWarn;
    window.tipInfo = tipInfo;
})(window);
