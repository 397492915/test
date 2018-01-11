/**
 * Created by kevin on 2014/10/10.
 */
(function(window){
    var html = '<div id="mask_cover" style="display:none;width: 100%;height: 100%;padding:0px;text-align:center;margin: 0px;background-color: #000000;opacity: 0.6;position: fixed;left: 0px;top: 0px;z-index: 9999;">'+
                    '<span style="width:1px;margin-left:-1px;height: 100%;vertical-align:middle;display: inline-block;"></span>'+
                    '<div style="vertical-align:middle;display:inline;font-size: 30px;color: #ffffff;">加载中...</div>'+
                '</div>';
    function createMask(){
        $('body').append(html);
    }
    function openMask(){
        $('#mask_cover').css('display','block');
    }
    function closeMask(){
        $('#mask_cover').css('display','none');
    }
    window.openMask = openMask;
    window.closeMask = closeMask;
    window.createMask = createMask;
})(window);
