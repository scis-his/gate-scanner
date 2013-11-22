/* @function: Get user platform and browser */
document.Browser =
{
	IE:     navigator.userAgent.indexOf('MSIE') > -1,
	Opera:  navigator.userAgent.indexOf('Opera') > -1,
	WebKit: navigator.userAgent.indexOf('AppleWebKit/') > -1,
	Gecko:  navigator.userAgent.indexOf('Gecko') > -1 && navigator.userAgent.indexOf('KHTML') == -1,
	MobileSafari: !!navigator.userAgent.match(/Apple.*Mobile.*Safari/),
	Safari:navigator.userAgent.indexOf('Safari') > -1,
	Firefox:navigator.userAgent.indexOf('Firefox') > -1
};
document.Platform =
{
	isMac: !!(navigator.appVersion.match(/(Macintosh|Mac OS X)/)),
	isiPhone : !!(navigator.appVersion.match(/(iPhone)/)),
	isiPad : !!(navigator.appVersion.match(/(iPad)/)),
	isWin: !!(navigator.appVersion.match(/(Windows)/)),
	browser: (document.Browser.IE ? 'ie' : ((document.Browser.Opera) ? 'opera' : ((document.Browser.Safari) ? 'safari' : ((document.Browser.Firefox || document.Browser.Gecko) ? 'firefox' : '') ) ) )
};

function dectectBrowser()
{
	var retina = window.devicePixelRatio > 1 ? true : false;
	var objBody = document.getElementsByTagName('body')[0];
	if (objBody.className)
	{
		objBody.className += " " + document.Platform.browser.toLowerCase();
	}else{
		objBody.className += document.Platform.browser.toLowerCase();
	}
	if (document.Platform.isWin) {
		objBody.className += ' windows';
	} else if (document.Platform.isMac) {
		objBody.className += ' mac';
	}
	if (document.Platform.isiPhone) {
		objBody.className += ' iphone';
	} else if (document.Platform.isWin) {
		objBody.className += ' ipad';
	}
	if (retina) {
		objBody.className += ' retina';
	}
	
}
/* @end */

$(document).ready(function()
{
	dectectBrowser();

});
