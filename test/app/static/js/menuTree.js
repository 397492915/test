/**
 * Created by kevin on 2014/11/05.
 * 基于jQuery
 */
    (function($){
        var str = "";
        var forTree = function (o) {
	    if(typeof o != 'object'){
	    	try{
			var temp = JSON.parse(o);
			o = temp;
		}catch (e){
			//o = o;
		}
	    }
            var urlstr = "";
            var keys = new Array();
            for (var key in o) {
                keys.push(key);
            }
            for (var j = 0; j < keys.length; j++) {
                var k = keys[j];
	 	if(typeof o[k] != 'object'){
		    try{
			var temp = JSON.parse(o[k]);
			o[k] = temp;
		    }catch (e){
			//o = o;
		    }
		}
                if (typeof o[k] == "object") {
                    urlstr = "<div><span>" + k + "</span><ul>";
                } else {
                    urlstr = "<div><span>" + k + "=" + o[k] + "</span><ul>";
                }
                str += urlstr;
                var kcn = 0;
                if (typeof o[k] == "object") {
                    for (var kc in o[k]) {
                        kcn++;
                    }
                }
                if (kcn > 0) {
                    forTree(o[k]);
                }
                str += "</ul></div>";
            }
            return str;
        }

        /*树形菜单*/
        var menuTree = function (ele) {
	        str = '';
            //给有子对象的元素加[+-]
            $("#"+ele+" ul").each(function (index, element) {
                var ulContent = $(element).html();
                var spanContent = $(element).siblings("span").html();
                if (ulContent) {
                    $(element).siblings("span").html("[+] " + spanContent)
                }
            });
            $("#"+ele).find("div span").click(function () {
                var ul = $(this).siblings("ul");
                var spanStr = $(this).html();
                var spanContent = spanStr.substr(3, spanStr.length);
                if (ul.find("div").html() != null) {
                    if (ul.css("display") == "none") {
                        ul.show(150);
                        $(this).html("[-] " + spanContent);
                    } else {
                        ul.hide(150);
                        $(this).html("[+] " + spanContent);
                    }
                }
            })
        }
        var openAll = function (ele){
            $('#'+ele).find('div span').each(function(index,element){
                var ul = $(element).siblings("ul");
                if (ul.find("div").html() != null) {
                    if (ul.css("display") == "none") {
                        $(element).trigger('click');
                    }
                }
            });
        }
        var closeAll = function (ele){
            $('#'+ele).find('div span').each(function(index,element){
                var ul = $(element).siblings("ul");
                if (ul.find("div").html() != null) {
                    if (ul.css("display") != "none") {
                        $(element).trigger('click');
                    }
                }
            });
        }
        $.forTree = forTree;
        $.menuTree = menuTree;
        $.openAll = openAll;
        $.closeAll = closeAll;
    })(jQuery);
